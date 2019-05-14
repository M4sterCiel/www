<?php include "header.php";
session_start();?>
<!DOCTYPE html>
    <html>
        <body style="background-color: lightgrey;">
            <div id="profile-title" class="profile-title">
                <?php if (!empty($_SESSION['user']))
                    echo "<p>".$_SESSION['user']."'s pictures section</p>";?>
            </div>
            <div id="profile-gallery">
            </div>
            <br><br>
            <div id="scrollUp">
        <a id="back_top" href="#main-btn"><img id="logo_top_img" src="/camagru/img/back_to_top.png"/></a>
        </div>
        </body>
        <script type="text/javascript" src="../js/profile.js"></script>
    </html>