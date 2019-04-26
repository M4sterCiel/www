<?php
require "../model.php";
$username = $_GET['usr'];
$key = $_GET['key'];
if (($result = db_check('users', '*', 'username', $username)))
{
    if ($result[0]['active'] == 1)
    {
        echo "<style>
        p {
            text-align: center;
            font-size: 150%;
        }
        img {
            width: 20%;
            margin-top: 10%;
            margin-left: 40%;
        }
    </style>
    <div>
        <img src=\"/camagru/img/oops.png\" alt=\"\">
        <p>Your account is already active!</p>
    </div>";
        die();
    }
    if ($result[0]['key'] == $key)
    {
        db_update_usr('active', '1', $username);
        echo "<style>
        p {
            text-align: center;
            font-size: 150%;
        }
        img {
            width: 30%;
            margin-top: 10%;
            margin-left: 40%;
        }
    </style>
    <div>
        <img src=\"/camagru/img/reg-valid.png\" alt=\"\">
        <p>Your account has been successfully activated!</p>
    </div>";
        $_SESSION['logd_on'] = 'ok';
        $_SESSION['user'] = $result[0]['username'];
        $_SESSION['email'] = $result[0]['email'];
        header('Refresh: 4; ../index.php');
    }
    else
        echo "<style>
            p {
                text-align: center;
                font-size: 150%;
            }
            img {
                width: 20%;
                margin-top: 10%;
                margin-left: 40%;
            }
        </style>
        <div>
            <img src=\"/camagru/img/oops.png\" alt=\"\">
            <p>An error has occurred, your account can't be activated!</p>
        </div>";
}

