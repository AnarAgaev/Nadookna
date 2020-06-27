<?php

	/* 	

		В данном скрипте мы получаем из ajax запроса переменную POST 
		с индетификатором акции, данные которой нам надо получить из БД
		Получаем из БД даные акции и данные компании её разместившей. 
		Далее отправляем полученные из БД данные обратно в ajax запрос 
		для где будем их распарсивать и выводить в всплывающем окнки 
		не старинце.

	 */

	// Подключаемся к БД
	include_once("../../pattern/dbconnect.php");
	
	// Подключаемся приведение даты к нормальному виду
	include_once("../../pattern/normalizedate.php"); 


	// Получаем данные акции
	$idaction = $_POST['idaction'];
	$res = mysql_query("SELECT `id_action`, `title`, `text`, `data_start`, `data_finish`, `id_org` FROM `action` WHERE `id_action` = '$idaction'",$db);
	$row = mysql_fetch_assoc($res);
	
	$row['data_start'] = f_normdatewithoutyear($row['data_start']); // дата начала
	$row['data_finish'] = f_normdatewithoutyear($row['data_finish']); // дата окончания
	
	// Получаем данные компании, разместившей акцию
	$id_org = $row['id_org'];
	$resorg = mysql_query("SELECT `idorg`, `name`, `email`, `adds`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5` FROM `orgs` WHERE `idorg` ='$id_org'",$db);
	$roworg = mysql_fetch_assoc($resorg);
	
	// Сливаем массивы с данными икции и данными компании
	$result = array_merge($row, $roworg);
	
	// Паривильная кодировка кирилици в json
	$json = defined('JSON_UNESCAPED_UNICODE')
      ? json_encode($result, JSON_UNESCAPED_UNICODE)
      : json_encode($result);
	 
	// Отправляем данные обратно в ajax запрос в виде json 
	echo $json;
?>