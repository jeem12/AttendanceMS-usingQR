## Attendance Management System Using QR Codes

1. Table of Contents
2. Project Overview
3. Features
4. Technology Stack
5. Installation
6. Usage
7. Database Structure
8. Screenshots
9. License

---

### Project Overview

> This Attendance Management System allows organizations to track employee attendance efficiently using QR codes. Employees scan their unique QR codes to mark attendance, and administrators can manage employee records, generate QR codes, and view attendance reports.

--- 

### Features
- Employee Management:
- Add, edit, and delete employee records
- Assign employees to departments
- Generate unique QR codes for each employee
- Attendance Management:
- Scan QR codes to mark attendance
- Track daily, weekly, and monthly attendance
- Reporting:
- Generate attendance reports by employee or department
- Export attendance records (CSV, PDF)
- Secure login system for admin access
- Responsive interface using Bootstrap

### Technology Stack
- Frontend: HTML, CSS, JavaScript, Bootstrap, jQuery, DataTables
- Backend: PHP (PDO)
- Database: MySQL / MariaDB
- QR Code Generation: JavaScript (QRCode.js) or PHP libraries
- Server Requirements: Apache / Nginx, PHP 7.4+, MySQL 5.7+

### Installation
1. Clone the repository

```bash
git clone https://github.com/yourusername/attendance-qr.git
```

2. Create Database

- Import the `att.sql` file into your MySQL/MariaDB server.

3. Configure Database Connection

Edit `php/db_conn.php` with your database credentials:

```bash
$host = 'localhost';
$db   = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$conn = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
```

4. Run the Application
- Place the project folder in your local server root (`htdocs` for XAMPP, `www` for WAMP)
- Open your browser and navigate to:
```bash
http://localhost/attendance-qr/
```

### Usage
1. Admin Login
- Use the default admin credentials or create a new admin account.

2. Employee Management
- Add employees and generate QR codes.

3. Mark Attendance
- Employees scan their QR codes using the web scanner or mobile camera.

4. View Reports
- Generate and export reports by date or department.

### License

>This project is licensed under the MIT License. See the LICENSE file for details.