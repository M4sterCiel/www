#!/usr/bin/php
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
$tab = array("3", "2", "1");
//$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
if (ft_is_sort($tab))
echo "Le tableau est trie\n"; else
echo "Le tableau n’est pas trie\n";
?>