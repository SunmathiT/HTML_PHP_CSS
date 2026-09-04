<?php

session_start();

$_SESSION["visits"]++;

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Page 3</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📑 Page 3</h1>

<div class="card">

<h2>📊 Visit Report</h2>

<p>You have visited:</p>

<h3><?php echo $_SESSION["visits"]; ?> pages</h3>

<p>during this session.</p>

</div>

<a href="index.php" class="button">
🏠 Back to Home
</a>

</div>

</body>

</html>