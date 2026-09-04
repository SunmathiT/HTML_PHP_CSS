<?php

session_start();

if (!isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true) {

    header("Location: index.php");

    exit();

}

$folder = "medical_records/";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Medical Records</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🏥 Medical Records</h1>

<div class="success">

<h2>✅ Authorized Access</h2>

<p>
Welcome Dr.
<strong>
<?php echo htmlspecialchars($_SESSION["username"]); ?>
</strong>
</p>

</div>

<h2>📂 Available Records</h2>

<?php

if (is_dir($folder)) {

    $files = scandir($folder);

    $found = false;

    foreach ($files as $file) {

        if ($file == "." || $file == "..") {
            continue;
        }

        $extension = strtolower(
            pathinfo(
                $file,
                PATHINFO_EXTENSION
            )
        );

        $allowed = array(
            "pdf",
            "txt",
            "doc",
            "docx"
        );

        if (in_array($extension, $allowed)) {

            $found = true;

            echo "<div class='card'>";

            echo "<h3>📄 " .
                 htmlspecialchars($file) .
                 "</h3>";

            echo "<a class='view'
                  href='medical_records/" .
                  rawurlencode($file) .
                  "' target='_blank'>
                  👁️ View Record
                  </a>";

            echo "</div>";

        }

    }

    if (!$found) {

        echo "<p>No medical records available.</p>";

    }

}

?>

<a href="logout.php" class="button">
🚪 Logout
</a>

</div>

</body>

</html>