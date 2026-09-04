<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Department Document Directory</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>📁 Department Document Directory</h1>

    <p class="subtitle">
        Create, Rename and Delete Department Folders
    </p>

    <!-- Create Folder -->

    <div class="box">

        <h2>➕ Create Folder</h2>

        <form action="process.php" method="POST">

            <input
                type="text"
                name="folder_name"
                placeholder="Enter department name"
                required
            >

            <button
                type="submit"
                name="action"
                value="create"
            >
                Create Folder
            </button>

        </form>

    </div>


    <!-- Rename Folder -->

    <div class="box">

        <h2>✏️ Rename Folder</h2>

        <form action="process.php" method="POST">

            <input
                type="text"
                name="old_name"
                placeholder="Existing folder name"
                required
            >

            <input
                type="text"
                name="new_name"
                placeholder="New folder name"
                required
            >

            <button
                type="submit"
                name="action"
                value="rename"
            >
                Rename Folder
            </button>

        </form>

    </div>


    <!-- Delete Folder -->

    <div class="box">

        <h2>🗑️ Delete Folder</h2>

        <form action="process.php" method="POST">

            <input
                type="text"
                name="delete_name"
                placeholder="Enter folder name"
                required
            >

            <button
                type="submit"
                name="action"
                value="delete"
                class="delete-btn"
            >
                Delete Folder
            </button>

        </form>

    </div>


    <!-- View Folders -->

    <div class="box">

        <h2>📂 Existing Departments</h2>

        <?php

        $directory = "departments";

        if (!is_dir($directory)) {
            mkdir($directory);
        }

        $folders = scandir($directory);

        $found = false;

        echo "<div class='folder-list'>";

        foreach ($folders as $folder) {

            if ($folder != "." && $folder != "..") {

                if (is_dir($directory . "/" . $folder)) {

                    echo "<div class='folder'>";
                    echo "📁 " . htmlspecialchars($folder);
                    echo "</div>";

                    $found = true;
                }
            }
        }

        if (!$found) {
            echo "<p>No department folders available.</p>";
        }

        echo "</div>";

        ?>

    </div>

</div>

</body>
</html>