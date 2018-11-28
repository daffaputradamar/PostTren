<?php
include '../helper/connection.php';

if(isset($_POST['submit-like'])) {
    echo "tes";
    $kd_post = $_POST['kd_post'];
    $kd_user = 1;

    $query = "INSERT INTO likes VALUES ($kd_post, $kd_user)";

    if (mysqli_query($con, $query)) {
        header("Location:../post.php?kd_post=$kd_post");
    } else {
        $query = "DELETE FROM likes WHERE kd_post = $kd_post AND kd_user = $kd_user";
        if (mysqli_query($con, $query)) {
            header("Location:../post.php?kd_post=$kd_post");
        }
    }

    mysqli_close($con);
}