<?php

$category = $_POST["category"] ?? "";

$allowed = array(
    "academic",
    "financial",
    "project"
);

if (!in_array($category, $allowed)) {
    $category = "";
}

$folder = $category . "/";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Available Reports</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📂 Available Reports</h1>

<?php

if ($category != "" && is_dir($folder)) {

    $files = scandir($folder);

    $found = false;

    foreach ($files as $file) {

        if ($file != "." && $file != "..") {

            $found = true;

            $filePath = $folder . $file;

            echo "<div class='card'>";

            echo "<h2>📄 " .
                 htmlspecialchars($file) .
                 "</h2>";

            echo "<a class='view'
                  href='" .
                  htmlspecialchars($filePath) .
                  "' target='_blank'>
                  👁️ Access Report
                  </a>";

            echo "</div>";
        }
    }

    if (!$found) {

        echo "<div class='error'>";
        echo "❌ No reports available!";
        echo "</div>";

    }

} else {

    echo "<div class='error'>";
    echo "❌ Invalid report category!";
    echo "</div>";

}

?>

<a href="index.php" class="button">
← Back to Reports
</a>

</div>

</body>

</html>