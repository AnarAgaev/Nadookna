<?php
	session_start();
	// Создаём перемнную сессии, что администратор выполнил вход
	$_SESSION['admin'] = true;
?>