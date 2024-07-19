FROM php:8.3-fpm

RUN apt-get update

# php-mysql
RUN docker-php-ext-install pdo pdo_mysql mysqli

# xdebug
RUN pecl install xdebug-3.3.2 \
    && docker-php-ext-enable xdebug


# install composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    wget

RUN wget https://getcomposer.org/installer -O composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

ADD php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www
