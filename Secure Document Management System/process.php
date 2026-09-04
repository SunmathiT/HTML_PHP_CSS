<?php

$folder = "documents/";

$allowed = array(
    "pdf",
    "doc",
    "docx",
    "txt"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $docname = trim($_POST["docname"] ?? "");

    if (!isset($_FILES["document"])) {

        $message = "❌ Please select a document!";
        $class = "error";

    } else {

        $file = $_FILES["document"];

        $extension = strtolower(
            pathinfo(
                $file["name"],
                PATHINFO_EXTENSION
            )
        );

        if ($file["error"] != 0) {

            $message = "❌ File upload error!";
            $class = "error";

        } elseif (!in_array($extension, $allowed)) {

            $message = "❌ Invalid file type!";
            $class = "error";

        } else {

            if (!is_dir($folder)) {

                mkdir($folder, 0777, true);

            }

            $safeName = preg_replace(
                "/[^a-zA-Z0-9_-]/",
                "_",
                $docname
            );

            $filename =
                $safeName . "." . $extension;

            $destination =
                $folder . $filename;

            if (file_exists($destination)) {

                $message =
                    "❌ Duplicate document! File already exists.";

                $class = "error";

            } else {

                if (move_uploaded_file(
                    $file["tmp_name"],
                    $destination
                )) {

                    $message =
                        "✅ Document uploaded securely!";

                    $class = "success";

                } else {

                    $message =
                        "❌ Unable to save document!";

                    $class = "error";

                }

            }

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

<title>Secure Document Result</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>🔐 Document Management</h1>

<?php if (isset($message)) { ?>

<div class="<?php echo $class; ?>">

<h2>
<?php echo $message; ?>
</h2>

</div>

<?php } ?>

<?php

if (isset($_GET["view"])) {

    echo "<h2>📂 Available Documents</h2>";

    if (is_dir($folder)) {

        $files = scandir($folder);

        $found = false;

        foreach ($files as $file) {

            if ($file != "." && $file != "..") {

                $found = true;

                echo "<div class='card'>";

                echo "📄 " .
                     htmlspecialchars($file);

                echo "</div>";

            }

        }

        if (!$found) {

            echo "<div class='error'>";
            echo "No documents available.";
            echo "</div>";

        }

    }

}

?>

<a href="index.php" class="button">
← Back to Upload
</a>

</div>

</body>

</html>