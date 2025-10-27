<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
    {
        header('Location: view_students.php');
        exit;
    }

$id = intval($_POST['id'] ?? 0);
$name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
$reg = mysqli_real_escape_string($conn, trim($_POST['reg_no'] ?? ''));
$class = mysqli_real_escape_string($conn, trim($_POST['class'] ?? ''));
$section = mysqli_real_escape_string($conn, trim($_POST['section'] ?? ''));
$email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
$phone = mysqli_real_escape_string($conn, trim($_POST['phone'] ?? ''));

// validation
if ($id <= 0 || $name === '' || $reg === '' || $class === '' || $section === '' || $email === '' || $phone === '') 
    {
        echo "<div style='width:900px;margin:30px auto;font-family:Times New Roman;'>";
        echo "<div class='err'>Please fill required fields.</div>";
        echo "<p><a href='edit_student.php?id=" . htmlspecialchars($id) . "' class='small-link'>&laquo; Back</a></p>";
        echo "</div>";
        exit;
    }

$sql = "UPDATE students SET name='$name', reg_no='$reg', class='$class', section='$section', email='$email', phone='$phone' WHERE id = $id";
if (mysqli_query($conn, $sql)) 
    {
        header('Location: view_students.php');
        exit;
    } 
else 
    {
        echo "<div style='width:900px;margin:30px auto;font-family:Times New Roman;'>";
        echo "<div class='err'>DB error: " . htmlspecialchars(mysqli_error($conn)) . "</div>";
        echo "<p><a href='edit_student.php?id=" . htmlspecialchars($id) . "' class='small-link'>&laquo; Back</a></p>";
        echo "</div>";
    }
?>
