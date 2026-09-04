<?php

session_start();

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if ($username == "sunmathi0256@gmail.com" && $password == "1234") {

    session_regenerate_id(true);

    $_SESSION["logged_in"] = true;
    $_SESSION["username"] = $username;

    header("Location: records.php");

    exit();

} else {

    $message = "❌ Unauthorized Login!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Access Denied</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="error">

<h2><?php echo $message; ?></h2>

<p>Invalid username or password.</p>

</div>

<a href="index.php" class="button">
← Try Again
</a>

</div>

</body>

</html>