<?php
    $query = "SELECT * FROM users WHERE kd_user = $user_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
?>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="home.php" class="brand-logo orange-text center navLogo">SocialTren</a>
                <ul id="nav-mobile">
                    <li><a class="orange-text" href="home.php"><i class="material-icons left">home</i>Home</a></li>
                    <li>    
                        <form action="search.php" method="get">
                            <div class="center row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s8 orange-text">
                                            <i class="orange-text material-icons prefix top-0" style="top:0;">search</i>
                                            <input type="text" name="username" placeholder="Find People" class="orange-text" >
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-small orange button--primary--outline button--primary--outline--thin">Find</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>   
                </ul>
                <ul id="nav-mobile" class="right">
                    <li class="mr-20">
                        <a href="#" class="dropdown-trigger black-text" data-target='profile-dropdown'>
                            <?=$row['username']?>
                        </a>
                    </li>
                    <ul id='profile-dropdown' class='dropdown-content'>
                        <li class="button__a--no-background button__a--no-pointer"><p class="black-text flex flex--centered--horizontal">
                            <img src="assets/photo_profil/<?=$row['photo_profil']?>" class="circle" alt="photo profile" width="35" height="35" width="35">
                        </p></li>
                        <li class="button__a--no-background button__a--no-pointer"><p class="black-text center-align"><?=$row['first_name']?> <br> <?=$row['last_name']?></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a class="black-text" href="profile.php?kd_user=<?=$row['kd_user']?>"><i class="material-icons">person_outline</i>Profile</a></li>
                        <li><a class="black-text" href="settings.php?>"><i class="material-icons">settings</i>Setting</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li>
                            <a class="black-text" href="actions/logout.php"><i class="material-icons">exit_to_app</i>Logout</a></li>
                        </li>
                    </ul>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="home.php" class="button__a--no-background"><button class="btn orange button--primary--outline">New Post</button></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>