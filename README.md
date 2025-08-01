<p align="center">
<a href="https://github.com/AndiMPanguriseng/wareHouseApi" target="_blank">
<img src="https://img.shields.io/badge/WareHouseAPI-Laravel%2011-red?style=for-the-badge&logo=laravel" alt="WareHouse API Logo">
</a>
</p>

<p align="center">
<a href="https://github.com/AndiMPanguriseng/wareHouseApi/actions">
<img src="https://img.shields.io/github/actions/workflow/status/AndiMPanguriseng/wareHouseApi/laravel.yml?style=flat-square" alt="Build Status">
</a>
<a href="https://packagist.org/packages/laravel/laravel">
<img src="https://img.shields.io/packagist/v/laravel/laravel?style=flat-square" alt="Laravel Version">
</a>
<a href="https://opensource.org/licenses/MIT">
<img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" alt="License">
</a>
</p>

📦 WareHouse API
This is an API for a warehouse management system built with Laravel 11 and MySQL. It provides robust functionalities to manage various aspects of warehouse operations, including:

Users: Manage access and roles within the system.

Items: Track individual products or goods.

Categories: Organize items into logical groups.

Suppliers: Maintain information about product suppliers.

Warehouses: Define and manage different storage locations.

Mutations (In/Outbound): Record all item movements, including incoming and outgoing stock.

🚀 Getting Started
Follow these simple steps to get the WareHouse API up and running on your local machine.

**1. Clone the Repository**
Start by cloning the project to your local environment and navigating into its directory:


git clone https://github.com/AndiMPanguriseng/wareHouseApi.git
cd wareHouseApi

**2. Set Up Environment Variables**
Copy the example environment file to create your own .env file:

cp .env.example .env

**3. Configure Database**
Open your newly created .env file and update the database connection details to match your MySQL setup. Replace yourDatabaseName with the actual name of your database.

Cuplikan kode

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourDatabaseName
DB_USERNAME=root
DB_PASSWORD=

**4. Generate Application Key**
Generate a unique application key for your Laravel installation:

php artisan key:generate

**5. Run Migrations and Seed Database**
Execute the database migrations to create the necessary tables, and then seed the database with initial data:

php artisan migrate --seed

**6. Start the Development Server**
Finally, start the Laravel development server:

Bash

php artisan serve
You should now be able to access the WareHouse API.
