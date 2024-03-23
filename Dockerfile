# Usar una imagen base oficial de PHP 8.1 con Apache
FROM php:8.1-apache

# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Habilitar el módulo de Apache mod_rewrite
RUN a2enmod rewrite

# Copiar los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Instalar Composer en el contenedor
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar las dependencias de tu proyecto Laravel
RUN composer install --no-dev --optimize-autoloader

# Ejecutar las migraciones de la base de datos
# Asegúrate de que tu configuración de base de datos en .env o variables de entorno estén correctamente configuradas
RUN php artisan migrate --force

# Configurar los permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Exponer el puerto 80
EXPOSE 80
