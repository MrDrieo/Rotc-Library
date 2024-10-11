# ROTC Library Management System

This is a Laravel-based project for managing an ROTC library system. It allows students to request books, and librarians to manage those requests.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Environment Configuration](#environment-configuration)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository(Copy&paste to cmd):
   ```bash
   git clone https://github.com/yourusername/ROTCLibraryApp.git
   cd ROTCLibraryApp

2. Install the dependencies:
   ```bash
   composer install
   npm install


3. Copy the example environment file:
   ```bash
   cp .env.example .env

4. Generate the application key:
   ```bash
   php artisan key:generate

5. Run the migrations:
   ```bash
   php artisan migrate

6. Create/edit the .env file

Make sure to configure your .env file with the correct settings for your database and other environment variables. Here’s a brief overview of the key variables:
```bash
   DB_CONNECTION: Database connection type (e.g., mysql, sqlite)
   DB_HOST: Database host (e.g., 127.0.0.1)
   DB_PORT: Database port (e.g., 3306)
   DB_DATABASE: Name of your database
   DB_USERNAME: Database username
   DB_PASSWORD: Database password