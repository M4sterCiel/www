<?php
    session_start();
    include ('../includes/tools.php');
    function    display_error() {
        ?>
        <div class="container">
            <div class="alert-fail">
                <p>Ops!</p>
                <p>The login and password you typed are incorrect!</p>
            </div>
        </div>
        <?php
    }
    if (isset($_POST['login']) AND $_POST['login'] && isset($_POST['passwd']) AND $_POST['passwd'] && isset($_POST['submit']) AND $_POST['submit'] === "OK")
    {
        $conn = db_connect();
        $post_log = db_security($conn, $_POST['login']);
        $hashed = hash('whirlpool', db_security($conn, $_POST['passwd']));
        $query = "SELECT * FROM users WHERE login='$post_log' AND password='$hashed'";
        $data = mysqli_fetch_array(mysqli_query($conn, $query), MYSQLI_ASSOC);
        if (!isset($data['login'])) {
            mysqli_close($conn);
            display_error();
        }
        else {
                $_SESSION['logd_usr'] = db_security($conn, $post_log);
                $_SESSION['isAdm'] = db_security($conn, $data['isAdm']);
                mysqli_close($conn);
                header('Location: ../index.php');
        }
    }
    else if (isset($_POST['submit']) AND $_POST['submit'] === "OK")
       display_error();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../style.css">
    </head>

    <body>
    <div id="login_passwd_header">
        <a href="../index.php"><button>Home</button></a>
    </div>
    <form method="POST" class="form_login_usr">
        <input type="text" name="login" value="" placeholder="login">
        <input type="password" name="passwd" value="" placeholder="password">
        <input type="submit" name="submit" value="OK">
    </form>
    </body>
    </html>
