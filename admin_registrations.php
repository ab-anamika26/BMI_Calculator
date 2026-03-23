<?php
session_start();
// DB connection
$conn = new mysqli("localhost", "root", "", "bmi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all registrations
$sql = "SELECT id, full_name, dob, age, mobile_number, email, height, weight, gender, city, address, created_at FROM registrations";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrations Table</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 30px;
      background: #f9f9f9;
      color: #333;
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
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #2c3e50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    td i {
      margin-right: 6px;
      color: #3498db;
    }

    tr:hover {
      background-color: #e6f7ff;
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

    .delete-link {
      color: red;
      font-weight: 600;
      text-decoration: none;
    }

    .delete-link i {
      color: red;
    }

    .delete-link:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<a href="admin_index.php" class="back-home-btn">🏠 Back to Home</a>
<h2><i class="fas fa-users"></i> Registered Users</h2>

<div class="search-container">
  <input type="text" class="search-input" id="searchInput" placeholder="🔍 Search by City..." onkeyup="searchCity()">
</div>

<table id="userTable">
  <tr>
    <th><i class="fas fa-user"></i> Full Name</th>
    <th><i class="fas fa-calendar-alt"></i> DOB</th>
    <th><i class="fas fa-hourglass-half"></i> Age</th>
    <th><i class="fas fa-phone"></i> Mobile</th>
    <th><i class="fas fa-envelope"></i> Email</th>
    <th><i class="fas fa-ruler-vertical"></i> Height (cm)</th>
    <th><i class="fas fa-weight"></i> Weight (kg)</th>
    <th><i class="fas fa-venus-mars"></i> Gender</th>
    <th><i class="fas fa-city"></i> City</th>
    <th><i class="fas fa-map-marker-alt"></i> Address</th>
    <th><i class="fas fa-calendar-check"></i> Created At</th>
    <th><i class="fas fa-trash-alt"></i> Action</th>
  </tr>

  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td><i class='fas fa-user'></i>" . htmlspecialchars($row['full_name']) . "</td>
                  <td><i class='fas fa-calendar-alt'></i>" . htmlspecialchars($row['dob']) . "</td>
                  <td><i class='fas fa-hourglass-half'></i>" . htmlspecialchars($row['age']) . "</td>
                  <td><i class='fas fa-phone'></i>" . htmlspecialchars($row['mobile_number']) . "</td>
                  <td><i class='fas fa-envelope'></i>" . htmlspecialchars($row['email']) . "</td>
                  <td><i class='fas fa-ruler-vertical'></i>" . htmlspecialchars($row['height']) . "</td>
                  <td><i class='fas fa-weight'></i>" . htmlspecialchars($row['weight']) . "</td>
                  <td><i class='fas fa-venus-mars'></i>" . htmlspecialchars($row['gender']) . "</td>
                  <td><i class='fas fa-city'></i>" . htmlspecialchars($row['city']) . "</td>
                  <td><i class='fas fa-map-marker-alt'></i>" . htmlspecialchars($row['address']) . "</td>
                  <td><i class='fas fa-calendar-check'></i> " . htmlspecialchars($row['created_at']) . "</td>
                  <td><a class='delete-link' href='delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\"><i class='fas fa-trash'></i> Delete</a></td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='12' style='text-align: center;'>No records found.</td></tr>";
  }

  $conn->close();
  ?>
</table>

<script>
function searchCity() {
  const input = document.getElementById("searchInput").value.toLowerCase();
  const table = document.getElementById("userTable");
  const rows = table.getElementsByTagName("tr");

  // Start from index 1 to skip the header
  for (let i = 1; i < rows.length; i++) {
    const cityCell = rows[i].getElementsByTagName("td")[8]; // 9th column is City
    if (cityCell) {
      const city = cityCell.textContent.toLowerCase();
      rows[i].style.display = city.includes(input) ? "" : "none";
    }
  }
}
</script>

</body>
</html>
