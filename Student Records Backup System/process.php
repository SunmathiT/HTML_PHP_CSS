<?php

// File names

$studentFile = "students.txt";
$backupFolder = "backups";
$logFile = "backup_log.txt";


// Create backup folder if it does not exist

if (!is_dir($backupFolder)) {

    mkdir($backupFolder, 0777, true);

}


// ===============================
// SAVE STUDENT RECORD
// ===============================

if (isset($_POST["save"])) {

    $name = trim($_POST["name"]);

    $regno = trim($_POST["regno"]);

    $department = trim($_POST["department"]);

    $email = trim($_POST["email"]);

    $year = trim($_POST["year"]);


    // Get current date and time

    $time = date("Y-m-d H:i:s");


    // Create student record

    $studentData =
        "Name: $name | " .
        "Register No: $regno | " .
        "Department: $department | " .
        "Email: $email | " .
        "Year: $year | " .
        "Added: $time" .
        PHP_EOL;


    // Save record to file

    file_put_contents(
        $studentFile,
        $studentData,
        FILE_APPEND
    );


    $message =
        "✅ Student record saved successfully!";

}


// ===============================
// CREATE BACKUP
// ===============================

elseif (isset($_POST["backup"])) {


    // Check student file

    if (!file_exists($studentFile)) {

        $message =
            "❌ No student records available for backup.";

    }

    else {


        // Get current timestamp

        $timestamp = date("Y-m-d_H-i-s");


        // Create backup file name

        $backupFile =
            $backupFolder .
            "/students_backup_" .
            $timestamp .
            ".txt";


        // Read student records

        $data = file_get_contents($studentFile);


        // Create backup

        if (file_put_contents($backupFile, $data)) {


            // Backup log

            $log =
                "Backup File: " .
                $backupFile .
                " | Date & Time: " .
                date("Y-m-d H:i:s") .
                PHP_EOL;


            // Store backup information

            file_put_contents(
                $logFile,
                $log,
                FILE_APPEND
            );


            $message =
                "✅ Backup created successfully!";

        }

        else {

            $message =
                "❌ Backup creation failed.";

        }

    }

}

else {

    $message =
        "❌ Invalid operation.";

}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Backup Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result">

    <h1>🎓 Student Records</h1>

    <div class="message">

        <?php
        echo htmlspecialchars($message);
        ?>

    </div>


    <?php

    // Display backup information

    if (isset($_POST["backup"]) &&
        file_exists($logFile)) {

        echo "<div class='log'>";

        echo "<h2>📋 Backup Information</h2>";

        $logs = file(
            $logFile,
            FILE_IGNORE_NEW_LINES
        );

        $lastLog = end($logs);

        echo "<p>" .
             htmlspecialchars($lastLog) .
             "</p>";

        echo "</div>";

    }

    ?>


    <a href="index.php" class="back-btn">
        ← Back to Student Records
    </a>

</div>

</body>

</html>