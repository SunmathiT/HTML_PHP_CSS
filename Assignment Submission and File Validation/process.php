<?php

$student = $_POST["student"] ?? "";
$department = $_POST["department"] ?? "";

if (isset($_FILES["assignment"])) {

    $file = $_FILES["assignment"];

    $allowedTypes = ["pdf", "doc", "docx"];

    $extension = strtolower(
        pathinfo($file["name"], PATHINFO_EXTENSION)
    );

    if (!in_array($extension, $allowedTypes)) {

        $message = "❌ Invalid file type! Please upload PDF, DOC or DOCX.";
        $class = "error";

    } elseif ($file["error"] !== UPLOAD_ERR_OK) {

        $message = "❌ File upload failed!";
        $class = "error";

    } else {

        $folder = "uploads/" . $department . "/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $studentName = preg_replace(
            "/[^a-zA-Z0-9_-]/",
            "_",
            $student
        );

        $filename = $studentName . "_" . time() . "." . $extension;

        $destination = $folder . $filename;

        if (move_uploaded_file(
            $file["tmp_name"],
            $destination
        )) {

            $message = "✅ Assignment uploaded successfully!";
            $class = "success";

        } else {

            $message = "❌ Unable to upload the file!";
            $class = "error";

        }
    }

} else {

    $message = "❌ Please select an assignment file!";
    $class = "error";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Assignment Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>📚 Assignment Submission</h1>

    <div class="<?php echo $class; ?>">

        <h2>
            <?php echo $message; ?>
        </h2>

        <?php if ($class == "success") { ?>

            <p>
                👨‍🎓 Student:
                <strong>
                    <?php echo htmlspecialchars($student); ?>
                </strong>
            </p>

            <p>
                🏢 Department:
                <strong>
                    <?php echo strtoupper(
                        htmlspecialchars($department)
                    ); ?>
                </strong>
            </p>

            <p>
                📄 File:
                <strong>
                    <?php echo htmlspecialchars($filename); ?>
                </strong>
            </p>

        <?php } ?>

    </div>

    <a href="index.php" class="back">
        ← Back
    </a>

</div>

</body>

</html>