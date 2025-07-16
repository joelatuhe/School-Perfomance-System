<?php
$host = "localhost";
$user = "root";
$password = "blessing";
$dbname = "studentperfomance";

$conn = mysqli_connect($host, $user, "", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
