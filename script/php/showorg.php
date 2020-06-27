<?php

	/* 	

		В данном скрипте мы получаем из ajax запроса переменную POST 
		с индетификатором оконной компании, данные которой нам надо получить из БД
		Далее отправляем полученные из БД данные обратно в ajax запрос 
		где будем их распарсивать и выводить в всплывающем окне не старинце.

	 */

	// Подключаемся к БД
	include_once("../../pattern/dbconnect.php");
	
	// Получаем данные компании
	$idorg = $_POST['idorg'];
	$row = mysql_fetch_assoc(mysql_query("SELECT `name`, `email`, `url`, `adds`, `info`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`, `profil`, `furnitura` FROM `orgs` WHERE `idorg`='$idorg'",$db));
	
	// Привильная кодировка кирилици в json
	$json = defined('JSON_UNESCAPED_UNICODE')
      ? json_encode($row, JSON_UNESCAPED_UNICODE)
      : json_encode($row);
	 
	// Отправляем данные обратно в ajax запрос в виде json 
	echo $json;
?>