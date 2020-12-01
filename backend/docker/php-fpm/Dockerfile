FROM php:7.4-fpm-alpine as dev

# Date defaults
ENV PHP_DATE_TIMEZONE="UTC"

# Application defaults
ENV APP_ENV=dev
ENV APP_DEBUG=1

# Use the default development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Build dependencies
RUN apk add --update --no-cache --virtual dev-dependencies \
        alpine-sdk \
        autoconf

# System utilities(usermod, useradd)
RUN apk add --no-cache --virtual system-utilities \
        shadow

# PHP extensions
RUN docker-php-ext-install \
        opcache \
        mysqli \
        pdo \
        pdo_mysql

# Composer
RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --install-dir=/usr/local/bin --filename=composer --quiet

# Permissions
ARG USER_ID=1000
ARG GROUP_ID=1000
ARG HOME_DIR=/home/www-data

RUN usermod --uid ${USER_ID} --home ${HOME_DIR} --shell /bin/sh www-data \
        && groupmod --gid ${GROUP_ID} www-data

RUN mkdir /app \
        && chown -R ${USER_ID}:${GROUP_ID} /app

WORKDIR /app

USER www-data:www-data