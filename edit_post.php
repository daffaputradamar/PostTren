<?php
    include 'helper/connection.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user_id = $_SESSION['user'];

    $kd_post = $_GET['kd_post'];

    $query = "SELECT kd_user from posts WHERE kd_post = $kd_post";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['kd_user'] !== $user_id) {
        header('Location: home.php');
    }

    if (isset($_GET['error'])) {
        $pesan = $_GET['error'];
    }
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <?php include 'layouts/navbar.php'; ?>
        <div class="mt-12"></div>
        <div class="container">
            <div class="row">
                <div class="col s8 offset-s2">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="card">
                            <div class="card-content">
                                <p class="red-text"><?= $_GET['error'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <?php 
                                    $query = "SELECT * FROM posts p 
                                        INNER JOIN users u ON p.kd_user = u.kd_user
                                        WHERE kd_post = $kd_post
                                        ORDER BY created_at DESC";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $post = $row['kd_post'];
                                ?>
                                    <div class="row">
                                        <div class="col s2">
                                            <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="60" height="60">
                                        </div>
                                        <div class="col s10">
                                            <div class="flex flex--centered--vertical flex--space-between--horizontal">
                                                <div>
                                                    <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                    <p><?=$row['username']?></p>
                                                </div>
                                                <div class="flex flex--centered--vertical">
                                                    <!-- Kosong.. -->
                                                </div>
                                            </div>
                                            <div class="divider mb-12"></div>
                                            <form action="actions/update_post.php" method="post">
                                                <?php if ($row['photo'] != NULL) { ?>
                                                    <img src="assets/posts/<?=$row['photo']?>" alt="" class="responsive-img materialboxed">
                                                <?php } ?>
                                                <br>
                                                <div class="input-field">
                                                    <input type="hidden" name="post-user" value="<?= $row['kd_user'] ?>" >
                                                    <input type="hidden" name="post-id" value="<?= $post ?>">
                                                    <input id="body-post" name="post-body" type="text" class="validate" value="<?=$row['body']?>" required>
                                                    <label for="body-post">Post Description</label>
                                                    <button class="btn orange darken-1 waves-effect waves-light right" type="submit" name="update_post">Update</button>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php 
                                    } 
                                    mysqli_close($con);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>