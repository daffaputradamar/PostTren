<?php

include '../helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

if(isset($_POST['submit-post'])) {
    $kd_user = $_SESSION['user'];
    $code = $_FILES['profile-photo']["error"];
    if ($code !== 4) {
        $destination_path = getcwd();

        $error = "";
        $nama_folder = "assets/photo_profil";
        $tmp = $_FILES['profile-photo']['tmp_name'];
        $date = date('Y-m-d H:i:s');
        $nama_file = $_FILES['profile-photo']['name'];
        $nama_baru = $date . "_" . $nama_file;
        $path = $destination_path . "/../$nama_folder/$nama_baru";

        if (file_exists($path)) {
            $error = urldecode("File with the same name is already exist");
            header("Location:../settings.php?error=$error");
        }

        $ukuran = $_FILES['file']['size'];
        if ($ukuran > 2000000) {
            $error = urldecode("Size exceeds maximum file size 2MB");
            header("Location:../settings.php?error=$error");
        }

        $tipe_file = array('image/jpeg', 'image/gif', 'image/png');
        if (!in_array($_FILES['profile-photo']['type'], $tipe_file)) {
            $error = urldecode("Check your uploaded file extension (*jpeg, *jpg, *gif, *png)");
            header("Location:../settings.php?error=$error");
        }
        
        if(move_uploaded_file($tmp, $path)) {
            $query = "UPDATE users SET photo_profil = '$nama_baru' WHERE kd_user = $kd_user";
            if (mysqli_query($con, $query)) {
                header("Location:../settings.php");
            } else {
                $error = urldecode("Data can't be updated");
                header("Location:../settings.php?error=$error");
            }
        } else {
            $error = urldecode("Data can't be updated");
            header("Location:../settings.php?error=$error");
        }
    }
}