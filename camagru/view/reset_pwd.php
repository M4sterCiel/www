<div>
<h1 class="reset-pwd">Reset your password</h1>
<?php
session_start();
require "../model.php";
if ($result = db_check('users', '*', 'username', $_GET['usr']))
{
    if (($result[0]['key'] == $_GET['key']) || ($_GET['data'] == 'password'))
    {
        $_SESSION['user'] = $_GET['usr'];
        $_SESSION['logd_on'] = 'ok';
        ?>
        <!DOCTYPE html>
        <html>
            <head><link rel="stylesheet" href="/camagru/style.css"></head>
        <body>
        <br>
        <br>
        <fieldset id="groupe">
        <form method="POST" class="form_nw_pwd">
        <div id="reset-div"></div><br>
        <label for="nwpwd">Enter your new password</label><br>
        <label id="lab-reset-pwd" for="nwpwd">(UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)</label><br><br>
            <input id="nwpwd" type="password" name="nwpwd" autofocus placeholder="Type your password" required><br><br>
        <label for="nwpwd2">Confirm your password</label><br><br>
            <input id="nwpwd2" type="password" name="nwpwd2" value="" placeholder="Type your password" required><br><br>
            <input type="submit" name="submit" value="Create new password" onclick="checkForm(event)">
        </form>
        </fieldset>
        <br>
        <script type="text/javascript" src="/camagru/js/reset_pwd.js"></script>
        </body>
        </html>
        <?php
    }
    else
    {
        ?>
        <div>An error has occured!</div>
        <?php
    }
}
else
{
    ?>
    <div>An error has occured!</div>
    <?php
}
?>
</div>