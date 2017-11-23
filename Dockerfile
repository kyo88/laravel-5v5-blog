FROM php:7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client \
    && docker-php-ext-install mcrypt pdo_mysql

ADD ./php.conf /usr/local/etc/php-fpm.conf
COPY ./php.ini /usr/local/etc/php/

ADD ./call-db_web /var/www/calldb
RUN chown www-data:www-data -R /var/www/calldb
WORKDIR /var/www/calldb