#!/bin/bash
if [ ! -e .env ]; then
    cp .env.example .env
fi

echo Uploading Application container 
docker compose up -d --build

echo Installing dependencies
docker exec -it app-task-notifications composer install

echo Generating key
docker exec -it app-task-notifications php artisan key:generate

echo Making migrations
docker exec -it app-task-notifications php artisan migrate

echo Seeding database
docker exec -it app-task-notifications php artisan db:seed

echo generating storage link - if not already created
docker compose exec app-task-notifications php artisan storage:link

echo Information of new containers
docker ps -a 