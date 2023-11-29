<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="navbar" id="myNavbar">
    <a href="#" class="icon" onclick="toggleNavbar()">&#9776;</a>
    <a href="login.php">Login</a>
    <a href="registration.php">Register</a>
</div>

<div class="login-container">
    <h1>Login</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
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