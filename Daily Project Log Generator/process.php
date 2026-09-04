<?php

$project = $_POST["project"] ?? "";
$work = $_POST["work"] ?? "";
$member = $_POST["member"] ?? "";

$folder = "logs/";

if (!is_dir($folder)) {

    mkdir($folder, 0777, true);

}

$date = date("Y-m-d");

$time = date("h:i:s A");

$filename = $folder . "project_log_" . $date . ".txt";

$data =
"Project Name: " . $project . "\n" .
"Team Member: " . $member . "\n" .
"Date: " . $date . "\n" .
"Time: " . $time . "\n" .
"Work Completed: " . $work . "\n" .
"----------------------------------------\n";

file_put_contents(
    $filename,
    $data,
    FILE_APPEND
);

$message = "✅ Daily project log created successfully!";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Project Log Result</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📋 Project Log</h1>

<div class="success">

<h2><?php echo $message; ?></h2>

<p>
📁 File:
<strong>
<?php echo htmlspecialchars($filename); ?>
</strong>
</p>

<p>
📅 Date:
<strong>
<?php echo $date; ?>
</strong>
</p>

<p>
🕐 Time:
<strong>
<?php echo $time; ?>
</strong>
</p>

<p>
👨‍💻 Project:
<strong>
<?php echo htmlspecialchars($project); ?>
</strong>
</p>

<p>
👤 Team Member:
<strong>
<?php echo htmlspecialchars($member); ?>
</strong>
</p>

</div>

<a href="index.php" class="button">
← Create New Log
</a>

</div>

</body>

</html>