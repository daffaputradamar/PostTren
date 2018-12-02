<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if(isset($_POST['unreport-comment'])) {
    $kd_comment = $_POST['kd_comment'];

    $query = "UPDATE comments SET is_reported = 0 WHERE kd_comment = $kd_comment";

    if (mysqli_query($con, $query)) {
        header("Location:../dashboard.php");
    } else {
        $error = urldecode("Comment is failed to be reported");
        header("Location: ../dashboard.php?error=$error");
    }

    mysqli_close($con);
}