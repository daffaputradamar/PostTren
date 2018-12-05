<?php
include '../helper/connection.php';

session_start();

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) || !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['is_admin'] == 1) {
                $_SESSION["user"] = $row['kd_user'];
                header('Location: ../dashboard.php');
            } else {
                $_SESSION["user"] = $row['kd_user'];
                header('Location: ../home.php');   
            }
        } else {
            $error = urldecode("Username or password is wrong");
            header("Location: ../index.php?error=$error");
        }
    
        mysqli_close($con);
    } else {
        $error = urldecode("Username or password is empty");
        header("Location: ../index.php?error=$error");
    }
}
