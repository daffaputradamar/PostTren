<?php
include '../helper/connection.php';

session_start();

if (isset($_POST['register'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password, first_name, last_name) 
            VALUES ('$username', '$password', '$first_name', '$last_name')";

    if (mysqli_query($con, $query)) {
        $id = mysqli_insert_id($con);
        $_SESSION['user'] = $id;
        header('Location: ../home.php');
    } else {
        $error = urldecode("Terjadi kesalahan saat registrasi");
        header("Location: ../index.php?error=$error");
    }
    mysqli_close($con);
}