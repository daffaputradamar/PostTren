<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if (isset($_POST['remove-comment'])) {
    $comment_id = $_POST['kd_comment'];

    $query = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP() WHERE kd_comment = $comment_id";
    if (mysqli_query($con, $query)) {
        header("Location: ../dashboard.php?tab=comment");
    }

    mysqli_close($con);
}