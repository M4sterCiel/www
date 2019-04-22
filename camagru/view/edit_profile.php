<?php include "header.php";
session_start();?>
<!DOCTYPE html>
    <html>
    <body>
    <br>
    <br>
    <div id="main-div">
    <label for="usrname">Username</label><br>
    <?php
    if ($_SESSION['user'])
        echo "<p name=\"usrname\">" . $_SESSION['user'] . "</p>";
    ?>
    <div id="edit-usrname">
    <input id="btn-usrname" type="submit" value="Edit" onclick="add_usrname_form()"></div>
    <label for="email">Email address</label><br>
    <?php
    if ($_SESSION['email'])
        echo "<p name=\"email\">" . $_SESSION['email'] . "</p>";
    ?>
    <div id="edit-email"></div>
    <input id="btn-email" type="submit" value="Edit" onclick="add_email_form(event)"><br>
    <input type="submit" value="Change your password" onclick="edit_pwd(event)">
    </div>
    <script type="text/javascript" src="/camagru/js/edit_profile.js"></script>
    </body>
    </html>