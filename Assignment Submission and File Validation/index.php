<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Assignment Submission</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>📚 Assignment Submission</h1>

    <p>Upload your assignment</p>

    <form action="process.php"
          method="POST"
          enctype="multipart/form-data">

        <label>Student Name</label>

        <input type="text"
               name="student"
               placeholder="Enter your name"
               required>


        <label>Department</label>

        <select name="department" required>

            <option value="">Select Department</option>

            <option value="B.Sc CS">💻 B.Sc CS</option>

            <option value="B.Sc IT">🌐 B.Sc IT</option>
              <option value="B.Sc AI">🌐 B.Sc AI</option>
                <option value="BCA">🌐 BCA</option>

<

        </select>


        <label>Assignment File</label>

        <input type="file"
               name="assignment"
               accept=".pdf,.doc,.docx"
               required>


        <button type="submit">
            📤 Submit Assignment
        </button>

    </form>

</div>

</body>

</html>