<!-- viewMarksContent.php -->
 <link rel="stylesheet" href="css/viewMarks.css">

<h2><span class="icon">📋</span> Student Marks</h2>
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Term</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db/connector.php';
            $sql = "SELECT 
                        CONCAT(s.firstname, ' ', s.lastname) AS studentName, 
                        sub.Subjectname, 
                        m.scores, 
                        t.termName
                    FROM marks m
                    JOIN studentsdetails s ON m.studentID = s.studentID
                    JOIN subject sub ON m.subjectID = sub.subjectID
                    JOIN term t ON m.termID = t.termID
                    ORDER BY m.scores DESC";

            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "<tr><td colspan='5'>Query Failed: " . mysqli_error($conn) . "</td></tr>";
            } elseif (mysqli_num_rows($result) > 0) {
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$count}</td>
                            <td>{$row['studentName']}</td>
                            <td>{$row['Subjectname']}</td>
                            <td>{$row['scores']}</td>
                            <td>{$row['termName']}</td>
                          </tr>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='5'>No marks found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
