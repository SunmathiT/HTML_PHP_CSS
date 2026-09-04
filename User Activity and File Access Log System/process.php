<?php

session_start();

$loginFile = "login.txt";
$accessFile = "access.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $file = $_POST["file"];

    $_SESSION["username"] = $username;
    $_SESSION["logged_in"] = true;

    setcookie(
        "last_user",
        $username,
        time() + 86400,
        "/"
    );

    $dateTime = date("d-m-Y h:i:s A");

    $loginData =
        $username . " | " .
        $dateTime . "\n";

    file_put_contents(
        $loginFile,
        $loginData,
        FILE_APPEND
    );

    $accessData =
        $username . " | " .
        $file . " | " .
        $dateTime . "\n";

    file_put_contents(
        $accessFile,
        $accessData,
        FILE_APPEND
    );

    $message =
        "✅ Login and file access recorded!";

    $class = "success";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Activity Report</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📊 User Activity Report</h1>

<?php

if (isset($message)) {

    echo "<div class='success'>";
    echo $message;
    echo "</div>";

}

?>

<?php

if (isset($_GET["report"])) {

    echo "<div class='report'>";

    echo "<h2>🔐 Login History</h2>";

    if (file_exists($loginFile)) {

        $logins = file($loginFile);

        foreach ($logins as $login) {

            echo "<div class='card'>";
            echo "👤 " .
                 htmlspecialchars($login);
            echo "</div>";

        }

    } else {

        echo "<p>No login history available.</p>";

    }

    echo "<h2>📂 File Access History</h2>";

    if (file_exists($accessFile)) {

        $accesses = file($accessFile);

        foreach ($accesses as $access) {

            echo "<div class='card'>";
            echo "📄 " .
                 htmlspecialchars($access);
            echo "</div>";

        }

    } else {

        echo "<p>No file access history available.</p>";

    }

    echo "</div>";

}

?>

<a href="index.php" class="button">
← Back to Login
</a>

</div>

</body>

</html>