<?php

session_start();

if (!isset($_SESSION["visits"])) {
    $_SESSION["visits"] = 0;
}

$_SESSION["visits"]++;

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Visitor Tracking</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🌐 Visitor Session Tracking</h1>

<div class="card">

<h2>🏠 Home Page</h2>

<p>You have visited</p>

<h3><?php echo $_SESSION["visits"]; ?> pages</h3>

<p>in this browsing session.</p>

</div>

<a href="page2.php" class="button">
➡️ Visit Page 2
</a>

</div>

</body>

</html>