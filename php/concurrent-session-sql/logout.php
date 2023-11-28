<?php
session_start();
include('config.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $session_id = session_id();

    $sql = "DELETE FROM active_sessions WHERE user_id='$user_id' AND session_id='$session_id'";
    $conn->query($sql);

    session_unset();
    session_destroy();

    header("Location: login.php");
} else {
    header("Location: login.php");
}
?>
