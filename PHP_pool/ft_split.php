<?php

function ft_split($str)
{
	$str = trim($str);
	$my_tab = array_filter(explode(" ", $str));
	sort($my_tab);
	return ($my_tab);
}

?>