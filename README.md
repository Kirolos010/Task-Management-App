# Task Manager

This is a Laravel-based Task Manager application. Follow these steps to set up the project on your local machine.

## Features

- **User Registration & Login**
- **Breeze Authentication**
- **Task Management (CRUD)**: Create, read, update, and delete tasks
- **User-friendly UI**

## Prerequisites

Ensure you have the following installed:
- PHP (>= 8.1)
- Composer
- MySQL
- Node.js & npm (for frontend assets)
- Git

## Installation

1. **Install PHP dependencies via Composer:**

    ```bash
    composer install
    ```

2. **Copy `.env.example` to create a new `.env` file:**

    ```bash
    cp .env.example .env
    ```

3. **Open `.env` and configure your database settings:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

4. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations to create the database tables:**

    ```bash
    php artisan migrate
    ```

6. **Install frontend dependencies using npm:**

    ```bash
    npm install
    ```

7. **Compile frontend assets:**

    ```bash
    npm run dev
    ```

8. **Start the development server:**

    ```bash
    php artisan serve
    ```

---

Your application should now be accessible at `http://localhost:8000`.
