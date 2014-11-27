<?php

if( isset($_POST['login']) && isset($_POST['password']) ){
	$login = $_POST['login'];
	$password = md5($_POST['password']);

	setrawcookie('login', $login, time()+3600);
	setrawcookie('password', $password, time()+3600);

}
header('Location: index.php');
exit;
?>
