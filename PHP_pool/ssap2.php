#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim($str);
	$my_tab = array_filter(explode(" ", $str));
	sort($my_tab);
	return ($my_tab);
}

if ($argc > 1)
{
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
	foreach ($my_tab as $elem)
	{
		if (is_numeric($elem) == TRUE)
			$numeric[] = $elem;
	}
	sort($numeric, SORT_STRING);

	foreach ($my_tab as $elem)
	{
		if (ctype_alpha($elem) == TRUE)
			$alpha[] = $elem;
	}
	sort($alpha, SORT_STRING | SORT_FLAG_CASE);

	foreach ($my_tab as $elem)
	{
		if ((is_numeric($elem) == FALSE) && ctype_alpha($elem) == FALSE)
			$rest[] = $elem;
	}
	sort($rest);

	foreach ($alpha as $content)
		echo $content."\n";

	foreach ($numeric as $content)
		echo $content."\n";

	foreach ($rest as $content)
		echo $content."\n";
}
?>