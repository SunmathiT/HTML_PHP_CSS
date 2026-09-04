<?php

$directory = "departments";


// Create main directory if it does not exist

if (!is_dir($directory)) {

    mkdir($directory);

}


// Get requested action

$action = $_POST["action"] ?? "";


// ===============================
// CREATE FOLDER
// ===============================

if ($action == "create") {

    $folder_name = trim($_POST["folder_name"]);

    $folder_name = preg_replace(
        "/[^a-zA-Z0-9_-]/",
        "_",
        $folder_name
    );

    $path = $directory . "/" . $folder_name;


    if (empty($folder_name)) {

        $message = "❌ Please enter a folder name.";

    }

    elseif (is_dir($path)) {

        $message = "⚠️ Folder already exists.";

    }

    else {

        if (mkdir($path, 0777, true)) {

            $message =
                "✅ Folder '$folder_name' created successfully.";

        } else {

            $message =
                "❌ Unable to create folder.";

        }

    }

}


// ===============================
// RENAME FOLDER
// ===============================

elseif ($action == "rename") {

    $old_name = trim($_POST["old_name"]);

    $new_name = trim($_POST["new_name"]);


    $old_name = preg_replace(
        "/[^a-zA-Z0-9_-]/",
        "_",
        $old_name
    );

    $new_name = preg_replace(
        "/[^a-zA-Z0-9_-]/",
        "_",
        $new_name
    );


    $old_path = $directory . "/" . $old_name;

    $new_path = $directory . "/" . $new_name;


    if (!is_dir($old_path)) {

        $message =
            "❌ Old folder does not exist.";

    }

    elseif (is_dir($new_path)) {

        $message =
            "⚠️ New folder name already exists.";

    }

    else {

        if (rename($old_path, $new_path)) {

            $message =
                "✅ Folder renamed successfully.";

        } else {

            $message =
                "❌ Unable to rename folder.";

        }

    }

}


// ===============================
// DELETE FOLDER
// ===============================

elseif ($action == "delete") {

    $delete_name = trim($_POST["delete_name"]);


    $delete_name = preg_replace(
        "/[^a-zA-Z0-9_-]/",
        "_",
        $delete_name
    );


    $delete_path =
        $directory . "/" . $delete_name;


    if (!is_dir($delete_path)) {

        $message =
            "❌ Folder does not exist.";

    }

    else {

        // Check whether folder is empty

        $files = scandir($delete_path);

        $files = array_diff(
            $files,
            array(".", "..")
        );


        if (count($files) > 0) {

            $message =
                "⚠️ Folder is not empty. Delete its files first.";

        }

        else {

            if (rmdir($delete_path)) {

                $message =
                    "✅ Folder deleted successfully.";

            } else {

                $message =
                    "❌ Unable to delete folder.";

            }

        }

    }

}

else {

    $message = "❌ Invalid operation.";

}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Directory Management Result</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result">

    <h1>📁 Directory Management</h1>

    <div class="message">

        <?php echo htmlspecialchars($message); ?>

    </div>

    <a href="index.php" class="back-btn">
        ← Back to Directory
    </a>

</div>

</body>

</html>