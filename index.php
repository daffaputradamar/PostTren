<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body style="overflow:hidden">
        <div class="row">
            <div class="col s6 orange darken-1 full-height valign-wrapper">
                <div class="container white-text">
                    <div class="row">
                        <div class="col s12 offset-s2">
                            <h5 class="flex-v-center"><i class="small material-icons">search
</i> <span>Follow your hobby</span> </h5>
                        </div>
                        <div class="col s12 offset-s2">
                            <h5 class="flex-v-center"><i class="small material-icons">people_outline
    </i> <span>Interact with other peoples</span> </h5>
                        </div>
                        <div class="col s12 offset-s2">
                            <h5 class="flex-v-center"><i class="small material-icons">chat_bubble_outline
    </i> <span>Join many conversations</span> </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6 full-height">
                <div class="center-align">
                    <div class="form-login">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col s4 offset-s1">
                                    <div class="input-field">
                                        <input id="username" type="text" class="validate">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <button class="submit-button" type="submit" name="login">Log in
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="form-register">
                        <!-- <?php include 'layouts/logo.php'; ?> -->
                        <h4>See what's new today</h4>
                        <h5>Join us now.</h5>
                        <div class="container">
                            <div class="row">
                                <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input id="username_reg" type="text" class="validate">
                                    <label for="username_reg">Username</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input id="password_reg" type="password" class="validate">
                                    <label for="password_reg">Password</label>
                                    </div>
                                </div>
                                <button class="btn-large orange darken-1 waves-effect waves-light" type="submit" name="register">Register
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