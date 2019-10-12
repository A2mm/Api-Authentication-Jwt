
## About project  
______________________________________

- This is Api Authentication project using JWT(Json Web Token) with product CRUD example

- user can get to some endpoints without being authenticated 
- user must be authenticated and authorized through api token to access other endpoints 

## How to get started 
_______________________

## Installation

    git clone https://github.com/A2mm/Api-Authentication-Jwt.git
    take copy of .env.example and name it as .env
    run composer install 
    php artisan key:generate


*/*  create database with name of your choice >>>> in .env file


- run php artisan migrate command through your terminal to publish all tables on database 
- run php artisan db:seed to fill product tables with some records 
- run php artisan passport:install 
- get to your postman tool and run project endpoints and don't forget to include the headers using token.

