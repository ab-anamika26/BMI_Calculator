<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT log_id, email, login_date FROM login_logs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Logs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 30px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #34495e;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e0f7fa;
    }

    td i {
      margin-right: 6px;
      color: #2980b9;
    }

    .delete-link {
      color: red;
      text-decoration: none;
      font-weight: bold;
    }

    .delete-link i {
      color: red;
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
<h2><i class="fas fa-history"></i> Login Logs</h2>

<table>
  <tr>
    <th><i class="fas fa-id-badge"></i> Log ID</th>
    <th><i class="fas fa-envelope"></i> Email</th>
    <th><i class="fas fa-clock"></i> Log Date</th>
    <th><i class="fas fa-trash-alt"></i> Action</th>
  </tr>

  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td><i class='fas fa-id-badge'></i>" . htmlspecialchars($row['log_id']) . "</td>
                  <td><i class='fas fa-envelope'></i>" . htmlspecialchars($row['email']) . "</td>
                  <td><i class='fas fa-clock'></i>" . htmlspecialchars($row['login_date']) . "</td>
                  <td><a class='delete-link' href='delete_log.php?id=" . $row['log_id'] . "' onclick=\"return confirm('Are you sure you want to delete this log?');\"><i class='fas fa-trash'></i> Delete</a></td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='4' style='text-align:center;'>No login logs found.</td></tr>";
  }

  $conn->close();
  ?>
</table>

</body>
</html>
