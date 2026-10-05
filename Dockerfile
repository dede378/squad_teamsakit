FROM php:8.4-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends apache2-utils \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli \
    && a2enmod rewrite headers \
    && printf '%s\\n' \
       'ServerTokens Prod' \
       'ServerSignature Off' \
       > /etc/apache2/conf-available/security.conf \
    && a2enconf security \
    && printf '%s\\n' \
       'display_errors=Off' \
       'display_startup_errors=Off' \
       'log_errors=On' \
       'expose_php=Off' \
       'session.cookie_httponly=1' \
       'session.cookie_samesite=Lax' \
       > /usr/local/etc/php/conf.d/99-lab-hardening.ini \
    && printf '%s\\n' \
       '#!/bin/sh' \
       'set -eu' \
       ': "${LAB_USERNAME:?LAB_USERNAME environment variable is required}"' \
       ': "${LAB_PASSWORD:?LAB_PASSWORD environment variable is required}"' \
       'install -d -m 0750 /etc/apache2/auth' \
       'htpasswd -bc /etc/apache2/auth/.htpasswd "$LAB_USERNAME" "$LAB_PASSWORD" >/dev/null' \
       'chown root:www-data /etc/apache2/auth/.htpasswd' \
       'chmod 0640 /etc/apache2/auth/.htpasswd' \
       'cat > /etc/apache2/conf-available/labs-auth.conf <<'"'"'EOF'"'"' \
       '<Directory "/var/www/html/labs">' \
       '    AuthType Basic' \
       '    AuthName "Squad TeamSakit Labs"' \
       '    AuthBasicProvider file' \
       '    AuthUserFile /etc/apache2/auth/.htpasswd' \
       '    Require valid-user' \
       '</Directory>' \
       'EOF' \
       'a2enconf labs-auth >/dev/null' \
       'exec apache2-foreground' \
       > /usr/local/bin/labs-entrypoint.sh \
    && chmod 0755 /usr/local/bin/labs-entrypoint.sh

COPY index.php /var/www/html/index.php
COPY labs/ /var/www/html/labs/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/labs-entrypoint.sh"]
