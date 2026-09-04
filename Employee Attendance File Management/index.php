<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Employee Attendance</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>👨‍💼 Employee Attendance</h1>

<p>Enter Employee Attendance Details</p>

<form action="process.php" method="POST">

<label>Employee ID</label>

<input type="text"
name="empid"
placeholder="Enter Employee ID"
required>

<label>Employee Name</label>

<input type="text"
name="name"
placeholder="Enter Employee Name"
required>

<label>Date</label>

<input type="date"
name="date"
required>

<label>Attendance</label>

<select name="attendance" required>

<option value="">Select Attendance</option>

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

<button type="submit">
💾 Save Attendance
</button>

</form>

<br>

<a href="process.php" class="button">
📋 View Attendance
</a>

</div>

</body>

</html>