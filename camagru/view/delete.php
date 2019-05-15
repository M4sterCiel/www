<?php 
session_start();
include "header.php";
include "footer.php";

if (!$_SESSION['id'] || !$_SESSION['user'])
    header("Location: /camagru/index.php");
?>
<!DOCTYPE html>
    <html>
    <body>
    <br>
    <fieldset id="groupe">
        <form id="del-form" method="POST" class="form_delete_usr">
            <div id="del-div"></div><br>
            <label for="passwd">Enter your password</label><br><br>
            <input type="password" name="passwd" id="del-passwd" placeholder="Type your password" autofocus required><br><br>
            <label for="scdpasswd">Confirm your password</label><br><br>
            <input type="password" name="scdpasswd" id="del-passwd2" placeholder="Type your password" required><br><br>
            <input type="submit" id="del-btn" value="Delete my account" onclick="checkForm(event)">
        </form>
    </fieldset>
    <script type="text/javascript" src="/camagru/js/delete.js"></script>
    </body>
    </html>

