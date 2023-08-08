FROM php:fpm-alpine

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    autoconf \ 
    freetype-dev \
    g++ \
    gifsicle \
    git \
    jpegoptim \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    make \ 
    optipng \
    pcre-dev \
    pngquant \
    unzip \
    zlib-dev

# Install gd
RUN docker-php-ext-configure gd
RUN docker-php-ext-install -j$(nproc) gd

# Install pdo
RUN docker-php-ext-install pdo

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install zip
RUN docker-php-ext-install zip

# Install redis
RUN pecl install redis
RUN printf '%s\n' 'extension=redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install artisan
RUN printf '%s\n\n%s' '#!/bin/sh' 'php artisan "$@"' > /usr/local/bin/artisan
RUN chmod +x /usr/local/bin/artisan

RUN addgroup -g 1000 laravel
RUN adduser -u 1000 -D -S -G laravel laravel

RUN mkdir -p /var/www/html
RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

USER laravel
