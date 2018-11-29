<?php
    include 'helper/connection.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user_id = $_SESSION['user'];

    $kd_post = $_GET['kd_post'];

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
                                                    <?php if ($user_id === $row['kd_user']) { ?>
                                                        <form action="actions/update_post.php" method="post" class="mr-12">
                                                            <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                            <input type="hidden" name="kd_user" value="<?=$row['kd_user']?>">
                                                            <button type="submit" class="btn btn-small orange button--primary--outline button--rounded button--primary--outline--thin">
                                                                <i class="material-icons">edit</i> 
                                                            </button>
                                                        </form>
                                                    <?php } ?>
                                                    <form action="actions/report_post.php" method="post">
                                                        <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                        <button type="submit" class="btn grey btn-small button--danger--outline button--danger--outline--thin button--rounded">
                                                            <i class="tiny material-icons">report</i> 
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="divider" style="mb-12"></div>
                                            <?php if ($row['photo'] != NULL) { ?>
                                                <img src="assets/posts/<?=$row['photo']?>" alt="" class="responsive-img materialboxed">
                                            <?php } ?>
                                            <br>
                                            <p>
                                                <?= $row['body'] ?>
                                            </p>
                                            <div class="mt-12">
                                                <div class="left">
                                                    <?php
                                                        $query = "SELECT COUNT(kd_user) as like_sum FROM likes
                                                        WHERE kd_post = $post";
                                                        $res = mysqli_query($con, $query);
                                                        $hasil_hitung = mysqli_fetch_array($res);
                                                        if ($hasil_hitung) {
                                                            echo "<small class='size--small mr-12'>$hasil_hitung[0] likes</small>";
                                                        } else {
                                                            echo "<small class='size--small mr-12'> 0 like like</small>";
                                                        }
                                                    ?>
                                                    <?php
                                                        $query = "SELECT COUNT(kd_comment) as comment_sum FROM comments
                                                        WHERE kd_post = $post";
                                                        $res = mysqli_query($con, $query);
                                                        $hasil_hitung = mysqli_fetch_array($res);
                                                        if ($hasil_hitung) {
                                                            echo "<small class='size--small mr-12'>$hasil_hitung[0] comments</small>";
                                                        } else {
                                                            echo "<small class='size--small mr-12'> 0 like comment</small>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="divider"></div>
                                            <div class="flex">
                                                <div class="mr-12">
                                                    <?php 
                                                        $query = "SELECT * FROM likes WHERE kd_post = $post AND kd_user = $user_id LIMIT 1";
                                                        $res = mysqli_query($con, $query);
                                                        if (mysqli_fetch_assoc($res)) {
                                                    ?>
                                                        <form action="actions/add_like.php" method="post">
                                                            <input type="hidden" name="kd_post" value=<?=$post?>>
                                                            <button class="btn button--rounded mt-12 button--love--active" type="submit" name="submit-like"><i class="material-icons">favorite</i>
                                                            </button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <form action="actions/add_like.php" method="post">
                                                            <input type="hidden" name="kd_post" value=<?=$post?>>
                                                            <button class="btn grey lighten-1 button--rounded mt-12" type="submit" name="submit-like"><i class="material-icons">favorite</i>
                                                            </button>
                                                        </form>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="divider mt-12 mb-12"></div>
                                <div class="container">
                                    <div class="mb-30">
                                        <form action="actions/add_comment.php" method="post">
                                            <input type="hidden" name="kd_post" value="<?=$kd_post?>">
                                            <div class="input-field col s12">
                                                <textarea id="tweet_textarea" class="materialize-textarea" name="body-comment" required></textarea>
                                                <label for="tweet_textarea">Type your Comment</label>
                                            </div>
                                            <div class="right-align">
                                                <button class="btn orange button--primary--outline button--rounded flex flex--centered--vertical" type="submit" name="submit-comment""><i class="material-icons">comment</i><span class="ml-5">Post Comment</span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php 
                                    $query = "SELECT * FROM comments c 
                                        INNER JOIN posts p ON c.kd_post = p.kd_post
                                        INNER JOIN users u ON c.kd_user = u.kd_user
                                        WHERE c.kd_post = $kd_post
                                        ORDER BY c.created_at DESC";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="row">
                                            <div class="col s2 center-align">
                                                <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="40" height="40">
                                            </div>
                                            <div class="col s10">
                                                <div class="flex flex--centered--vertical flex--space-between--horizontal">
                                                    <div>
                                                        <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                    <p><?=$row['username']?></p>
                                                    </div>
                                                    <div class="flex flex--centered--vertical">
                                                        <form action="actions/report_comment.php" method="post">
                                                            <input type="hidden" name="kd_comment" value="<?=$row['kd_comment']?>">
                                                            <button type="submit" class="btn grey btn-small button--danger--outline button--danger--outline--thin button--rounded">
                                                                <i class="tiny material-icons">report</i> 
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="divider" style="margin: 5px 0"></div>
                                                <p><?=$row['body_comment']?></p>
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
        </div>
        <script src="js/like.js"></script>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>