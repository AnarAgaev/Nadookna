<?php
    /************************
	
		Данный скрипт получает переменную $_POST['city'],
		содержащую город. Далее получаем из БД транслит
		этого города для формирования правильного url
		
	****************************/
	
		include_once("../../pattern/dbconnect.php"); // подключаем файл устанавливающий соединение с базой

		$city = trim($_POST['city']);
		$region = trim($_POST['region']);

		// вырезаем теги
		$city = strip_tags($city); 
		$region = strip_tags($region); 

		//конвертируем специальные символы
		$city = htmlspecialchars($city,ENT_QUOTES);
		$region = htmlspecialchars($region,ENT_QUOTES);

		// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
		if (get_magic_quotes_gpc()){
			$city = stripcslashes($city);
			$region = stripcslashes($region);
		} 
		
		// Получаем ид региона
		$rowidreg = mysql_fetch_array(mysql_query("SELECT `id_region` FROM `region` WHERE `region`='$region'",$db));
		$regid = $rowidreg['id_region'];
		
		// Получаем город в транслите
		$row = mysql_fetch_array(mysql_query("SELECT `translit` FROM `city` WHERE `city`='$city' AND `id_region` ='$regid'",$db));
		echo $row['translit'];
		
?>