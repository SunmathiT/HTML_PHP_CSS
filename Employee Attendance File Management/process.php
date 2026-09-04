<?php

$file = "attendance.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $empid = $_POST["empid"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $attendance = $_POST["attendance"];

    $data = $empid . "|" .
            $name . "|" .
            $date . "|" .
            $attendance . "\n";

    file_put_contents(
        $file,
        $data,
        FILE_APPEND
    );

    $message = "✅ Attendance saved successfully!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Attendance Records</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📋 Attendance Records</h1>

<?php

if (isset($message)) {

echo "<div class='success'>";
echo $message;
echo "</div>";

}

?>

<div class="records">

<?php

if (file_exists($file)) {

    $lines = file($file);

    if (count($lines) > 0) {

        foreach ($lines as $line) {

            $data = explode("|", trim($line));

            echo "<div class='card'>";

            echo "<h2>👨‍💼 Employee</h2>";

            echo "<p><b>ID:</b> " .
                 htmlspecialchars($data[0]) .
                 "</p>";

            echo "<p><b>Name:</b> " .
                 htmlspecialchars($data[1]) .
                 "</p>";

            echo "<p><b>Date:</b> " .
                 htmlspecialchars($data[2]) .
                 "</p>";

            echo "<p><b>Attendance:</b> " .
                 htmlspecialchars($data[3]) .
                 "</p>";

            echo "</div>";

        }

    } else {

        echo "<p>No attendance records found.</p>";

    }

} else {

    echo "<p>No attendance records found.</p>";

}

?>

</div>

<a href="index.php" class="button">
← Back
</a>

</div>

</body>

</html>