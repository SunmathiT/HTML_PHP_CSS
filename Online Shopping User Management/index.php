<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Shopping</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>🛒 Online Shopping</h1>

<p>Login and manage your shopping cart</p>

<form action="process.php" method="POST">

<input type="text"
name="username"
placeholder="Enter Username"
required>

<select name="product" required>

<option value="">Select Product</option>
<option value="Laptop">💻 Laptop</option>
<option value="Headphones">🎧 Headphones</option>
<option value="Smart Watch">⌚ Smart Watch</option>

</select>

<button type="submit">
🛍️ Login & Add Product
</button>

</form>

</div>

</body>

</html>