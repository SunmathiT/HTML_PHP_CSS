<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Student Records</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🎓 Student Records</h1>

<p>Enter Student Details</p>

<form action="process.php" method="POST">

<label>Student ID</label>

<input type="text"
name="id"
placeholder="Enter Student ID"
required>

<label>Student Name</label>

<input type="text"
name="name"
placeholder="Enter Student Name"
required>

<label>Course</label>

<input type="text"
name="course"
placeholder="Enter Course"
required>

<button type="submit">
💾 Save Student
</button>

</form>

<a href="process.php" class="button">
📋 View Records
</a>

</div>

</body>

</html>