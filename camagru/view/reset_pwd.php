<div>
<p>Reset your password</p>
<?php
session_start();
require "../model.php";
if ($result = db_check('users', '*', 'username', $_GET['usr']))
{
    if ($result[0]['key'] == $_GET['key'])
    {
        $_SESSION['user'] = $_GET['usr'];
        $_SESSION['logd_on'] = 'ok';
        ?>
        <!DOCTYPE html>
        <html>
        <body>
        <br>
        <br>
        <form method="POST" class="form_nw_pwd">
        <label for="nwpwd">Enter your new password</label>
            <input id="nwpwd" type="password" name="nwpwd" autofocus required><br>
        <label for="nwpwd2">Confirm your password</label>
            <input id="nwpwd2" type="password" name="nwpwd2" value="" required><br>
            <input type="submit" name="submit" value="Create new password" onclick="checkForm(event)">
        </form>
        <script type="text/javascript" src="/camagru/js/reset_pwd.js"></script>
        <div id="reset-div"></div>
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