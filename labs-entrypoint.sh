#!/bin/sh
set -eu

: "${LAB_USERNAME:?LAB_USERNAME environment variable is required}"
: "${LAB_PASSWORD:?LAB_PASSWORD environment variable is required}"

# Apache runs as www-data and must be able to traverse this directory.
install -d -o root -g root -m 0755 /etc/apache2/auth
htpasswd -bc /etc/apache2/auth/.htpasswd "$LAB_USERNAME" "$LAB_PASSWORD" >/dev/null
chown root:www-data /etc/apache2/auth/.htpasswd
chmod 0640 /etc/apache2/auth/.htpasswd

cat > /etc/apache2/conf-available/labs-auth.conf <<'EOF'
<Directory "/var/www/html/labs">
    AuthType Basic
    AuthName "Squad TeamSakit Labs"
    AuthBasicProvider file
    AuthUserFile /etc/apache2/auth/.htpasswd
    Require valid-user
</Directory>
EOF

a2enconf labs-auth >/dev/null
exec apache2-foreground
