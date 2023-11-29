<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>String Transformation</h1>
    <form method="post" action="">
        <label for="sentence">Enter a Sentence:</label>
        <input type="text" id="sentence" name="sentence" required>
        <div class="options">
            <input type="submit" name="uppercase" value="To Uppercase">
            <input type="submit" name="lowercase" value="To Lowercase">
            <input type="submit" name="capitalize" value="Capitalize First Letter">
            <input type="submit" name="capitalizeWords" value="Capitalize Each Word">
        </div>
    </form>
    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sentence = $_POST["sentence"];
            if (isset($_POST["uppercase"])) {
                echo "<p>Uppercase: " . strtoupper($sentence) . "</p>";
            } elseif (isset($_POST["lowercase"])) {
                echo "<p>Lowercase: " . strtolower($sentence) . "</p>";
            } elseif (isset($_POST["capitalize"])) {
                echo "<p>First Letter Capitalized: " . ucfirst($sentence) . "</p>";
            } elseif (isset($_POST["capitalizeWords"])) {
                echo "<p>Each Word Capitalized: " . ucwords($sentence) . "</p>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
