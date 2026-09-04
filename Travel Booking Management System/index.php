<?php
session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <title>Travel Booking Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

```
<h1>✈️ Travel Booking Management System</h1>
<p class="subtitle">Book your journey easily and securely</p>

<form action="process.php" method="POST">

    <label>Customer Name</label>
    <input type="text" name="name" placeholder="Enter your name" required>

    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>

    <label>Phone Number</label>
    <input type="text" name="phone" placeholder="Enter phone number" required>

    <label>Destination</label>
    <select name="destination" required>
        <option value="">-- Select Destination --</option>
        <option value="Chennai">Chennai</option>
        <option value="Bangalore">Bangalore</option>
        <option value="Kerala">Kerala</option>
        <option value="Ooty">Ooty</option>
        <option value="Goa">Goa</option>
    </select>

    <label>Travel Date</label>
    <input type="date" name="travel_date" min="<?php echo date('Y-m-d'); ?>" required>

    <label>Number of Travelers</label>
    <input type="number" name="travelers" min="1" max="10" value="1" required>

    <label>Travel Type</label>
    <select name="travel_type" required>
        <option value="">-- Select Travel Type --</option>
        <option value="Bus">Bus</option>
        <option value="Train">Train</option>
        <option value="Flight">Flight</option>
    </select>

    <button type="submit" name="book">Book Now ✈️</button>

</form>
```

</div>

</body>
</html>
