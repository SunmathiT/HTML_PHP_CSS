<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cloud Document Directory</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>☁️ Cloud Document Directory</h1>

    <p class="subtitle">
        Upload, Store, Retrieve and Delete Documents
    </p>


    <!-- Upload Document -->

    <div class="box">

        <h2>📤 Upload Document</h2>

        <form action="process.php"
              method="POST"
              enctype="multipart/form-data">

            <label>Select Document</label>

            <input type="file"
                   name="document"
                   accept=".pdf,.doc,.docx,.txt"
                   required>

            <button type="submit"
                    name="upload">

                📤 Upload Document

            </button>

        </form>

    </div>


    <!-- Retrieve Documents -->

    <div class="box">

        <h2>📂 Stored Documents</h2>

        <form action="process.php"
              method="GET">

            <button type="submit"
                    name="view">

                📄 View Documents

            </button>

        </form>

    </div>


    <!-- Delete Document -->

    <div class="box">

        <h2>🗑️ Delete Document</h2>

        <form action="process.php"
              method="POST">

            <input type="text"
                   name="delete_file"
                   placeholder="Enter file name"
                   required>

            <button type="submit"
                    name="delete"
                    class="delete-btn">

                🗑️ Delete Document

            </button>

        </form>

    </div>

</div>

</body>

</html>