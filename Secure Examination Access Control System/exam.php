<?php

session_start();

if (!isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] != true) {

    header("Location: index.php");

    exit();

}

if (!isset($_COOKIE["exam_user"])) {

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

<title>Examination</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📝 Online Examination</h1>

<div class="success">

<h2>✅ Access Granted</h2>

<p>
Welcome,
<strong>
<?php echo htmlspecialchars($username); ?>
</strong>
</p>

<p>🔒 You are authorized to attend the examination.</p>

</div>

<div class="exam">

<h2>Question 1</h2>

<p>Which language is used for server-side web development?</p>

<label>
<input type="radio" name="q1"> PHP
</label>

<label>
<input type="radio" name="q1"> HTML
</label>

<label>
<input type="radio" name="q1"> CSS
</label>

<br>

<h2>Question 2</h2>

<p>Which function starts a PHP session?</p>

<label>
<input type="radio" name="q2"> session_start()
</label>

<label>
<input type="radio" name="q2"> start_session()
</label>

<br>

</div>

<a href="logout.php" class="button">
🚪 Logout
</a>

</div>

</body>

</html>