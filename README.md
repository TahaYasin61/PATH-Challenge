
<h1>PATH Challenge Project</h1>

<h2>Introduction</h2>

This project was made with Laravel. The project contains the following contents built up with Restful API :

- Log in 

- Adding products to the shopping cart

- Confirming the shopping cart and creating order

- Updating order

- Completing order

- Viewing all orders or the specified order


<h2>Getting started</h2>

<h3>Installation</h3> 

In order to install the project on your computer, first clone the project

```git clone git@github.com:TahaYasin61/PATH-Challenge.git```

Then go to your repo folder

```cd PATH-Challenge```

Install the dependencies with composer

```composer install```

If you don't have composer, download it with the link given below

https://getcomposer.org/download/

Copy the .env.example to create your own .env file and make the required configurations

```cp .env.example .env```

Generate your application key

```php artisan key:generate```

Run all the database migrations

```php artisan migrate```

Start the local server and you're good to go !

```php artisan serve```

<h2>Database Seeding</h2>

To get all the contents in seeder files, you must run the database seeder. With that, you can test the project with ready content (This project already contains Users, UserAddresses and Products seeders. You can run the seeder command to get the contents of these seeders)

Run the database seeder

```php artisan db:seed```

It would be better to refresh all your migrations and run the database seeder with it. To do that, type the command given below

```php artisan migrate:refresh```

<h2>Swagger</h2>

This project also contains Swagger API documentation. In order to view it, go to /api/documentation route after starting your local server 
(ex: http://127.0.0.1:8000/api/documentation)

If you encounter with an error while viewing Swagger documentation, write down the code given below to generate Swagger codes

```php artisan l5-swagger:generate```

