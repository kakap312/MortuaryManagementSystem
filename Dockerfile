FROM composer:latest
 WORKDIR /mms

 COPY . .
 COPY composer.json /mms/

 RUN composer dump-autoload

 EXPOSE 8000

 CMD [ 'php artisan serve']