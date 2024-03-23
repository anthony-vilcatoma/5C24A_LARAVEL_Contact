# Usar una imagen base oficial de PHP 8.1 con Apache
FROM php:8.1-apache

# Establecer el directorio de trabajo en el directorio raíz de Apache
WORKDIR /var/www/html

# Instalar dependencias del sistema para las extensiones de PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libexif-dev \
    && rm -rf /var/lib/apt/lists/*

# Configurar y instalar extensiones de PHP necesarias para Laravel y otras comunes
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip

# Habilitar el módulo mod_rewrite para Apache
RUN a2enmod rewrite

# Configurar Apache para servir desde el directorio public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el código fuente de la aplicación al directorio de trabajo
COPY . /var/www/html

# Instalar dependencias de la aplicación con Composer
# Asegúrate de que tu archivo composer.json y composer.lock estén en el directorio raíz de tu proyecto
RUN composer install --no-dev --optimize-autoloader

# Cambiar la propiedad del directorio /var/www/html a www-data
# www-data es el usuario por defecto que usa Apache en la imagen base de PHP
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Opcional: Ejecutar migraciones de la base de datos (descomenta si es necesario)
RUN php artisan migrate --force

# Exponer el puerto 80 para el tráfico HTTP
EXPOSE 80

# El comando por defecto para ejecutar Apache en primer plano
CMD ["apache2-foreground"]
