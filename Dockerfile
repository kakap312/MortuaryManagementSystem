FROM composer:latest
 WORKDIR /mms

 COPY . .
 COPY composer.json /mms/

 RUN composer dump-autoload

 CMD [ 'php artisan', 'serve']