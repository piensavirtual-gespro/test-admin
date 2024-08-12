# Demo de prueba de Laravel Orchid.

### Install dependencies

    composer install
    npm install

### Compile dependencies

    npm run build

### Start Docker

    docker-compose up -d --build

> localhost:8010 (web)
>
> localhost:8020 (adminer sql)

### Install Orchid (if not installed)

    docker-compose exec orchid-test php artisan orchid:install

### Install database

    docker-compose exec orchid-test php artisan migrate

### Create new admin user

    docker-compose exec orchid-test php artisan orchid:admin
