<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if (isset($_POST['update_post'])) {
    $post_user = $_POST['post-user'];
    $post_id = $_POST['post-id'];
    $post_body = $_POST['post-body'];

    if ($user_id !== $post_user) {
        $error = urldecode("You don't have access to update this post");
        header("Location: ../home.php?error=$error");
    }

    $query = "UPDATE posts SET body = '$post_body' WHERE kd_post = $post_id";
    if (mysqli_query($con, $query)) {
        header("Location: ../post.php?kd_post=$post_id");
    } else {
        $error = urldecode("Post is failed to be updated");
        header("Location: ../edit_post.php?kd_post=$post_id&error=$error");
    }

    mysqli_close($con);
}