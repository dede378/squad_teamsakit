FROM php:8.4-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends apache2-utils \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli \
    && a2enmod rewrite headers \
    && printf '%s\n' \
       'ServerTokens Prod' \
       'ServerSignature Off' \
       > /etc/apache2/conf-available/security.conf \
    && a2enconf security \
    && printf '%s\n' \
       'display_errors=Off' \
       'display_startup_errors=Off' \
       'log_errors=On' \
       'expose_php=Off' \
       'session.cookie_httponly=1' \
       'session.cookie_samesite=Lax' \
       > /usr/local/etc/php/conf.d/99-lab-hardening.ini

COPY index.php /var/www/html/index.php
COPY labs/ /var/www/html/labs/
COPY labs-entrypoint.sh /usr/local/bin/labs-entrypoint.sh

RUN chmod 0755 /usr/local/bin/labs-entrypoint.sh \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/labs-entrypoint.sh"]
