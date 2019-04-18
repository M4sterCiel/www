<?php include "header.php";
include "footer.php";?>
<!DOCTYPE html>
    <html>
    <body>
    <div id="login_passwd_header">
    </div>
    <br>
    <br>
    <form method="POST" class="form_delete_usr">
    <label for="passwd">Enter your password</label>
    <input type="password" name="passwd" id="del-passwd" autofocus required><br>
    <label for="scdpasswd">Confirm your password</label>
    <input type="password" name="scdpasswd" id="del-passwd2" required><br>
    <input type="button" id="del-btn" value="Delete my account" onclick="checkForm(event)">
    <script type="text/javascript" src="delete.js"></script>
    </form>
    </body>
    <div id="del-div"></div>
    </html>

