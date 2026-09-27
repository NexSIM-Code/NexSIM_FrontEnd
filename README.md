# NexSite-web

Site vitrine de NexSIM, en ligne sur **[www.nexsim.fr](https://www.nexsim.fr)** : présentation
de la société, du simulateur respiratoire LuSIM (modèle 3D interactif), de la suite logicielle
« Nex » et de l'équipe, plus les pages légales (mentions légales, politique de confidentialité
de NexControl, NexHome et NexStore-web).

Le site est en PHP sans framework ni base de données : pages rendues côté serveur, trois
langues (FR / EN / DE), thème clair ou foncé mémorisé par cookie.

> Le site ne publie **aucun prix, offre d'achat ni donnée de production**, y compris dans les
> données structurées : LuSIM est déclaré en `Brand` rattaché à l'`Organization`, jamais en
> `Product` (Google exigerait alors `offers`, `review` ou `aggregateRating`).

## Arborescence

```
src/                         # racine web : exactement ce qui part en production
├── index.php                # page d'accueil
├── mentions-legales.php
├── politique-de-confidentialite.php
├── 404.php
├── .htaccess                # cache, compression, types MIME : fait foi en production
├── includes/                # bootstrap, i18n, cookies, images (<picture>), modules 3D
├── partials/                # head, header, footer
├── lang/{fr,en,de}.php      # dictionnaires (en = langue de repli)
├── css/  scripts/  fonts/   # style.css, animations.js, Rubik en woff2
├── image/                   # originaux (image/opt/ est généré, non versionné)
├── modeles/lusim.glb        # modèle 3D du LuSIM
├── videos/                  # vidéo du hero (MP4 desktop + 720p mobile, poster)
└── sitemap.xml  robots.txt
tools/build-images.mjs       # déclinaisons AVIF/WebP + manifeste
nginx/default.conf           # dev uniquement, miroir du .htaccess
Dockerfile                   # image Apache de pré-production
docker-compose.yml           # pré-production (image du registre)
docker-compose.dev.yml       # développement (nginx + php-fpm, code monté)
```

## Développer

Le plus simple, sans Docker :

```bash
php -S localhost:8091 -t src
```

Avec Docker, code monté en volume (nginx + php-fpm) :

```bash
docker compose -f docker-compose.dev.yml up -d   # http://localhost:8090
```

Après toute image ajoutée, remplacée ou recadrée, régénérer les déclinaisons
(détails dans [tools/README.md](tools/README.md)) :

```bash
cd tools && npm install && npm run build
```

Multilingue, cookies de préférence et ajout d'une langue : voir [I18N.md](I18N.md).

## Environnements

| Environnement | Serveur | Rôle |
|---|---|---|
| Développement | `php -S` ou `docker-compose.dev.yml` (nginx) | écrire le site ; nginx ne fait que reproduire `src/.htaccess` |
| Pré-production | `docker-compose.yml` (Apache, `AllowOverride All`) | valider `src/.htaccess` tel qu'il s'exécutera en ligne |
| Production | hébergement mutualisé OVH (Apache) | www.nexsim.fr, fichiers de `src/` déposés en SFTP |

Toute règle de cache, compression ou type MIME destinée au site en ligne va dans
**`src/.htaccess`** ; `nginx/default.conf` est tenu en miroir pour que le développement
reflète la production.

### Pré-production

```bash
docker login registry.selutech.fr
docker compose pull
docker compose up -d        # http://localhost:8090
```

L'image `registry.selutech.fr/nexsim/nexsim-site` est publiée par le workflow manuel
**Publier l'image Docker** ([docker-publish.yml](.github/workflows/docker-publish.yml)) ; le
tag se choisit avec `NEXSIM_SITE_TAG`. Pour la reconstruire en local : `docker compose build`.

### Production

Le déploiement se fait par le workflow manuel **Déployer sur OVH (SFTP)**
([deploy-ovh.yml](.github/workflows/deploy-ovh.yml)) :

1. régénération de `src/image/opt/` (non versionné, indispensable aux balises `<picture>`) ;
2. alignement du distant sur `src/` avec `lftp mirror --reverse --delete` en SFTP (port 22,
   l'hébergement refuse le FTPS) ; `.well-known/` est préservé.

L'option `dry_run`, cochée par défaut, affiche les transferts et suppressions sans rien
écrire. Secrets requis : `OVH_FTP_HOST`, `OVH_FTP_USER`, `OVH_FTP_PASSWORD`.

## Identité visuelle

Palette alignée sur l'application NexControl (dominant `#13212B`, surface `#22394A`,
secondaire `#325771`, accent `#86EAE9`), police **Rubik**. Toute évolution de palette se fait
dans les variables CSS `:root` de `src/css/style.css`, en cohérence avec le thème Flutter de
NexControl.

## Licence

Code et contenus propriétaires de NexSIM SAS. Tous droits réservés.
