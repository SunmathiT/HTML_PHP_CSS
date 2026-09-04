<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Visit Tracking</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>👋 Welcome to Our Website</h1>

    <p>Enter your name and choose your preference</p>

    <form action="process.php" method="POST">

        <label>Customer Name</label>

        <input type="text"
               name="name"
               placeholder="Enter your name"
               required>

        <label>Favourite Colour</label>

        <select name="preference" required>

            <option value="">Select Colour</option>

            <option value="Blue">💙 Blue</option>

            <option value="Green">💚 Green</option>

            <option value="Purple">💜 Purple</option>

            <option value="Orange">🧡 Orange</option>

        </select>

        <button type="submit">
            🍪 Save Preference
        </button>

    </form>

</div>

</body>
</html>