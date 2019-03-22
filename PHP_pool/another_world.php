#!/usr/bin/php
<?php

if ($argc < 2)
	return;
$patern = '/  /';
$patern2 = '/\t/';
$replacement = ' ';
$str = $argv[1];
while (preg_match_all($patern, $str))
{
	$str = preg_replace($patern, $replacement, $str);
	$str = preg_replace($patern2, $replacement, $str);
}
echo $str."\n";

?>