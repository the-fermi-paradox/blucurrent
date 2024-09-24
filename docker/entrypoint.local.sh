#!/bin/bash

composer update -v
#composer install --no-progress --no-interaction

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.local.example .env
else
    echo "env file exists."
fi

npm install

touch database/database.sqlite

php artisan key:generate
php artisan migrate:fresh --seed --force
php artisan optimize:clear

npm run build
php artisan serve --host 0.0.0.0
