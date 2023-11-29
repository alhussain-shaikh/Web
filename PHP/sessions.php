<?php
session_start();

// Set the maximum number of allowed sessions
$maxSessions = 4;

// Check if the user already has an active session
if (isset($_SESSION['user_id'])) {
    // User is already logged in
    echo "You are already logged in. Multiple logins are not allowed.";
    exit;
}

// Check the current number of active sessions
$activeSessions = countActiveSessions();

// If the maximum number of sessions is reached, deny access
if ($activeSessions >= $maxSessions) {
    echo "Maximum number of concurrent sessions reached. Please try again later.";
    exit;
}

// If the maximum number of sessions is not reached, proceed with the login
// Replace the following block with your actual login logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming a simple login form with username and password fields
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace this with your actual authentication logic
    if (isValidUser($username, $password)) {
        // Set the user_id in the session to mark the user as logged in
        $_SESSION['user_id'] = $username;
        echo "Login successful";
        // Redirect to a protected page or display a success message
        // header('Location: dashboard.php');
        exit;
    } else {
        echo "Invalid username or password.";
    }
}

function countActiveSessions()
{
    $activeSessions = 0;

    // Iterate through all active sessions and count them
    foreach ($_SESSION as $key => $value) {
        // Check if the session variable represents a user session
        if (strpos($key, 'user_') === 0) {
            $activeSessions++;
        }
    }

    return $activeSessions;
}

function isValidUser($username, $password)
{
    // Replace this with your actual authentication logic
    // For simplicity, this example assumes a hardcoded user/password
    $validUsername = 'user';
    $validPassword = 'password';

    return $username === $validUsername && $password === $validPassword;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>