FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j"$(nproc)" gd mysqli pdo_mysql zip \
    && a2enmod rewrite expires headers \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY docker/php/conf.d/zz-opcache.ini /usr/local/etc/php/conf.d/zz-opcache.ini
COPY docker/apache/conf-enabled/zz-performance.conf /etc/apache2/conf-enabled/zz-performance.conf

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/uploads /var/www/html/cache 2>/dev/null || true

EXPOSE 80
