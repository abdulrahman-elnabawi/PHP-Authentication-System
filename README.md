# PHP Authentication System (JWT)

A simple authentication system built with PHP, MySQL, and JWT (JSON Web Token).

## Features

- User Registration
- User Login
- Password Hashing
- JWT Authentication
- Protected Profile Endpoint
- Clean API Structure
- Frontend (HTML, CSS, JS)

---

## Project Structure


newproject/
│
├── api/
│ ├── login.php
│ ├── register.php
│ └── profile.php
│
├── config/
│ ├── db.php
│ └── jwt.php
│
├── controllers/
│ └── AuthController.php
│
├── models/
│ └── User.php
│
├── middleware/
│ └── authmiddleware.php
│
├── html/
│ ├── login.html
│ ├── register.html
│ └── profile.html
│
├── css/
├── js/
│
├── vendor/
├── index.php
└── style.css


---

## Setup Instructions

### 1. Clone the repository


git clone https://github.com/your-username/your-repo.git
#2. Move project to XAMPP

Place it inside:

C:\xampp\htdocs\
#3. Start Apache & MySQL

Open XAMPP Control Panel and start:

Apache
MySQL
#4. Create Database

Go to phpMyAdmin and create a database:

login

Create table users:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  email VARCHAR(50),
  password VARCHAR(255)
);
#5. Configure Database

##Edit:

config/db.php
#6. Install Dependencies
composer install
#JWT Configuration

##Edit:

config/jwt.php

##Example:

$secret_key = "your_super_secret_key_here";
$issuer = "localhost";
$audience = "localhost";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60);
#Run Project

##Open in browser:

http://localhost/newproject/
#API Endpoints
##Register
POST /api/register.php
{
  "name": "test",
  "email": "test@test.com",
  "password": "123456"
}
##Login
POST /api/login.php
{
  "email": "test@test.com",
  "password": "123456"
}
##Profile (Protected)
GET /api/profile.php

##Headers:

Authorization: Bearer YOUR_TOKEN
#How It Works
User registers and password is hashed
User logs in and receives JWT token
Token is stored in frontend (localStorage)
Token is sent in Authorization header
Middleware verifies token
Access granted to protected routes
#Technologies Used:
PHP
MySQL
JWT (firebase/php-jwt)
HTML / CSS / JavaScript
XAMPP
#Notes:
Passwords are hashed using password_hash
JWT is used for authentication
No frameworks used (pure PHP)
#Author:
abdulrahman elnabawi
