<?php

function login_exist()
{

	if (file_exists("../private/passwd") == FALSE)
		return (FALSE);
	$old_file = file_get_contents("../private/passwd");	
	$file = unserialize($old_file);
//	print_r($file);
	foreach ($file as $ele)
		if ($_POST['login'] == $ele['login'])
			return (TRUE);
	return (FALSE);
}


function create_account()
{
	if (file_exists("../private") == FALSE)
		mkdir("../private", 0777);
	$passwd = $_POST["passwd"];
	$passwd = hash('whirlpool', $passwd);
	if (file_exists("../private/passwd") == FALSE)
		$tab = array(array('login' => $_POST['login'], 'passwd' => $passwd));
	else
	{
		$tab = file_get_contents("../private/passwd");
		$tab = unserialize($tab);
		$tab[] = array('login' => $_POST['login'], 'passwd' => $passwd);
	}
	$seri = serialize($tab);
	file_put_contents("../private/passwd", $seri);
}

if (isset($_POST["submit"]))
{
	if ( $_POST["submit"] == "OK")
	{
		if (login_exist($_POST["login"]) == FALSE && $_POST["login"] != NULL && $_POST["passwd"] != NULL)
		{
			create_account();
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
?>