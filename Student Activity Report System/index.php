<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Student Activity Report</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🎓 Student Activity Report</h1>

<p>Enter Student Activity Details</p>

<form action="process.php" method="POST">

<label>Student Name</label>

<input type="text"
name="student"
placeholder="Enter student name"
required>

<label>Activity</label>

<input type="text"
name="activity"
placeholder="Enter activity"
required>

<button type="submit">
📚 Add Activity
</button>

</form>

<a href="process.php" class="button">
📊 View Activity Report
</a>

</div>

</body>

</html>