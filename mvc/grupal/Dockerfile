# Utiliza la imagen base de PHP
FROM php:8.2.9

# Instala las dependencias requeridas por el proyecto
RUN apt-get update && apt-get install -y git zip unzip

# Instala el controlador PDO para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copia los archivos de tu proyecto al contenedor
COPY . .

# Instala Composer globalmente (si no está preinstalado)
RUN if [ ! -e "/usr/local/bin/composer" ]; then \
        curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; \
    fi

# Instala las dependencias del proyecto usando Composer
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto en el que tu aplicación se ejecuta (puede cambiar según tu aplicación)
EXPOSE 8080

# Ejecuta tu aplicación PHP usando el servidor web incorporado de PHP
CMD ["php", "-S", "0.0.0.0:8080", "-t", "./"]