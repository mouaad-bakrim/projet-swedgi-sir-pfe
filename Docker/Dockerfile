FROM php:8.1.16-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev;

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN docker-php-ext-install intl

RUN docker-php-ext-install calendar

RUN docker-php-ext-install mbstring pdo pdo_mysql

RUN  a2enmod rewrite

RUN apt install -y vim
WORKDIR /var/www/
#RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
#RUN php composer-setup.php --install-dir=/bin --filename=composer

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

WORKDIR /var/www/html
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN export PATH="$HOME/.symfony5/bin:$PATH"
