FROM php:8.2-fpm

# 1. تثبيت الحزم والمكتبات اللازمة لـ Laravel و Nginx
RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libpng-dev libxml2-dev libonig-dev \
    nginx curl unzip \
    && docker-php-ext-install intl zip pdo_mysql mbstring ctype dom fileinfo xml bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# 2. تثبيت حزم الملحق (Composer)
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-dev --no-interaction

# 3. إنشاء المجلدات وضبط الصلاحيات بالكامل لـ Laravel و Nginx
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html /var/lib/nginx /var/log/nginx

# 4. كتابة إعدادات Nginx الذكية (المعدلة والمجربة لتفادي الأخطاء)
RUN echo 'server { \n\
    listen 80; \n\
    root /var/www/html/public; \n\
    index index.php index.html; \n\
    location / { try_files $uri $uri/ /index.php?$query_string; } \n\
    location ~ \.php$ { \n\
        include fastcgi_params; \n\
        fastcgi_pass 127.0.0.1:9000; \n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \n\
    } \n\
}' > /etc/nginx/sites-available/default \
&& ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# 5. ملف التشغيل التلقائي للخادمين معاً
RUN echo '#!/bin/sh\nphp-fpm -D\nnginx -g "daemon off;"' > /start.sh && chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
