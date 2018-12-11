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
                <div class="col s4">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <?php 
                                $query = "SELECT * from users WHERE kd_user = $kd_user_profile";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                                $poster = $row['kd_user'];
                                ?>
                                <div class="col s3">
                                    <img src="assets/photo_profil/<?= $row['photo_profil'] ?>" class="circle" alt="photo profile" width="70" height="70">
                                </div>
                                <div class="col s9">
                                    <div class="mt-20 ml-20">
                                        <div>
                                            <h6><?= $row['first_name'] ?> <?= $row['last_name'] ?></h6>
                                            <p><?= $row['username'] ?></p>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s6">
                                    <blockquote>
                                        <a href="profile.php?kd_user=<?= $poster ?>" class="black-text">
                                        <h6>Posts</h6>
                                        <?php 
                                        $query = "SELECT COUNT(kd_post) as post_sum FROM posts
                                                WHERE kd_user = $kd_user_profile AND deleted_at IS NULL AND p.is_deleted = 0";
                                        $result = mysqli_query($con, $query);
                                        $post_sum = mysqli_fetch_array($result);
                                        if ($post_sum) {
                                            echo "$post_sum[0]";
                                        } else {
                                            echo '0';
                                        }
                                        ?>
                                        </a>
                                    </blockquote>
                                </div>
                                <div class="col s6">
                                    <blockquote>
                                        <a href="#modal-my-follower" class="modal-trigger black-text">
                                        <h6>Followers</h6>
                                        <?php 
                                        $query = "SELECT COUNT(kd_user_followed) as follower_sum FROM followers
                                                WHERE kd_user_followed = $kd_user_profile";
                                        $result = mysqli_query($con, $query);
                                        $row = mysqli_fetch_array($result);
                                        if ($row) {
                                            echo "$row[0]";
                                        } else {
                                            echo '0';
                                        }
                                        ?>
                                        </a>
                                    </blockquote>
                                    <div id="modal-my-follower" class="modal">
                                        <div class="modal-content">
                                            <h5>Followers</h5>
                                            <?php
                                            $query = "SELECT * FROM followers
                                                INNER JOIN users ON kd_user_following = kd_user
                                                WHERE kd_user_followed = $kd_user_profile";

                                            $result = mysqli_query($con, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $user = $row['kd_user'];
                                                ?>
                                                <a href="profile.php?kd_user=<?= $user ?>">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="row">
                                                                <div class="col s8">
                                                                    <div class="flex flex--centered--vertical">
                                                                        <img src="assets/photo_profil/<?= $row['photo_profil'] ?>" alt="photo profile" class="circle mr-20" width="100" height="100">
                                                                        <div class="ml-20 black-text">
                                                                            <h6><?= $row['first_name'] ?> <?= $row['last_name'] ?></h6>
                                                                            <p><?= $row['username'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col s4">
                                                                    <div class="flex flex--centered--vertical flex--end--horizontal">
                                                                        <?php 
                                                                        if ($user_id !== $user) {
                                                                            ?>
                                                                        <?php
                                                                        $query = "SELECT * FROM followers WHERE kd_user_followed = $user AND kd_user_following = $user_id LIMIT 1";
                                                                        $res = mysqli_query($con, $query);
                                                                        if (mysqli_fetch_assoc($res)) {
                                                                            ?>
                                                                            <form action="actions/add_follower.php" method="post">
                                                                                <input type="hidden" name="kd_user" value=<?= $user ?>>
                                                                                <button class="btn btn-small mt-12 orange" type="submit" name="submit-follow">following
                                                                                </button>
                                                                            </form>
                                                                        <?php 
                                                                    } else { ?>
                                                                            <form action="actions/add_follower.php" method="post">
                                                                                <input type="hidden" name="kd_user" value=<?= $user ?>>
                                                                                <button class="btn btn-small button--rounded mt-12 button--primary--outline" type="submit" name="submit-follow">follow
                                                                                </button>
                                                                            </form>
                                                                        <?php 
                                                                    }
                                                                } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php 
                                        } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex--centered--horizontal">
                                <?php
                                if ($user_id !== $poster) {
                                    $query = "SELECT * FROM followers WHERE kd_user_followed = $poster AND kd_user_following = $user_id LIMIT 1";
                                    $res = mysqli_query($con, $query);
                                    if (mysqli_fetch_assoc($res)) {
                                        ?>
                                    <form action="actions/add_follower.php" method="post">
                                        <input type="hidden" name="kd_user" value=<?= $poster ?>>
                                        <button class="btn btn-small mt-12 orange" type="submit" name="submit-follow">following
                                        </button>
                                    </form>
                                <?php 
                            } else { ?>
                                    <form action="actions/add_follower.php" method="post">
                                        <input type="hidden" name="kd_user" value=<?= $poster ?>>
                                        <button class="btn btn-small button--rounded mt-12 button--primary--outline" type="submit" name="submit-follow">follow
                                        </button>
                                    </form>
                                <?php 
                            }
                        } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s8">
                    <?php if ($user_id === $kd_user_profile) { ?>
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
                                    <textarea id="tweet_textarea" name="body" class="materialize-textarea" required></textarea>
                                    <label for="tweet_textarea">What's new today</label>
                                    <button class="btn right mt-12 orange" name="submit-post">Post</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                } ?>
                        <div>
                            <?php 
                            $query = "SELECT * FROM posts p 
                                    INNER JOIN users u ON p.kd_user = u.kd_user
                                    WHERE p.kd_user = $kd_user_profile AND p.deleted_at IS NULL
                                    ORDER BY created_at DESC";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $post = $row['kd_post'];
                                $poster = $row['kd_user'];
                                ?>
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s2">
                                            <img src="assets/photo_profil/<?= $row['photo_profil'] ?>" class="circle" alt="photo profile" width="60" height="60">
                                        </div>
                                        <div class="col s10">
                                        <div class="flex flex--centered--vertical flex--space-between--horizontal">    
                                            <a class="black-text mr-20" href="profile.php?kd_user=<?= $poster ?>">
                                                <div>
                                                    <h6><?= $row['first_name'] ?> <?= $row['last_name'] ?></h6>
                                                    <p><?= $row['username'] ?></p>
                                                </div>
                                            </a>
                                            <div class="flex flex--centered--vertical">
                                                <?php if ($user_id === $poster) { ?>
                                                    <a class='dropdown-trigger grey-text' href='#' data-target='more-menu-me'><i class="material-icons">more_vert</i></a>
                                                        <ul id='more-menu-me' class='dropdown-content'>
                                                            <li class="center-align">
                                                                <a href="edit_post.php?kd_post=<?= $post ?>" class="amber-text">
                                                                <i class="material-icons">edit</i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#modal-delete" class="red-text modal-trigger">
                                                                <i class="material-icons">delete</i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div id="modal-delete" class="modal h-120">
                                                            <div class="modal-content">
                                                                <form action="actions/delete_post.php" method="post">
                                                                    <h6>Are you sure you want to delete this post?</h6>
                                                                    <input type="hidden" name="kd_post" value="<?= $row['kd_post'] ?>">
                                                                    <input type="hidden" name="kd_user" value="<?= $poster ?>">
                                                                    <button type="submit" class="btn red button--danger--outline button--danger--outline--thin right" name="delete-post">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                <?php 
                                            } ?>
                                                <?php if ($user_id !== $poster) { ?>
                                                    <a class='dropdown-trigger grey-text' href='#' data-target='more-menu-other'><i class="material-icons">more_vert</i></a>
                                                    <ul id='more-menu-other' class='dropdown-content'>
                                                        <li>
                                                            <a href="#modal-report" class="red-text modal-trigger">
                                                            <i class="material-icons">report</i> Report
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div id="modal-report" class="modal h-120">
                                                        <div class="modal-content">
                                                            <form action="actions/report_post.php" method="post">
                                                                <h6>Are you sure you want to report this post?</h6>
                                                                <input type="hidden" name="kd_post" value="<?= $row['kd_post'] ?>">
                                                                <input type="hidden" name="kd_user" value="<?= $poster ?>">
                                                                <button type="submit" class="btn red button--danger--outline button--danger--outline--thin right" name="report-post">
                                                                    Report
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php 
                                            } ?>
                                            </div>
                                        </div>
                                        <div class="divider mb-12"></div>
                                        <?php if ($row['photo'] != null) { ?>
                                            <img src="assets/posts/<?= $row['photo'] ?>" alt="" class="responsive-img materialboxed">
                                        <?php 
                                    } ?>
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
                                                        WHERE kd_post = $post
                                                        AND deleted_at IS NULL";
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
                                                            <input type="hidden" name="kd_post" value=<?= $post ?>>
                                                            <button class="btn button--rounded mt-12 button--love--active" type="submit" name="submit-like"><i class="material-icons">favorite</i>
                                                            </button>
                                                        </form>
                                                    <?php 
                                                } else { ?>
                                                        <form action="actions/add_like.php" method="post">
                                                            <input type="hidden" name="kd_post" value=<?= $post ?>>
                                                            <button class="btn grey lighten-1 button--rounded mt-12" type="submit" name="submit-like"><i class="material-icons">favorite</i>
                                                            </button>
                                                        </form>
                                                    <?php 
                                                } ?>
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
            </div>
        </div>
        <?php mysqli_close($con) ?>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>