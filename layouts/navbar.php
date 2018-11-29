<?php
    $user_id = $_SESSION["user"];
    $query = "SELECT * FROM users WHERE kd_user = $user_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
?>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="home.php" class="brand-logo orange-text center navLogo">SocialTren</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a class="orange-text" href="home.php"><i class="material-icons left">home</i>Home</a></li>
                </ul>
                <ul id="nav-mobile" class="right">
                    <li style="margin-right: 20px;">
                        <a href="#" class="dropdown-trigger" data-target='profile-dropdown'>
                            <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="35" style="padding-top: 12px">
                        </a>
                    </li>
                    <li><a href="home.php"><button class="submit-button" style="border-radius: 5px; margin-top:13px;">New Post</button></a></li>
                    <ul id='profile-dropdown' class='dropdown-content'>
                        <li><p class="black-text" style="padding-left:10px"><?=$row['first_name']?></li>
                        <li><p class="black-text" style="padding-left:10px"><?=$row['username']?></p></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a class="black-text" href="profile.php?kd_user=<?=$row['kd_user']?>"><i class="material-icons">person_outline</i>Profile</a></li>
                        <li><a class="black-text" href="settings.php?kd_user=<?=$row['kd_user']?>"><i class="material-icons">settings</i>Setting</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li>
                            <form action="actions/logout.php">
                                <button style="border:none; background: transparent; width:100%;" class="black-text" type="submit">
                                    <i class="tiny material-icons">exit_to_app</i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
</div>