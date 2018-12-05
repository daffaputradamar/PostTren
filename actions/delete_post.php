<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if (isset($_POST['delete-post'])) {
    $post_user = $_POST['kd_user'];
    $post_id = $_POST['kd_post'];

    if ($user_id !== $post_user) {
        $error = urldecode("You don't have access to delete this post");
        header("Location: ../home.php?error=$error");
    }

    $query = "UPDATE posts SET deleted_at = CURRENT_TIMESTAMP(), is_deleted = 1 WHERE kd_post = $post_id";
    if (mysqli_query($con, $query)) {
        header("Location: ../home.php");
    } else {
        $error = urldecode("Post is failed to be removed");
        header("Location: ../home.php?error=$error");
    }

    mysqli_close($con);
}