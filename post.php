<!DOCTYPE html>
<html>
    <?php include 'layouts/header.php'; ?>

    <body>
        <?php include 'layouts/navbar.php'; ?>
        <div style="margin-top:12px"></div>
        <div class="container">
            <div class="row">
                <div class="col s8 offset-s2">
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <div class="row">
                                    <div class="col s2">
                                        <img src="assets/photo_profil/default-profile.png" class="circle" alt="photo profile" width="60">
                                    </div>
                                    <div class="col s10">
                                        <div style="display:flex; align-items: center; justify-content: space-between">
                                            <h6>username</h6>
                                            <a href="#" class="dropdown-trigger grey-text" data-target="option-dropdown"><i class="material-icons">more_vert</i></a>
                                            <ul id='option-dropdown' class='dropdown-content'>
                                                <li><a class="red-text center" href="#!">Report</a></li>
                                            </ul>
                                        </div>
                                        <div class="divider" style="margin-bottom:10px"></div>
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos soluta distinctio ab explicabo cumque! Accusamus qui ab magnam, cum voluptatem a accusantium illo? Dolorum, molestiae cum soluta optio accusamus sint.
                                        </p>
                                        <p style="margin-top: 5px;"></p>
                                    </div>
                                </div>
                                <div class="divider" style="margin: 15px 0"></div>
                                <div class="container">
                                    <div style="margin-bottom: 40px">
                                        <form action="#" method="post">
                                            <div class="input-field col s12">
                                                <textarea id="tweet_textarea" class="materialize-textarea"></textarea>
                                                <label for="tweet_textarea">Type your Comment</label>
                                            </div>
                                            <div class="right-align">
                                                <button class="submit-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">comment</i><span style="padding-left: 5px">Post Comment</span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col s2 center-align">
                                            <img src="assets/photo_profil/default-profile.png" class="circle" alt="photo profile" width="40">
                                        </div>
                                        <div class="col s10">
                                            <h6>Username</h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci accusamus cupiditate magni fuga quidem porro neque facilis cum quae dignissimos!</p>
                                        </div>
                                    </div>
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