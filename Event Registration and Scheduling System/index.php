<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Event Registration</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🎉 Event Registration</h1>

<p>Register for an Upcoming Event</p>

<form action="process.php" method="POST">

<label>Participant Name</label>

<input type="text"
name="name"
placeholder="Enter your name"
required>

<label>Select Event</label>

<select name="event" required>

<option value="">Choose Event</option>

<option value="Tech Seminar">💻 Tech Seminar</option>

<option value="Coding Workshop">👨‍💻 Coding Workshop</option>

<option value="Project Expo">🚀 Project Expo</option>

</select>

<label>Event Date</label>

<input type="date"
name="date"
required>

<label>Event Time</label>

<input type="time"
name="time"
required>

<button type="submit">
🎟️ Register
</button>

</form>

<a href="process.php" class="button">
📅 View Event Schedule
</a>

</div>

</body>

</html>