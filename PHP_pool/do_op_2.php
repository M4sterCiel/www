#!/usr/bin/php
<?php

if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	$tab = sscanf($argv[1], "%d %c %d");
	$op = $tab[1];
	if ($op == "")
	{
		echo "Syntax Error\n";
		return;
	}
	if ((is_numeric(trim($tab[0]))) == FALSE )
	{
		echo "Syntax Error\n";
		return;
	}
	if ((is_numeric(trim($tab[2]))) == FALSE )
	{
		echo "Syntax Error\n";
		return;
	}
	if ($op == "+")
	{
		echo $tab[0] + $tab[2];
		echo "\n";
	}
	if ($op == "-")
	{
		echo $tab[0] - $tab[2];
		echo "\n";
	}
	if ($op == "*")
	{
		echo $tab[0] * $tab[2];
		echo "\n";
	}
	if ($op == "/")
	{
		echo $tab[0] / $tab[2];
		echo "\n";
	}
	if ($op == "%")
	{
		echo $tab[0] % $tab[2];
		echo "\n";
	}
}

?>