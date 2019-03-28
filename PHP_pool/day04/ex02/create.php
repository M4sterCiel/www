<?php

function login_exist()
{
	if (($old_file = file_get_contents("../private/passwd")) !== FALSE)
	{
		echo $old_file;
		$file = unserialize($old_file);
	//	print_r($file);
		foreach ($file as $ele)
		{
			if ($_POST["login"] == $ele["login"])
			{
				return (TRUE);
			}
		}
	}
	else
		return (FALSE);
}


function create_account()
{
	echo "TEST";
	$passwd = $_POST["passwd"];
	$passwd = hash('whirlpool', $passwd);
	$s_lize = array(login => $_POST["login"], passwd => $passwd);
	$s_lize = serialize($s_lize);
	file_put_contents("../private/passwd", $s_lize, FILE_APPEND);
}

if (isset($_POST["submit"]))
{
	if ( $_POST["submit"] == "OK")
	{
		if (!login_exist($_POST["login"]) && $_POST["login"] != NULL && $_POST["passwd"] != NULL)
		{
			create_account();
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
?>