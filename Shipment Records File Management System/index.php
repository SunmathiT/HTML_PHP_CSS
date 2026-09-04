<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Shipment Records</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📦 Shipment Records</h1>

<p>Enter Shipment Details</p>

<form action="process.php" method="POST">

<label>Shipment ID</label>

<input type="text"
name="shipment_id"
placeholder="Enter Shipment ID"
required>

<label>Customer Name</label>

<input type="text"
name="customer"
placeholder="Enter Customer Name"
required>

<label>Location</label>

<select name="location" required>

<option value="">Select Location</option>

<option value="chennai">Chennai</option>

<option value="bangalore">Bangalore</option>

<option value="mumbai">Mumbai</option>

</select>

<label>Product</label>

<input type="text"
name="product"
placeholder="Enter Product"
required>

<button type="submit">
📦 Save Shipment
</button>

</form>

<a href="process.php" class="button">
📋 View Shipments
</a>

</div>

</body>

</html>