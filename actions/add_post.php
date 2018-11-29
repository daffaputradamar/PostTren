<?php

include '../helper/connection.php'; 
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
}

if (isset($_POST['submit-post'])) {
    $body = $_POST['body'];
    $kd_user = $_SESSION['user'];
    $code = $_FILES['post-photo']["error"];
    if ($code !== 4) {
        $destination_path = getcwd();

        $error = "";
        $nama_folder = "assets/posts";
        $tmp = $_FILES['post-photo']['tmp_name'];
        $date = date('Y-m-d H:i:s');
        $nama_file = $_FILES['post-photo']['name'];
        $nama_baru = $date . "_" . $nama_file;
        $path = $destination_path . "/../$nama_folder/$nama_baru";
        if (file_exists($path)) {
            $error = urldecode("File dengan nama yang sama sudah tersimpan, coba lagi");
            header("Location:../home.php?error=$error");
        }

        $ukuran = $_FILES['file']['size'];
        if ($ukuran > 2000000) {
            $error = urldecode("Ukuran melebihi 2 MB");
            header("Location:../home.php?error=$error");
        }

        $tipe_file = array('image/jpeg', 'image/gif', 'image/png');
        if (!in_array($_FILES['post-photo']['type'], $tipe_file)) {
            $error = urldecode("Cek Kembali Ekstensi File Anda (*jpeg, *jpg, *gif, *png)");
            header("Location:../home.php?error=$error");
        }
        
        if(move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO posts (body, photo, created_at, kd_user) 
            VALUES ('$body', '$nama_baru', CURRENT_TIMESTAMP() , $kd_user)";
            if (mysqli_query($con, $query)) {
                header("Location:../home.php");
            } else {
                $error = urldecode("Data tidak berhasil ditambahakan");
                header("Location:../home.php?error=$error");
            }
        } else {
            $error = urldecode("Data tidak berhasil ditambahakan");
            header("Location:../home.php?error=$error");
        }
    } else {

        $query = "INSERT INTO posts (body, created_at, kd_user) 
            VALUES ('$body', CURRENT_TIMESTAMP() , $kd_user)";

        if (mysqli_query($con, $query)) {
            header("Location:../home.php");
        } else {
            $error = urldecode("Data tidak berhasil ditambahakan");
            header("Location:../home.php?error=$error");
        }
    }
    mysqli_close($con); 
}