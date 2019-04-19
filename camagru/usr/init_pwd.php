<?php
require "../model.php";
if ($result = db_check('users', '*', 'username', $_POST['user']))
{
    if (trim(strtolower($result[0]['private_answer'])) == trim(strtolower($_POST['answer'])))
    {
        $key = md5(microtime(TRUE)*100000);
        db_update_usr('key', $key, $_POST['username']);
        $subject = "Camagru | Reset your password";
        $header = "From: password@camagru.com";
        $message = "Dear " . $_POST['user'] . ",

To reset your password, please follow the link below or copy/paste it in your browser.

http://localhost:8080/camagru/view/reset_pwd.php?usr=" . urlencode($_POST['username']) . "&key=" . urlencode($key) . "

--------------------------------
This is an automatic mail system, please do not answer this mail.";
        if (mail($result[0]['email'], $subject, $message, $header) == false)
            echo "Mail not delivered";
        else
            echo "An email has been sent to you with the procedure to re-initialize your password!";
    }
    else
    {
        echo "Incorrect Question/answer...";
    }
}
