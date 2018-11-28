<?php
    include 'helper/connection.php';
?>
<div class="card">
    <div class="card-content">
        <div class="row">
            <?php 
                $query = "SELECT * from users WHERE kd_user = 1";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col s3">
                <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="70">
            </div>
            <div class="col s9">
                <div style="margin-top: 20px; margin-left: 20px;">
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
                            WHERE kd_user = 1";
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