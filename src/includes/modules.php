<?php
/**
 * Définition des trois modules mécaniques de LuSIM.
 *
 * Source unique partagée par la maquette 3D (points chauds et puces de la page)
 * et par le panneau descriptif piloté en JavaScript : géométrie figée, textes
 * traduits à la volée.
 */
require_once __DIR__ . '/i18n.php';

function nexsim_modules(): array
{
    $geometry = [
        'compliance' => ['position' => '-0.097m 0.070m 0.148m', 'normal' => '0m 1m 0m',     'orbit' => '330deg 50deg 1.2m'],
        'resistance' => ['position' => '-0.001m 0.095m -0.040m', 'normal' => '-0.09m 1m 0m', 'orbit' => '30deg 45deg 1.0m'],
        'trigger'    => ['position' => '-0.001m 0.098m -0.201m', 'normal' => '0m 1m 0m',     'orbit' => '270deg 55deg 1.2m'],
    ];

    $modules = [];
    foreach ($geometry as $key => $geo) {
        $modules[$key] = $geo + [
            'label' => t("module.$key.label"),
            'title' => t("module.$key.title"),
            'desc'  => t("module.$key.desc"),
            'points' => [t("module.$key.p1"), t("module.$key.p2"), t("module.$key.p3")],
        ];
    }
    return $modules;
}

/** Clé du module affiché au chargement de la page. */
function nexsim_default_module(): string
{
    return 'compliance';
}
