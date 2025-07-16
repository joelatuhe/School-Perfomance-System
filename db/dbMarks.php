<?php
// db/dbMarks.php

include 'connector.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data and sanitize/validate as needed
    $scores = isset($_POST['scores']) ? intval($_POST['scores']) : 0;
    $studentID = isset($_POST['studentID']) ? intval($_POST['studentID']) : 0;
    $subjectID = isset($_POST['subjectID']) ? intval($_POST['subjectID']) : 0;
    $termID = isset($_POST['termID']) ? intval($_POST['termID']) : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $markID = isset($_POST['markID']) ? intval($_POST['markID']) : 0; // for updates

    if ($scores && $studentID && $subjectID && $termID) {
        if ($action === 'save') {
            // Insert new mark
            $sql = "INSERT INTO marks (scores, studentID, subjectID, termID) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "iiii", $scores, $studentID, $subjectID, $termID);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: ../addMarks.php?msg=success");
                    exit();
                } else {
                    echo "Error saving record: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare insert statement: " . mysqli_error($conn);
            }
        } elseif ($action === 'update' && $markID > 0) {
            // Update existing mark
            $sql = "UPDATE marks SET scores = ?, studentID = ?, subjectID = ?, termID = ? WHERE markID = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "iiiii", $scores, $studentID, $subjectID, $termID, $markID);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: ../addMarks.php?msg=updated");
                    exit();
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare update statement: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid action or missing mark ID for update.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
