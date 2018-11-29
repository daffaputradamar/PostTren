<?php
    include 'helper/connection.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $kd_user_profile = $_GET['kd_user'];
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <?php include 'layouts/navbar.php'; ?>
        <div style="margin-top:12px"></div>
        <div class="container">
            <div class="row">
                <div class="col s3">
                    <?php include 'layouts/profile_card.php'; ?>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <h5>Accounts</h5>
                                <div class="divider"></div>
                                <?php 
                                    $query = "SELECT * FROM users WHERE kd_user = $kd_user_profile";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="row">
                                    <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                        <input id="first_name" type="text" class="validate" value="<?=$row['first_name']?>">
                                        <label for="first_name">First Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                        <input id="last_name" type="text" class="validate" value="<?=$row['last_name']?>">
                                        <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                        <input id="username_reg" type="text" class="validate" value="<?=$row['username']?>">
                                        <label for="username_reg">Username</label>
                                        </div>
                                    </div>
                                    <button class="btn-large orange darken-1 waves-effect waves-light" type="submit" name="register">Update
                                            <i class="material-icons right">send</i>
                                    </button>
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