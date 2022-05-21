FROM php:8-fpm

## MySQL PDO Bcmath support
RUN docker-php-ext-install pdo pdo_mysql bcmath

## Update package information + git and curl
RUN apt-get update && apt-get install -y \
    git \
    curl

## Install Composer
RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

## Install zip libraries and extension
RUN apt-get install --yes git zlib1g-dev libzip-dev \
    && docker-php-ext-install zip

## Install node
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

## Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

