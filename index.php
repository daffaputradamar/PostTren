<?php 
    include 'actions/login.php';
    
    if (isset($_SESSION['user'])) {
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body class="h-100">
        <div class="row mb-0">
            <div class="col s6 orange darken-1 valign-wrapper h-100" style="height: 120vh">
                <div class="container white-text">
                    <div class="row">
                        <div class="col s12 offset-s2">
                            <h5 class="flex flex--centered--vertical">
                                <i class="small material-icons pr-12">search
                                </i> 
                                <span>Follow your hobby</span> 
                            </h5>
                        </div>
                        <div class="col s12 offset-s2">
                            <h5 class="flex flex--centered--vertical">
                                <i class="small material-icons pr-12">people_outline
                                    </i> 
                                    <span>Interact with other peoples</span> 
                            </h5>
                        </div>
                        <div class="col s12 offset-s2">
                            <h5 class="flex flex--centered--vertical">
                                <i class="small material-icons pr-12">chat_bubble_outline
                                    </i> 
                                    <span>Join many conversations</span> 
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 h-100">
                <div class="center-align">
                    <div class="mt-30">
                        <?php if ($_GET['error']) { ?>
                                <div class="card">
                                    <div class="card-content">
                                        <p class="red-text"><?= $_GET['error'] ?></p>
                                    </div>
                                </div>
                        <?php } ?>
                        <form action="actions/login.php" method="post">
                            <div class="row">
                                <div class="col s4 offset-s1">
                                    <div class="input-field">
                                        <input id="username" type="text" class="validate" name="username">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col s3 mt-12">
                                    <button class="btn waves-effect waves-light orange button--primary--outline button--rounded" type="submit" name="login">Log in
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="mt-12 register">
                        <h4>See what's new today</h4>
                        <h5>Join us now.</h5>
                        <div class="register__container">
                            <div class="row">
                                <form class="col s12" method="post" action="actions/add_user.php">
                                <div class="row">
                                    <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate" name="first-name" required>
                                    <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="last-name" required>
                                    <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input id="username_reg" type="text" class="validate" name="username" required>
                                    <label for="username_reg">Username</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input id="password_reg" type="password" class="validate" name="password" required>
                                    <label for="password_reg">Password</label>
                                    </div>
                                </div>
                                <button class="btn btn-large orange darken-1 waves-effect waves-light button--rounded" type="submit" name="register">Register
                                        <i class="material-icons right">send</i>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>