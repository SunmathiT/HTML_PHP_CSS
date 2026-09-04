<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Secure Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🔐 Secure Login</h1>

<p>Session & Cookie Authentication</p>

<form action="process.php" method="POST">

<label>Username</label>

<input type="text"
name="username"
placeholder="Enter username"
required>

<label>Password</label>

<input type="password"
name="password"
placeholder="Enter password"
required>

<label class="remember">

<input type="checkbox"
name="remember">

Remember Me

</label>

<button type="submit">
🚀 Login
</button>

</form>

</div>

</body>

</html>