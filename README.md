# Simple Blog Application

## Description

This is a simple blog application that allows users to register, log in, create their own posts, and comment on posts. The application uses PHP for backend functionality and MySQL for database management. The pages are served using PHP and styled with CSS.

## Features

- User registration and login
- User authentication
- Creating blog posts
- Commenting on blog posts
- Viewing a list of all blog posts
- Viewing individual blog posts

## Requirements

- PHP 7.4 or higher
- MySQL
- Web server (e.g. XAMPP)

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/blog-app.git
   ```
2. **Start the web server:**

    If you're using XAMPP, ensure Apache and MySQL are running. Place your project directory inside the htdocs folder (usually located in the XAMPP installation directory).

3. **Set up database in MySQL:**

    ```sql
    CREATE DATABSE blog;
    ```
    Then import file blog.sql from configuration-files into your database

4. **Edit the config/database.php file with your database credentials:**

    ```php
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "blog_db";
    ```

5. **Open your web browser and navigate to:**

    http://localhost/blog-app/index.php


