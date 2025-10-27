<?php
mysqli_report(MYSQLI_REPORT_OFF); // It disables MySQLi exceptions to handle errors manually

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'student_db';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>