#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.local.example .env
else
    echo "env file exists."
fi

php artisan migrate:fresh --seed --force
php artisan optimize clear
php artisan view:clear
php artisan route:clear

npm run build

php artisan serve --host 0.0.0.0
