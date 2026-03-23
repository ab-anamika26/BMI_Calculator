<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}

// Fetch user BMI data
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
  die("DB connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT weight, calculated_at FROM bmi_records WHERE user_id = ? ORDER BY calculated_at ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weight Chart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f7f9;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    .chart-container {
      max-width: 700px;
      margin: 40px auto;
    }
    .bar-chart {
      display: flex;
      align-items: flex-end;
      height: 300px;
      border-left: 2px solid #000;
      border-bottom: 2px solid #000;
      gap: 15px;
      padding: 0 10px;
    }
    .bar {
      width: 30px;
      background-color: #4a90e2;
      position: relative;
      border-radius: 5px 5px 0 0;
    }
    .bar span {
      position: absolute;
      top: -22px;
      width: 100%;
      font-size: 12px;
      text-align: center;
      color: #333;
    }
    .label-row {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      padding: 0 15px;
      font-size: 12px;
      color: #444;
    }
    .label {
      width: 30px;
      text-align: center;
      transform: rotate(-45deg);
    }
    .no-data {
      text-align: center;
      color: #888;
      margin-top: 50px;
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
    /* Chatbot Button */
#chatbot-button {
  position: fixed;
  bottom: 25px;
  right: 25px;
  background-color: #4a90e2;
  color: white;
  font-size: 28px;
  width: 55px;
  height: 55px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0,0,0,0.3);
  z-index: 1000;
}

/* Chat window (optional) */
#chat-window {
  position: fixed;
  bottom: 90px;
  right: 25px;
  width: 300px;
  height: 350px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.2);
  z-index: 1000;
  overflow: hidden;
}

.chat-header {
  background-color: #4a90e2;
  color: white;
  padding: 10px;
  font-weight: bold;
}

.chat-body {
  padding: 15px;
  font-size: 14px;
  color: #333;
}

  </style>
</head>
<body>

<h2>📊 Your Weight History</h2>

<div class="chart-container">
<?php if (count($data) === 0): ?>
  <p class="no-data">No records found.</p>
<?php else: ?>
  <?php
    $weights = array_column($data, 'weight');
    $maxWeight = max($weights);
  ?>
  <div class="bar-chart">
    <?php foreach ($data as $row): ?>
      <?php $heightPercent = ($row['weight'] / $maxWeight) * 100; ?>
      <div class="bar" style="height: <?= $heightPercent ?>%">
        <span><?= $row['weight'] ?>kg</span>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="label-row">
    <?php foreach ($data as $row): ?>
      <div class="label"><?= date('d-M', strtotime($row['calculated_at'])) ?></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
</div>

<div class="back-btn">
  <a href="user-index.php">⬅ Back to Dashboard</a>
</div>

<!-- Chat Window (optional placeholder) -->
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

<link rel="stylesheet" href="chatbot\chatbot.css">
<script src="chatbot\chatbot.js"></script>



</body>
</html>
