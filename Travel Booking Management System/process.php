<?php
session_start();

if (isset($_POST["book"])) {

    // Get customer details
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Get booking details
    $destination = $_POST["destination"];
    $travel_date = $_POST["travel_date"];
    $travelers = $_POST["travelers"];
    $travel_type = $_POST["travel_type"];

    // Generate booking ID
    $booking_id = "TRV" . rand(1000, 9999);

    // Store customer details in session
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $phone;

    // Store booking details in session
    $_SESSION["booking_id"] = $booking_id;
    $_SESSION["destination"] = $destination;
    $_SESSION["travel_date"] = $travel_date;
    $_SESSION["travelers"] = $travelers;
    $_SESSION["travel_type"] = $travel_type;

    // Save customer information to file
    $customerData =
        "Name: $name | Email: $email | Phone: $phone" . PHP_EOL;

    file_put_contents(
        "customers.txt",
        $customerData,
        FILE_APPEND
    );

    // Save booking information to file
    $bookingData =
        "Booking ID: $booking_id | " .
        "Name: $name | " .
        "Destination: $destination | " .
        "Date: $travel_date | " .
        "Travelers: $travelers | " .
        "Travel Type: $travel_type" . PHP_EOL;

    file_put_contents(
        "bookings.txt",
        $bookingData,
        FILE_APPEND
    );

} else {

    header("Location: index.php");
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Booking Confirmation</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="confirmation">

    <h1>✈️ Booking Confirmation</h1>

    <div class="success">
        ✅ Booking Successful!
    </div>

    <div class="details">

        <p>
            <strong>Booking ID:</strong>
            <?php echo $_SESSION["booking_id"]; ?>
        </p>

        <p>
            <strong>Customer Name:</strong>
            <?php echo htmlspecialchars($_SESSION["name"]); ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo htmlspecialchars($_SESSION["email"]); ?>
        </p>

        <p>
            <strong>Phone:</strong>
            <?php echo htmlspecialchars($_SESSION["phone"]); ?>
        </p>

        <p>
            <strong>Destination:</strong>
            <?php echo htmlspecialchars($_SESSION["destination"]); ?>
        </p>

        <p>
            <strong>Travel Date:</strong>
            <?php
            echo date(
                "d-m-Y",
                strtotime($_SESSION["travel_date"])
            );
            ?>
        </p>

        <p>
            <strong>Number of Travelers:</strong>
            <?php echo $_SESSION["travelers"]; ?>
        </p>

        <p>
            <strong>Travel Type:</strong>
            <?php echo htmlspecialchars($_SESSION["travel_type"]); ?>
        </p>

    </div>

    <div class="message">
        🎉 Thank you for booking with us!<br>
        Have a safe and happy journey.
    </div>

    <a href="index.php" class="back-button">
        ← New Booking
    </a>

</div>

</body>
</html>