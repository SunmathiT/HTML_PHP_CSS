<?php

$checkin = $_POST["checkin"] ?? "";
$checkout = $_POST["checkout"] ?? "";

if ($checkin != "" && $checkout != "") {

    $start = new DateTime($checkin);
    $end = new DateTime($checkout);

    if ($end >= $start) {

        $difference = $start->diff($end);

        $days = $difference->days;

        $message = "✅ Stay Duration Calculated!";
        $class = "success";

    } else {

        $message = "❌ Check-out date must be after check-in date!";
        $class = "error";

    }

} else {

    $message = "❌ Please select both dates!";
    $class = "error";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Stay Result</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🏨 Stay Duration</h1>

<div class="<?php echo $class; ?>">

<h2>
<?php echo $message; ?>
</h2>

<?php if (isset($days)) { ?>

<p>
📅 Check-in:
<strong>
<?php echo htmlspecialchars($checkin); ?>
</strong>
</p>

<p>
📅 Check-out:
<strong>
<?php echo htmlspecialchars($checkout); ?>
</strong>
</p>

<h3>
🛏️ Total Stay:
<?php echo $days; ?> Days
</h3>

<?php } ?>

</div>

<a href="index.php" class="button">
← Calculate Again
</a>

</div>

</body>

</html>