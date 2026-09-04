<?php

$mainFolder = "documents/";

$pdfFolder = "documents/pdf/";
$wordFolder = "documents/word/";
$textFolder = "documents/text/";


// Create directories if they do not exist

if (!is_dir($pdfFolder)) {
    mkdir($pdfFolder, 0777, true);
}

if (!is_dir($wordFolder)) {
    mkdir($wordFolder, 0777, true);
}

if (!is_dir($textFolder)) {
    mkdir($textFolder, 0777, true);
}


// ======================================
// UPLOAD DOCUMENT
// ======================================

if (isset($_POST["upload"])) {

    $file = $_FILES["document"];

    $fileName = basename($file["name"]);

    $fileName = preg_replace(
        "/[^a-zA-Z0-9._-]/",
        "_",
        $fileName
    );


    $extension = strtolower(
        pathinfo($fileName, PATHINFO_EXTENSION)
    );


    // Select appropriate directory

    if ($extension == "pdf") {

        $destination = $pdfFolder . $fileName;

    }

    elseif (
        $extension == "doc" ||
        $extension == "docx"
    ) {

        $destination = $wordFolder . $fileName;

    }

    elseif ($extension == "txt") {

        $destination = $textFolder . $fileName;

    }

    else {

        $message =
            "❌ Invalid document type.";

        $destination = "";

    }


    // Upload file

    if ($destination != "") {

        if (move_uploaded_file(
            $file["tmp_name"],
            $destination
        )) {

            $message =
                "✅ Document uploaded successfully!";

        }

        else {

            $message =
                "❌ File upload failed.";

        }

    }

}


// ======================================
// RETRIEVE DOCUMENTS
// ======================================

elseif (isset($_GET["view"])) {

    $folders = array(
        $pdfFolder,
        $wordFolder,
        $textFolder
    );

    $documents = array();


    foreach ($folders as $folder) {

        if (is_dir($folder)) {

            $files = scandir($folder);

            foreach ($files as $file) {

                if (
                    $file != "." &&
                    $file != ".." &&
                    is_file($folder . $file)
                ) {

                    $documents[] =
                        $folder . $file;

                }

            }

        }

    }

}


// ======================================
// DELETE DOCUMENT
// ======================================

elseif (isset($_POST["delete"])) {

    $fileName = basename(
        $_POST["delete_file"]
    );


    $folders = array(
        $pdfFolder,
        $wordFolder,
        $textFolder
    );


    $deleted = false;


    foreach ($folders as $folder) {

        $filePath = $folder . $fileName;


        if (file_exists($filePath)) {

            if (unlink($filePath)) {

                $message =
                    "✅ Document deleted successfully.";

                $deleted = true;

                break;

            }

        }

    }


    if (!$deleted) {

        $message =
            "❌ Document not found.";

    }

}


// Invalid request

else {

    header("Location: index.php");

    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Document Management Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result">

    <h1>☁️ Document Management</h1>


    <?php if (isset($message)) { ?>

        <div class="message">

            <?php
            echo htmlspecialchars($message);
            ?>

        </div>

    <?php } ?>


    <?php if (isset($documents)) { ?>

        <h2>📂 Available Documents</h2>

        <div class="document-list">

            <?php

            if (count($documents) == 0) {

                echo "<p>No documents available.</p>";

            }


            foreach ($documents as $document) {

                $fileName =
                    basename($document);

                echo "<div class='document'>";

                echo "📄 ";

                echo htmlspecialchars($fileName);

                echo "<br>";

                echo "<a href='" .
                     htmlspecialchars($document) .
                     "' target='_blank'>";

                echo "Open Document";

                echo "</a>";

                echo "</div>";

            }

            ?>

        </div>

    <?php } ?>


    <a href="index.php"
       class="back-btn">

        ← Back to Home

    </a>

</div>

</body>

</html>