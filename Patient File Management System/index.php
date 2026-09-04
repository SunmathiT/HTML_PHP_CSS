<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient File Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>🏥 Patient File Management</h1>

    <p>Store and Retrieve Patient Records</p>

    <form action="process.php" method="POST">

        <label>Patient ID</label>

        <input type="text"
               name="patient_id"
               placeholder="Enter Patient ID"
               required>


        <label>Patient Name</label>

        <input type="text"
               name="patient_name"
               placeholder="Enter Patient Name"
               required>


        <label>Age</label>

        <input type="number"
               name="age"
               placeholder="Enter Age"
               required>


        <label>Department</label>

        <select name="department" required>

            <option value="">Select Department</option>

            <option value="Cardiology">
                Cardiology
            </option>

            <option value="Neurology">
                Neurology
            </option>

            <option value="General">
                General
            </option>

        </select>


        <button type="submit">
            💾 Save Patient
        </button>

    </form>


    <div class="search">

        <h2>🔍 Search Patient</h2>

        <form action="process.php" method="GET">

            <input type="text"
                   name="search_id"
                   placeholder="Enter Patient ID"
                   required>

            <button type="submit">
                Search
            </button>

        </form>

    </div>

</div>

</body>

</html>