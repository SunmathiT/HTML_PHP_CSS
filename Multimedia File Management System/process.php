<?php

$imageFolder = "multimedia/images/";
$videoFolder = "multimedia/videos/";


// Create folders automatically

if (!is_dir($imageFolder)) {
    mkdir($imageFolder, 0777, true);
}

if (!is_dir($videoFolder)) {
    mkdir($videoFolder, 0777, true);
}


// ===============================
// UPLOAD FILE
// ===============================

if (isset($_POST["upload"])) {

    $file = $_FILES["media_file"];

    $category = $_POST["category"];

    $fileName = basename($file["name"]);

    $fileName = preg_replace(
        "/[^a-zA-Z0-9._-]/",
        "_",
        $fileName
    );


    // Check file type

    $extension = strtolower(
        pathinfo($fileName, PATHINFO_EXTENSION)
    );


    $imageTypes = array(
        "jpg",
        "jpeg",
        "png",
        "gif",
        "webp"
    );

    $videoTypes = array(
        "mp4",
        "avi",
        "mov",
        "mkv",
        "webm"
    );


    // Upload Images

    if (
        $category == "images" &&
        in_array($extension, $imageTypes)
    ) {

        $destination = $imageFolder . $fileName;

        if (move_uploaded_file(
            $file["tmp_name"],
            $destination
        )) {

            $message =
                "✅ Image uploaded successfully!";

        } else {

            $message =
                "❌ Image upload failed.";

        }

    }


    // Upload Videos

    elseif (
        $category == "videos" &&
        in_array($extension, $videoTypes)
    ) {

        $destination = $videoFolder . $fileName;

        if (move_uploaded_file(
            $file["tmp_name"],
            $destination
        )) {

            $message =
                "✅ Video uploaded successfully!";

        } else {

            $message =
                "❌ Video upload failed.";

        }

    }

    else {

        $message =
            "❌ File type does not match the selected category.";

    }

}


// ===============================
// SEARCH FILES
// ===============================

elseif (isset($_GET["search_btn"])) {

    $search = trim($_GET["search"] ?? "");

    $type = $_GET["type"] ?? "all";


    $folders = array();


    if ($type == "images") {

        $folders[] = $imageFolder;

    }

    elseif ($type == "videos") {

        $folders[] = $videoFolder;

    }

    else {

        $folders[] = $imageFolder;
        $folders[] = $videoFolder;

    }


    $results = array();


    // Search through folders

    foreach ($folders as $folder) {

        if (is_dir($folder)) {

            $files = scandir($folder);

            foreach ($files as $file) {

                if (
                    $file != "." &&
                    $file != ".." &&
                    is_file($folder . $file)
                ) {

                    if (
                        $search == "" ||
                        stripos($file, $search) !== false
                    ) {

                        $results[] =
                            $folder . $file;

                    }

                }

            }

        }

    }

}


// Invalid operation

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

    <title>Multimedia Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result">

    <h1>🎬 Multimedia File Management</h1>


    <?php if (isset($message)) { ?>

        <div class="message">

            <?php
            echo htmlspecialchars($message);
            ?>

        </div>

    <?php } ?>


    <?php if (isset($results)) { ?>

        <h2>🔍 Search Results</h2>

        <div class="results">

            <?php

            if (count($results) == 0) {

                echo "<p>No multimedia files found.</p>";

            }


            foreach ($results as $file) {

                $fileName =
                    basename($file);

                $extension =
                    strtolower(
                        pathinfo(
                            $fileName,
                            PATHINFO_EXTENSION
                        )
                    );


                echo "<div class='media-card'>";

                echo "<h3>📁 " .
                     htmlspecialchars($fileName) .
                     "</h3>";


                // Display image

                if (in_array(
                    $extension,
                    array(
                        "jpg",
                        "jpeg",
                        "png",
                        "gif",
                        "webp"
                    )
                )) {

                    echo "<img src='" .
                         htmlspecialchars($file) .
                         "' class='preview'>";

                }


                // Display video

                elseif (in_array(
                    $extension,
                    array(
                        "mp4",
                        "avi",
                        "mov",
                        "mkv",
                        "webm"
                    )
                )) {

                    echo "<video controls class='preview'>";

                    echo "<source src='" .
                         htmlspecialchars($file) .
                         "'>";

                    echo "</video>";

                }

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