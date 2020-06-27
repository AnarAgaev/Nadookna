<?php

	/* 
		Это служебная страница предназначена для верификация платежа сделанного через Яндекс деньги
		
		Расшифровка POST ключей/параметров:
		notification_type	string		Для переводов из кошелька — p2p-incoming. Для переводов с произвольной карты — card-incoming.
		operation_id		string		Идентификатор операции в истории счета получателя.
		amount				amount		Сумма, которая зачислена на счет получателя.
		withdraw_amount		amount		Сумма, которая списана со счета отправителя.
		currency			string		Код валюты — всегда 643 (рубль РФ согласно ISO 4217).
		datetime			datetime	Дата и время совершения перевода.
		sender				string		Для переводов из кошелька — номер счета отправителя. Для переводов с произвольной карты — параметр содержит пустую строку.
		codepro				boolean		Для переводов из кошелька — перевод защищен кодом протекции. Для переводов с произвольной карты — всегда false.
		label				string		Метка платежа. Если ее нет, параметр содержит пустую строку.
		sha1_hash			string		SHA-1 hash параметров уведомления.
		unaccepted			boolean		Перевод еще не зачислен. Получателю нужно освободить место в кошельке или использовать код протекции (если codepro=true).
	*/
	
	include_once("pattern/dbconnect.php"); // Подключаемся к БД
	
	$is_verify = true;
	$secret = 'TSU3sL3CK+88vxDj93v0tUmu'; // секрет, полученный на яндекс деньгах https://money.yandex.ru/myservices/online.xml
	
	if (isset($_POST['notification_type']) and 
		isset($_POST['operation_id']) and
		isset($_POST['amount']) and
		isset($_POST['withdraw_amount']) and
		isset($_POST['currency']) and
		isset($_POST['datetime']) and
		isset($_POST['sender']) and
		isset($_POST['codepro']) and
		isset($_POST['label']) and
		isset($_POST['sha1_hash'])) {
			
			// Получение данных.
			$pay_data = array(
				'notification_type' => $_POST['notification_type'],
				'operation_id'      => $_POST['operation_id'],
				'amount'            => $_POST['amount'],
				'withdraw_amount'   => $_POST['withdraw_amount'],
				'currency'          => $_POST['currency'],
				'datetime'          => $_POST['datetime'],
				'sender'            => $_POST['sender'],
				'codepro'           => $_POST['codepro'],
				'label'             => $_POST['label'],
				'sha1_hash'         => $_POST['sha1_hash']
			);
			
			if($pay_data['currency'] == '') $pay_data['currency'] = 643;

			// проверка хеша
			if (sha1($pay_data['notification_type'].'&'.
				$pay_data['operation_id'].'&'.
				$pay_data['amount'].'&'.
				$pay_data['currency'].'&'.
				$pay_data['datetime'].'&'.
				$pay_data['sender'].'&'.
				$pay_data['codepro'].'&'.
				$secret.'&'.
				$pay_data['label']) != $pay_data['sha1_hash']) {
				
				$is_verify = false;
				
			} else {
				$pay_data['amount'] = floatval($pay_data['amount']);
				$pay_data['label']	= strval($pay_data['label']);
			}
			
			/* 	
				Разбираем значение label в массив
				$pay_params[0]; // идентификатор тендера 
				$pay_params[1]; // идентификатор оконной компании
				$pay_params[2]; // дата платежа
				$pay_params[3]; // сумма платежа	
			 */	
			$pay_params = explode("_", $pay_data['label']);
			
			/* добавляем тендер в оплаченные организацией, если ещё не добавляли */
			$haveopen = mysql_fetch_assoc(mysql_query("SELECT `idopenconts` FROM `openconts` WHERE `idorg`='$pay_params[1]' AND `idtender`='$pay_params[0]'",$db));
			
			if( $haveopen['idopenconts'] == '' ) {
				mysql_query("INSERT INTO `openconts`(`idopenconts`, `idorg`, `idtender`) VALUES (NULL,'$pay_params[1]','$pay_params[0]')",$db);
			}
			
			
			// Отправляем на почту сообщение о платеже
			$email = 'anar.n.agaev@gmail.com,roman@nadookna.com';
			
			$message = '';
			
			// Создаем сообщение
			if ($is_verify) {
				$message .= "Поступила оплата данных тендера. Оплата верифицирована.\r\n\n";
			} else {
				$message .= "Ошибка при верфикации платежа.\r\n\n";
			}
			
			$message .= "Данные платежа:\r\n";
			$message .= "Для переводов из кошелька — p2p-incoming. Для переводов с произвольной карты — card-incoming: ".$pay_data['notification_type']."\r\n";
			$message .= "Идентификатор операции в истории счета получателя: ".$pay_data['operation_id']."\r\n";
			$message .= "Сумма, которая зачислена на счет получателя: ".$pay_data['amount']."\r\n";
			$message .= "Сумма, которая списана со счета отправителя: ".$pay_data['withdraw_amount']."\r\n";
			$message .= "Код валюты - всегда 643 (рубль РФ согласно ISO 4217): ".$pay_data['currency']."\r\n";
			$message .= "Дата и время совершения перевода: ".$pay_data['datetime']."\r\n";
			$message .= "Для переводов из кошелька — номер счета отправителя. Для переводов с произвольной карты — параметр содержит пустую строку: ".$pay_data['sender']."\r\n";
			$message .= "Для переводов из кошелька — перевод защищен кодом протекции. Для переводов с произвольной карты — всегда false: ".$pay_data['codepro']."\r\n";
			$message .= "SHA-1 hash параметров уведомления: ".$pay_data['sha1_hash']."\r\n";
			$message .= "Метка платежа. Если ее нет, параметр содержит пустую строку: ".$pay_data['label']."\r\n";
			$message .= "Идентификатор тендера : ".$pay_params[0]."\r\n";
			$message .= "Идентификатор оконной компании: ".$pay_params[1]."\r\n";
			$message .= "Дата платежа при оплате: ".$pay_params[2]."\r\n";
			$message .= "Сумма платежа при оплате: ".$pay_params[3]."\r\n\n";

			$subject = "Поступила оплата от оконной компании.";
			$subject = "=?utf-8?b?". base64_encode($subject) ."?=";		
			$from = "Надоокна";
			$from = "=?utf-8?b?". base64_encode($from) ."?=";	
			$header = "Content-type: text/plain; charset=utf-8\r\n";
			$header .= "From: ".$from."<info@nadookna.com>\r\n";
			$header .= "MIME-Version: 1.0\r\n"; 
			$header .= "Date: ".date('D, d M Y h:i:s O');
			
			print (mail($email, $subject, $message, $header));
	}
?>