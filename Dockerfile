FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libpng-dev libxml2-dev libonig-dev \
    nginx curl unzip \
    && docker-php-ext-install intl zip pdo_mysql mbstring ctype dom fileinfo xml bcmath gd \
    && apt-get clean

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-dev --no-interaction

RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html

RUN rm /etc/nginx/sites-enabled/default || true
RUN echo 'server {\n listen ${PORT:-80};\n root /var/www/html/public;\n index index.php;\n location / { try_files $uri $uri/ /index.php?$query_string; }\n location ~ \\.php$ {\n  include fastcgi_params;\n  fastcgi_pass 127.0.0.1:9000;\n  fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n }\n}' > /etc/nginx/conf.d/app.conf

COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
