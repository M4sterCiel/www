#!/usr/bin/php
<?php

if ($argc != 2)
	return;
$str = trim($argv[1]);
while ($i < strlen($str))
{
	while ($str[$i] == " " && $str[$i + 1] == " ")
		$i++;
	echo $str[$i++];
}
echo "\n";

?>