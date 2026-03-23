<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Count how many users fall into each BMI category
$sql = "SELECT category, COUNT(*) as count FROM bmi_records GROUP BY category";
$result = $conn->query($sql);

$categories = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
        $counts[] = $row['count'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>BMI Category Distribution</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 30px;
      background: #f8f9fa;
      text-align: center;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }

    canvas {
      max-width: 500px;
      margin: auto;
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
<a href="admin_index.php" class="back-home-btn">🏠Back to Home</a>
<h2><i class="fas fa-chart-pie"></i> BMI Category Distribution</h2>
<canvas id="bmiPieChart"></canvas>

<script>
  const ctx = document.getElementById('bmiPieChart').getContext('2d');
  const bmiPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($categories); ?>,
      datasets: [{
        label: 'Number of Users',
        data: <?php echo json_encode($counts); ?>,
        backgroundColor: [
          '#1abc9c', '#3498db', '#f1c40f', '#e67e22', '#e74c3c', '#9b59b6'
        ],
        borderColor: '#fff',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'right'
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.label + ': ' + context.parsed + ' users';
            }
          }
        }
      }
    }
  });
</script>

</body>
</html>
