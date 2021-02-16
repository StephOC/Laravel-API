# Laravel API
Part of my bloggin series Learning Laravel & VueJS
You can follow the tutorial online at [theWhiteFox.ninja Laravel API](https://www.thewhitefox.ninja/2021/2021-01-31-laravel-api/)

Running the API

Create the database (and database user if necessary) and add them to the .env file.

DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_password

Then install, migrate, seed:

    composer install
    php artisan migrate
    php artisan db:seed
    php artisan serve

and as this is Laravel 8 authentication is installed using:

    composer require laravel/ui
    php artisan ui vue
    php artisan ui bootstrap --auth

Read more here
[https://laravel.com/docs/8.x/authentication](https://laravel.com/docs/8.x/authentication)

The API will be running on [localhost:8000/register](localhost:8000/register)

![](https://www.thewhitefox.ninja/static/bea310d577a2677c14e6f8a0d1931f7f/8711f/register.png)
