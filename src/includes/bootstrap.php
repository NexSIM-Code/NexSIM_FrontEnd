<?php
/**
 * Point d'entrée commun : préférences utilisateur (langue, thème) résolues avant
 * tout rendu. À inclure en première ligne de chaque page PHP.
 */
require_once __DIR__ . '/cookies.php';
require_once __DIR__ . '/i18n.php';

nexsim_init_i18n();

/** Thème résolu côté serveur : évite le flash au premier rendu. */
$nexsimTheme = nexsim_theme();
