<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Multimedia File Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>🎬 Multimedia File Management System</h1>

    <p class="subtitle">
        Manage, Categorize and Search Multimedia Files
    </p>


    <!-- Upload Section -->

    <div class="box">

        <h2>📤 Upload Multimedia File</h2>

        <form action="process.php"
              method="POST"
              enctype="multipart/form-data">

            <label>Select File</label>

            <input type="file"
                   name="media_file"
                   accept="image/*,video/*"
                   required>


            <label>Category</label>

            <select name="category" required>

                <option value="">
                    -- Select Category --
                </option>

                <option value="images">
                    🖼️ Images
                </option>

                <option value="videos">
                    🎥 Videos
                </option>

            </select>


            <button type="submit"
                    name="upload">

                📤 Upload File

            </button>

        </form>

    </div>


    <!-- Search Section -->

    <div class="box">

        <h2>🔍 Search Multimedia Files</h2>

        <form action="process.php"
              method="GET">

            <input type="text"
                   name="search"
                   placeholder="Enter file name...">

            <select name="type">

                <option value="all">
                    All Files
                </option>

                <option value="images">
                    🖼️ Images
                </option>

                <option value="videos">
                    🎥 Videos
                </option>

            </select>


            <button type="submit"
                    name="search_btn">

                🔍 Search

            </button>

        </form>

    </div>


    <!-- Display Files -->

    <div class="box">

        <h2>📂 Multimedia Categories</h2>

        <?php

        $imageFolder = "multimedia/images/";
        $videoFolder = "multimedia/videos/";

        echo "<div class='categories'>";

        echo "<div class='category'>";
        echo "🖼️ Images<br>";
        echo "<strong>";

        if (is_dir($imageFolder)) {

            $images = array_diff(
                scandir($imageFolder),
                array(".", "..")
            );

            echo count($images);

        } else {

            echo "0";

        }

        echo "</strong> Files";
        echo "</div>";


        echo "<div class='category'>";
        echo "🎥 Videos<br>";
        echo "<strong>";

        if (is_dir($videoFolder)) {

            $videos = array_diff(
                scandir($videoFolder),
                array(".", "..")
            );

            echo count($videos);

        } else {

            echo "0";

        }

        echo "</strong> Files";
        echo "</div>";

        echo "</div>";

        ?>

    </div>

</div>

</body>

</html>