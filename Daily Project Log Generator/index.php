<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Daily Project Log</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📋 Daily Project Log</h1>

<p>Enter today's project details</p>

<form action="process.php" method="POST">

<label>Project Name</label>

<input type="text"
name="project"
placeholder="Enter project name"
required>

<label>Work Completed</label>

<textarea name="work"
placeholder="Enter work completed"
required></textarea>

<label>Team Member</label>

<input type="text"
name="member"
placeholder="Enter team member"
required>

<button type="submit">
💾 Create Daily Log
</button>

</form>

</div>

</body>

</html>