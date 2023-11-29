<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve stored username and hashed password from cookies
    $storedUsername = $_COOKIE['username'];
    $storedPassword = $_COOKIE['password'];

    // Check if the provided username matches the stored one and verify the password
    if ($username === $storedUsername && password_verify($password, $storedPassword)) {
        echo "Login successful. Welcome, $username!";
    } else {
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
}
?>
