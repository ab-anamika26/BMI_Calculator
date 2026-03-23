<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST["email"]);
  $new_password = $_POST["new_password"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format.";
  } elseif (empty($new_password)) {
    $error = "New password is missing.";
  } else {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "bmi");

    if ($conn->connect_error) {
      $error = "Connection failed: " . $conn->connect_error;
    } else {
      // Check if email exists
      $stmt = $conn->prepare("SELECT id FROM registrations WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 1) {
        // Email exists, update password
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare("UPDATE registrations SET password = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $hashedPassword, $email);

        if ($updateStmt->execute()) {
          $success = "Password reset successful!";
        } else {
          $error = "Failed to update password.";
        }

        $updateStmt->close();
      } else {
        $error = "No account found with that email.";
      }

      $stmt->close();
      $conn->close();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Forgot Password</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 500px;
      margin: 50px auto;
      background: #ffffff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #333;
    }
    p.description {
      text-align: center;
      color: #555;
      margin-bottom: 20px;
      font-size: 0.95rem;
    }
    label {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }
    label::before {
      content: "📧"; /* Email icon */
      font-size: 18px;
    }
    input[type="email"],
    input[type="hidden"],
    button {
      width: 100%;
      padding: 12px 12px 12px 38px;
      margin-top: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 1rem;
      box-sizing: border-box;
      background: #f9f9f9 url('data:image/svg+xml;utf8,<svg fill="gray" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M0 4a2 2 0 012-2h12a2 2 0 012 2v.5L8 9 0 4.5V4zm0 1.634V12a2 2 0 002 2h12a2 2 0 002-2V5.634l-7.38 4.613a1 1 0 01-1.24 0L0 5.634z"/></svg>') no-repeat 10px center;
      background-size: 18px;
    }
    button {
      background-color: #4a90e2;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
      padding-left: 12px;
    }
    button:hover {
      background-color: #357abd;
    }
    .success {
      color: green;
      text-align: center;
      margin-top: 10px;
    }
    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
    #showPassword {
      margin-top: 15px;
      text-align: center;
    }
    code {
      background: #f4f4f4;
      padding: 5px 10px;
      border-radius: 5px;
      font-family: monospace;
    }
    a {
      display: block;
      margin-top: 15px;
      text-align: center;
      text-decoration: none;
      color: #4a90e2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🔐 Forgot Password</h2>
    <p class="description">
      Forgotten your password? No problem! <br />
      Enter your registered email and a new secure password will be generated for you.
    </p>

    <?php if (!empty($success)): ?>
      <p class="success"><?= htmlspecialchars($success) ?></p>
      <p style="text-align:center;">Your new password is: <code><?= htmlspecialchars($_POST['new_password']) ?></code></p>
      <a href="login.php">🔙 Back to Login</a>
    <?php elseif (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (empty($success)): ?>
      <form id="forgotForm" method="POST">
        <label for="email">Email address:</label>
        <input type="email" name="email" id="email" required placeholder="you@example.com">
        
        <input type="hidden" name="new_password" id="new_password">

        <button type="button" onclick="generatePassword()">🔁 Generate New Password</button>
      </form>

      <div id="showPassword" style="display:none;">
        <p>Your new password is: <code id="generated"></code></p>
        <p><em>The form will be submitted shortly...</em></p>
      </div>
    <?php endif; ?>
  </div>

  <script>
    function generateSecurePassword(length) {
      const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-+=';
      let password = '';
      for (let i = 0; i < length; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return password;
    }

    function generatePassword() {
      const email = document.getElementById('email').value.trim();
      if (!email) {
        alert('Please enter your email.');
        return;
      }

      const newPassword = generateSecurePassword(12);
      document.getElementById('new_password').value = newPassword;
      document.getElementById('generated').textContent = newPassword;
      document.getElementById('showPassword').style.display = 'block';

      setTimeout(() => {
        document.getElementById('forgotForm').submit();
      }, 2500);
    }
  </script>
  <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
  <button type="button" onclick="window.location.href='login.php'">Go to Login</button>
</div>

</body>
</html>
