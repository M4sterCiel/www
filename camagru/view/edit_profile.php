<?php include "header.php";
session_start();
if (!$_SESSION['id'] || !$_SESSION['user'])
    header("Location: /camagru/index.php");?>
<!DOCTYPE html>
    <html>
    <body>
        <h2>My settings</h2>
    <div class="mainDiv-edit">
        <form id="usr-form-edit">
            <label for="usr-edit">Username:</label>
            <p id="usr-edit"></p>
            <input id="usr-sub-edit" type="submit" value="Edit your username" onclick="editUsername(event)">
        </form>
        <br>
        <form id="mail-form-edit">
            <label for="mail-edit">Email address:</label>
            <p id="mail-edit"></p>
            <input id="mail-sub-edit" type="submit" value="Edit your email" onclick="editEmail(event)">
        </form>
        <br>
        <button onclick="editPassword()">Reset your password</button>
        <br>
        <br>
        <input id="edit-notif-on" type="radio" name="notification" onchange="editNotif()">Accept notifications
        <input id="edit-notif-off" type="radio" name="notification" onchange="editNotif()">Do not receive notifications
    </div>
    <script type="text/javascript" src="/camagru/js/edit_profile.js"></script>
    </body>
    </html>