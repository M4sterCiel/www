<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    <body>
    <br>
    <br>
    <form method="POST" class="form_forgotten_usr">
        <input id="usr-fpwd" type="text" name="username" placeholder="Username" autofocus required><br>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was the fisrt car you had?</option>
        </select><br>
        <input id="answer-pwd" type="text" name="private_answer" value="" placeholder="Answer" required><br>
        <input type="submit" name="submit" value="Send initialization mail" onclick="checkForm(event)">
    </form>
    <div id="forgotten-div"></div>
    <script type="text/javascript" src="/camagru/js/forgotten_pwd.js"></script>
    </body>
    </html>