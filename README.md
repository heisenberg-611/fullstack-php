# Fullstack PHP Application

This is a modern, lightweight PHP application featuring user authentication, role-based access control (Admin/User), and a vibrant responsive design.

## Features

- **User Authentication**: Secure Login and Registration system.
- **Role-Based Access Control (RBAC)**:
  - **Admin**: Dedicated dashboard to view and manage all registered users.
  - **User**: Personalized dashboard with profile information.
- **Security**: Passwords are hashed using `BCRYPT`.
- **Modern UI**: Custom CSS with glassmorphism effects, gradients, and responsive layout.
- **MVC Structure**: Organized using Model-View-Controller architecture.

## Technologies Used

- **Backend**: Native PHP (No frameworks)
- **Frontend**: HTML5, CSS3 (Custom Design), Google Fonts
- **Database**: MySQL (via PDO)
- **Server**: Apache (XAMPP/MAMP recommended)

## Setup Instructions

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/fullstack-php.git
    cd fullstack-php
    ```

2.  **Configure Database**
    - Create a MySQL database named `fullstack`.
    - Import the schema from `sql/schema.sql`.
    - Run the migration script to add roles: `php sql/migrate_role.php`.

3.  **Update Configuration**
    - Open `config/database.php`.
    - Ensure credentials match your local setup (Default: user `root`, password empty).

4.  **Run the Application**
    - Place the folder in your `htdocs` (XAMPP) or `www` (MAMP) directory.
    - Access via browser: `http://localhost/fullstack-php/public/`

## Usage

- **Register**: Create a new account. By default, you are a **User**.
- **Login**: Access your dashboard.
- **Admin Access**:
  - To make a user an Admin, run this SQL command:
    ```sql
    UPDATE users SET role = 'admin' WHERE email = 'your@email.com';
    ```
  - Admins will be automatically redirected to the Admin Dashboard upon login.

## Directory Structure

```
/app
  /controllers - Logic for handling requests
  /models      - Database interactions
  /views       - HTML templates
/config        - Database configuration
/public        - Public entry point (index.php, css)
/sql           - Database schemas and migrations
```
