<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user'];

if (isset($_POST['delete-comment'])) {
    $kd_user = $_POST['kd_user'];
    $kd_post = $_POST['kd_post'];
    $kd_comment = $_POST['kd_comment'];

    if ($user_id !== $kd_post) {
        $error = urldecode("You don't have access to delete this comment");
        header("Location: ../home.php?error=$error");
    }

    $query = "UPDATE comments SET deleted_at = CURRENT_TIMESTAMP() WHERE kd_comment = $kd_comment";
    if (mysqli_query($con, $query)) {
        header("Location: ../post.php?kd_post=$kd_post");
    } else {
        $error = urldecode("Post is failed to be removed");
        header("Location: ../post.php?kd_post=$kd_post&error=$error");
    }

    mysqli_close($con);
}