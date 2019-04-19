<?php include "/camagru/view/header.php";?>
<!DOCTYPE html>
    <html>
    <body>
    <br>
    <br>
    <form method="POST" class="form_nw_pwd">
    <label for="nwpwd">Enter your new password</label>
        <input id="nwpwd" type="password" name="nwpwd" required><br>
    <label for="nwpwd2">Confirm your password</label>
        <input id="nwpwd2" type="password" name="nwpwd2" value="" required><br>
        <input type="submit" name="submit" value="Create new password" onclick="checkForm(event)">
    </form>
    <script type="text/javascript" src="/camagru/js/reset_pwd.js"></script>
    <div id="reset-div"></div>
    </body>
    </html>
