<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $product = $_POST["product"];

    $_SESSION["username"] = $username;

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $_SESSION["cart"][] = $product;

    if (!isset($_SESSION["history"])) {
        $_SESSION["history"] = array();
    }

    $_SESSION["history"][] = $product;

    setcookie(
        "username",
        $username,
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

<title>Shopping Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🛒 Shopping Dashboard</h1>

<div class="card">

<h2>
Welcome,
<?php echo htmlspecialchars($_SESSION["username"]); ?> 👋
</h2>

<p>✅ Login Status: Active</p>

</div>

<div class="card">

<h2>🛍️ Shopping Cart</h2>

<?php

foreach ($_SESSION["cart"] as $item) {

    echo "<p>🛒 " .
         htmlspecialchars($item) .
         "</p>";

}

?>

</div>

<div class="card">

<h2>🕘 Browsing History</h2>

<?php

foreach ($_SESSION["history"] as $item) {

    echo "<p>👀 " .
         htmlspecialchars($item) .
         "</p>";

}

?>

</div>

<a href="index.php" class="button">
← Continue Shopping
</a>

</div>

</body>

</html>