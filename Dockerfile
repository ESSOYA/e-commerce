# Utilisation de l'image PHP avec Apache
FROM php:8.1-apache

# Installation des extensions PHP nécessaires
RUN apt-get update && apt-get install -y libpng-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql

# Activation du module Apache rewrite
RUN a2enmod rewrite

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie des fichiers de l'application
COPY . /var/www/html

# Définition du répertoire de travail
WORKDIR /var/www/html

# Installation des dépendances
RUN composer install --no-dev --optimize-autoloader

# Donner les permissions correctes
RUN chmod -R 777 storage bootstrap/cache

# Exposer le port 80
EXPOSE 80

# Commande de démarrage
CMD ["apache2-foreground"]
