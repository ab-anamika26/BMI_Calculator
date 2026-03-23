<?php
if (isset($_GET['id'])) {
    $bmi_record_id = intval($_GET['id']);  // ID from bmi_records table (primary key)

    $conn = new mysqli("localhost", "root", "", "bmi");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use bmi_record_id to delete the correct BMI entry
    $stmt = $conn->prepare("DELETE FROM bmi_records WHERE id = ?");
    $stmt->bind_param("i", $bmi_record_id);

    if ($stmt->execute()) {
        header("Location: admin_bmi.php"); // Redirect back to the table page
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
