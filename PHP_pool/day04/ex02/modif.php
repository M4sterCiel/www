<?php

function login_exist()
{

	if (file_exists("../private/passwd") == FALSE)
		return (FALSE);
	$old_file = file_get_contents("../private/passwd");	
	$file = unserialize($old_file);
	foreach ($file as $ele)
		if ($_POST['login'] == $ele['login'])
			return (TRUE);
	return (FALSE);
}

function modif_account()
{
	$oldpw = $_POST["oldpw"];
	$oldpw = hash('whirlpool', $oldpw);
	$tab = file_get_contents("../private/passwd");
	$tab = unserialize($tab);
	$i = 0;
	foreach ($tab as &$elem)
	{
		if ($_POST['login'] == $elem['login'])
		{
			$oldpw_comp = $elem['passwd'];
			if ($oldpw == $oldpw_comp)
			{
				$newpw = hash('whirlpool', $_POST['newpw']);
				$elem['passwd'] = $newpw;
			}
			else
				return (FALSE);
		}
	}
	$seri = serialize($tab);
	file_put_contents("../private/passwd", $seri);
	return (TRUE);
}

if (isset($_POST["submit"]))
{
	if ( $_POST["submit"] == "OK")
	{
		if (login_exist($_POST["login"]) == TRUE && $_POST["login"] != NULL && $_POST["oldpw"] != NULL && $_POST["newpw"] != NULL)
		{
			if (modif_account() == FALSE)
			{
				echo "ERROR\n";
				exit(0);
			}
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
?>