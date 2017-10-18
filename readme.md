<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Ladbrokes Race Test
This is a un-authenticated, responsive SPA Race application with Laravel Rest Api on the back. Rest API can be consumed from this application or directly onto the API. The front-end framework is reactive Vue2. Styling is with Bootstrap 3

To demonstrate a race row disappearing after closing time, the closing time is re-seeded everytime you launch the race from this page with just a few minutes apart. For that reason, running with multiple browsers would cause strange behaviour.

Tested in Chrome and Firefox only. <a href="http://ladbrokes.headstation.com">Live demo here</a>

## Installation
Clone or Download this repo. These instructions assume that you have installed Composer, Laravel 5.5, PHP7, Node Package Manager and MySQL.

Once downloaded, cd into repo directory and start installation:

````ruby
composer install 
````

Create a new mysql database:
````ruby
mysql -u root -p
create database ladbrokes;
CREATE USER 'homestead'@'%' IDENTIFIED BY '<yoursecret';
grant all privileges on *.* to 'homestead'@'%';
````

Copy .env.example to .env and change the database variable in .env:
````ruby
DB_DATABASE=ladbrokes
DB_PASSWORD=<yoursecret>
````

Generate the Artisan key:
````ruby
php artisan key:generate
````

Migrate the tables and seed the database. Adds about 100 members with random data:
````ruby
php artisan migrate:refresh --seed
````

Install Vue2 components listed in package.json:
````ruby
npm install
````

Run NPM dev to compile js:
````ruby
npm run dev
````

and serve the application with artisan:
````ruby
php artisan serve
````

You should now be able to browse this app on http://localhost:8000. 

## Rest API
Api can be consumed directly. Following is an example of a call to retrieve all races returning a JSON set.
````ruby
http://localhost:8000/api/races
````

