# 🧮 BMI Calculator

> A full-stack web application for BMI tracking, health insights, and user management.

![Stack](https://img.shields.io/badge/Backend-PHP%208.2-777BB4?style=flat-square&logo=php)
![DB](https://img.shields.io/badge/Database-MySQL%2FMariaDB-4479A1?style=flat-square&logo=mysql)
![Server](https://img.shields.io/badge/Server-Apache%20(XAMPP)-CA2136?style=flat-square)

---

## 📋 Table of Contents

- [Project Overview](#-project-overview)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [Installation & Setup](#-installation--setup)
- [Default Credentials](#-default-credentials)
- [BMI Categories](#-bmi-categories)
- [Security Notes](#-security-notes)
- [Known Limitations](#-known-limitations)

---

## 📌 Project Overview

The BMI Calculator is a full-stack web application that allows users to calculate their Body Mass Index (BMI), track their health progress over time, and receive personalised diet and fitness tips based on their results.

The system includes:
- A **user-facing interface** for BMI calculation, profile management, and progress tracking
- An **admin dashboard** for managing registrations, BMI records, and login activity
- A **built-in health chatbot** for BMI and diet-related queries

---

## ✨ Features

### 👤 User Features
- Register and log in securely with bcrypt-hashed passwords
- Calculate BMI using weight (kg) and height (cm)
- Get personalised health tips based on BMI category (underweight, normal, overweight, obese, morbidly obese)
- View weight/BMI history as a bar chart
- View and edit profile (name, DOB, mobile, city, address)
- Change password from the profile section
- Interact with a built-in BMI & Health Chatbot

### 🛡️ Admin Features
- Secure admin login with separate credentials
- View all registered users
- Browse all BMI records with user details
- Monitor login logs (user, email, timestamp)
- View BMI progress charts across users

### 🤖 Chatbot Features
The built-in BMI & Health Chatbot (`chatbot/`) supports 25+ pre-defined Q&A topics, including:
- BMI definition, formula, and healthy ranges
- Tips to gain or lose weight (with do's and don'ts)
- Recommended exercises for BMI improvement
- Health risks of underweight and obesity
- BMI for children, teenagers, men, and women
- Alternatives to BMI (waist-to-hip ratio, body fat %)
- Daily calorie guidance and dietary advice

Users can click suggestion chips or type a question manually. Responses are displayed with a typewriter animation effect.

### 📬 Contact & Newsletter
- **`forms/contact.php`** — Handles the contact form submission using the BootstrapMade PHP Email Form library (pro version required). Supports AJAX and optional SMTP configuration.
- **`forms/newsletter.php`** — Handles newsletter subscriptions, sending the subscriber's email to a configured receiving address.

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, JavaScript (ES6) |
| Backend | PHP 8.2 (procedural + MySQLi) |
| Database | MySQL / MariaDB 10.4 (via XAMPP) |
| UI Framework | Bootstrap 5.3 |
| Charts | Custom PHP/JS bar chart |
| Chatbot | Custom JS (local knowledge base, 25+ Q&A) |
| Contact / Newsletter | PHP Email Form (BootstrapMade — pro) |
| Web Server | Apache (XAMPP) |
| Password Hashing | `password_hash()` / `PASSWORD_DEFAULT` |

---

## 📁 Project Structure

```
bmi/
├── index.html                  # Public landing page
├── login.php                   # Login page (user + admin)
├── registration.php            # New user registration
├── logout.php                  # Session destroy & redirect
├── connection.php              # Shared DB connection
│
├── user-index.php              # User dashboard
├── bmi-index.php               # BMI calculator + tips + chatbot
├── save_bmi.php                # AJAX endpoint — saves BMI to DB
├── chart.php                   # Weight history bar chart
├── user-profile.php            # View user profile
├── user_edit.php               # Edit profile form
├── change_password.php         # Change password form
│
├── admin_index.php             # Admin dashboard home
├── admin_registrations.php     # Admin — all users
├── admin_bmi.php               # Admin — all BMI records
├── admin_login.php             # Admin — login logs
├── bmi_chart.php               # Admin — progress charts
│
├── chatbot/
│   ├── chatbot.js              # Chatbot logic & response knowledge base
│   ├── chatbot.css             # Chatbot UI styles
│   └── chatbot.html            # Embeddable chatbot widget markup
│
├── forms/
│   ├── contact.php             # Contact form handler (PHP Email Form)
│   └── newsletter.php          # Newsletter subscription handler
│
├── assets/
│   ├── css/main.css
│   ├── js/main.js
│   ├── img/
│   └── vendor/                 # Bootstrap, AOS, Swiper, php-email-form, etc.
│
├── bmi (1).sql                 # Full database dump for import
└── Readme.txt                  # BootstrapMade template notes
```

---

## 🗄 Database Schema

**Database name:** `bmi`

### `registrations`

| Column | Type | Description |
|---|---|---|
| `id` | INT (PK, AI) | Unique user ID |
| `full_name` | VARCHAR(100) | Full name |
| `dob` | DATE | Date of birth |
| `age` | INT | Age |
| `mobile_number` | VARCHAR(15) | Mobile number |
| `email` | VARCHAR(100) | Login email |
| `password` | VARCHAR(255) | Bcrypt hashed password |
| `height` | DECIMAL(5,2) | Height in cm |
| `weight` | DECIMAL(5,2) | Weight in kg |
| `gender` | ENUM | `male` / `female` / `others` |
| `city` | VARCHAR(100) | City |
| `address` | TEXT | Full address |
| `user_type` | VARCHAR(20) | `user` or `admin` |
| `created_at` | TIMESTAMP | Registration time |

### `bmi_records`

| Column | Type | Description |
|---|---|---|
| `id` | INT (PK, AI) | Record ID |
| `user_id` | INT (FK) | References `registrations(id)` |
| `user_gender` | VARCHAR(10) | Gender at time of entry |
| `weight` | FLOAT | Weight in kg |
| `height` | FLOAT | Height in cm |
| `bmi` | FLOAT | Calculated BMI value |
| `category` | VARCHAR(50) | BMI category label |
| `calculated_at` | TIMESTAMP | Calculation time |

### `login_logs`

| Column | Type | Description |
|---|---|---|
| `log_id` | INT (PK, AI) | Log entry ID |
| `user_id` | INT (FK) | References `registrations(id)` |
| `user_type` | VARCHAR(20) | `user` or `admin` |
| `email` | VARCHAR(255) | Email used to log in |
| `login_date` | TIMESTAMP | Login timestamp |

---

## 🤖 Embedding the Chatbot

The chatbot is a self-contained widget. To embed it on any page:

```html
<!-- Place just before </body> -->
<div class="chatbot-container">
  <button id="chatbot-toggle">🤖 Chat</button>
  <div class="chatbot-window" id="chatbot-window">
    <div class="chatbot-header">BMI & Health Chatbot</div>
    <div class="suggestions" id="suggestions"></div>
    <div class="input-area">
      <input type="text" id="user-input" placeholder="Ask a question...">
      <button onclick="submitQuestion()">Ask</button>
    </div>
    <div class="response-box" id="response-box"></div>
  </div>
</div>

<link rel="stylesheet" href="chatbot/chatbot.css">
<script src="chatbot/chatbot.js"></script>
```

The chatbot toggle button opens/closes the window. On load, suggestion chips auto-populate from the built-in `responses` object in `chatbot.js`. New Q&A pairs can be added directly to that object.

---

## 🚀 Installation & Setup

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (PHP 8.2+, Apache, MySQL)
- A modern web browser

### Steps

1. **Clone / copy** the project folder into your XAMPP web root:
   ```
   Windows:  C:\xampp\htdocs\bmi\
   Linux:    /opt/lampp/htdocs/bmi/
   ```

2. **Start** Apache and MySQL from the XAMPP Control Panel.

3. **Open** phpMyAdmin at `http://localhost/phpmyadmin`.

4. **Create** a new database named `bmi`.

5. **Import** `bmi (1).sql` into the `bmi` database.

6. **Visit** `http://localhost/bmi/` in your browser.

### Configuring the Contact Form (Optional)

The contact and newsletter forms require the **BootstrapMade PHP Email Form** pro library. Once purchased:

1. Upload `php-email-form.php` to `assets/vendor/php-email-form/`.
2. Update `$receiving_email_address` in both `forms/contact.php` and `forms/newsletter.php`.
3. Optionally enable SMTP by uncommenting the `$contact->smtp` block and filling in your mail server credentials.

---

## 🔑 Default Credentials

| Role | Email | Password |
|---|---|---|
| Admin | `admin@gmail.com` | `admin123` |
| Sample User | `abhi@gmail.com` | *(registered)* |
| Sample User | `athira12@gmail.com` | *(registered)* |

> ⚠️ **Important:** The admin credentials are hardcoded in `login.php`. Change them before any public or production deployment.

---

## 📊 BMI Categories

| Category | BMI Range |
|---|---|
| Underweight | Below 18.5 |
| Normal weight | 18.5 – 24.9 |
| Overweight | 25.0 – 29.9 |
| Obese | 30.0 – 39.9 |
| Morbidly obese | 40.0 and above |

---

## 🔒 Security Notes

- Passwords are hashed with `password_hash()` (bcrypt) — plain text is never stored.
- Session-based authentication protects all dashboard pages.
- SQL injection is prevented via **prepared statements** (MySQLi).
- User output is escaped with `htmlspecialchars()` to prevent XSS.
- Admin credentials are hardcoded — move to the database or environment variables before going live.
- Designed for **localhost / intranet** use. Additional hardening is required for public deployment.

---

## ⚠️ Known Limitations

- No email verification on registration.
- `forgot_password.php` is linked but not yet implemented.
- Admin credentials are hardcoded in `login.php`.
- The chatbot uses a static local knowledge base — no AI or external API.
- No HTTPS or CSRF token protection implemented.
- `forms/contact.php` and `forms/newsletter.php` require the **pro version** of the BootstrapMade PHP Email Form library (`assets/vendor/php-email-form/php-email-form.php`) — contact form will not work without it. See `Readme.txt` for purchase link.

---

## 👥 Authors

Developed by the BMI Calculator project team, Kerala, India.

- 📧 Email: `bmi@example.com`
- 📍 Location: Thalakkottukara, Kerala, India

---

© 2025 BMI Calculator. All Rights Reserved.

