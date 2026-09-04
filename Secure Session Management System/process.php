<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username == "admin" && $password == "1234") {

        session_regenerate_id(true);

        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;

        if (isset($_POST["remember"])) {

            setcookie(
                "remember_user",
                $username,
                time() + 86400,
                "/"
            );

        }

        $message = "✅ Login Successful!";
        $class = "success";

    } else {

        $message = "❌ Invalid username or password!";
        $class = "error";

    }

} elseif (isset($_COOKIE["remember_user"])) {

    $username = $_COOKIE["remember_user"];

    $_SESSION["username"] = $username;
    $_SESSION["logged_in"] = true;

    $message = "🍪 Logged in using Cookie!";
    $class = "success";

} else {

    $message = "❌ Please login first!";
    $class = "error";

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

<h1>🔐 Login Management</h1>

<div class="<?php echo $class; ?>">

<h2>
<?php echo $message; ?>
</h2>

<?php if (isset($_SESSION["logged_in"]) &&
          $_SESSION["logged_in"] == true) { ?>

<p>
👤 User:
<strong>
<?php echo htmlspecialchars($_SESSION["username"]); ?>
</strong>
</p>

<p>
🔒 Authentication:
<strong>Session Based</strong>
</p>

<p>
🍪 Cookie:
<strong>Remember Me Enabled</strong>
</p>

<?php } ?>

</div>

<a href="index.php" class="button">
← Back to Login
</a>

</div>

</body>

</html>