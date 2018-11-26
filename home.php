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
                            <div class="row">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="file-field input-field">
                                    <div class="btn orange lighten-1">
                                        <span>File</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one file (Optional)">
                                    </div>
                                    </div>
                                    <div class="input-field col s12">
                                    <textarea id="tweet_textarea" class="materialize-textarea"></textarea>
                                    <label for="tweet_textarea">What's new today</label>
                                    <button class="submit-button right" style="border-radius: 5px; margin-top:13px;" href="#">Post</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <div class="row">
                                            <div class="col s3">
                                                <button class="submit-button love-button love-button-active" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">favorite</i><span style="padding-left: 5px">Like</span></button>
                                            </div>
                                            <div class="col s3">
                                                <button class="submit-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">comment</i><span style="padding-left: 5px">Comment</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider" style="margin: 15px 0"></div>
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
                                        <img src="assets/posts/brown3.jpg" alt="" class="responsive-img">
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos soluta distinctio ab explicabo cumque! Accusamus qui ab magnam, cum voluptatem a accusantium illo? Dolorum, molestiae cum soluta optio accusamus sint.
                                        </p>
                                        <div class="row">
                                            <div class="col s3">
                                                <button class="submit-button love-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">favorite</i><span style="padding-left: 5px">Like</span></button>
                                            </div>
                                            <div class="col s3">
                                                <button class="submit-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;"><i class="material-icons">comment</i><span style="padding-left: 5px">Comment</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <div>
                                <h6 style="margin-bottom:30px">Discover new people</h6>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col s3" style="margin-top: 15px">
                                        <img src="assets/photo_profil/default-profile.png" class="circle" alt="photo profile" width="35">
                                    </div>
                                    <div class="col s6">
                                        <p>Username</p>
                                        <button class="submit-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;" href="#">Follow</button>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col s3" style="margin-top: 15px">
                                        <img src="assets/photo_profil/default-profile.png" class="circle" alt="photo profile" width="35">
                                    </div>
                                    <div class="col s6">
                                        <p>Username</p>
                                        <button class="submit-button" style="border-radius: 5px; margin-top:13px; padding: 4px 8px;" href="#">Follow</button>
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