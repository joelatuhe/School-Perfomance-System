<?php
// Include database connection
require_once 'connector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $firstname = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $lastname = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $gender = isset($_POST['sex']) ? trim($_POST['sex']) : '';
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0;

    // Basic validation
    if ($firstname === '' || $lastname === '' || $gender === '' || $age <= 0) {
        echo "Invalid input. Please fill all fields correctly.";
        exit;
    }

    // Prepare and execute insert statement
    $stmt = $conn->prepare("INSERT INTO studentsdetails (firstname, lastname, gender, age) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('sssi', $firstname, $lastname, $gender, $age);

    if ($stmt->execute()) {
        echo "Student added successfully.";
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
