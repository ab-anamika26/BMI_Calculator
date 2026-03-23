<?php
session_start();
header("Content-Type: application/json");

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
  echo json_encode(["success" => false, "message" => "User not logged in."]);
  exit;
}

$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
  echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
  exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Log raw input (for debugging)
file_put_contents("log.txt", print_r($data, true), FILE_APPEND);

// Sanitize data
$gender = $data['gender'] ?? '';
$weight = floatval($data['weight'] ?? 0);
$height = floatval($data['height'] ?? 0);
$bmi = floatval($data['bmi'] ?? 0);
$category = $data['category'] ?? '';
$user_id = $_SESSION["user_id"];

// Validate inputs
if (!$gender || $weight <= 0 || $height <= 0 || $bmi <= 0 || !$category || !$user_id) {
  echo json_encode(["success" => false, "message" => "Invalid input values", "data" => $data]);
  exit;
}

// Insert BMI record with user_id
$stmt = $conn->prepare("INSERT INTO bmi_records (user_id, user_gender, weight, height, bmi, category) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
  echo json_encode(["success" => false, "message" => "Prepare failed: " . $conn->error]);
  exit;
}

$stmt->bind_param("isddds", $user_id, $gender, $weight, $height, $bmi, $category);

if ($stmt->execute()) {
  echo json_encode(["success" => true, "message" => "BMI record saved."]);
} else {
  echo json_encode(["success" => false, "message" => "Execute failed: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
