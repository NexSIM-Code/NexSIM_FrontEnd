/* NexSIM — site vitrine : comportements UI (thème, navigation, 3D, vidéo). */
(() => {
    'use strict';

    const html = document.documentElement;
    const body = document.body;

    /* ------------------------------------------------ Préférences serveur --- */
    /* head.php dépose la langue active, les libellés du bouton de thème et les
       textes des modules 3D dans un bloc JSON : le JavaScript n'embarque plus
       aucune chaîne traduisible. */
    const I18N = (() => {
        const node = document.getElementById('nexsim-i18n');
        try { return node ? JSON.parse(node.textContent) : {}; } catch (e) { return {}; }
    })();

    /* ------------------------------------------------------------ Thème --- */
    /* Le thème est appliqué côté serveur sur <html> d'après le cookie : ici on ne
       gère que la bascule et sa mémorisation. */
    const THEME_COOKIE = (I18N.cookie && I18N.cookie.theme) || 'nexsim_theme';
    const THEME_MAX_AGE = (I18N.cookie && I18N.cookie.maxAge) || 31536000;
    const themeLabels = I18N.theme || {};

    const storeTheme = (theme) => {
        try {
            document.cookie = THEME_COOKIE + '=' + theme + ';path=/;max-age=' + THEME_MAX_AGE +
                ';samesite=lax' + (location.protocol === 'https:' ? ';secure' : '');
        } catch (e) { /* cookies indisponibles : le thème reste valable pour la visite */ }
    };

    const applyTheme = (theme) => {
        if (theme === 'light') {
            html.setAttribute('data-theme', 'light');
        } else {
            html.removeAttribute('data-theme');
        }
        const meta = document.querySelector('meta[name="theme-color"]');
        if (meta) meta.setAttribute('content', theme === 'light' ? '#E4ECF1' : '#13212B');
        document.querySelectorAll('.theme-toggle').forEach((btn) => {
            const label = theme === 'light' ? themeLabels.dark : themeLabels.light;
            if (label) btn.setAttribute('aria-label', label);
            btn.setAttribute('aria-pressed', theme === 'light' ? 'true' : 'false');
        });
    };

    applyTheme(html.getAttribute('data-theme') === 'light' ? 'light' : 'dark');

    document.querySelectorAll('.theme-toggle').forEach((btn) => {
        btn.addEventListener('click', () => {
            const next = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            applyTheme(next);
            storeTheme(next);
        });
    });

    /* ----------------------------------------------------------- Navbar --- */
    const navbar = document.querySelector('.navbar');
    const onScroll = () => {
        if (!navbar) return;
        navbar.classList.toggle('scrolled', window.scrollY > 20);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ----------------------------------------------------------- Drawer --- */
    const drawer = document.getElementById('drawer');
    const scrim = document.getElementById('scrim');
    const openBtn = document.querySelector('.nav-toggle');
    const closeBtn = document.querySelector('.drawer-close');
    let lastFocus = null;

    const setDrawer = (open) => {
        if (!drawer || !scrim) return;
        drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
        scrim.setAttribute('aria-hidden', open ? 'false' : 'true');
        body.classList.toggle('drawer-open', open);
        if (openBtn) openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) {
            lastFocus = document.activeElement;
            (closeBtn || drawer).focus();
        } else if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    if (openBtn) openBtn.addEventListener('click', () => setDrawer(true));
    if (closeBtn) closeBtn.addEventListener('click', () => setDrawer(false));
    if (scrim) scrim.addEventListener('click', () => setDrawer(false));
    if (drawer) {
        drawer.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setDrawer(false)));
    }
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawer && drawer.getAttribute('aria-hidden') === 'false') setDrawer(false);
    });
    window.matchMedia('(min-width: 901px)').addEventListener('change', (e) => { if (e.matches) setDrawer(false); });

    /* ------------------------------------------- Lien actif (sections) --- */
    const navAnchors = document.querySelectorAll('.nav-links a[href^="#"], .drawer a[href^="#"]');
    const sections = [...document.querySelectorAll('main section[id]')];
    if ('IntersectionObserver' in window && sections.length) {
        const setActive = (id) => {
            navAnchors.forEach((a) => {
                const match = a.getAttribute('href') === `#${id}`;
                a.classList.toggle('active', match);
                if (match) a.setAttribute('aria-current', 'true'); else a.removeAttribute('aria-current');
            });
        };
        const visible = new Map();
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => visible.set(entry.target.id, entry.intersectionRatio));
            let best = null;
            let bestRatio = 0;
            visible.forEach((ratio, id) => { if (ratio > bestRatio) { bestRatio = ratio; best = id; } });
            if (best) setActive(best);
        }, { rootMargin: '-30% 0px -50% 0px', threshold: [0, 0.1, 0.25, 0.5, 0.75, 1] });
        sections.forEach((s) => sectionObserver.observe(s));
    }

    /* ------------------------------------------------------------ Vidéo --- */
    const heroVideo = document.querySelector('.hero-video');
    if (heroVideo) {
        const viewportW = Math.max(window.innerWidth || 0, document.documentElement.clientWidth || 0);
        const isSmall = viewportW > 0 && viewportW <= 768;
        const src = heroVideo.dataset[isSmall ? 'srcMobile' : 'srcDesktop'] || heroVideo.dataset.srcDesktop;
        const saveData = navigator.connection && navigator.connection.saveData;
        if (src && !saveData) {
            const source = document.createElement('source');
            source.src = src;
            source.type = 'video/mp4';
            heroVideo.appendChild(source);
            heroVideo.load();
            const p = heroVideo.play();
            if (p && typeof p.catch === 'function') p.catch(() => { /* autoplay bloqué : le poster reste affiché */ });
        }
    }

    /* ---------------------------------------------------- Modules 3D ----- */
    /* Titre, description et points de chaque module : fournis traduits par le
       serveur (voir includes/modules.php). */
    const moduleData = I18N.modules || {};

    const chips = document.querySelectorAll('.chip[data-module]');
    const hotspots = document.querySelectorAll('.hotspot[data-module]');
    const titleEl = document.getElementById('module-title');
    const descEl = document.getElementById('module-desc');
    const listEl = document.getElementById('module-list');

    /* Recentre la caméra du viewer sur le point chaud du module. */
    const focusModule = (viewer, key) => {
        if (!viewer) return;
        const spot = viewer.querySelector(`.hotspot[data-module="${key}"]`);
        if (!spot) return;
        viewer.cameraTarget = spot.dataset.position;
        if (spot.dataset.orbit) viewer.cameraOrbit = spot.dataset.orbit;
    };

    const showModule = (key, viewerToFocus) => {
        const data = moduleData[key];
        if (!data) return;
        chips.forEach((c) => {
            const on = c.dataset.module === key;
            c.classList.toggle('active', on);
            c.setAttribute('aria-pressed', on ? 'true' : 'false');
        });
        hotspots.forEach((h) => h.classList.toggle('active', h.dataset.module === key));
        if (titleEl) titleEl.textContent = data.title;
        if (descEl) descEl.textContent = data.desc;
        if (listEl) {
            listEl.innerHTML = '';
            data.points.forEach((pt) => {
                const li = document.createElement('li');
                li.textContent = pt;
                listEl.appendChild(li);
            });
        }
        if (viewerToFocus) focusModule(viewerToFocus, key);
    };

    chips.forEach((chip) => chip.addEventListener('click', () => {
        // Le chip pilote le viewer qui l'accompagne (page ou dialog).
        const scope = chip.closest('.viewer-card, .dialog-3d') || document;
        showModule(chip.dataset.module, scope.querySelector('model-viewer'));
    }));
    hotspots.forEach((spot) => spot.addEventListener('click', (e) => {
        e.stopPropagation();
        showModule(spot.dataset.module, spot.closest('model-viewer'));
    }));
    if (chips.length && Object.keys(moduleData).length) showModule(Object.keys(moduleData)[0]);

    /* Masque l'indication "glisser pour tourner" après la 1re interaction. */
    document.querySelectorAll('.viewer-stage').forEach((stage) => {
        const hide = () => stage.classList.add('interacted');
        stage.addEventListener('pointerdown', hide, { once: true });
        stage.addEventListener('wheel', hide, { once: true, passive: true });
    });

    /* Dialog 3D : le modèle n'est chargé qu'à l'ouverture. */
    const dialog = document.getElementById('dialog-3d');
    const dialogViewer = dialog ? dialog.querySelector('model-viewer') : null;
    document.querySelectorAll('[data-open-dialog]').forEach((btn) => {
        btn.addEventListener('click', () => {
            if (!dialog) return;
            if (dialogViewer && !dialogViewer.getAttribute('src') && dialogViewer.dataset.src) {
                dialogViewer.setAttribute('src', dialogViewer.dataset.src);
            }
            dialog.showModal();
        });
    });
    document.querySelectorAll('[data-close-dialog]').forEach((btn) => {
        btn.addEventListener('click', () => dialog && dialog.close());
    });
    if (dialog) {
        dialog.addEventListener('click', (e) => { if (e.target === dialog) dialog.close(); });
    }

    /* ------------------------------ Fallback animations au défilement --- */
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!reduceMotion && !CSS.supports('(animation-timeline: view()) and (animation-range: entry)')) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0) scale(1)';
                    obs.unobserve(entry.target);
                }
            });
        }, { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.1 });

        document.querySelectorAll('.scroll-animated-list > *, .scroll-fade-in').forEach((el) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(30px) scale(0.97)';
            observer.observe(el);
        });
    }
})();
