<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>User Activity Log</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📊 User Activity System</h1>

<p>Login and File Access Tracking</p>

<form action="process.php" method="POST">

<label>Username</label>

<input type="text"
name="username"
placeholder="Enter username"
required>

<label>Select File</label>

<select name="file" required>

<option value="">Choose File</option>

<option value="report.txt">📄 Report</option>

<option value="notes.txt">📝 Notes</option>

</select>

<button type="submit">
🔐 Login & Access File
</button>

</form>

<a href="process.php?report=1" class="button">
📈 View Activity Report
</a>

</div>

</body>

</html>