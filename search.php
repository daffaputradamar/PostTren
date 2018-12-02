<?php

include 'helper/connection.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
$user_id = $_SESSION['user'];

if (!isset($_GET['username'])) {
    header("Location: ../home.php");
}

$get_username = $_GET['username'];
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <?php include 'layouts/navbar.php'; ?>
        <div class="mt-12"></div>
        <div class="container">
            <div class="row">
                <div class="col s6 offset-s3">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="card">
                            <div class="card-content">
                                <p class="red-text"><?= $_GET['error'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php 
                        $query = "SELECT * FROM users  
                            WHERE (username LIKE '%$get_username%' OR first_name LIKE '%$get_username%' OR last_name LIKE '%$get_username%') AND kd_user != $user_id AND kd_user != 1";
                        $result = mysqli_query($con, $query);
                        $num_row = mysqli_num_rows($result);
                        if ($num_row !== 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $user = $row['kd_user'];
                    ?>
                        <a href="profile.php?kd_user=<?=$user?>">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s8">
                                            <div class="flex flex--centered--vertical">
                                                <img src="assets/photo_profil/<?=$row['photo_profil']?>" alt="photo profile" class="circle mr-20" width="100" height="100">
                                                <div class="ml-20 black-text">
                                                    <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                    <p><?=$row['username']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s4">
                                            <div class="flex flex--centered--vertical flex--end--horizontal">
                                                <?php
                                                    $query = "SELECT * FROM followers WHERE kd_user_followed = $user AND kd_user_following = $user_id LIMIT 1";
                                                    $res = mysqli_query($con, $query);
                                                    if (mysqli_fetch_assoc($res)) {
                                                ?>
                                                    <form action="actions/add_follower.php" method="post">
                                                        <input type="hidden" name="kd_user" value=<?=$user?>>
                                                        <button class="btn btn-small mt-12 orange" type="submit" name="submit-follow">following
                                                        </button>
                                                    </form>
                                                <?php } else { ?>
                                                    <form action="actions/add_follower.php" method="post">
                                                        <input type="hidden" name="kd_user" value=<?=$user?>>
                                                        <button class="btn btn-small button--rounded mt-12 button--primary--outline" type="submit" name="submit-follow">follow
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } } else { ?>
                    <div class="card">
                                <div class="card-content center-align">
                                    No user found
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
            // mysqli_close($con);
        ?>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>