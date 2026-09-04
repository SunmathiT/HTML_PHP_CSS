<?php

$name = $_POST["name"];

$preference = $_POST["preference"];


// Check previous visit

if (isset($_COOKIE["visits"])) {

    $visits = $_COOKIE["visits"] + 1;

} else {

    $visits = 1;

}


// Store cookies

setcookie("customer_name", $name, time() + 86400 * 30);

setcookie("preference", $preference, time() + 86400 * 30);

setcookie("visits", $visits, time() + 86400 * 30);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Visit Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="welcome">

        <h1>
            🎉 Hello, <?php echo htmlspecialchars($name); ?>!
        </h1>

        <h2>Welcome Back 👋</h2>

        <p>
            This is your
            <strong><?php echo $visits; ?></strong>
            visit.
        </p>

    </div>


    <div class="preference">

        <h2>⭐ Your Preference</h2>

        <p>
            Favourite Colour:
            <strong><?php echo htmlspecialchars($preference); ?></strong>
        </p>

    </div>


    <div class="visit">

        <h2>🍪 Cookie Information</h2>

        <p>
            Your name and preference are stored using cookies.
        </p>

        <p>
            Total Visits:
            <strong><?php echo $visits; ?></strong>
        </p>

    </div>


    <a href="index.php" class="back">
        🔄 Visit Again
    </a>

</div>

</body>

</html>