<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Resume Upload</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📄 Resume Upload</h1>

<p>Upload your resume for job application</p>

<form action="process.php"
method="POST"
enctype="multipart/form-data">

<label>Applicant Name</label>

<input type="text"
name="name"
placeholder="Enter your name"
required>

<label>Select Resume</label>

<input type="file"
name="resume"
accept=".pdf,.doc,.docx"
required>

<button type="submit">
📤 Upload Resume
</button>

</form>

</div>

</body>

</html>