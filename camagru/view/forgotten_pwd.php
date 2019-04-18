<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header">
    </div>
    <br>
    <br>
    <form method="POST" class="form_forgotten_usr">
        <input type="email" name="email" value="" placeholder="example@123.com"><br>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was the fisrt car you had?</option>
        </select><br>
        <input type="text" name="private_answer" value="" placeholder="Answer"><br>
        <input type="submit" name="submit" value="Send new password">
    </form>
    </body>
    </html>