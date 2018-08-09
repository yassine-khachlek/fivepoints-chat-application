FROM php:7.1.9-fpm

RUN apt-get update
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libicu-dev
RUN apt-get install -y libpq-dev
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y libjpeg62-turbo-dev
RUN apt-get install -y libpng12-dev
RUN pecl install apcu-5.1.5
RUN docker-php-ext-enable apcu
RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install opcache
RUN docker-php-ext-install intl
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

ADD ./php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www
