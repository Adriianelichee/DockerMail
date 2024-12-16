# Dockerfile
FROM php:7.4-apache

WORKDIR /var/www/html

COPY . .

# Instalar extensiones PHP necesarias (modifica según tus necesidades)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Asignar permisos al directorio de Apache
EXPOSE 80

# Habilitar el módulo de reescritura de Apache si es necesario
CMD [ "apache2-foreground" ]