# Subscriber-API
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## How to setup the application

# Requirements

- Composer
- Apache Server (Wampserver/Xampp)
- PHP 7.x
- MYSQL 5.x

# Cloning the repository and environment setup

- Open your terminal
- git clone https://github.com/samprog4u/Subscriber-API.git
- Navigate to the cloned directory (cd Subscriber-API)
- run "composer install" to install the laravel library and project dependencies
- goto your mysql database and create a database with name of choice
- In your root directory, open .env file and chenage the database settings to your own database settings
- change the email settings to your own SMTP mail settings
- In your terminal run "php artisan migrate" to migrate your database tables
- thereafter, run "php artisan db:seed" to seed dummy data into your database tables
- then run "php artisan serve" to make the application ready for use and you will see something like "Starting Laravel development server: http://127.0.0.1:8000"
- Open your browser and enter the above url

# Testing the application API endpoint

- Open your postman to import the endpoint collections
- locate postman api collection called "subscriber-api.postman_collection.json" in your root directory
- Then you will find the endpoints and how to use them in the collection
- DONE

## Note: after you have tested subscriber and post endpoints then run "php artisan schedule:work" to execute all the queue jobs

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
# Source code EMail Subscriber API
