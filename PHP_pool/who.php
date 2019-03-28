#!/usr/bin/php
<?php
date_default_timezone_set('Europe/paris');
$handle = fopen("/var/run/utmpx", "r");
$contents = fread($handle, filesize("/var/run/utmpx"));
$sub = substr($contents, 1256);
$pattern = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
$user = get_current_user();
$tab2 = array();
$i = 0;
while ($sub)
{
	$tab = unpack($pattern, $sub);
	if (strcmp(trim($tab[user]), $user) == 0)
	{
		if ($tab[type] == 7)
		{
			$tab2[$i] .=trim($tab[user]);
			$tab2[$i] .= " ".trim($tab[line]);
			$date = date("D j H:i", $tab[time1]);
			$tab2[$i] .= "  ".$date;
		}
	}
	$i++;
	$sub = substr($sub, 628);
}
fclose($handle);
sort($tab2);
foreach ($tab2 as $elem)
	echo $elem." \n";
?>
