<?php
require 'db_connect.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: view_students.php');
    exit;
}


  $sql = "SELECT id, name, reg_no, class, section, email, phone FROM students WHERE id = $id LIMIT 1";
  $res = mysqli_query($conn, $sql);
 
  $student = mysqli_fetch_assoc($res);

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Student</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="header"><h1>Edit Student</h1></div>

    <nav>
      <a href="index.php">Home</a> |
      <a href="view_students.php">View Students</a>
    </nav>

    <form method="post" action="update_student.php">
      <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

      <label>Name *</label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

      <label>Registration Number *</label>
      <input type="text" name="reg_no" value="<?php echo htmlspecialchars($student['reg_no']); ?>" required>

      <label>Class *</label>
      <input type="text" name="class" value="<?php echo htmlspecialchars($student['class']); ?>" required>

      <label>Section *</label>
      <input type="text" name="section" value="<?php echo htmlspecialchars($student['section']); ?>" required>

      <label>Email *</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>

      <label>Phone *</label>
      <input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>

      <br><br>
      <button name='submit' type="submit">Update Student</button>
    </form>
  </div>
</body>
</html>