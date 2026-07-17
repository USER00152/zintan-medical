FROM dunglas/frankenphp:php8.2-bookworm

RUN install-php-extensions intl zip pdo_mysql mbstring ctype curl dom fileinfo openssl tokenizer xml bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction

COPY . .

RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache && chmod -R a+rw storage bootstrap/cache

RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
