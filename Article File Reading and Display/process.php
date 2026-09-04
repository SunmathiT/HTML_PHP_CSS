<?php

$filename = "article.txt";

if (file_exists($filename)) {

    // Read file content
    $content = file_get_contents($filename);

    // Read file as lines
    $lines = file($filename, FILE_IGNORE_NEW_LINES);

    // Count number of lines
    $lineCount = count($lines);

} else {

    $content = "Article file not found.";
    $lineCount = 0;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Article Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>📚 Article Report</h1>

    <div class="article-box">

        <h2>📝 Article Content</h2>

        <div class="content">

            <?php

            echo nl2br(
                htmlspecialchars($content)
            );

            ?>

        </div>

    </div>


    <div class="line-box">

        <h2>📊 File Information</h2>

        <h3>
            Total Lines:
            <?php echo $lineCount; ?>
        </h3>

    </div>


    <a href="index.php" class="button">
        ← Back
    </a>

</div>

</body>

</html>