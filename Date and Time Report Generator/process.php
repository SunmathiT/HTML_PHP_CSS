<?php

$name = $_POST["name"] ?? "Guest";

$currentDate = date("d-m-Y");

$currentTime = date("h:i:s A");

$fullDate = date("l, F d, Y");

$shortDate = date("d/m/Y");

$time24 = date("H:i:s");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Date Time Report</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📊 Date & Time Report</h1>

<div class="report">

<h2>👋 Hello, <?php echo htmlspecialchars($name); ?>!</h2>

<div class="card">

<p>📅 Current Date</p>

<h3><?php echo $currentDate; ?></h3>

</div>

<div class="card">

<p>🕐 Current Time</p>

<h3><?php echo $currentTime; ?></h3>

</div>

<div class="card">

<p>📆 Full Date Format</p>

<h3><?php echo $fullDate; ?></h3>

</div>

<div class="card">

<p>📅 Short Date Format</p>

<h3><?php echo $shortDate; ?></h3>

</div>

<div class="card">

<p>⏰ 24-Hour Time Format</p>

<h3><?php echo $time24; ?></h3>

</div>

</div>

<a href="index.php" class="button">
← Generate Again
</a>

</div>

</body>

</html>