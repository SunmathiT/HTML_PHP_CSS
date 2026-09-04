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

<title>Page 2</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📄 Page 2</h1>

<div class="card">

<h2>👤 Session Tracking</h2>

<p>Total Pages Visited:</p>

<h3><?php echo $_SESSION["visits"]; ?></h3>

</div>

<a href="page3.php" class="button">
➡️ Visit Page 3
</a>

<a href="index.php" class="button">
🏠 Home
</a>

</div>

</body>

</html>