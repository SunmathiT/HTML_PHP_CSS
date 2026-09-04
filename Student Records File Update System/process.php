<?php

$file = "students.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $course = $_POST["course"];

    $data = $id . "|" .
            $name . "|" .
            $course . "\n";

    file_put_contents(
        $file,
        $data,
        FILE_APPEND
    );

    $message = "✅ Student record added successfully!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Student Records</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🎓 Student Records</h1>

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

    foreach ($lines as $line) {

        $data = explode("|", trim($line));

        echo "<div class='card'>";

        echo "<h2>👨‍🎓 Student</h2>";

        echo "<p><b>ID:</b> " .
             htmlspecialchars($data[0]) .
             "</p>";

        echo "<p><b>Name:</b> " .
             htmlspecialchars($data[1]) .
             "</p>";

        echo "<p><b>Course:</b> " .
             htmlspecialchars($data[2]) .
             "</p>";

        echo "</div>";

    }

} else {

    echo "<p>No student records found.</p>";

}

?>

</div>

<a href="index.php" class="button">
← Add New Student
</a>

</div>

</body>

</html>