<?php
// Connect to the database using procedural MySQLi
$conn = mysqli_connect("localhost", "root", "", "bmi");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully!";
?>
