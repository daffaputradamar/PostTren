<?php 
    include 'helper/connection.php'; 
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $user_id = $_SESSION["user"];

    $sql = "SELECT * FROM users WHERE kd_user = $user_id";
    $res = mysqli_query($con, $sql);
    $baris = mysqli_fetch_assoc($res);

    $render_post = true;
    if ($_GET['tab'] === "post" OR !isset($_GET['tab'])) {
        $render_post = true;
    } else if ($_GET['tab'] === "comment") {
        $render_post = false;
    }
?>

<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <div class="row mb-0 h-100-vh">
            <div class="col s3 orange h-100 white-text" id="sidebar">
                <h4 class="center-align mt-20">SocialTren</h4>
                <div class="divider"></div>
                <div class="row mt-30">
                    <ul class="dashboard">
                        <li class="dashboard__list">
                            <div class="col s10 offset-s1">
                                <div class="flex flex--centered--vertical flex--centered--horizontal">
                                    <i class="material-icons mr-12">report_problem</i>
                                    <span><b>Report Problem</b></span>
                                </div>
                                <ul class="dashboard__list__list-menu mt-20 ml-20">
                                    <li class="dashboard__list__list-menu__item mb-12 flex">
                                        <a href="dashboard.php?tab=post" class="btn orange button--primary--outline flex" style="width:230px">
                                            <i class="material-icons mr-12">comment</i>
                                            <span>Reported Post</span>
                                        </a>
                                    </li>
                                    <li class="dashboard__list__list-menu__item mb-12 flex">
                                        <a href="dashboard.php?tab=comment" class="btn orange button--primary--outline flex" style="width:230px">
                                            <i class="material-icons mr-12">comment</i>
                                            <span>Reported Comment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s9">
                <div class="container">
                    <div class="flex flex--space-between--horizontal flex--centered--vertical mt-12">
                        <h4>Dashboard</h4>
                        <div>
                            <span class="mr-20"><?=$baris['username']?></span>
                            <a href="actions/logout.php" class="btn orange button--primary--outline button--primary--outline--thin">Logout</a>
                        </div>

                    </div>
                    <div class="divider"></div>
                    <?php if ($render_post) {?>
                        <h5>Reported Post</h5>
                        <?php
                            $query = "SELECT * FROM posts p
                            INNER JOIN users u ON p.kd_user = u.kd_user
                            WHERE p.is_reported = 1 AND p.deleted_at IS NULL";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) !== 0) {
                        ?>
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Post</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?=$row['username']?></td>
                                        <?php if ($row['photo'] != NULL) { ?>
                                            <td class="flex flex--centered--vertical">
                                                <img src="assets/posts/<?=$row['photo']?>" alt="" class="materialboxed mr-20" width="150">
                                                <p><?=$row['body']?></p>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <p><?=$row['body']?></p>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <form action="actions/unreport_post.php" method="post">
                                                <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                <button type="submit" class="btn btn-small amber button--info--outline mb-12" name="unreport-post" style="width:150px;">Undo Report</button>
                                            </form>
                                            <form action="actions/remove_post.php" method="post">
                                                <input type="hidden" name="kd_post" value="<?=$row['kd_post']?>">
                                                <button type="submit" class="btn btn-small red button--danger--outline mb-12" name="remove-post" style="width:150px;">Remove Post</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                            <?php } else {
                                echo "No Reported Post was Found";
                            } ?>
                    <?php } else { ?>
                        <h5>Reported Comment</h5>
                        <?php
                            $query = "SELECT * FROM comments c
                            INNER JOIN users u ON c.kd_user = u.kd_user
                            WHERE c.is_reported = 1 AND c.deleted_at IS NULL";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) !== 0) {
                        ?>
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?=$row['username']?></td>
                                        <td>
                                            <p><?=$row['body_comment']?></p>
                                        </td>
                                        <td>
                                            <form action="actions/unreport_comment.php" method="post">
                                                <input type="hidden" name="kd_comment" value="<?=$row['kd_comment']?>">
                                                <button type="submit" class="btn btn-small amber button--info--outline mb-12" name="unreport-comment" style="width:150px;">Undo Report</button>
                                            </form>
                                            <form action="actions/remove_comment.php" method="post">
                                                <input type="hidden" name="kd_comment" value="<?=$row['kd_comment']?>">
                                                <button type="submit" class="btn btn-small red button--danger--outline mb-12" name="remove-comment" style="width:150px;">Remove Post</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else {
                            echo "No Reported Comment was Found";
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php mysqli_close($con) ?>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>