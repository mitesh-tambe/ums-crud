University Students Management System

This project is a basic CRUD (Create, Read, Update, Delete) application built using the Laravel framework to manage University Students.
Requirements

    Laravel 9 or above
    MySQL Database
    Composer
    Node.js and npm (for frontend dependencies)

Features

    CRUD functionality for Students
    Students linked with Teachers
    Form validation for inputs
    Responsive design using Bootstrap
    User authentication using Laravel's built-in system
    Pagination for listing students
    Soft delete for Students
    Search functionality to filter Students
    JavaScript DataTables for enhanced table features

Setup Instructions

git clone : https://github.com/mitesh-tambe/ums-crud.git

composer install

php artisan migrate

php artisan db:seed

php artisan serve