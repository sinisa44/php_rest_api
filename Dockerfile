FROM php:7.2-apache

COPY src/ /var/www/html/

COPY etc/apache2/sites-available/000-default.conf /etc/apache/sites-available/000-default.conf

RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

RUN service apache2 restart


EXPOSE 80