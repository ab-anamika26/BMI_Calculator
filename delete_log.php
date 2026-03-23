<?php
if (isset($_GET['id'])) {
    $log_id = intval($_GET['id']);

    $conn = new mysqli("localhost", "root", "", "bmi");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM login_logs WHERE log_id = ?");
    $stmt->bind_param("i", $log_id);

    if ($stmt->execute()) {
        header("Location: admin_login.php"); // Redirect after successful deletion
        exit();
    } else {
        echo "Error deleting log: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
