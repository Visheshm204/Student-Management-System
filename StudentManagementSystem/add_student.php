<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Student - Student Management System</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="header"><h1>Add New Student</h1></div>

    <nav>
      <a href="index.php">Home</a> |
      <a href="view_students.php">View Students</a> |
      <a href="about.php">About</a>
    </nav>

    <p>Please fill in all required fields carefully before submitting the form.</p>

    <form method="post" action="insert_student.php">
      <label>Name *</label>
      <input type="text" name="name" id="name" required>

      <label>Registration Number *</label>
      <input type="number" name="reg_no" id="reg_no" required>

      <label>Class *</label>
      <input type="text" name="class" id="class" required>

      <label>Section *</label>
      <input type="text" name="section" id="section" required>

      <label>Email *</label>
      <input type="email" name="email" id="email" placeholder="example@domain.com/pk" required>

      <label>Phone *</label>
      <input type="tel" name="phone" id="phone"
       placeholder="03XXXXXXXXX"
       pattern="^03[0-9]{9}$"
       required>

      <br><br>
      <button type="submit">Add Student</button>
    </form>

    <div class="footer">Student Management System — Add Student Page</div>

  </div>
</body>
</html>