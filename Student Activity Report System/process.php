<?php

session_start();

$file = "activity.txt";

if (!isset($_SESSION["activities"])) {
    $_SESSION["activities"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student = $_POST["student"];
    $activity = $_POST["activity"];

    $date = date("d-m-Y");

    $data = $student . "|" . $activity . "|" . $date . "\n";

    file_put_contents(
        $file,
        $data,
        FILE_APPEND
    );

    $_SESSION["activities"][] = $activity;

    $message = "✅ Activity added successfully!";
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

<h1>📊 Student Activity Report</h1>

<?php

if (isset($message)) {

    echo "<div class='success'>";
    echo $message;
    echo "</div>";

}

?>

<div class="report">

<?php

if (file_exists($file)) {

    $lines = file($file);

    foreach ($lines as $line) {

        $data = explode("|", trim($line));

        echo "<div class='card'>";

        echo "<h2>🎓 " .
             htmlspecialchars($data[0]) .
             "</h2>";

        echo "<p>📚 Activity: " .
             htmlspecialchars($data[1]) .
             "</p>";

        echo "<p>📅 Date: " .
             htmlspecialchars($data[2]) .
             "</p>";

        echo "</div>";

    }

} else {

    echo "<p>No activities found.</p>";

}

?>

</div>

<a href="index.php" class="button">
← Add New Activity
</a>

</div>

</body>

</html>