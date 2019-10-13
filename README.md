## PHP MVC Demo Application - Blog

## Prerequisites
- PHP >= 7.2
- MySQL, php-mysql
- composer (for autoloading)

## Configure Database
Duplicate `config.example.php` to `config.php`.
```
cp config.example.php config.php
```
Edit `config.php` to set your database credentials.

## Dump Autoload 
```
composer dump-autoload
```

## Run Migrations
Run migrations to create all required tables in your database.

```
php migrations.php
```

## Start Development Server
Start the development server on `8000` port.
```
php -S 0.0.0.0:8000 -t public
```

Open `locahost:8000` in your browser.