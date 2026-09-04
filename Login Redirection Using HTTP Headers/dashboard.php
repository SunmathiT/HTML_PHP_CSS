<?php

session_start();

if (!isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] != true) {

    header("Location: index.php");

    exit();

}

$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🏠 Dashboard</h1>

<div class="success">

<h2>✅ Login Successful!</h2>

<p>
Welcome,
<strong>
<?php echo htmlspecialchars($username); ?>
</strong>
</p>

<p>🔓 You are an authenticated user.</p>

</div>

<a href="index.php" class="button">
🚪 Logout
</a>

</div>

</body>

</html>