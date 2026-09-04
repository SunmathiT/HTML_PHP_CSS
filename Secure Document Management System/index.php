<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Secure Document Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🔐 Secure Document Management</h1>

<p>Upload and manage your documents securely</p>

<form action="process.php"
method="POST"
enctype="multipart/form-data">

<label>Document Name</label>

<input type="text"
name="docname"
placeholder="Enter document name"
required>

<label>Select Document</label>

<input type="file"
name="document"
accept=".pdf,.doc,.docx,.txt"
required>

<button type="submit">
📤 Upload Securely
</button>

</form>

<a href="process.php?view=1" class="button">
📂 View Documents
</a>

</div>

</body>

</html>