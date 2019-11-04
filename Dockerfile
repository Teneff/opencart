FROM php:7.3.6-alpine

RUN docker-php-ext-install mysqli

RUN apk add --no-cache \
  libzip-dev \
  zip \
  freetype \
  freetype-dev \
  libjpeg-turbo \
  libjpeg-turbo-dev \
  libpng \
  libpng-dev \
  && docker-php-ext-configure gd \
  --with-freetype-dir=/usr/include/ \
  --with-jpeg-dir=/usr/include/ \
  --with-png-dir=/usr/include/ \
  --with-libzip \
  && docker-php-ext-install gd \
  && docker-php-ext-install zip