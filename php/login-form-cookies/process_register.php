<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Hash the password (For demonstration purposes, we're using plain text)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Set cookie for the registered user (Again, for demonstration purposes)
    setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie lasts for 30 days
    setcookie('password', $hashedPassword, time() + (86400 * 30), "/"); // Cookie lasts for 30 days

    echo "Registration successful. <a href='login.php'>Login</a>";
}
?>
