# Menggunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependensi sistem yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Mengaktifkan modul rewrite di Apache
RUN a2enmod rewrite

# Menginstal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Mengatur working directory ke /var/www/html
WORKDIR /var/www/html

# Menyalin file dari direktori lokal ke container
COPY . /var/www/html

# Menyalin file .env.example ke .env jika .env tidak ada
RUN cp .env.example .env

# Mengatur hak akses folder storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Menginstall dependensi Composer
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel Application Key
RUN php artisan key:generate

# Expose port 80 untuk web server
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
