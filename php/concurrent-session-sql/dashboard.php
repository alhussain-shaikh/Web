<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM active_sessions WHERE user_id='$user_id'";
$result = $conn->query($sql);
$num_sessions = $result->num_rows;

if ($num_sessions < 3) {
    $session_id = session_id();
    $sql = "INSERT INTO active_sessions (user_id, session_id) VALUES ('$user_id', '$session_id')";
    $conn->query($sql);
} else {
    echo "Maximum concurrent sessions reached";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {
                display: none;
            }

            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive a.icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        .dashboard-container {
            padding: 20px;
            text-align: center;
        }

        .logout-link {
            text-decoration: none;
            color: #333;
            padding: 10px;
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="navbar" id="myNavbar">
    <a href="#" class="icon" onclick="toggleNavbar()">&#9776;</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="registration.php">New Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php" class="logout-link">Logout</a>
</div>

<div class="dashboard-container">
    <h1>Dashboard</h1>
    <p>Welcome, <?php echo $user_id; ?>!</p>
    <p>Active Sessions: <?php echo $num_sessions; ?></p>
    <?php
    if ($num_sessions < 3) {
        echo "You are currently logged in.";
    } else {
        echo "Maximum concurrent sessions reached.";
    }
    ?>
</div>

<script>
    function toggleNavbar() {
        var x = document.getElementById("myNavbar");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>

</body>
</html>
