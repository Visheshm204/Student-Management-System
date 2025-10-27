<?php
require 'db_connect.php';

$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    $id_safe = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM students WHERE id = $id_safe";
    mysqli_query($conn, $sql);
}
header('Location: view_students.php');
exit;