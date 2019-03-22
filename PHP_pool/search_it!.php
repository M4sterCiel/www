#!/usr/bin/php
<?php

if ($argc < 2)
	return;
$i = 2;
while ($i < $argc)
{
	$tab = explode(":", $argv[$i++]);
	$array = array($tab[0] => $tab[1]);
	if ($argv[1] == key($array))
		echo $array[$argv[1]]."\n";
}

?>