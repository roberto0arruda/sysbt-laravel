#!/bin/bash

## Set permissions
chgrp -R www-data storage bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache

## Install Laravel
composer install
php artisan key:generate
php artisan cache:clear
php artisan config:cache
php artisan migrate
php-fpm
