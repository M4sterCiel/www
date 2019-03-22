#!/usr/bin/php
<?php

if ($argc == 2)
{
	$i = strcspn($argv[1], "+-*/%");
	$op = $argv[1][$i];
	if ($op == "")
	{
		echo "Syntax Error\n";
		return;
	}
	$tab = explode($op, $argv[1]);
	if ((is_numeric(trim($tab[0]))) == FALSE )
	{
		echo "Syntax Error\n";
		return;
	}
	if ((is_numeric(trim($tab[1]))) == FALSE )
	{
		echo "Syntax Error\n";
		return;
	}
	if ($op == "+")
	{
		echo $tab[0] + $tab[1];
		echo "\n";
	}
	if ($op == "-")
	{
		echo $tab[0] - $tab[1];
		echo "\n";
	}
	if ($op == "*")
	{
		echo $tab[0] * $tab[1];
		echo "\n";
	}
	if ($op == "/")
	{
		echo $tab[0] / $tab[1];
		echo "\n";
	}
	if ($op == "%")
	{
		echo $tab[0] % $tab[1];
		echo "\n";
	}
}

?>