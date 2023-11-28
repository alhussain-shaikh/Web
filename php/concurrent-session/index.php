<?php
session_start();

// File to store active sessions count
$sessionCountFile = 'active_sessions.txt';

// Check if the session count file exists, if not create it with count 0
if (!file_exists($sessionCountFile)) {
    file_put_contents($sessionCountFile, '0');
}

// Read the current active session count from the file
$activeSessions = intval(file_get_contents($sessionCountFile));

// Check if the maximum concurrent sessions limit is reached (set to 3)
$maxSessions = 3;

if ($activeSessions >= $maxSessions) {
    echo "Maximum number of concurrent sessions reached. Please try again later.";
    exit;
}

// Increment active session count
$activeSessions++;
file_put_contents($sessionCountFile, $activeSessions);

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

// HTML content for the website
?>
<!DOCTYPE html>
<html>
<head>
    <title>Concurrent Session Limit Example</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Welcome to the Website</h1>
    <p>This is a simple example of limiting concurrent sessions using PHP.</p>

    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Your website content here -->

    <p>Active sessions: <?php echo $activeSessions; ?></p>

    <?php
    // Decrement active session count when the session ends (logout or session timeout)
    // Example: session_unset(); session_destroy(); (on logout)

    // Decrement active session count
    $activeSessions--;
    file_put_contents($sessionCountFile, $activeSessions);
    ?>
</body>
</html>
