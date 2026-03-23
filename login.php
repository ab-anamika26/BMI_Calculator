<?php
session_start();

// DB connection settings
$host = "localhost";
$dbname = "bmi";
$user = "root";
$pass = "";

// Create DB connection
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle login
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST["email"]);
  $password = $_POST["password"];
  $user_type = $_POST["user_type"];
  $default_admin_email = "admin@gmail.com";
  $default_admin_password = "admin123";
  $stmt = $conn->prepare("SELECT id, full_name, password FROM registrations WHERE email = ? AND user_type = ?");
  $stmt->bind_param("ss", $email, $user_type);
  $stmt->execute();
  $result = $stmt->get_result();
   if ($user_type == "admin") {
        if ($email == $default_admin_email && $password == $default_admin_password) {
            $_SESSION["user_type"] = "admin";
            $_SESSION["email"] = $email;
            header("Location: admin_index.php");
            exit();
        } else {
             $login_error ="Invalid admin credentials.";
        }
    }
  else if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user["password"])) {
      // Start session
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["user_name"] = $user["full_name"];
      $_SESSION["user_type"] = $user_type;

      // Log login in login_logs
      $log_stmt = $conn->prepare("INSERT INTO login_logs (user_id, email) VALUES (?, ?)");
      $log_stmt->bind_param("is", $user["id"], $email);
      $log_stmt->execute();
      $log_stmt->close();

      header("Location: user-index.php");
      exit();
    } else {
      $login_error = "Invalid password.";
    }
  } else {
    $login_error = "Invalid credentials or user type.";
  }

  $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI Calculator - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .logo {
      text-align: center;
      color: #5b3e88;
      font-size: 28px;
      margin-bottom: 30px;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .login-form label {
      font-weight: 500;
      color: #555;
      margin-bottom: -10px;
      margin-left: 4px;
    }

    .input-icon {
      position: relative;
    }

    .input-icon i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #777;
    }

    .login-form select,
    .login-form input {
      padding: 12px 12px 12px 38px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 15px;
      box-sizing: border-box;
      outline: none;
      width: 100%;
    }

    .login-form select:focus,
    .login-form input:focus {
      border-color: #7a5cc2;
    }

    .login-form button {
      padding: 12px;
      border: none;
      border-radius: 10px;
      background-color: #7a5cc2;
      color: white;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-form button:hover {
      background-color: #6644b2;
    }

    .help-link,
    .signup-text {
      font-size: 14px;
      text-align: center;
      color: #666;
    }

    .help-link a,
    .signup-text a {
      color: #7a5cc2;
      text-decoration: none;
      font-weight: 500;
    }

    .separator {
      text-align: center;
      margin: 15px 0;
      color: #aaa;
      font-size: 14px;
      position: relative;
    }

    .separator span {
      background: white;
      padding: 0 10px;
      position: relative;
      z-index: 1;
    }

    .separator::before {
      content: "";
      height: 1px;
      background: #ccc;
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      z-index: 0;
    } 
    .back-home-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 10px 18px;
      background-color:rgb(43, 115, 143);
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    .back-home-btn:hover {
      background-color:rgb(194, 220, 242);
    }

  </style>
</head>
<body>
   <a href="index.html" class="back-home-btn">🏠Back to Home</a>

  <div class="login-container">
    <h1 class="logo">BMI Calculator</h1>

    <form class="login-form" method="POST" action="">
      <label for="user_type">User Type</label>
      <div class="input-icon">
        <i class="fas fa-user-tag"></i>
        <select name="user_type" id="user_type" required>
          <option value="" disabled selected>Select user type</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="input-icon">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="input-icon">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <?php if (!empty($login_error)): ?>
        <p style="color: red; font-size: 0.9rem;"><?= htmlspecialchars($login_error) ?></p>
      <?php endif; ?>

      <button type="submit">Log In</button>

      <p class="help-link">
        Forgot your login details? <a href="forgot_password.php">Get help logging in.</a>
      </p>

      <div class="separator"><span>OR</span></div>

      <p class="signup-text">
        Don't have an account? <a href="registration.php">Sign up</a>.
      </p>
    </form>
  </div>
</body>
</html>
