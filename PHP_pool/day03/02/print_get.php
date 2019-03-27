<?php

$data = $_GET;
foreach ($data as $key => $value)
{
	echo $key.": ".$value."\n";
}

?>