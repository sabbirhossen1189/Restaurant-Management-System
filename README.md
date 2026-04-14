# Admin_Template
This project is a web application developed using the Laravel framework. It provides a structured and scalable solution with modern web technologies, including backend logic, database management, and frontend integration.
# Features
User Authentication (Login & Registration)
Admin Dashboard
Database Management System
CRUD Operations (Create, Read, Update, Delete)
Secure Routing & Middleware
Responsive User Interface
# Technologies
Backend: PHP (Laravel Framework)
Frontend: HTML, CSS, JavaScript, Blade Template
Database: MySQL
Version Control: Git & GitHub
# Requirments
Before running the project, make sure your system has:
PHP (>= 8.0)
Composer
MySQL / MariaDB
Node.js & NPM
Web Browser (Chrome recommended)
# Quick Installation
# Clone the project
git clone https://github.com/your-username/your-project.git

# Go to project folder
cd your-project

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migration
php artisan migrate

# (Optional) Seed database
php artisan db:seed

# Install frontend dependencies
npm install

# Compile assets
npm run dev

# Start Laravel server
php artisan serve

# Do this before migrate
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password