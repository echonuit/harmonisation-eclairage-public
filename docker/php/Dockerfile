# Image de développement : PHP 8.4 avec Apache, PDO PostgreSQL et Composer.
FROM php:8.4-apache

# pdo_pgsql n'est pas dans l'image officielle. mbstring, lui, y est déjà.
# unzip sert à Composer pour décompresser les paquets.
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpq-dev unzip \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Pour lire les formats SIG (extension 1), ajoutez gdal-bin à la liste ci-dessus :
# il fournit la commande ogr2ogr.

# Réglages PHP de développement : les erreurs s'affichent dans la page.
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_HOME=/tmp/composer

# Apache ne sert que public/ : le reste du dépôt n'est pas accessible par le web.
COPY docker/php/apache.conf /etc/apache2/sites-available/000-default.conf

# Dossier des fichiers déposés, hors de la racine web.
RUN mkdir -p /var/depots && chmod 1777 /var/depots

WORKDIR /var/www/html
