<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if(isset($_POST['update_profile'])) {
    $kd_user = $_SESSION['user'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];

    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE kd_user = $kd_user";

    if (mysqli_query($con, $query)) {
        header("Location:../settings.php");        
    } else {
        $error = urldecode("Data is failed to be updated");
        header("Location:../settings.php?error=$error");
    }
}