<?php
require 'db_connect.php';

$search = trim($_GET['search'] ?? '');

if ($search !== '') 
  {
    $s = mysqli_real_escape_string($conn, "%$search%");
    $sql = "SELECT id, name, reg_no, class, section, email, phone FROM students
            WHERE name LIKE '$s' OR reg_no LIKE '$s' ORDER BY id DESC";
  } 
else 
  {
    $sql = "SELECT id, name, reg_no, class, section, email, phone FROM students ORDER BY id DESC";
  }

$res = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header"><h1>Students</h1></div>

    <nav>
      <a href="index.php">Home</a> |
      <a href="add_student.php">Add Student</a> |
      <a href="about.php">About</a>
    </nav>

    <div class="search-box">
      <form method="get" action="view_students.php">
        <input type="text" name="search" placeholder="Search by name or reg no" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <?php if($search !== ''): ?>
          <a href="view_students.php" style="margin-left:10px;" class="small-link">Clear</a>
        <?php endif; ?>
      </form>
    </div>

    <?php if (!$res || mysqli_num_rows($res) === 0): ?>
      <p>No students found.</p>
    <?php else: ?>
      <table class="table">
        <tr>
          <th>ID</th><th>Name</th><th>Registration No</th><th>Class</th><th>Section</th><th>Email</th><th>Phone</th><th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
       
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['reg_no']); ?></td>
            <td><?php echo htmlspecialchars($row['class']); ?></td>
            <td><?php echo htmlspecialchars($row['section']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td>
             <a href="edit_student.php?id=<?= $row['id']; ?>">Edit</a> |
              <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?');">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php endif; ?>

    <div class="footer">Student Management System</div>
  </div>
</body>
</html>
