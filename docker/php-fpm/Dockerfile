FROM php:8.0-fpm

RUN apt-get update && apt-get install -y libpq-dev git libicu-dev \
    && docker-php-ext-configure intl \
    && pecl install apcu xdebug \
    && docker-php-ext-enable apcu xdebug \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY xdebug.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/symfony
