# syntax=docker/dockerfile:1

# Image de pré-production du site.
#
# La production réelle est l'hébergement OVH (www.nexsim.fr), où les fichiers de
# src/ sont déposés en FTP et servis par Apache. Cette image reproduit donc
# Apache — et non le nginx de docker-compose.dev.yml — pour que src/.htaccess,
# qui fait foi en ligne, soit réellement exécuté en pré-prod : une règle de cache
# cassée s'y voit avant d'atteindre OVH.
#
# Les déclinaisons d'images (src/image/opt/) ne sont pas versionnées : elles sont
# régénérées ici, exactement comme avant un dépôt FTP.

# --------------------------------------------------- Déclinaisons d'images ---
FROM node:22-slim AS assets

WORKDIR /build

# Les dépendances d'abord : la couche npm n'est réinstallée que si le manifeste
# bouge, pas à chaque retouche d'une page.
COPY tools/package.json tools/package-lock.json ./tools/
RUN cd tools && npm ci

COPY tools/build-images.mjs ./tools/
COPY src/ ./src/

# build-images.mjs écrit dans ../src/image/opt relativement à tools/.
RUN cd tools && node build-images.mjs

# ------------------------------------------------------------------- Site ---
FROM php:8.2-apache

# Les modules dont dépendent les <IfModule> de src/.htaccess. Sans eux les
# directives sont ignorées en silence : le site répond, mais sans cache ni
# compression — soit précisément ce que la pré-prod doit vérifier.
RUN a2enmod rewrite headers expires deflate filter mime

# OVH applique les .htaccess ; l'image php:apache ne le fait pas par défaut
# (AllowOverride None), ce qui rendrait src/.htaccess muet.
RUN printf '%s\n' \
        '<Directory /var/www/html>' \
        '    AllowOverride All' \
        '    Require all granted' \
        '</Directory>' \
        'ServerName nexsim.local' \
    > /etc/apache2/conf-available/nexsim.conf \
    && a2enconf nexsim

# Le site est statique côté fichiers : pas de volume, l'image est autoportante.
COPY --from=assets --chown=root:root /build/src/ /var/www/html/

HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
    CMD php -r 'exit(@file_get_contents("http://127.0.0.1/") === false ? 1 : 0);'
