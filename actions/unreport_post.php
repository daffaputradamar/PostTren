<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if(isset($_POST['unreport-post'])) {
    $kd_post = $_POST['kd_post'];

    $query = "UPDATE posts SET is_reported = 0 WHERE kd_post = $kd_post";

    if (mysqli_query($con, $query)) {
        header("Location:../dashboard.php?tab=post");
    }

    mysqli_close($con);
}