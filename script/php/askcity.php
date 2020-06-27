<?php
    /************************
	
		Данный скрипт получает переменную $_POST['inputval'],
		содержащую данные поля input, которые пользователь 
		сталл вводить при выборе своего города в всплывающей форме
		На основе этих данных осуществляется поиск в БД городов
		и выдается список совподоющих гордов.
		
	****************************/
	
		include_once("../../pattern/dbconnect.php"); // подключаем файл устанавливающий соединение с базой

		$inputval = ""; // переменная в которой будем хранить строку запроса
		$inputval = trim($_POST['inputval'])."%"; // создаем запрос для SELECT, предварительно удалив пробелы вначале и конце у $_POST['inputval']

		// вырезаем теги
		$inputval = strip_tags($inputval); 

		//конвертируем специальные символы
		$inputval = htmlspecialchars($inputval,ENT_QUOTES);

		// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
		if (get_magic_quotes_gpc()) $inputval = stripcslashes($inputval);
		
		if ($inputval == '%') echo 'null';
		else {
			$result = mysql_query("SELECT `city`, `id_region` FROM `city` WHERE `city` LIKE '$inputval' ORDER BY `city`",$db);
			
			if (mysql_num_rows($result) < 5) $end = mysql_num_rows($result); // внизу формы выбора города выводится только 5 городв если совпадений меньше то и массив будет меньше
			else $end = 5;
			
			for ($i=0; $i<$end; $i++){ // перводим запрос в ассоциативный массив
				$arr[] = mysql_fetch_row($result);
			}
			
			
			/* Собираем массив где ключ - регион/область, значения - город.
			Ключи именно регионы, т.к. в разных регионах могут быть города
			с одинаковыми названиями, поэтому города в качестве ключей 
			использовать нельзя, т.к. предыдущий город-ключ затрётся последующим
			из другого региона */
			
			$resArr = array();
			foreach($arr as $key => $val){ 
				$idreg=$val[1];
				$result_reg = mysql_query("SELECT `region` FROM `region` WHERE `id_region`='$idreg'",$db);
				$myrow_reg = mysql_fetch_array($result_reg);
				$resArr[$myrow_reg['region']] = $val[0];
			}
			
			// Правильная кодировка кирилици в json
			$json = defined('JSON_UNESCAPED_UNICODE')
			  ? json_encode($resArr, JSON_UNESCAPED_UNICODE)
			  : json_encode($resArr);
			 
			// Отправляем данные обратно в ajax запрос в виде json 
			echo $json;

		}

		
		

?>