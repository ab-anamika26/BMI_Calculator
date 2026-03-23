<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Join to get full_name from registrations
$sql = "
  SELECT 
    b.id,
    r.full_name,
    b.user_gender,
    b.weight,
    b.height,
    b.bmi,
    b.category,
    b.calculated_at
  FROM 
    bmi_records b
  INNER JOIN 
    registrations r ON b.user_id = r.id
";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>BMI Records</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 30px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .search-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .search-input {
      padding: 10px 35px 10px 40px;
      border: 1px solid #ccc;
      border-radius: 25px;
      width: 300px;
      font-size: 16px;
      background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
      background-position: 10px center;
      background-repeat: no-repeat;
      background-size: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
      font-weight: bold;
      text-decoration: none;
    }

    .delete-link i {
      color: red;
    }

    .back-home-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 10px 18px;
      background-color: rgb(43, 115, 143);
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
      background-color: rgb(194, 220, 242);
      color: #000;
    }
  </style>
</head>
<body>

<a href="admin_index.php" class="back-home-btn">🏠 Back to Home</a>
<h2><i class="fas fa-heartbeat"></i> BMI Records</h2>

<div class="search-container">
  <input type="text" class="search-input" id="searchInput" onkeyup="searchCategory()" placeholder="🔍 Search by Category (e.g., Normal, Obese)">
</div>

<table id="bmiTable">
  <tr>
    <th><i class="fas fa-id-badge"></i> User ID</th>
    <th><i class="fas fa-user"></i> Full Name</th>
    <th><i class="fas fa-venus-mars"></i> Gender</th>
    <th><i class="fas fa-weight"></i> Weight (kg)</th>
    <th><i class="fas fa-ruler-vertical"></i> Height (cm)</th>
    <th><i class="fas fa-calculator"></i> BMI</th>
    <th><i class="fas fa-chart-line"></i> Category</th>
    <th><i class="fas fa-calendar-check"></i> Calculated At</th>
    <th><i class="fas fa-trash-alt"></i> Action</th>
  </tr>

  <?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td><i class='fas fa-id-badge'></i>" . htmlspecialchars($row['id']) . "</td>
                  <td><i class='fas fa-user'></i> " . htmlspecialchars($row['full_name']) . "</td>
                  <td><i class='fas fa-venus-mars'></i>" . htmlspecialchars($row['user_gender']) . "</td>
                  <td><i class='fas fa-weight'></i>" . htmlspecialchars($row['weight']) . "</td>
                  <td><i class='fas fa-ruler-vertical'></i>" . htmlspecialchars($row['height']) . "</td>
                  <td><i class='fas fa-calculator'></i>" . htmlspecialchars(number_format($row['bmi'], 2)) . "</td>
                  <td><i class='fas fa-chart-line'></i>" . htmlspecialchars($row['category']) . "</td>
                  <td><i class='fas fa-calendar-check'></i> " . htmlspecialchars($row['calculated_at']) . "</td>
                  <td><a class='delete-link' href='delete_bmi.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this BMI record?');\"><i class='fas fa-trash'></i> Delete</a></td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='9' style='text-align:center;'>No BMI records found.</td></tr>";
  }

  $conn->close();
  ?>
</table>

<script>
function searchCategory() {
  const input = document.getElementById("searchInput").value.toLowerCase();
  const table = document.getElementById("bmiTable");
  const rows = table.getElementsByTagName("tr");

  // Start from index 1 to skip the header
  for (let i = 1; i < rows.length; i++) {
    const categoryCell = rows[i].getElementsByTagName("td")[6]; // 7th column is Category
    if (categoryCell) {
      const category = categoryCell.textContent.toLowerCase();
      rows[i].style.display = category.includes(input) ? "" : "none";
    }
  }
}
</script>

</body>
</html>
