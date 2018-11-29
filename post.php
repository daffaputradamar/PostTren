<?php
    include 'helper/connection.php';

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
        <div style="margin-top:12px"></div>
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
                                ?>
                                    <div class="row">
                                        <div class="col s2">
                                            <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="60">
                                        </div>
                                        <div class="col s10">
                                            <div style="display:flex; align-items: center; justify-content: space-between">
                                                <div>
                                                    <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                    <p><?=$row['username']?></p>
                                                </div>
                                                <div style="display:flex; align-items: center;">
                                                    <form action="actions/update_post.php" method="post" style="margin-right: 10px">
                                                        <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                        <input type="hidden" name="kd_user" value="<?=$row['kd_user']?>">
                                                        <button type="submit" class="submit-button" style="padding: 2px; margin:0;border-radius: 10px">
                                                            <i class="material-icons">edit</i> 
                                                        </button>
                                                    </form>
                                                    <form action="actions/report_post.php" method="post">
                                                        <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                        <button type="submit" class="report-button" style="padding: 5px 4px 2px 4px; margin:0;border-radius: 10px">
                                                            <i class="tiny material-icons">report</i> 
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="divider" style="margin-bottom:10px"></div>
                                            <?php if ($row['photo'] != NULL) { ?>
                                                <img src="assets/posts/<?=$row['photo']?>" alt="" class="responsive-img materialboxed">
                                            <?php } ?>
                                            <p>
                                                <?= $row['body'] ?>
                                            </p>
                                            <div class="row">
                                                <div class="col s3">
                                                    <?php 
                                                        $query = "SELECT * FROM likes WHERE kd_post = $kd_post AND kd_user = 1 LIMIT 1";
                                                        $result = mysqli_query($con, $query);
                                                        if (mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <form action="actions/add_like.php" method="post">
                                                            <input type="hidden" name="kd_post" value=<?=$kd_post?>>
                                                            <button class="submit-button love-button love-button-active" type="submit" name="submit-like" id="fav-btn" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">favorite</i><span style="padding-left: 5px">Like</span>
                                                            </button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <form action="actions/add_like.php" method="post">
                                                            <input type="hidden" name="kd_post" value=<?=$kd_post?>>
                                                            <button class="submit-button love-button" type="submit" name="submit-like" id="fav-btn" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">favorite</i><span style="padding-left: 5px">Like</span>
                                                            </button>
                                                        </form>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="divider" style="margin: 15px 0"></div>
                                <div class="container">
                                    <div style="margin-bottom: 40px">
                                        <form action="actions/add_comment.php" method="post">
                                            <input type="hidden" name="kd_post" value="<?=$kd_post?>">
                                            <div class="input-field col s12">
                                                <textarea id="tweet_textarea" class="materialize-textarea" name="body-comment"></textarea>
                                                <label for="tweet_textarea">Type your Comment</label>
                                            </div>
                                            <div class="right-align">
                                                <button class="submit-button" type="submit" name="submit-comment" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">comment</i><span style="padding-left: 5px">Post Comment</span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php 
                                    $query = "SELECT * FROM comments c 
                                        INNER JOIN posts p ON c.kd_post = p.kd_post
                                        INNER JOIN users u ON p.kd_user = u.kd_user
                                        WHERE c.kd_post = $kd_post
                                        ORDER BY c.created_at DESC";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="row">
                                            <div class="col s2 center-align">
                                                <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="40">
                                            </div>
                                            <div class="col s10">
                                                <div style="display:flex; align-items: center; justify-content: space-between">
                                                    <div>
                                                        <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                    <p><?=$row['username']?></p>
                                                    </div>
                                                    <div style="display:flex; align-items: center;">
                                                        <form action="actions/report_comment.php" method="post">
                                                            <input type="hidden" name="kd_comment" value="<?=$row['kd_comment']?>">
                                                            <button type="submit" class="report-button" style="padding: 5px 4px 2px 4px; margin:0;border-radius: 10px">
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