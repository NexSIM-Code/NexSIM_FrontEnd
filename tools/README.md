# Outils de build

## Déclinaisons d'images

`build-images.mjs` produit les variantes AVIF et WebP de toutes les images
matricielles du site, ainsi que le manifeste que `src/includes/images.php` relit
pour construire les balises `<picture>`.

```bash
cd tools
npm install
npm run build
```

Les originaux dans `src/image/` restent la source de vérité et ne sont jamais
modifiés. Les déclinaisons sont écrites dans `src/image/opt/`, qui est un dossier
entièrement dérivé : il peut être supprimé et régénéré à tout moment.

**À rejouer après toute image ajoutée, remplacée ou recadrée.** Sans cela, une
image sans entrée dans le manifeste continue d'être servie dans son format
d'origine — dégradation propre, mais sans le gain de poids.

### Largeurs produites

Chaque groupe déclare les largeurs utiles à son emplacement d'affichage ; une
largeur supérieure à l'original n'est jamais produite.

| Groupe | Emplacement | Largeurs |
| --- | --- | --- |
| `contenu` | colonne de `.split`, ~694 px au maximum | 400, 640, 900, 1200, 1440 |
| `portrait` | pastille de 104 px (`.avatar`) | 104, 208, 312 |
| `logo` | 96 px de haut, 320 px de large au plus (`.logo-item img`) | 320, 640 |

Les largeurs couvrent les écrans jusqu'à une densité double. Si le CSS de ces
emplacements change, ajuster les largeurs **et** les attributs `sizes`
correspondants dans `src/index.php` : un `sizes` trop généreux fait télécharger
une déclinaison plus lourde que nécessaire.

### Dossier `image/partenaires`

Le carrousel partenaires liste le contenu de `src/image/partenaires/` au moment
du rendu. Les déclinaisons doivent donc rester hors de ce dossier, sinon chaque
logo apparaîtrait autant de fois qu'il a de variantes — c'est la raison d'être du
dossier `image/opt/` séparé.
