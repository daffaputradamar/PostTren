<?php
    include 'helper/connection.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user_id = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <?php include 'layouts/navbar.php'; ?>
        <div style="margin-top:12px"></div>
        <div class="container">
            <div class="row">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="card">
                        <div class="card-content">
                            <p class="red-text"><?= $_GET['error'] ?></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="col s3">
                <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <?php 
                                    $query = "SELECT * from users WHERE kd_user = $user_id";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col s3">
                                    <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="70" height="70">
                                </div>
                                <div class="col s9">
                                    <div class="mt-20 ml-20">
                                        <div>
                                            <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                            <p><?=$row['username']?></p>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s6">
                                    <blockquote>
                                        <h6>Posts</h6>
                                        <?php 
                                            $query = "SELECT COUNT(kd_post) as post_sum FROM posts
                                                WHERE kd_user = $user_id";
                                            $result = mysqli_query($con, $query);
                                            $row = mysqli_fetch_array($result);
                                            if ($row) {
                                                echo "$row[0]";
                                            } else {
                                                echo '0';
                                            }
                                        ?>
                                    </blockquote>
                                </div>
                                <div class="col s6">
                                    <blockquote>
                                        <h6>Followers</h6>
                                        1
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <h5>Accounts</h5>
                                <div class="divider"></div>
                                <?php 
                                    $query = "SELECT * FROM users WHERE kd_user = $user_id";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="row">
                                    <div class="col s4 mt-30">
                                        <img class="circle mb-30" src="assets/photo_profil/<?=$row['photo_profil']?>" alt="photo profile" width="150" height="150">
                                    </div>
                                    <div class="col s8">
                                        <h6 class="mt-30 ml-20">Change Photo Profile</h6>
                                        <div class="row">
                                            <form class="col s12" action="actions/update_photo-profil.php" method="post" enctype="multipart/form-data">
                                                <div class="file-field input-field">
                                                    <div class="btn orange button--primary--outline button--primary--outline--thin">
                                                        <span>File</span>
                                                        <input type="file" name="profile-photo" required>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" placeholder="Upload Photo Profile">
                                                    </div>
                                                </div>
                                                <button class="btn right mt-12 orange" name="submit-post">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider mt-12 mb-12"></div>
                                <div class="row">
                                    <form class="col s12" method="post" action="actions/update_user.php">
                                    <div class="row">
                                        <div class="input-field col s6">
                                        <input id="first_name" name="first_name" type="text" class="validate" value="<?=$row['first_name']?>" required>
                                        <label for="first_name">First Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                        <input id="last_name" name="last_name" type="text" class="validate" value="<?=$row['last_name']?>" required>
                                        <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                        <input id="username_reg" name="username" type="text" class="validate" value="<?=$row['username']?>" required>
                                        <label for="username_reg">Username</label>
                                        </div>
                                    </div>
                                    <button class="btn orange darken-1 waves-effect waves-light" type="submit" name="update_profile">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php mysqli_close($con);?>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>