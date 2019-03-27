#!/usr/bin/php
<?php

if ($argc < 2)
	return;
$patern = '/  |\t| \t/';
$replacement = ' ';
$str = $argv[1];
while (preg_match_all($patern, $str))
{
	$str = preg_replace($patern, $replacement, $str);
}
echo trim($str)."\n";

?>