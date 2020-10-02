FROM php:8.0-rc-fpm

RUN apt-get update && apt-get install -y libpq-dev git libicu-dev \
    && docker-php-ext-configure intl \
    && mkdir -p /usr/src/php/ext/apcu && curl -fsSL https://pecl.php.net/get/apcu | tar xvz -C "/usr/src/php/ext/apcu" --strip 1 \
    && docker-php-ext-install apcu \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# xdebug 3 will be compatible with PHP 8
#RUN mkdir -p /usr/src/php/ext/xdebug && curl -fsSL https://pecl.php.net/get/xdebug | tar xvz -C "/usr/src/php/ext/xdebug" --strip 1 \
#    && docker-php-ext-install xdebug

# COPY xdebug.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/symfony
