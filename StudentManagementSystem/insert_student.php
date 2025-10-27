<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
    {
        header('Location: add_student.php');
        exit;
    }

$name = trim($_POST['name'] ?? '');
$reg  = trim($_POST['reg_no'] ?? '');
$class = trim($_POST['class'] ?? '');
$section = trim($_POST['section'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');

// It is doing server-side validation
$errors = [];
if ($name === '' || $reg === '' || $class === '' || $section === '' || $email === '' || $phone === '') 
    {
        $errors[] = "Please fill all required fields.";
    }
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $errors[] = "Email is not valid.";
    }

if (!empty($errors)) {
    echo "<div style='width:900px;margin:30px auto;font-family:Times New Roman;'>";
    echo "<div class='err'>" . implode("<br>", $errors) . "</div>";
    echo "<p><a href='add_student.php' class='small-link'>&laquo; Back to add form</a></p>";
    echo "</div>";
    exit;
}

$sql = "INSERT INTO students (name, reg_no, class, section, email, phone)
        VALUES ('$name', '$reg', '$class', '$section', '$email', '$phone')";

if (mysqli_query($conn, $sql)) 
    {
        header('Location: view_students.php');
        exit;
    } 
else 
    {
        $err = mysqli_error($conn);

        echo "<div style='width:900px;margin:30px auto;font-family:Times New Roman;'>";

        if (str_contains($err, 'roll_no')) 
            {
                echo "<div class='err'>This registration number already exists.</div>";
            } 
        elseif (str_contains($err, 'email')) 
            {
                echo "<div class='err'>This email address is already registered.</div>";
            } 
        elseif (str_contains($err, 'phone')) 
            {
                echo "<div class='err'>This phone number is already registered.</div>";
            } 
        else 
            {
                echo "<div class='err'>An unexpected error occurred. Please try again.</div>";
            }

        echo "<p><a href='add_student.php' class='small-link'>&laquo; Back to add form</a></p>";
        echo "</div>";
}
?>