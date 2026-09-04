<?php

session_start();

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if ($username == "sunmathi0256@gmail.com" && $password == "1234") {

    $_SESSION["logged_in"] = true;
    $_SESSION["username"] = $username;

    setcookie(
        "exam_user",
        $username,
        time() + 3600,
        "/"
    );

    header("Location: exam.php");

    exit();

} else {

    $message = "❌ Invalid username or password!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login Error</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="error">

<h2><?php echo $message; ?></h2>

</div>

<a href="index.php" class="button">
← Try Again
</a>

</div>

</body>

</html>