# Used for prod build.
FROM php:8.3-fpm AS php

ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=0
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=1
ENV PHP_OPCACHE_REVALIDATE_FREQ=1

RUN apt-get update && apt-get install -y unzip \
    libpq-dev libcurl4-gnutls-dev nginx libonig-dev netcat-traditional nodejs npm

RUN docker-php-ext-install mysqli pdo pdo_mysql bcmath curl opcache mbstring

COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www

COPY . .

RUN mkdir -p /var/www/storage/framework/{cache,testing,sessions,views}
RUN usermod --uid 1000 www-data && groupmod --gid 1001 www-data

RUN npm install --global cross-env
RUN npm install

ENTRYPOINT [ "docker/entrypoint.sh" ]
