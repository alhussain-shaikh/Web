<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user credentials from the file (For demonstration purposes; consider using a database)
    $userFile = 'users.txt';
    $userCredentials = file($userFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Check if the user is not already logged in
    if (!isset($_SESSION['loggedin'][$username])) {
        foreach ($userCredentials as $user) {
            list($storedUsername, $storedPassword) = explode(':', $user);
            if ($username === $storedUsername && $password === $storedPassword) {
                // Create an array to store logged-in users
                $_SESSION['loggedin'][$username] = true;
                header("Location: index.php");
                exit;
            }
        }
    }

    echo "Invalid username or password. <a href='login.php'>Try again</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
