<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header">
    </div>
    <br>
    <br>
    <form method="POST" class="form_register_usr">
        <input type="text" name="firstname" value="" placeholder="Will"><br>
        <input type="text" name="lastname" value="" placeholder="Smith"><br>
        <input type="email" name="email" value="" placeholder="example@123.com"><br>
        <input type="password" name="passwd" value="" placeholder="password"><br>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was the fisrt car you had?</option>
        </select><br>
        <input type="text" name="private_answer" value="" placeholder="Answer"><br>
        <input type="radio" name="notification" value="notif-on">Receive notifications <br>
        <input type="radio" name="notification" value="notif-off">Do not receive notifications <br>
        <input type="submit" name="submit" value="Create">
    </form>
    </body>
    </html>