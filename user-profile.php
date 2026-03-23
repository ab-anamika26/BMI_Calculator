<?php
session_start();

// ✅ Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// ✅ DB connection
$host = "localhost";
$dbname = "bmi";
$user = "root";
$pass = "";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Fetch user data by session user_id
$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM registrations WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color:rgb(236, 241, 244);
      color: #333;
      margin: 0;
      padding: 0;
    }
    .profile-container {
      max-width: 700px;
      margin: 40px auto;
      background:rgb(253, 253, 253);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 20px;
    }
    .profile-icon {
      font-size: 48px;
    }
    .profile-info h1 {
      margin: 0;
      font-size: 26px;
      color: #5a4e7c;
    }
    .tags span {
      background:rgb(60, 52, 219);
      color:rgb(239, 238, 238);
      padding: 5px 10px;
      border-radius: 12px;
      margin-right: 10px;
      font-size: 14px;
    }
    .profile-details {
      margin-top: 30px;
    }
    .profile-details h2 {
      margin-top: 20px;
      color: #4a3f63;
    }
    .detail-row {
      margin: 8px 0;
    }
    .label {
      font-weight: bold;
      color: #333;
    }
    .edit-btn {
      margin-top: 20px;
      display: inline-block;
      background:rgb(52, 21, 227);
      color: white;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 8px;
      transition: background 0.3s;
    }
    .edit-btn:hover {
      background:rgb(188, 180, 244);
    }
  </style>
</head>
<body>
  <div class="profile-container" role="main" aria-label="User Profile">
    <header class="profile-header">
      <div class="profile-icon" aria-label="User profile icon" role="img">👤</div>
      <div class="profile-info">
        <h1><?= htmlspecialchars($user['full_name'] ?? 'Full Name') ?></h1>
        <p class="subtext"><?= isset($user['age']) && $user['age'] > 0 ? 'Age: ' . htmlspecialchars($user['age']) : '' ?></p>
        <div class="tags">
          <span><?= htmlspecialchars($user['gender'] ?? 'Gender') ?></span>
          <span><?= htmlspecialchars($user['city'] ?? 'City') ?></span>
        </div>
      </div>
    </header>

    <section class="profile-details">
      <h2>Contact Information</h2>
      <div class="detail-row"><span class="label">Email:</span> <?= htmlspecialchars($user['email'] ?? 'Not provided') ?></div>
      <div class="detail-row"><span class="label">Mobile:</span> <?= htmlspecialchars($user['mobile_number'] ?? 'Not provided') ?></div>

      <h2>Physical Attributes</h2>
      <div class="detail-row"><span class="label">Height:</span> <?= !empty($user['height']) ? htmlspecialchars($user['height']) . ' cm' : 'Not provided' ?></div>
      <div class="detail-row"><span class="label">Weight:</span> <?= !empty($user['weight']) ? htmlspecialchars($user['weight']) . ' kg' : 'Not provided' ?></div>

      <h2>Other Details</h2>
      <div class="detail-row"><span class="label">Date of Birth:</span> <?= htmlspecialchars($user['dob'] ?? 'Not provided') ?></div>
      <div class="detail-row"><span class="label">Address:</span> <?= htmlspecialchars($user['address'] ?? 'Not provided') ?></div>

      <h2>Security</h2>
      <div class="detail-row">
        <span class="label">Password:</span> <em>Hidden (Encrypted)</em> — <a href="change_password.php">Change Password</a>
      </div>
    </section>

    <a class="edit-btn" href="user_edit.php">✏️ Edit Profile</a>
    <a class="edit-btn" href="user-index.php">Back to home</a>
  </div>
</body>
</html>
