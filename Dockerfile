FROM php:8.4-apache

RUN docker-php-ext-install mysqli && a2enmod rewrite headers

COPY app/index.php /var/www/html/index.php
COPY labs/ /var/www/html/labs/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
