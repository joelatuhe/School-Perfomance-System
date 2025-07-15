<?php
// Include database connection
require_once 'connector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $teachername = isset($_POST['teacher-name']) ? trim($_POST['teacher-name']) : '';
    $gender = isset($_POST['sex']) ? trim($_POST['sex']) : '';
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';

    // Basic validation
    if ($teachername === '' || $gender === '' || $telephone === '') {
        echo "Invalid input. Please fill all fields correctly.";
        exit;
    }

    // Prepare and execute insert statement
    $stmt = $conn->prepare("INSERT INTO teacherResponsible(teacherName, Gender, Telephone) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $teachername, $gender, $telephone);

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
