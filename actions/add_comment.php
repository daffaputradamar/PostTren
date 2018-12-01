<?php

include '../helper/connection.php'; 
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
}

if (isset($_POST['submit-comment'])) {
    if (empty($_POST['body-comment'])) {
        $error = urldecode("Comment can't be added");
        header("Location:../post.php?kd_post=$kd_post&error=$error");
    }
    
    $body_comment = $_POST['body-comment'];
    $kd_user = $_SESSION['user'];
    $kd_post = $_POST['kd_post'];

    $query = "INSERT INTO comments (kd_user, body_comment, kd_post, created_at) 
            VALUES ($kd_user, '$body_comment', $kd_post, CURRENT_TIMESTAMP())";
    
    // die($query);
    if (mysqli_query($con, $query)) {
        header("Location:../post.php?kd_post=$kd_post");
    } else {
        $error = urldecode("Comment can't be added");
        header("Location:../post.php?kd_post=$kd_post&error=$error");
    }
    
    mysqli_close($con); 
}