Please follow the instructions below.

Make sure you have composer install on your machine.

Ubuntu users
* create a directory on your desktop
* cd into the created directory
* clone the project
* cd into the project and run composer update
* copy .env.example to .env example
* create database and edit .env file
* run php artisan passport:install
* copy client_id 2 with client_secret
* cd into App\Http\Controllers and edit ApiAuthController find method call authorizeUser
* change the client_id and client_secret only
* run php artisan db:seeed. It will seed two users and the products

Two users
Admin - Backend
username: joel@shopping.co.za
password: password

Customer - Frontend (I used vue js instead of Angular). I will learn Angular soon.
username: joel@shopping.co.za
password: password
