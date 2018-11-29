<?php
    include 'helper/connection.php';
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user_id = $_SESSION["user"];
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
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <?php 
                                    $query = "SELECT * from users WHERE kd_user = $kd_user_profile";
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
                                                WHERE kd_user = $kd_user_profile";
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
                    <?php if($user_id === $kd_user_profile) { ?>
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form action="actions/add_post.php" method="post" enctype="multipart/form-data">
                                    <div class="file-field input-field">
                                    <div class="btn orange button--primary--outline button--primary--outline--thin">
                                        <span>File</span>
                                        <input type="file" name="post-photo">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one file (Optional)">
                                    </div>
                                    </div>
                                    <div class="input-field col s12">
                                    <textarea id="tweet_textarea" name="body" class="materialize-textarea"></textarea>
                                    <label for="tweet_textarea">What's new today</label>
                                    <button class="btn right mt-12 orange" name="submit-post">Post</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                        <div>
                            <?php 
                                $query = "SELECT * FROM posts p 
                                    INNER JOIN users u ON p.kd_user = u.kd_user
                                    WHERE p.kd_user = $kd_user_profile
                                    ORDER BY created_at DESC";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $post = $row['kd_post'];
                            ?>
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s2">
                                            <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="60" height="60">
                                        </div>
                                        <div class="col s10">
                                        <div class="flex flex--centered--vertical flex--space-between--horizontal">    
                                            <a class="black-text" href="profile.php?kd_user=<?=$row['kd_user']?>">
                                            <div>
                                                <h6><?=$row['first_name']?> <?=$row['last_name']?></h6>
                                                <p><?=$row['username']?></p>
                                            </div>
                                            </a>
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
                                                <div class="right">
                                                    <a class="grey-text" href="post.php?kd_post=<?= $row['kd_post'] ?>"><small class="size--small">Read More</small></a>
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
                                                <div>
                                                    <a href="post.php?kd_post=<?= $row['kd_post'] ?>"><button class="btn blue-grey lighten-1 button--rounded mt-12"> <i class="material-icons">comment</i></button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            }
                        ?>    
                    </div>
                </div>
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <h6 class="mb-30">Discover new people</h6>
                                <?php
                                    $query = "SELECT * FROM users WHERE kd_user != $user_id ORDER BY RAND() LIMIT 3";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="row mt-12">
                                        <div class="col s3 mt-12">
                                            <img src="assets/photo_profil/<?= $row['photo_profil'] ?>" class="circle" alt="photo profile" width="35" height="35">
                                        </div>
                                        <div class="col s6">
                                            <p><?=$row['username']?></p>
                                            <button class="btn btn-small orange button--primary--outline button--rounded mt-12">Follow</button>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php mysqli_close($con) ?>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>