<?php
/**
 * Barre de navigation + tiroir mobile.
 * Variable attendue : $isHome (bool). Sur les pages secondaires, les ancres pointent
 * vers index.php. Les libellés proviennent du dictionnaire de la langue active.
 */
require_once __DIR__ . '/../includes/bootstrap.php';
$isHome = $isHome ?? false;
$base = $isHome ? '' : 'index.php';
?>
<body>

<!-- Icônes SVG partagées -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
    <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
    <symbol id="i-home" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m3 11 9-8 9 8v9a2 2 0 0 1-2 2h-4v-7H9v7H5a2 2 0 0 1-2-2z"/></symbol>
    <symbol id="i-cube" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16zM3.3 7 12 12l8.7-5M12 22V12"/></symbol>
    <symbol id="i-vr" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-3.5l-1.6-2.4a2 2 0 0 0-3.3 0L9 17H5a2 2 0 0 1-2-2z"/><circle cx="8" cy="12" r="1.5" fill="currentColor"/><circle cx="16" cy="12" r="1.5" fill="currentColor"/></symbol>
    <symbol id="i-phone" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2.5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M10 18h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></symbol>
    <symbol id="i-lung" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 3v9m0-4c-1.5 1-3 1.5-5 4-1.6 2-1.8 5.5-1 7.5.4 1 1.3 1.5 2.6 1.3C11 20.4 12 18 12 16m0-8c1.5 1 3 1.5 5 4 1.6 2 1.8 5.5 1 7.5-.4 1-1.3 1.5-2.6 1.3C13 20.4 12 18 12 16"/></symbol>
    <symbol id="i-team" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/><circle cx="9" cy="7" r="4" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
    <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m3 7 9 6 9-6"/></symbol>
    <symbol id="i-expand" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></symbol>
    <symbol id="i-close" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M18 6 6 18M6 6l12 12"/></symbol>
    <symbol id="i-menu" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></symbol>
    <symbol id="i-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M2 12h2m16 0h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
    <symbol id="i-moon" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></symbol>
    <symbol id="i-training" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 10 12 5 2 10l10 5 10-5zM6 12v5c3 3 9 3 12 0v-5"/></symbol>
    <symbol id="i-rent" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/></symbol>
    <symbol id="i-cart" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1" fill="currentColor"/><circle cx="20" cy="21" r="1" fill="currentColor"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></symbol>
    <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M3 12h18M12 3c2.5 2.5 3.8 5.6 3.8 9S14.5 18.5 12 21c-2.5-2.5-3.8-5.6-3.8-9S9.5 5.5 12 3z"/></symbol>
    <symbol id="i-arrow-left" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7-7-7 7 7 7"/></symbol>
</svg>

<header class="navbar" role="banner">
    <div class="logo">
        <a href="<?= $base ?: '#accueil' ?>" aria-label="<?= e('nav.aria.home') ?>">
            <img class="logo-dark" src="image/logo_Nexsim_dark.svg" alt="<?= e('nav.logo.alt') ?>" height="36" width="62">
            <img class="logo-light" src="image/logo_Nexsim_light.svg" alt="<?= e('nav.logo.alt') ?>" height="36" width="62">
        </a>
    </div>
    <nav class="nav-links" aria-label="<?= e('nav.aria.main') ?>">
        <a href="<?= $base ?>#accueil"><?= t('nav.home') ?></a>
        <a href="<?= $base ?>#physique"><?= t('nav.lusim') ?></a>
        <a href="<?= $base ?>#numerique"><?= t('nav.digital') ?></a>
        <a href="<?= $base ?>#offres"><?= t('nav.offers') ?></a>
        <a href="<?= $base ?>#pedagogie"><?= t('nav.pedagogy') ?></a>
        <a href="<?= $base ?>#equipe"><?= t('nav.team') ?></a>
    </nav>
    <div class="nav-actions">
        <button type="button" class="btn-icon theme-toggle"
                aria-label="<?= $nexsimTheme === 'light' ? e('nav.theme.dark') : e('nav.theme.light') ?>"
                aria-pressed="<?= $nexsimTheme === 'light' ? 'true' : 'false' ?>">
            <svg class="icon-moon" aria-hidden="true"><use href="#i-moon"/></svg>
            <svg class="icon-sun" aria-hidden="true"><use href="#i-sun"/></svg>
        </button>
        <a href="<?= $base ?>#contact" class="btn btn-accent btn-cta"><?= t('nav.contact') ?></a>
        <button type="button" class="btn-icon nav-toggle" aria-label="<?= e('nav.menu.open') ?>" aria-controls="drawer" aria-expanded="false">
            <svg aria-hidden="true"><use href="#i-menu"/></svg>
        </button>
    </div>
</header>

<!-- Tiroir de navigation mobile (style NavigationDrawer de NexControl) -->
<div id="scrim" class="scrim" aria-hidden="true"></div>
<nav id="drawer" class="drawer" aria-label="<?= e('nav.menu.aria') ?>" aria-hidden="true" tabindex="-1">
    <div class="drawer-head">
        <img class="logo-dark" src="image/logo_Nexsim_dark.svg" alt="<?= e('nav.logo.alt') ?>" height="32" width="55">
        <img class="logo-light" src="image/logo_Nexsim_light.svg" alt="<?= e('nav.logo.alt') ?>" height="32" width="55">
        <button type="button" class="btn-icon drawer-close" aria-label="<?= e('nav.menu.close') ?>">
            <svg aria-hidden="true"><use href="#i-close"/></svg>
        </button>
    </div>
    <div class="drawer-title"><?= t('nav.menu.title') ?></div>
    <a href="<?= $base ?>#accueil"><svg aria-hidden="true"><use href="#i-home"/></svg><?= t('nav.home') ?></a>
    <a href="<?= $base ?>#physique"><svg aria-hidden="true"><use href="#i-cube"/></svg><?= t('nav.lusim') ?></a>
    <a href="<?= $base ?>#numerique"><svg aria-hidden="true"><use href="#i-vr"/></svg><?= t('nav.digital') ?></a>
    <a href="<?= $base ?>#offres"><svg aria-hidden="true"><use href="#i-cart"/></svg><?= t('nav.offers') ?></a>
    <a href="<?= $base ?>#pedagogie"><svg aria-hidden="true"><use href="#i-lung"/></svg><?= t('nav.pedagogy') ?></a>
    <a href="<?= $base ?>#equipe"><svg aria-hidden="true"><use href="#i-team"/></svg><?= t('nav.team') ?></a>
    <div class="drawer-cta">
        <a href="<?= $base ?>#contact" class="btn btn-accent"><svg width="20" height="20" aria-hidden="true"><use href="#i-mail"/></svg><?= t('nav.contact') ?></a>
    </div>
</nav>
