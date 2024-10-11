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

composer install
npm install

3. Copy the example environment file:

cp .env.example .env

4. Generate the application key:

php artisan key:generate

5. Run the migrations:

php artisan migrate
6. Create/edit the .env file

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rotc_library
DB_USERNAME=root
DB_PASSWORD=