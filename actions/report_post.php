<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if(isset($_POST['report-post'])) {
    $kd_post = $_POST['kd_post'];
    $kd_user = $_POST['kd_user'];

    $query = "UPDATE posts SET is_reported = 1 WHERE kd_post = $kd_post";

    if (mysqli_query($con, $query)) {
        header("Location:../home.php");
    } else {
        $error = urldecode("Post is failed to be reported");
        header("Location: ../home.php?error=$error");
    }

    mysqli_close($con);
}