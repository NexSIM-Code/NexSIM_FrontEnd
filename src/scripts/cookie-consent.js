(function () {
    try {
        var w = window;
        var d = document;

        var LS_KEY = 'nexsim_cookie_consent_v1';
        var CONSENT = {necessary: true, analytics: false}; // default: only necessary

        function getStoredConsent() {
            try {
                var raw = localStorage.getItem(LS_KEY);
                if (!raw) return null;
                var parsed = JSON.parse(raw);
                if (typeof parsed === 'object' && parsed) return parsed;
            } catch (_) {
            }
            return null;
        }

        function saveConsent(c) {
            try {
                localStorage.setItem(LS_KEY, JSON.stringify(c));
            } catch (_) {
            }
        }

        function dntEnabled() {
            try {
                var nav = navigator || {};
                return (
                    nav.doNotTrack === '1' ||
                    nav.doNotTrack === 'yes' ||
                    nav.msDoNotTrack === '1' ||
                    (w.doNotTrack === '1')
                );
            } catch (_) {
                return false;
            }
        }

        function hasConsent(category) {
            var c = getStoredConsent();
            if (!c) return false;
            return !!c[category];
        }

        function injectGTM(id) {
            if (!id || typeof id !== 'string') return;
            if (d.getElementById('nexsim-gtm')) return; // prevent double
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.id = 'nexsim-gtm';
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', id);
            // Also add noscript iframe for non-JS scenarios in body if needed
            if (!d.getElementById('nexsim-gtm-noscript')) {
                var ns = d.createElement('noscript');
                ns.id = 'nexsim-gtm-noscript';
                ns.innerHTML = '<iframe src="https://www.googletagmanager.com/ns.html?id=' + encodeURIComponent(id) + '" height="0" width="0" style="display:none;visibility:hidden"></iframe>';
                d.addEventListener('DOMContentLoaded', function () {
                    d.body && d.body.appendChild(ns);
                });
            }
        }

        function injectGA4(id) {
            if (!id || typeof id !== 'string') return;
            if (d.getElementById('nexsim-ga4')) return; // prevent double
            var s = d.createElement('script');
            s.async = true;
            s.id = 'nexsim-ga4';
            s.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(id);
            var ref = d.getElementsByTagName('script')[0] || d.head || d.body;
            if (ref && ref.parentNode) ref.parentNode.insertBefore(s, ref);

            w.dataLayer = w.dataLayer || [];

            function gtag() {
                w.dataLayer.push(arguments);
            }

            w.gtag = w.gtag || gtag;
            gtag('js', new Date());
            gtag('config', id, {send_page_view: true});
        }

        function applyConsent() {
            // Respect DNT: if enabled, never load analytics
            if (dntEnabled()) return;
            var c = getStoredConsent();
            if (!c) return;
            if (c.analytics) {
                // Load GTM/GA only now
                if (w.NEXSIM_GTM_ID) injectGTM(w.NEXSIM_GTM_ID);
                if (w.NEXSIM_GA_ID) injectGA4(w.NEXSIM_GA_ID);
            }
        }

        function openPreferences() {
            var modal = d.getElementById('cookie-pref-modal');
            if (modal) {
                modal.style.display = 'block';
            }
        }

        function closePreferences() {
            var modal = d.getElementById('cookie-pref-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        }

        function createBanner() {
            if (d.getElementById('cookie-consent-banner')) return;
            var banner = d.createElement('div');
            banner.id = 'cookie-consent-banner';
            banner.style.cssText = 'position:fixed;bottom:0;left:0;right:0;z-index:9999;background:#0b2a4a;color:#fff;padding:16px;display:flex;gap:12px;align-items:center;flex-wrap:wrap;box-shadow:0 -2px 8px rgba(0,0,0,0.15);';

            var text = d.createElement('div');
            text.style.cssText = 'flex:1;min-width:240px;';
            text.innerHTML = 'Nous utilisons des cookies pour améliorer votre expérience. Les cookies strictement nécessaires sont toujours activés. Vous pouvez accepter les cookies d\'analyse, refuser ou personnaliser vos choix. <a href="/politique-cookies.php" style="color:#82cfff;text-decoration:underline;">En savoir plus</a>.';

            var btnAccept = d.createElement('button');
            btnAccept.textContent = 'Tout accepter';
            btnAccept.style.cssText = baseBtnCss('#0b2a4a', '#fff', '#82cfff');
            btnAccept.onclick = function () {
                saveConsent({necessary: true, analytics: true});
                removeBanner();
                applyConsent();
            };

            var btnReject = d.createElement('button');
            btnReject.textContent = 'Tout refuser';
            btnReject.style.cssText = baseBtnCss('#0b2a4a', '#fff', '#c9d1d9');
            btnReject.onclick = function () {
                saveConsent({necessary: true, analytics: false});
                removeBanner();
            };

            var btnCustomize = d.createElement('button');
            btnCustomize.textContent = 'Personnaliser';
            btnCustomize.style.cssText = baseBtnCss('#0b2a4a', '#0b2a4a', '#82cfff', true);
            btnCustomize.onclick = function () {
                openPreferences();
            };

            banner.appendChild(text);
            banner.appendChild(btnReject);
            banner.appendChild(btnCustomize);
            banner.appendChild(btnAccept);
            d.body.appendChild(banner);
        }

        function baseBtnCss(bg, color, borderColor, outline) {
            return 'background:' + (outline ? '#fff' : color) + ';color:' + (outline ? bg : '#0b2a4a') + ';border:2px solid ' + (outline ? borderColor : 'transparent') + ';padding:8px 12px;border-radius:6px;cursor:pointer;font-weight:600;';
        }

        function removeBanner() {
            var b = d.getElementById('cookie-consent-banner');
            if (b && b.parentNode) b.parentNode.removeChild(b);
        }

        function createPreferencesModal() {
            if (d.getElementById('cookie-pref-modal')) return;
            var modal = d.createElement('div');
            modal.id = 'cookie-pref-modal';
            modal.style.cssText = 'position:fixed;inset:0;z-index:10000;background:rgba(0,0,0,0.5);display:none;align-items:center;justify-content:center;padding:16px;';

            var dialog = d.createElement('div');
            dialog.style.cssText = 'background:#fff;color:#111;max-width:600px;width:100%;border-radius:8px;padding:20px;box-shadow:0 10px 30px rgba(0,0,0,0.2);';
            dialog.innerHTML = '<h3 style="margin-top:0">Préférences cookies</h3>' +
                '<p>Choisissez vos préférences pour les cookies. Les cookies nécessaires sont toujours activés pour assurer le fonctionnement du site.</p>';

            var form = d.createElement('div');
            form.style.margin = '12px 0';

            var rowNecessary = d.createElement('div');
            rowNecessary.innerHTML = '<label style="display:flex;align-items:center;gap:8px;opacity:.7"><input type="checkbox" checked disabled> Cookies nécessaires (toujours actifs)</label>';

            var rowAnalytics = d.createElement('div');
            rowAnalytics.style.marginTop = '8px';
            var analyticsChecked = hasConsent('analytics');
            rowAnalytics.innerHTML = '<label style="display:flex;align-items:center;gap:8px"><input type="checkbox" id="cc-analytics" ' + (analyticsChecked ? 'checked' : '') + '> Cookies d\'analyse (mesure d\'audience)</label>';

            form.appendChild(rowNecessary);
            form.appendChild(rowAnalytics);

            var actions = d.createElement('div');
            actions.style.cssText = 'display:flex;gap:8px;justify-content:flex-end;margin-top:12px;';

            var btnSave = d.createElement('button');
            btnSave.textContent = 'Enregistrer';
            btnSave.style.cssText = 'background:#0b2a4a;color:#fff;border:none;padding:8px 12px;border-radius:6px;cursor:pointer;font-weight:600;';
            btnSave.onclick = function () {
                var analytics = !!d.getElementById('cc-analytics').checked;
                saveConsent({necessary: true, analytics: analytics});
                closePreferences();
                removeBanner();
                applyConsent();
            };

            var btnClose = d.createElement('button');
            btnClose.textContent = 'Annuler';
            btnClose.style.cssText = 'background:#fff;color:#0b2a4a;border:2px solid #c9d1d9;padding:8px 12px;border-radius:6px;cursor:pointer;font-weight:600;';
            btnClose.onclick = function () {
                closePreferences();
            };

            actions.appendChild(btnClose);
            actions.appendChild(btnSave);

            dialog.appendChild(form);
            dialog.appendChild(actions);
            modal.appendChild(dialog);
            d.body.appendChild(modal);
        }

        function setupFooterLink() {
            d.addEventListener('click', function (e) {
                var t = e.target;
                if (!t) return;
                if (t.matches && t.matches('[data-cookie-preferences]')) {
                    e.preventDefault();
                    openPreferences();
                }
            });
        }

        function init() {
            createPreferencesModal();
            setupFooterLink();
            var existing = getStoredConsent();
            if (!existing) {
                // show banner on first visit
                createBanner();
            } else {
                // apply immediately
                applyConsent();
            }
        }

        if (d.readyState === 'complete' || d.readyState === 'interactive') {
            init();
        } else {
            d.addEventListener('DOMContentLoaded', init);
        }
    } catch (e) {
        // do not break the page in any case
    }
})();
