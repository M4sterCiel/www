#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim($str);
	if ($str !== 0)
	{
		$my_tab = array_filter(explode(" ", $str), 'strlen');
		sort($my_tab);
	}
	else
		$my_tab[0] = "0";
	return ($my_tab);
}

$i = 0;
foreach ($argv as $value)
{
	if ($i == 1)
	{
		$my_tab = ft_split($argv[$i]);
	}
	else if ($i != 0)
	{
		$tmp = ft_split($argv[$i]);
		$my_tab = array_merge($my_tab, $tmp);
	}
	$i++;
}
sort($my_tab);
$i = 0;
while ($i < count($my_tab))
	echo $my_tab[$i++]."\n";

?>