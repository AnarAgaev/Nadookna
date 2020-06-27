<?php
	session_start();
	
	/********************** 
	
		СКРИПТ ОТПРАВКИ ОБРАТНОГО ЗВОНКА И СООБЩЕНИЙ С РАЗНЫХ СТРАНИЦ САЙТА
		Для определения с какой страницы сайта было отправлено сообщение использоум
		дополнительнуй переменную $_POST['from_page'] приходящую на старницу церез
		AJAX запрос
	
	***********************/
	
	$email = 'anar.n.agaev@gmail.com,roman@nadookna.com';
	
	// Устанавливаем город пользллователя
	if (isset($_POST['cityatform'])) $city = $_POST['cityatform']; else $city = 'Город пользователя не определён.';
	
	
	// Если пришла переменная $_POST['from_page'] равная 'callme', занчит это просьба перезвонить с каждой страницы сайта
	if (isset($_POST['from_page']) and $_POST['from_page'] == 'callme'){
		//удаляем лишние пробелы, создаём переменные с данными
		$name = trim($_POST['name']);
		$contacts = trim($_POST['contacts']);

		// вырезаем теги
		$name = strip_tags($name); 
		$contacts = strip_tags($contacts); 

		//конвертируем специальные символы
		$name = htmlspecialchars($name,ENT_QUOTES);
		$contacts = htmlspecialchars($contacts,ENT_QUOTES);

		// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
		if (get_magic_quotes_gpc()) {
			$name = stripcslashes($name);
			$contacts = stripcslashes($contacts);
		}

		// Посылаем письмо на указанный мэйл:
		// создаем сообщение
		$message = "Здравструйте! Новая заявка на обратный звонок.\r\n\n";
		$message .= "Посетителя сайта Надоокна просит менеджеров компании связаться с ним.\r\n";
		$message .= "Данные посетителя сайта:\r\n";
		$message .= "Сообщение из города: ".$city."\r\n";
		$message .= "Имя: ".$name."\r\n";
		$message .= "Контактные данные: ".$contacts."\r\n\n";
		
		$subject = "Просьба перезвонить от посетителя сайта Надоокна."; //тема сообщения
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
	}


	
	// Если пришла переменная $_POST['from_page'] равная 'kontakty', ЗАНЧИТ ЭТО СООБЩЕНИЕ СО СТАРНИЦЫ КОНТАКТЫ
	if (isset($_POST['from_page']) and $_POST['from_page'] == 'kontakty'){
		//удаляем лишние пробелы, создаём переменные с данными
		$kontakty = trim($_POST['kontakty']);
		$text_kontakty = trim($_POST['text_kontakty']);

		// вырезаем теги
		$kontakty = strip_tags($kontakty); 
		$text_kontakty = strip_tags($text_kontakty); 

		//конвертируем специальные символы
		$kontakty = htmlspecialchars($kontakty,ENT_QUOTES);
		$text_kontakty = htmlspecialchars($text_kontakty,ENT_QUOTES);

		// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
		if (get_magic_quotes_gpc()) {
			$kontakty = stripcslashes($kontakty);
			$text_kontakty = stripcslashes($text_kontakty);
		}

		// Посылаем письмо на указанный мэйл:
		// создаем сообщение
		$message = "Здравструйте! Сообщение со старницы контакты.\r\n\n";
		$message .= "У посетителя сайта Надоокна есть вопрос или предлоежние.\r\n";
		$message .= "Данные из формы со страницы Контакты:\r\n";
		$message .= "Сообщение из города: ".$city."\r\n";
		$message .= "Контактные данные посетителя сайта: ".$kontakty."\r\n";
		$message .= "Сообщение пользвателя: ".$text_kontakty."\r\n\n";
		
		$subject = "Сообщение со старницы контанты от посетителя сайта Надоокна."; //тема сообщения
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
}
	
	
	
	// Если пришла переменная $_POST['from_page'] равная 'supp', ЗАНЧИТ ЭТО СООБЩЕНИЕ СО СТАРНИЦЫ СЛУЖБА ПОДДЕРЖКИ ДЛЯ ОРГАНИЗАЦИЙ
	if (isset($_POST['from_page']) and $_POST['from_page'] == 'supp'){
		//удаляем лишние пробелы, создаём переменные с данными
		$kontakty = trim($_POST['kontakty']);
		$text_kontakty = trim($_POST['text_kontakty']);

		// вырезаем теги
		$kontakty = strip_tags($kontakty); 
		$text_kontakty = strip_tags($text_kontakty); 

		//конвертируем специальные символы
		$kontakty = htmlspecialchars($kontakty,ENT_QUOTES);
		$text_kontakty = htmlspecialchars($text_kontakty,ENT_QUOTES);

		// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
		if (get_magic_quotes_gpc()) {
			$kontakty = stripcslashes($kontakty);
			$text_kontakty = stripcslashes($text_kontakty);
		}

		// Обратная конвертация позволит вернуть кавычки в письмо
		$text_kontakty = htmlspecialchars_decode($text_kontakty,ENT_QUOTES);
		
		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$phone3 = $_POST['phone3'];
		$phone4 = $_POST['phone4'];
		$phone5 = $_POST['phone5'];
		
		// Посылаем письмо на указанный мэйл:
		// создаем сообщение
		$message = "Сообщение со старницы Служба поддержки для организаций.\r\n\n";
		$message .= "Контактные данные организации в Базе Данных:\r\n";
		$message .= "Наименование организации: ".$_POST['orgName']."\r\n";
		$message .= "Идетификатор организации в Базе Данных: ".$_SESSION['idorg']."\r\n";
		$message .= "Город организации: ".$_POST['orgCity']."\r\n";
		$message .= "Емэйл: ".$_POST['orgMail']."\r\n";
		$message .= "Телефон: ".$phone1."\r\n";
		if ($phone2 != '') $message .= "Телефон2: ".$phone2."\r\n";
		if ($phone3 != '') $message .= "Телефон3: ".$phone3."\r\n";
		if ($phone4 != '') $message .= "Телефон4: ".$phone4."\r\n";
		if ($phone5 != '') $message .= "Телефон5: ".$phone5."\r\n";
		$message .= "\n\n";
		
		$message .= "Контактные данные посетителя, указанные при обращении:\r\n";
		$message .= "Способ контакта: ".$kontakty."\r\n";
		$message .= "Сообщение пользвателя: ".$text_kontakty."\r\n\n";
		
		$subject = "Сообщение со старницы Служба поддержки для организаций"; //тема сообщения
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
}
	
	
	
	
	
	// Создаем заголовок header. Он одинаковый для всех сообщений с сайта
	$from = "Надоокна";
	$from = "=?utf-8?b?". base64_encode($from) ."?=";	
	$header = "Content-type: text/plain; charset=utf-8\r\n";
	$header .= "From: ".$from."<info@nadookna.com>\r\n";
	$header .= "MIME-Version: 1.0\r\n"; 
	$header .= "Date: ".date('D, d M Y h:i:s O'); 
	
	print (mail($email, $subject, $message, $header)); //отправляем сообщение
?>