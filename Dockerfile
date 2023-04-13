FROM composer:latest
 WORKDIR /mms

 COPY . .
 COPY composer.json /mms/

 RUN composer dump-autoloader

 CMD php artisan serve