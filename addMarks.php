<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Marks</title>
    <link rel="stylesheet" href="css/addMarks.css" />
</head>
<body>
    <div class="container">
        <h2 class="header"><span class="icon">📊</span>MARKS ENTRY</h2>
        <div class="form-section">
            <h3>New Marks Record</h3>
            <form id="marksForm" action="db/dbMarks.php" method="POST">
                <label>Student</label><br />
                <select id="student-id" name="studentID" required>
                    <?php
                    include 'db/connector.php';
                    $students = mysqli_query($conn, "SELECT studentID, CONCAT(firstname, ' ', lastname) AS fullname FROM studentsdetails");
                    while ($row = mysqli_fetch_assoc($students)) {
                        echo "<option value='{$row['studentID']}'>{$row['fullname']}</option>";
                    }
                    ?>
                </select><br />
                <label>Scores</label><br />
                <input type="number" id="scores" name="scores" required /><br />

                

                <label>Subject</label><br />
                <select id="subject-id" name="subjectID" required>
                    <?php
                    $subjects = mysqli_query($conn, "SELECT subjectID, Subjectname FROM subject");
                    while ($row = mysqli_fetch_assoc($subjects)) {
                        echo "<option value='{$row['subjectID']}'>{$row['Subjectname']}</option>";
                    }
                    ?>
                </select><br />

                <label>Term</label><br />
                <select id="term-id" name="termID" required>
                    <?php
                    $terms = mysqli_query($conn, "SELECT termID, termName FROM term");
                    while ($row = mysqli_fetch_assoc($terms)) {
                        echo "<option value='{$row['termID']}'>{$row['termName']}</option>";
                    }
                    ?>
                </select><br />

                <div class="form-buttons">
    <button type="submit" name="action" value="save" class="save">SAVE</button>
    <button type="submit" name="action" value="update" class="update">UPDATE</button>
    <button type="reset" class="clear">CLEAR</button>
</div>
            </form>
        </div>
    </div>
</body>
</html>
