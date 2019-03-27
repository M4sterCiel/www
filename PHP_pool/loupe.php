#!/usr/bin/php
<?php

function ft_strtoupper($msg)
{
	$new = strstr($msg, ">", 1);
	$new = strtoupper($new);
	$new = $new.strstr($msg, ">");
	return($new);
}

function ft_strtoupper2($msg)
{
	$new = strstr($msg, ">");
	$new = strtoupper($new);
	$new = strstr($msg, ">", 1).$new;
	return($new);
}

function ft_strtoupper3($msg)
{
	$new = strstr($msg, "<", 1);
	$new = strtoupper($new);
	$new = $new.strstr($msg, "<");
	return($new);
}

if ($argc == 2)
{
	$str = file_get_contents($argv[1]);
	$tab = explode('title', $str);
	$k = count($tab) - 1;
	$i = 0;
	while ($i <= $k)
	{
		if (preg_match("/\s{0,}=/", $tab[$i]) >= 1)
		{
			$tab[$i] = ft_strtoupper($tab[$i]);
		}
		$i++;
	}
	$new = implode('title', $tab);
	$tab = explode('<', $new);
	$k = count($tab) - 1;
	$i = 0;
	while ($i != $k)
	{
		if (strstr($tab[$i], 'href') != FALSE)
		{
			$tab[$i] = ft_strtoupper2($tab[$i]);
		}
		$i++;
	}
	$new = implode('<', $tab);
	$tab = explode('>', $new);
	$k = count($tab) - 1;
	$i = 0;
	while ($i != $k)
	{
		if (($tab[$i][0] != '<' || $tab[$i][0] != '\n') && (preg_match("/<(\/|)div/", $tab[$i]) >= 1))
			$tab[$i] = ft_strtoupper3($tab[$i]);
		$i++;
	}
	$new = implode('>', $tab);
	echo $new;
}
?>