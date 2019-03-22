#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim($str);
	$my_tab = array_filter(explode(" ", $str));
	sort($my_tab);
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