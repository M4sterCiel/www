#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');


function wrong_format($argv)
{
	if ((preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) {1}([0-9]{1,2}) {1}([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre) {1}[0-9]{4} {1}[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv)) != 0)
	{
		return (TRUE);
	}
	else
	{
		return (FALSE);
	}

}

function get_number($str)
{
	if ($str == "janvier" || $str == "Janvier")
		return (1);
	if ($str == "fevrier" || $str == "Fevrier" || $str == "Février" || $str == "février")
		return (2);
	if ($str == "mars" || $str == "Mars")
		return (3);
	if ($str == "avril" || $str == "Avril")
		return (4);
	if ($str == "mai" || $str == "Mai")
		return (5);
	if ($str == "Juin" || $str == "juin")
		return (6);
	if ($str == "juillet" || $str == "Juillet")
		return (7);
	if ($str == "Aout" || $str == "aout" || $str == "Août" || $str == "août")
		return (8);
	if ($str == "septembre" || $str == "Septembre")
		return (9);
	if ($str == "octobre" || $str == "Octobre")
		return (10);
	if ($str == "novembre" || $str == "Novembre")
		return (11);
	if ($str == "decembre" || $str == "Décembre" || $str == "Decembre" || "décembre")
		return (12);
}
if ($argc > 1)
{
	if (wrong_format($argv[1]) == FALSE)
	{
		echo "Wrong Format\n";
		exit ();
	}
	else
	{
		preg_match("(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche)", $argv[1], $jour);
		preg_match("/([0-9]{1,2})/", $argv[1], $day);
		preg_match("/([J|j]anvier|[F|f][e|é]vrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[N|n]ovembre|[D|d][e|é]cembre)/", $argv[1], $mois);
		$month = get_number($mois[0]);
		preg_match("/[0-9]{4}/", $argv[1], $year);
		preg_match("/[0-9]{2}:/", $argv[1], $hour);
		$hour[0] = substr($hour[0], 0, 2);
		preg_match("/:[0-9]{2}:/", $argv[1], $min);
		$min[0] = substr($min[0], 1);
		$min[0] = substr($min[0], 0, 2);
		preg_match("/:[0-9]{2}$/", $argv[1], $sec);
		$sec[0] = substr($sec[0], 1);
		echo mktime($hour[0], $min[0], $sec[0], $month, $day[0], $year[0])."\n";
	}
}	
?>