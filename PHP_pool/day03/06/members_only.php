<?php

$var = $_SERVER;
foreach ($var as $key => $value)
{
	echo $key.":".$value."\n";
}

?>