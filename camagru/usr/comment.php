<?php
require "../model.php";
session_start();

$content = trim(file_get_contents("php://input"));
$var = json_decode($content, true);

db_add_comment($_SESSION['id'], $var['picture'], $var['text']);

echo ($var['text']);
