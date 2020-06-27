<?php

	/* 	

		В данном скрипте мы получаем из ajax запроса переменную POST 
		с индетификатором оконной компании, отзывы которой нам надо получить из БД
		Далее отправляем полученные из БД данные обратно в ajax запрос 
		где будем их распарсивать и выводить в блок отзывы в всплывающем окно 
		не старинце.

	 */

	// Подключаемся к БД
	include_once("../../pattern/dbconnect.php");
	
	// приведение даты к нормальному виду
	include_once("../../pattern/normalizedate.php"); 

	// Получаем данные компании
	$idorg = $_POST['idorg'];
	$res = mysql_query("SELECT `user`, `fromsite`, `url`, `date`, `review` FROM `reviews` WHERE `idorg`='$idorg' AND `correct`='1' ORDER BY `date` DESC",$db);
	
	for ($i = 0; $i < mysql_num_rows($res); $i++)
	{
		$arr['user'] = mysql_result($res, $i, "user");
		$arr['fromsite'] = mysql_result($res, $i, "fromsite");
		$arr['url'] = mysql_result($res, $i, "url");
		$arr['date'] = f_normalizedate(mysql_result($res, $i, "date"));
		$arr['review'] = mysql_result($res, $i, "review");
		
		$row[] = $arr;
		
	}
	
	// Привильная кодировка кирилици в json
	$json = defined('JSON_UNESCAPED_UNICODE')
      ? json_encode($row, JSON_UNESCAPED_UNICODE)
      : json_encode($row);
	 
	// Отправляем данные обратно в ajax запрос в виде json 
	echo $json;
?>