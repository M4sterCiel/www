<?php

function auth($login, $passwd)
{
	function login_exist()
	{
		$hashed = hash('whirlpool', $_GET['passwd']);
		if (file_exists("../private/passwd") == FALSE)
			return (FALSE);
		$old_file = file_get_contents("../private/passwd");	
		$file = unserialize($old_file);
		foreach ($file as $ele)
			if ($_GET['login'] == $ele['login'] && $ele['passwd'] == $hashed)
				return (TRUE);
		return (FALSE);
	}

	if (login_exist($login) == TRUE && $login != NULL && $passwd != NULL)
		return (TRUE);
	return (FALSE);
}
?>