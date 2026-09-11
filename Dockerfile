FROM php:8.2-apache

# Installation de l'extension MySQL
RUN docker-php-ext-install mysqli

# Active mod_rewrite
RUN a2enmod rewrite

# Copie du projet dans Apache
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html/

# Render utilise la variable PORT
ENV PORT=10000

# Apache écoute sur le port 10000
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf && \
    sed -i 's/:80>/:10000>/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000

CMD ["apache2-foreground"]
