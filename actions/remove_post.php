<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if (isset($_POST['remove-post'])) {
    $post_id = $_POST['kd_post'];

    $query = "UPDATE posts SET deleted_at = CURRENT_TIMESTAMP() WHERE kd_post = $post_id";
    if (mysqli_query($con, $query)) {
        header("Location: ../dashboard.php");
    } else {
        $error = urldecode("Post is failed to be removed");
        header("Location: ../dashboard.php?error=$error");
    }

    mysqli_close($con);
}