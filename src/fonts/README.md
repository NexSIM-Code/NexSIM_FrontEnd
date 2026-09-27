# Polices auto-hébergées

`Rubik` (fichiers variables, axe `wght` 300–900) servi depuis le site plutôt
que depuis `fonts.googleapis.com` : la feuille de style Google était une requête
bloquant le rendu (~750 ms mesurés par PageSpeed), suivie d'une connexion
supplémentaire vers `fonts.gstatic.com` pour les fichiers eux-mêmes.

| Fichier | Sous-ensemble | Couverture |
| --- | --- | --- |
| `rubik-latin.woff2` | latin | français, anglais, allemand courants |
| `rubik-latin-ext.woff2` | latin-ext | diacritiques d'Europe centrale |

Les `@font-face` correspondants sont déclarés en tête de `css/style.css`, avec
les `unicode-range` d'origine : le navigateur ne télécharge `latin-ext` que si la
page contient réellement un caractère concerné.

## Mettre à jour

Depuis la fonte variable d'origine (`fonttools` + `brotli`) :

```bash
LATIN='U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD'
pyftsubset Rubik-VariableFont_wght.ttf --output-file=rubik-latin.woff2 \
  --flavor=woff2 --layout-features='*' --name-IDs='*' --notdef-outline \
  --unicodes="$LATIN"
```

Le sous-ensemble `latin-ext` s'obtient de la même façon avec l'`unicode-range`
correspondant, repris de `css/style.css`.

Rubik est distribué sous licence SIL Open Font License 1.1.
