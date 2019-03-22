<?php

function ft_is_sort($tab)
{
	$tmp = $tab;
	sort($tmp);

	$i = 0;
	while ($i < count($tab))
	{
		if (strcmp($tab[$i], $tmp[$i]) != 0)
			return (FALSE);
		$i++;
	}
	return (TRUE);
}
?>