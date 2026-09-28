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
entièrement dérivé : il est d'ailleurs vidé au début de chaque exécution.

Chaque déclinaison porte une empreinte de son contenu dans son nom
(`vr-640.5d0c84f4.avif`). C'est ce qui permet à `src/.htaccess` de les servir avec
un cache d'un an : une image modifiée produit un nom différent, donc une URL
différente, et aucun visiteur ne reste sur une version périmée. **Il faut donc
déployer `image/opt/` et le manifeste ensemble** — un manifeste plus récent que
les fichiers pointerait vers des noms absents.

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
| `communication` | aperçus de `communication.php` (~420 px CSS) | 320, 640, 960 |

Les largeurs couvrent les écrans jusqu'à une densité double. Si le CSS de ces
emplacements change, ajuster les largeurs **et** les attributs `sizes`
correspondants dans `src/index.php` : un `sizes` trop généreux fait télécharger
une déclinaison plus lourde que nécessaire.

### Dossier `image/partenaires`

Le carrousel partenaires liste le contenu de `src/image/partenaires/` au moment
du rendu. Les déclinaisons doivent donc rester hors de ce dossier, sinon chaque
logo apparaîtrait autant de fois qu'il a de variantes — c'est la raison d'être du
dossier `image/opt/` séparé.

## Kit de communication

`build-press-kit.mjs` produit les fichiers téléchargeables de la page
`communication.php` dans `src/image/communication/` : logos NexSIM (SVG, PNG
512/1024/2048, carré 512 sur fond blanc pour les données structurées), icônes
NexControl et NexHome, visuels LuSIM et captures NexControl, avec des noms
explicites (ils comptent pour la recherche d'images). Ce dossier est **suivi par
git** et déployé tel quel.

```bash
cd tools
node build-press-kit.mjs   # après une modification d'un logo ou d'un visuel
npm run build              # aperçus AVIF/WebP de la page
```
