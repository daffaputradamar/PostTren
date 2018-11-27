<?php

include '../helper/connection.php';

if (isset($_POST['submit-comment'])) {
    $body_comment = $_POST['body-comment'];
    $kd_user = 1;
    $kd_post = $_POST['kd_post'];

    $query = "INSERT INTO comments (kd_user, body_comment, kd_post, created_at) 
            VALUES ($kd_user, '$body_comment', $kd_post, CURRENT_TIMESTAMP())";
    
    // die($query);
    if (mysqli_query($con, $query)) {
        header("Location:../post.php?kd_post=$kd_post");
    } else {
        die(mysqli_error($con));
        $error = urldecode("Komentar tidak berhasil ditambahakan");
        header("Location:../post.php?kd_post=$kd_post&error=$error");
    }
    
    mysqli_close($con); 
}