<?php

$name = $_POST["name"] ?? "";

if (!isset($_FILES["resume"])) {

    $message = "❌ Please select a resume!";
    $class = "error";

} else {

    $file = $_FILES["resume"];

    $allowed = array("pdf", "doc", "docx");

    $extension = strtolower(
        pathinfo(
            $file["name"],
            PATHINFO_EXTENSION
        )
    );

    if ($file["error"] != 0) {

        $message = "❌ Error while uploading file!";
        $class = "error";

    } elseif (!in_array($extension, $allowed)) {

        $message = "❌ Invalid file type! Only PDF, DOC and DOCX are allowed.";
        $class = "error";

    } elseif ($file["size"] > 5000000) {

        $message = "❌ File size must be less than 5 MB!";
        $class = "error";

    } else {

        $folder = "resumes/";

        if (!is_dir($folder)) {

            mkdir($folder, 0777, true);

        }

        $filename =
            $name . "_" .
            time() . "." .
            $extension;

        $destination =
            $folder . $filename;

        if (move_uploaded_file(
            $file["tmp_name"],
            $destination
        )) {

            $message =
                "✅ Resume uploaded successfully!";

            $class = "success";

        } else {

            $message =
                "❌ Resume upload failed!";

            $class = "error";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Upload Result</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>📄 Resume Validation</h1>

<div class="<?php echo $class; ?>">

<h2>
<?php echo $message; ?>
</h2>

<?php if ($class == "success") { ?>

<p>
👤 Applicant:
<strong>
<?php echo htmlspecialchars($name); ?>
</strong>
</p>

<p>
📁 File:
<strong>
<?php echo htmlspecialchars($filename); ?>
</strong>
</p>

<p>
✅ File Type:
<strong>
<?php echo strtoupper($extension); ?>
</strong>
</p>

<?php } ?>

</div>

<a href="index.php" class="button">
← Upload Another Resume
</a>

</div>

</body>

</html>