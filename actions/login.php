<?php
include '../helper/connection.php';

session_start();

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) || !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
    
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["user"] = mysqli_fetch_assoc($result)['kd_user'];
            header('Location: ../home.php');
        } else {
            $error = urldecode("Username atau password salah");
            header("Location: ../index.php?error=$error");
        }
    
        mysqli_close($con);
    } else {
        $error = urldecode("Username atau password kosong");
        header("Location: index.php?error=$error");
    }
}
