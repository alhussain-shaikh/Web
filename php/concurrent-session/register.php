<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Store user credentials in a file (For demonstration purposes; consider using a database)
    $userFile = 'users.txt';
    $userData = "$username:$password\n";
    file_put_contents($userFile, $userData, FILE_APPEND);

    echo "Registration successful. <a href='login.php'>Login</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
