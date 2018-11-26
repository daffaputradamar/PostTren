<?php
include 'Constant.php';
$con = mysqli_connect(HOST, UNAME, PASS, DB);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}