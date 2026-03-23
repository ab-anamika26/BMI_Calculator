<?php
// Start session if you want to restrict deletion to logged-in users
// session_start();

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the user_id to prevent SQL injection
    $user_id = intval($_GET['id']);

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "bmi");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM registrations WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Redirect to the registration table view page
        header("Location:admin_registrations.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request. No user ID provided.";
}
?>
