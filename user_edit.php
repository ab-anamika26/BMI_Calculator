<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// DB connection
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];
$success = "";
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['full_name']);
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile_number'];
    $email = $_POST['email'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $address = trim($_POST['address']);

    $stmt = $conn->prepare("UPDATE registrations SET full_name=?, dob=?, age=?, mobile_number=?, email=?, height=?, weight=?, gender=?, city=?, address=? WHERE id=?");
    $stmt->bind_param("ssisssssssi", $full_name, $dob, $age, $mobile, $email, $height, $weight, $gender, $city, $address, $userId);
    
    if ($stmt->execute()) {
        header("Location: user-profile.php");
        exit;
    } else {
        $error = "Failed to update profile. Please try again.";
    }
    $stmt->close();
}

// Fetch current user data
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
  <title>Edit Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f0f7;
      padding: 40px;
    }
    .form-container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #4a3f63;
    }
    form label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
      color: #333;
    }
    form input,
    form select,
    form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .form-actions {
      margin-top: 20px;
      text-align: center;
    }
    .form-actions button {
      background-color: #6d5ab2;
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
    }
    .form-actions button:hover {
      background-color: #5846a3;
    }
    .error {
      color: red;
      text-align: center;
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
   <a href="user-profile.php" class="back-home-btn">🏠Back to Home</a>
  <div class="form-container">
    <h2>Edit Profile</h2>

    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
      <label>Full Name:</label>
      <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required>

      <label>Date of Birth:</label>
      <input type="date" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>

      <label>Age:</label>
      <input type="number" name="age" value="<?= htmlspecialchars($user['age']) ?>" min="0" required>

      <label>Mobile Number:</label>
      <input type="text" name="mobile_number" value="<?= htmlspecialchars($user['mobile_number']) ?>" required>

      <label>Email:</label>
      <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

      <label>Height (cm):</label>
      <input type="number" name="height" value="<?= htmlspecialchars($user['height']) ?>" required>

      <label>Weight (kg):</label>
      <input type="number" name="weight" value="<?= htmlspecialchars($user['weight']) ?>" required>

      <label>Gender:</label>
      <select name="gender" required>
        <option value="">Select</option>
        <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= $user['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
      </select>

      <label>City:</label>
      <input type="text" name="city" value="<?= htmlspecialchars($user['city']) ?>" required>

      <label>Address:</label>
      <textarea name="address" rows="3"><?= htmlspecialchars($user['address']) ?></textarea>

      <div class="form-actions">
        <button type="submit">Update Profile</button>
      </div>
    </form>
  </div>
</body>
</html>
