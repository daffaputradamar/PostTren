<?php
include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
$user_id = $_SESSION['user'];

if(isset($_POST['submit-follow'])) {
    $kd_user = $_POST['kd_user'];

    if($user_id === $kd_user) {
        header("Location:../home.php");   
    }

    $query = "INSERT INTO followers VALUES ($kd_user, $user_id)";

    if (mysqli_query($con, $query)) {
        header("Location:../profile.php?kd_user=$kd_user");
    } else {
        $query = "DELETE FROM followers WHERE kd_user_followed = $kd_user AND kd_user_following = $user_id";
        if (mysqli_query($con, $query)) {
            header("Location:../profile.php?kd_user=$kd_user");
        }
    }

    mysqli_close($con);
}