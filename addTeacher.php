<?php 
// Include DB connection
require_once 'db/connector.php';

// Fetch student records
$query = "SELECT teacherName, Gender, Telephone FROM teacherresponsible";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="css/addStudent.css">
</head>
<body>
    <div class="container">
        <h2 class="header"><span class="icon">👥</span>TEACHER</h2>
        <div class="main">
            <!-- Left: Form -->
            <div class="form-section">
                <h3>New Teacher</h3>
                <form id="employeeForm" action="db/dbTeacher.php" method="POST">
                    <label>Teacher Name</label><br>
                    <input type="text" id="teacher-name" name="teacher-name"><br>

                    <label>Sex</label><br>
                    <select id="sex" name="sex">
                        <option>MALE</option>
                        <option>FEMALE</option>
                    </select><br>

                    <label>Telephone</label><br>
                    <input type="tel" id="telephone" name="telephone"><br>

                    <div class="form-buttons">
                        <button type="submit" class="save">SAVE</button>
                        <button type="button" class="update">UPDATE</button>
                        <button type="reset" class="clear">CLEAR</button>
                    </div>
                </form>
            </div>

            <!-- RIGHT: TABLE -->
      <div class="table-section">
        <div class="top-controls">
          <label><strong>📋 TEACHER LIST</strong></label>
          <div>
            <input type="text" placeholder="Search...">
            <button class="search">🔍</button>
          </div>
        </div>

        <!-- DYNAMIC TABLE -->
        <table>
          <thead>
            <tr>
              <th>Select</th>
              <th>Teacher Name</th>
              <th>Gender</th>
              <th>Telephone</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <!-- Checkbox with student data -->
                  <td>
                    <input type="checkbox" class="row-check"
                      data-first="<?= htmlspecialchars($row['teacherName']); ?>"
                      data-last="<?= htmlspecialchars($row['Gender']); ?>"
                      data-gender="<?= htmlspecialchars($row['Telephone']); ?>"
                    >
                  </td>
                  <td><?= htmlspecialchars($row['teacherName']); ?></td>
                  <td><?= htmlspecialchars($row['Gender']); ?></td>
                  <td><?= htmlspecialchars($row['Telephone']); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" style="text-align:center;">No records found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>


        </div>
    </div>

    <script src="js/addStudent.js"></script>
</body>
</html>
