#!/usr/bin/php
<?php

if ($argc != 2)
	return;
if (($count = preg_match_all("/ /", $argv[1])) != 4)
	echo "Wrong Format\n";

?>