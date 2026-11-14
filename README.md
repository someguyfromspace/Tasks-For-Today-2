# Tasks for Today Management System

A task management web application developed using CodeIgniter 4 and MySQL.

## Features

- User login and logout
- View task list
- Create new tasks
- Edit existing tasks
- Archive tasks
- User profile page
- About page
- Form validation
- Password hashing
- Authentication and access control

## Technologies Used

- PHP
- CodeIgniter 4
- MySQL
- HTML and CSS
- Bootstrap (if used)

## Installation and Setup

1. Clone or download this repository.
2. Install dependencies:

   ```bash
   composer install
   ```

3. Create a MySQL database named `tasks_for_today`.
4. Configure the database credentials in your `.env` file.
5. Run database migrations:

   ```bash
   php spark migrate
   ```

6. Seed the demo user:

   ```bash
   php spark db:seed DemoUserSeeder
   ```

7. Start the development server:

   ```bash
   php spark serve
   ```

8. Open the local URL shown in the terminal.

## Database

The project uses CodeIgniter migrations and seeders to create and populate the database.

## Developer

Developed as part of IT0049 – Web System Technologies Technical Summative Assessment.
