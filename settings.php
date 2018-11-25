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
                                <div class="col s3">
                                    <img src="assets/photo_profil/default-profile.png" class="circle" alt="photo profile" width="70">
                                </div>
                                <div class="col s9">
                                    <div style="margin-top: 30px; margin-left: 20px;">
                                        <h6>username</h6>                                
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s6">
                                    <blockquote>
                                        <h6>Posts</h6>
                                        1
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
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <h5>Accounts</h5>
                                <div class="divider"></div>
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
                                    <button class="btn-large orange darken-1 waves-effect waves-light" type="submit" name="register">Update
                                            <i class="material-icons right">send</i>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'layouts/scripts.php'; ?>
    </body>
</html>