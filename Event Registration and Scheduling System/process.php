<?php

session_start();

$file = "events.txt";

if (!isset($_SESSION["registrations"])) {
    $_SESSION["registrations"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $event = $_POST["event"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $formattedDate = date("d-m-Y", strtotime($date));

    $formattedTime = date("h:i A", strtotime($time));

    $data = $name . "|" .
            $event . "|" .
            $formattedDate . "|" .
            $formattedTime . "\n";

    file_put_contents(
        $file,
        $data,
        FILE_APPEND
    );

    $_SESSION["registrations"][] = $event;

    $message = "✅ Event registration successful!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Event Schedule</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📅 Event Schedule</h1>

<?php

if (isset($message)) {

    echo "<div class='success'>";
    echo $message;
    echo "</div>";

}

?>

<div class="events">

<?php

if (file_exists($file)) {

    $lines = file($file);

    foreach ($lines as $line) {

        $data = explode("|", trim($line));

        if (count($data) >= 4) {

            echo "<div class='card'>";

            echo "<h2>🎉 " .
                 htmlspecialchars($data[1]) .
                 "</h2>";

            echo "<p>👤 Participant: " .
                 htmlspecialchars($data[0]) .
                 "</p>";

            echo "<p>📅 Date: " .
                 htmlspecialchars($data[2]) .
                 "</p>";

            echo "<p>⏰ Time: " .
                 htmlspecialchars($data[3]) .
                 "</p>";

            echo "</div>";

        }

    }

} else {

    echo "<p>No events registered yet.</p>";

}

?>

</div>

<a href="index.php" class="button">
← Register Another Event
</a>

</div>

</body>

</html>