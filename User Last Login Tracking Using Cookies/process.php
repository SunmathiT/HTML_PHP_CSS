<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];

    if (isset($_COOKIE["last_login"])) {

        $lastLogin = $_COOKIE["last_login"];

    } else {

        $lastLogin = "This is your first login";

    }

    $currentTime = date("d-m-Y h:i:s A");

    setcookie(
        "last_login",
        $currentTime,
        time() + 86400,
        "/"
    );

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login Result</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🎉 Welcome!</h1>

<div class="result">

<h2>
Hello,
<?php echo htmlspecialchars($username); ?> 👋
</h2>

<p>
🕐 Last Login:
</p>

<h3>
<?php echo htmlspecialchars($lastLogin); ?>
</h3>

<p>
📅 Current Login:
</p>

<h3>
<?php echo $currentTime; ?>
</h3>

</div>

<a href="index.php" class="button">
← Back to Login
</a>

</div>

</body>

</html>