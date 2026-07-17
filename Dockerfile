FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libpng-dev libxml2-dev libonig-dev \
    nginx supervisor curl unzip \
    && docker-php-ext-install intl zip pdo_mysql mbstring ctype dom fileinfo xml bcmath gd \
    && apt-get clean \
    && rm -rf /etc/nginx/sites-enabled/* \
    && rm -rf /etc/nginx/sites-available/* \
    && rm -rf /etc/nginx/conf.d/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-dev --no-interaction

RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
