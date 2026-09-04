<?php

$folder = "departments/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}


/* SAVE PATIENT */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["patient_id"];
    $name = $_POST["patient_name"];
    $age = $_POST["age"];
    $department = $_POST["department"];

    $filename = strtolower($department) . ".txt";

    $file = $folder . $filename;

    $data = $id . "|" . $name . "|" . $age . "|" . $department . "\n";

    file_put_contents($file, $data, FILE_APPEND);

    $message = "Patient record saved successfully!";

}


/* SEARCH PATIENT */

$found = false;
$patientData = array();

if (isset($_GET["search_id"])) {

    $searchId = $_GET["search_id"];

    $files = array(
        "cardiology.txt",
        "neurology.txt",
        "general.txt"
    );

    foreach ($files as $fileName) {

        $file = $folder . $fileName;

        if (file_exists($file)) {

            $lines = file($file);

            foreach ($lines as $line) {

                $data = explode("|", trim($line));

                if ($data[0] == $searchId) {

                    $found = true;

                    $patientData = $data;

                    break;
                }
            }
        }

        if ($found == true) {
            break;
        }
    }
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Patient Management Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>🏥 Patient Management Report</h1>


    <?php

    if (isset($message)) {

    ?>

        <div class="success">

            <h2>✅ <?php echo $message; ?></h2>

            <p>
                Patient ID:
                <?php echo htmlspecialchars($id); ?>
            </p>

            <p>
                Department:
                <?php echo htmlspecialchars($department); ?>
            </p>

        </div>

    <?php

    }

    ?>


    <?php

    if (isset($_GET["search_id"])) {

        if ($found == true) {

    ?>

            <div class="patient-card">

                <h2>🔎 Patient Found</h2>

                <p>
                    <b>Patient ID:</b>
                    <?php echo htmlspecialchars($patientData[0]); ?>
                </p>

                <p>
                    <b>Name:</b>
                    <?php echo htmlspecialchars($patientData[1]); ?>
                </p>

                <p>
                    <b>Age:</b>
                    <?php echo htmlspecialchars($patientData[2]); ?>
                </p>

                <p>
                    <b>Department:</b>
                    <?php echo htmlspecialchars($patientData[3]); ?>
                </p>

            </div>

    <?php

        } else {

    ?>

            <div class="error">

                <h2>❌ Patient Not Found</h2>

                <p>
                    No patient found with ID:
                    <?php echo htmlspecialchars($searchId); ?>
                </p>

            </div>

    <?php

        }

    }

    ?>


    <a href="index.php" class="back">
        ← Back to Patient Management
    </a>

</div>

</body>

</html>