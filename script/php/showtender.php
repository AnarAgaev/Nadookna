<?php

	/* 	
		Данный стрипт получает из БД окна отлельного 
		тендера по его ИД.
		Ид тендера получаем из Ajax запроса

	 */	
 
 
 
 // Подключаемся к БД
	include_once("../../pattern/dbconnect.php");
	
	// Получаем данные компании
	$idtender = trim($_POST['idtender']);
	$idtender = strip_tags($idtender); 
	$idtender = htmlspecialchars($idtender,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idtender = stripcslashes($idtender);
	
	$res = mysql_query("SELECT `idwin`, `num`, `shirina`, `visota_okna`, `shirina_dveri`, `visota_dveri`, `kol_steklo`, `kol_profil`, `kolvo`, `otliv`, `otkos`, `podok`, `montag`, `moscit`, `zamok` FROM `windate` WHERE `idtender`='$idtender'",$db);
	
	// собираем массив из объектов, каждый элемент массива отдельный объект- (окно)
	while ($window = mysql_fetch_assoc($res)){
		// добавляем окно в массив тендер
		$tender[] = $window;
	}

	// Правильная кодировка кирилици в json
	$json = defined('JSON_UNESCAPED_UNICODE')
      ? json_encode($tender, JSON_UNESCAPED_UNICODE)
      : json_encode($tender);
	 
	// Отправляем данные обратно в ajax запрос в виде json 
	echo $json;
	
?>