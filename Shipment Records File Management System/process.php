<?php

$folder = "shipments/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["shipment_id"];
    $customer = $_POST["customer"];
    $location = $_POST["location"];
    $product = $_POST["product"];

    $file = $folder . $location . ".txt";

    $data = $id . "|" .
            $customer . "|" .
            $location . "|" .
            $product . "\n";

    file_put_contents(
        $file,
        $data,
        FILE_APPEND
    );

    $message = "✅ Shipment record saved successfully!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Shipment Report</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📦 Shipment Management</h1>

<?php

if (isset($message)) {

    echo "<div class='success'>";
    echo $message;
    echo "</div>";

}

?>

<div class="records">

<?php

$files = glob($folder . "*.txt");

if (count($files) > 0) {

    foreach ($files as $file) {

        $lines = file($file);

        foreach ($lines as $line) {

            $data = explode("|", trim($line));

            echo "<div class='card'>";

            echo "<h2>📦 Shipment</h2>";

            echo "<p><b>ID:</b> " .
                 htmlspecialchars($data[0]) .
                 "</p>";

            echo "<p><b>Customer:</b> " .
                 htmlspecialchars($data[1]) .
                 "</p>";

            echo "<p><b>Location:</b> " .
                 htmlspecialchars($data[2]) .
                 "</p>";

            echo "<p><b>Product:</b> " .
                 htmlspecialchars($data[3]) .
                 "</p>";

            echo "</div>";
        }
    }

} else {

    echo "<p>No shipment records found.</p>";

}

?>

</div>

<a href="index.php" class="button">
← Add New Shipment
</a>

</div>

</body>

</html>