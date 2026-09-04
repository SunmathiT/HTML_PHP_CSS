<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Report File Access</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📊 Report File Access</h1>

<p>Select a report folder</p>

<form action="process.php" method="POST">

<label>Report Category</label>

<select name="category" required>

<option value="">Select Category</option>

<option value="academic">🎓 Academic</option>

<option value="financial">💰 Financial</option>

<option value="project">📁 Project</option>

</select>

<button type="submit">
📂 View Reports
</button>

</form>

</div>

</body>

</html>