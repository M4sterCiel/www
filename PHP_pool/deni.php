#!/usr/bin/php
<?php

if ($argc != 3)
	return ;
if (($tab = file($argv[1])) === FALSE)
	return ;
if (strstr($tab[0], ",") !== FALSE)
	$delim = ",";
if (strstr($tab[0], ";") !== FALSE)
	$delim = ";";
$source = explode($delim, $tab[0]);
$found = 0;
foreach ($source as $elem)
{
	if (strcmp($elem, $argv[2]) === 0)
		$found = 1;
}
if ($found == 0)
	return ;
print_r($source);
echo "\n\n";
while (1)
{
	echo "Entrez votre commande: ";
	$line = trim(fgets(STDIN));
	$val = strstr($line, "\$");
	$val = strstr($val, "[", 1);
	$val = str_replace("\$", "", $val);
	echo $val;
	if (FEOF(STDIN) == TRUE)
		exit();
	//eval($line)
}
?>