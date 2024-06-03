FROM php:8.1-fpm

# Instalacja zależności systemowych
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip

# Instalacja rozszerzeń PHP
RUN docker-php-ext-install pdo pdo_mysql gd

# Instalacja Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Utwórz katalog roboczy
WORKDIR /var/www

# Skopiuj pliki projektu
COPY . .

# Instalacja zależności PHP
RUN composer install

# Prawa do katalogu storage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache