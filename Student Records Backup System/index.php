<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Records Backup System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>🎓 Student Records Backup System</h1>

    <p class="subtitle">
        Maintain Student Records and Create Backups
    </p>

    <form action="process.php" method="POST">

        <label>Student Name</label>

        <input type="text"
               name="name"
               placeholder="Enter student name"
               required>


        <label>Register Number</label>

        <input type="text"
               name="regno"
               placeholder="Enter register number"
               required>


        <label>Department</label>

        <select name="department" required>

            <option value="">
                -- Select Department --
            </option>

            <option value="Computer Science">
                Computer Science
            </option>

            <option value="Information Technology">
                Information Technology
            </option>

            <option value="Electronics">
                Electronics
            </option>

            <option value="Commerce">
                Commerce
            </option>

            <option value="Mechanical">
                Mechanical
            </option>

        </select>


        <label>Email</label>

        <input type="email"
               name="email"
               placeholder="Enter email"
               required>


        <label>Year</label>

        <select name="year" required>

            <option value="">
                -- Select Year --
            </option>

            <option value="1st Year">
                1st Year
            </option>

            <option value="2nd Year">
                2nd Year
            </option>

            <option value="3rd Year">
                3rd Year
            </option>

            <option value="4th Year">
                4th Year
            </option>

        </select>


        <button type="submit" name="save">
            💾 Save Student Record
        </button>

    </form>


    <form action="process.php"
          method="POST"
          class="backup-form">

        <button type="submit"
                name="backup"
                class="backup-btn">

            🔄 Create Backup

        </button>

    </form>

</div>

</body>

</html>