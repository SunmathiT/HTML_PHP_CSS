<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Hotel Stay Calculator</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🏨 Hotel Stay Calculator</h1>

<p>Calculate Your Stay Duration</p>

<form action="process.php" method="POST">

<label>Check-in Date</label>

<input type="date"
name="checkin"
required>

<label>Check-out Date</label>

<input type="date"
name="checkout"
required>

<button type="submit">
🧮 Calculate Stay
</button>

</form>

</div>

</body>

</html>