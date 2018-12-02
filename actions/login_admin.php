<?php
include '../helper/connection.php';

session_start();

if (isset($_POST['login-admin'])) {
    if (!empty($_POST['username']) || !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND is_admin = 1";
        $result = mysqli_query($con, $query);
    
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["user"] = mysqli_fetch_assoc($result)['kd_user'];
            header('Location: ../dashboard.php');
        } else {
            $error = urldecode("Username or password is wrong");
            header("Location: ../admin.php?error=$error");
        }
    
        mysqli_close($con);
    } else {
        $error = urldecode("Username or password is empty");
        header("Location: ../admin.php?error=$error");
    }
}
