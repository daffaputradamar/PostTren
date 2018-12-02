<?php 
    include 'actions/login_admin.php';
    
    if (isset($_SESSION['user'])) {
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body class="h-100-vh overflow-hidden">
        <div class="orange h-100 flex flex--centered--vertical flex--centered--horizontal">
            <div class="card">
                <div class="card-content">
                    <?php
                        if (isset($_GET['error'])) {
                    ?>
                        <div class="center-align red-text">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>
                    <h5 class="center-align">Login</h5>
                    <form action="actions/login_admin.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                            <input id="username" type="text" name="username" class="validate">
                            <label for="username">Username</label>
                            </div>
                            <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                            </div>
                            <div class="center-align">
                                <button type="submit" name="login-admin" class="btn btn-large mt-12 orange">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>