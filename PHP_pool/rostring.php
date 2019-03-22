#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim($str);
	$my_tab = array_filter(explode(" ", $str));
	return ($my_tab);
}

$i = 1;
if ($argc > 1)
{
	$tab = array_values(ft_split($argv[1]));
	while ($i < count($tab))
		echo $tab[$i++]." ";
	echo $tab[0]."\n";
}

?>