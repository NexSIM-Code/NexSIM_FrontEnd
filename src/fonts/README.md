# Polices auto-hébergées

`Open Sans` (fichiers variables, axe `wght` 400–800) servi depuis le site plutôt
que depuis `fonts.googleapis.com` : la feuille de style Google était une requête
bloquant le rendu (~750 ms mesurés par PageSpeed), suivie d'une connexion
supplémentaire vers `fonts.gstatic.com` pour les fichiers eux-mêmes.

| Fichier | Sous-ensemble | Couverture |
| --- | --- | --- |
| `open-sans-latin.woff2` | latin | français, anglais, allemand courants |
| `open-sans-latin-ext.woff2` | latin-ext | diacritiques d'Europe centrale |

Les `@font-face` correspondants sont déclarés en tête de `css/style.css`, avec
les `unicode-range` d'origine : le navigateur ne télécharge `latin-ext` que si la
page contient réellement un caractère concerné.

## Mettre à jour

```bash
UA='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0 Safari/537.36'
curl -A "$UA" 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400..800&display=swap'
```

Récupérer dans la réponse les URL `woff2` des blocs `/* latin */` et
`/* latin-ext */`, les télécharger sous les noms ci-dessus, puis reporter les
`unicode-range` dans `css/style.css` s'ils ont changé.

Open Sans est distribué sous licence SIL Open Font License 1.1.
