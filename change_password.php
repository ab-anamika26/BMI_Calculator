<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'bmi');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'] ?? '';
    //$confirmPassword = $_POST['confirm_password'] ?? '';

    if ( strlen($newPassword) >= 6) {
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE registrations SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed, $userId);
        if ($stmt->execute()) {
            $success = "Password updated successfully.";
        } else {
            $error = "Error updating password.";
        }
        $stmt->close();
    } else {
        $error = "Passwords do not match or are too short (min 6 characters).";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Change Password</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f5ff;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .form-box {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      color: #6c5ce7;
      margin-bottom: 25px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 5px;
      color: #444;
    }

    input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
      transition: 0.3s;
    }

    input:focus {
      border-color: #a29bfe;
      outline: none;
      box-shadow: 0 0 5px rgba(162, 155, 254, 0.5);
    }

    button {
      background: #6c5ce7;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #5e54e7;
    }

    .success {
      color: #2ecc71;
      text-align: center;
      font-weight: 600;
    }

    .error {
      color: #e74c3c;
      text-align: center;
      font-weight: 600;
    }
    .back-btn {
      text-align: center;
      margin-top: 30px;
    }
    .back-btn a {
      text-decoration: none;
      color: #fff;
      background: #333;
      padding: 10px 20px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Change Password</h2>

    <?php if (!empty($success)): ?>
      <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">
      <label for="new_password">New Password</label>
      <input type="password" name="new_password" id="new_password" required>

      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" required>

      <button type="submit">Change Password</button>
      
<div class="back-btn">
  <a href="user-index.php">⬅ Back to Dashboard</a>
</div>

    </form>
  </div>
</body>
</html>
