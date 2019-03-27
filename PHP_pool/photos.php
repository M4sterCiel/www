#!/usr/bin/php
<?php

if ($argc == 2)
{
	$opt = $argv[1];
	$pattern = '/(http|https)/';
	$opt = preg_replace($pattern, "https", $opt);
	if (($ch = curl_init($opt)) != FALSE)
	{
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$file = curl_exec($ch);
		$path = stristr($argv[1], "www");
		$pathlink = "https://".$path;
		mkdir($path);
		$i = 0;
		while ($i != 1)
		{
			if (($str = stristr($file, "<img")) != FALSE)
			{
				if (($s = stristr($str, "\"/")))
				{
					$file = strstr($str, "/");
					$s = strstr($str, "/");
					$s = strstr($s, "\"", 1);
					$tab = explode("/", $s);
					$fp = fopen($path."/".$tab[count($tab) - 1], "w");
					$ch2 = curl_init($pathlink.$s);
					curl_setopt($ch2, CURLOPT_FILE, $fp);
					curl_exec($ch2);
					curl_close($ch2);
					fclose($fp);
				}
				else if (($s = stristr($str, "http")) != FALSE)
				{
					$file = stristr($str, "http");
					$s = strstr($str, ">", 1);
					$s = stristr($s, "http");
					$s = strstr($s, "\"", 1);
					$tab = explode("/", $s);
					$fp = fopen($path."/".$tab[count($tab) - 1], "w");
					$ch2 = curl_init($s);
					curl_setopt($ch2, CURLOPT_FILE, $fp);
					curl_exec($ch2);
					curl_close($ch2);
					fclose($fp);
				}
			}
			else
				$i = 1;
		}
	}
	curl_close($ch);
}

?>