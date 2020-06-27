<?php
	/********************** 
	
		CRON СКРИПТ РАССЫЛКИ НОВЫХ ТЕНДЕРОВ ПО ОКОННЫМ КОМПАНИЯМ
	
	***********************/
	
	// подключаемеся к БД
	$db = @mysql_connect("pareta.mysql.ukraine.com.ua", "pareta_admin", "5vj0d7a4"); // Создаем соединение с сервером БД. Записываем идентификатор соединения в переменную
	
	mysql_select_db("pareta_nadookna", $db); // Выбираем БД
	mysql_query('SET NAMES utf8'); // Для кодировки UTF-8
	mysql_query('SET SESSION time_zone = "+03:00"'); // Устанавливаем временную зону для MySQL
	date_default_timezone_set('Europe/Moscow'); // Выбор географической зоны для PHP
	
	if (!$db) { // если соединение завершено неудачно посылаем себе письмо, что нет соединения с БД
		$message ="Ошибка в CRON скрипте рассылки новых тендеров по оконным компаниям.\r\n\n";
		$message .="Ошибка: Нет соединения с базой данных!\r\n";
		$message .="Имя скрипта: sendtender.php\r\n";
		$message .="Папка скрипта: www/script/cron/";
		$subject = "Ошибка в CRON скрипте"; //тема сообщения
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
		// Создаем заголовок header
		$from = "Надоокна - сервис по покупке пластиковых окон";
		$from = "=?utf-8?b?". base64_encode($from) ."?=";	
		$header = "Content-type: text/plain; charset=utf-8\r\n";
		$header .= "From: ".$from."<support@nadookna.com>\r\n";
		$header .= "MIME-Version: 1.0\r\n"; 
		$header .= "Date: ".date('D, d M Y h:i:s O');
		
		mail('anar.n.agaev@gmail.com', $subject, $message, $header);
	}
	else {
		
		// функция для приведения даты MYSQL к читабельному виду
		function f_normalizedate ($sql_date)
		{
			$month = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
			$sql_date = date_create($sql_date);
			$date = (int)date_format($sql_date, 'd ').' ';
			$date .= $month[date_format($sql_date, 'n')];
			$date .= date_format($sql_date, ' Y');
			return $date;
		}
		
		// Создаем читабельную дату рассылки
		$Month_r = array( 
			"01" => "января", 
			"02" => "февраля", 
			"03" => "марта", 
			"04" => "апреля", 
			"05" => "мая", 
			"06" => "июня", 
			"07" => "июля", 
			"08" => "августа", 
			"09" => "сентября", 
			"10" => "октября", 
			"11" => "ноября", 
			"12" => "декабря"
		); 
		$now_month = date('m'); // месяц на eng 
		$date_send = date('d').' '.$Month_r[$now_month].' '.date('Y');

		$win_at_tender = ''; // в этой переменной будум хранить окна от тендера, которые в пследствии добавим в письмо
		
		// Создаем заголовок header который одинаков для всех писем и поэтому не формируется внутри цикла
		$from = "Надоокна - сервис покупки пластиковых окон";
		$from = "=?utf-8?b?". base64_encode($from) ."?=";	
		$header = "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: ".$from."<info@nadookna.com>\r\n";
		$header .= "MIME-Version: 1.0\r\n"; 
		$header .= "Date: ".date('D, d M Y h:i:s O'); 

		// получакм все неразосланные тендеры из БД
		$restender = mysql_query("SELECT `idtender`, `idcity`, `name`, `date` FROM `tenders` WHERE `verifi`=1 AND `atwork`=0",$db);
		
		if (mysql_num_rows($restender) != 0) // если есть неразосланные тендеры, рассылаем их
		{
			for ($i = 0; $i < mysql_num_rows($restender); $i++) // пробегаем по тендерам
			{
				$idtender = mysql_result($restender, $i, "idtender"); // идентификатор тенедра
				$idcity = mysql_result($restender, $i, "idcity"); // идентификатор города в котором размещён тендер
				$name = mysql_result($restender, $i, "name"); // имя заказчика
				$datetender = mysql_result($restender, $i, "date"); // дата размещения тенедра
				
				// получакм окна тедера из текущей итерации цикла
				$reswin = mysql_query("SELECT `num`, `shirina`, `visota_okna`, `shirina_dveri`, `visota_dveri`, `kol_steklo`, `kol_profil`, `kolvo`, `otliv`, `otkos`, `podok`, `montag`, `moscit`, `zamok` FROM `windate` WHERE `idtender`='$idtender'",$db);
				for ($w = 0; $w < mysql_num_rows($reswin); $w++) // собираем окна тендера, чтобы потом вставить в письмо
				{
					$num = mysql_result($reswin, $w, "num"); // ИД окна в таблице описания окон WINS
					$shirina = mysql_result($reswin, $w, "shirina"); // ширина оконной конструкции
					$visota_okna = mysql_result($reswin, $w, "visota_okna"); // высота окна
					$shirina_dveri = mysql_result($reswin, $w, "shirina_dveri"); // ширина двери
					$visota_dveri = mysql_result($reswin, $w, "visota_dveri"); // высота двери
					$kol_steklo = mysql_result($reswin, $w, "kol_steklo"); // количеств камер в стеклопакете
					$kol_profil = mysql_result($reswin, $w, "kol_profil"); // количество камер в ПВХ профиле
					$kolvo = mysql_result($reswin, $w, "kolvo"); // количество окон такого типа
					$otliv = mysql_result($reswin, $w, "otliv"); // глубина отлива
					$otkos = mysql_result($reswin, $w, "otkos"); // глубина откосов
					$podok = mysql_result($reswin, $w, "podok"); // глубина подоконника
					$montag = mysql_result($reswin, $w, "montag"); // необходим монтаж или нет
					$moscit = mysql_result($reswin, $w, "moscit"); // нужна ли москитная сетка
					$zamok = mysql_result($reswin, $w, "zamok"); // нужен ли детский замок
					
					$resnamewin = mysql_fetch_assoc(mysql_query("SELECT `about` FROM `wins` WHERE `id_wins`='$num'",$db));
					$namewin = $resnamewin['about']; // Наименование добавляемого в письмо окна
					
					$win_at_tender .= '
						<!-- контент блок с описаним окна -->
						<tr style="background-image: url(\'http://nadookna.com/img/addtndr/bg_culc.png\'); margin: 0; padding: 0;">
						  <td style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" align="center">
							  <!-- отступ -->
							  <tr style="margin: 0; padding: 0; line-height: 0;"><td height="40" style="margin: 0; padding: 0;">&nbsp;</td></tr>
							  <!-- изображение окна -->
							  <tr align="center" style="margin: 0; padding: 0;">
								<td colspan="2" style="margin: 0; padding: 0;">
								  <img src="http://nadookna.com/img/addtndr/win/'.$num.'.png" alt="" width="auto" height="auto" border="0" style="display: block; outline: none; text-decoration: none; border: 0;">
								</td>
								<td style="margin: 0; padding: 0;"></td>
							  </tr>
							  <!-- отступ -->
							  <tr style="margin: 0; padding: 0; line-height: 0;"><td height="30" style="margin: 0; padding: 0;">&nbsp;</td></tr>
							  <!-- описание окна -->
							  <tr align="center" style="margin: 0; padding: 0;">
								<td colspan="2" style="margin: 0; padding: 0;">
								  <h5 style="width: 90%; font-size: 24px !important; line-height: 28px; font-family: Arial, sans-serif !important; color: #777777 !important; margin: 0; padding: 0;">'.$namewin.'</h5>
								</td>
								<td style="margin: 0; padding: 0;"></td>
							  </tr>
							  <!-- отступ -->
							  <tr style="margin: 0; padding: 0; line-height: 0;"><td height="20" style="margin: 0; padding: 0;">&nbsp;</td></tr>
							  <!-- детали окна -->
							  <tr style="margin: 0; padding: 0;">
								<td width="290" align="right" style="font-family: Arial, sans-serif; font-size: 14px; color: #4285f4; font-weight: bold; line-height: 19px; margin: 0; padding: 0;">
									Ширина конструкции:<br>
									Высота окна:<br>';
									
									if ($visota_dveri != 0) $win_at_tender .= 'Высота двери:<br>';
									if ($shirina_dveri != 0) $win_at_tender .= 'Ширина двери:<br>';
									
				 $win_at_tender .= 'Количество камер ПВХ профиля:<br>
									Количество камер стеклопакета:<br>
									Отлив:<br>
									Откосы:<br>
									Подоконник:<br>
									Монтаж:<br>
									Москитная сетка:<br>
									Защита от детей:<br>
									Количество таких окон:<br>
								</td>
								<td style="font-family: Arial, sans-serif; font-size: 14px; color: #444444; line-height: 19px; margin: 0; padding: 0;">
									&nbsp;'.$shirina.'<br>
									&nbsp;'.$visota_okna.'<br>';
									
									if ($visota_dveri != 0) $win_at_tender .= '&nbsp;'.$visota_dveri.'<br>';   
									if ($shirina_dveri != 0) $win_at_tender .= '&nbsp;'.$shirina_dveri.'<br>'; 
									
				 $win_at_tender .= '&nbsp;'.$kol_profil.'<br>
									&nbsp;'.$kol_steklo.'<br>
									&nbsp;'.$otliv.'<br>
									&nbsp;'.$otkos.'<br>
									&nbsp;'.$podok.'<br>
									&nbsp;'.$montag.'<br>
									&nbsp;'.$moscit.'<br>
									&nbsp;'.$zamok.'<br>
									&nbsp;'.$kolvo.'<br>
								</td>
							  </tr>
							  <!-- отступ -->
							  <tr style="margin: 0; padding: 0; line-height: 0;"><td height="40" style="margin: 0; padding: 0;">&nbsp;</td></tr>
							</table>
						  </td>
						</tr>
					';
				}
				
				$ressity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcity'",$db));
				$namesity = $ressity['city']; // Наименование города размещения тенедра 
				
				$resorg = mysql_query("SELECT `idorg`, `name`, `email` FROM `orgs` WHERE `idcity`='$idcity' AND `active`=1 AND `email`<>''",$db); // выбираем оконные компании из города размещения тендера
				for ($o = 0; $o < mysql_num_rows($resorg); $o++) // пробегаем по организациям города размещения тендера
				{
					$idorg = mysql_result($resorg, $o, "idorg"); // идентфикатор иорганизации
					$nameorg = mysql_result($resorg, $o, "name"); // наименование иорганизации
					
					//тема письма
					$subject = "Новый Тендер №".$idtender." для ".$nameorg; //тема сообщения
					$subject = "=?utf-8?b?". base64_encode($subject) ."?=";

					//поучатели письма (оконные компании)
					$to = mysql_result($resorg, $o, "email"); // имэйл оконной компании
		
					// текст сообщения (HTML письмо)
					$message = '
						<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
						<html>
						  <head>
							<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
							<title>Надоокна - новые заказ пластиковых окон для '.$nameorg.'</title>
							<style>
							  a:hover{text-decoration:none}
							</style>
						  </head>
						  <body style="margin: 0; padding: 0; background-color: #f8f8f8;" bgcolor="#f8f8f8">
							<!-- основной контейнер -->
							<table style="background-color: #f8f8f8;" width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f8f8f8">
							  <tr style="margin: 0; padding: 0;">
								<td style="margin: 0; padding: 0;">
								  <!-- шапка -->
								  <table border="0" cellpadding="0" cellspacing="20" width="600" align="center">
									<!-- отступ -->
									<tr style="margin: 0; padding: 0; line-height: 0;"><td height="10" style="margin: 0; padding: 0;">&nbsp;</td></tr>
									<tr style="margin: 0; padding: 0;">
									  <td style="margin: 0; padding: 0;">
										<h1 style="font-size: 51px !important; line-height: 80px !important; font-family: \'Open Sans\', Arial, sans-serif !important; color: #4285f4 !important; margin: 0; padding: 0;">НАDООКНА</h1>
										<h2 style="max-width: 410px; font-size: 24px !important; line-height: 27px !important; color: #777777 !important; font-family: Arial, sans-serif !important; margin: 0; padding: 0;">Новые заказы пластиковых окон для '.$nameorg.'</h2>
										<p style="font-size: 17px; font-family: Arial,sans-serif; color: #444444; margin: 0; padding: 0;"><br>Рассылка от '.$date_send.', г. '.$namesity.'<br><br></p>
									  </td>
									</tr>
								  </table>
								  <!-- контент -->
								  <table border="0" bgcolor="ffffff" cellpadding="0" cellspacing="20" width="600" align="center">
									<!-- хэдэр контента -->
									<tr style="margin: 0; padding: 0;">
									  <td style="margin: 0; padding: 0;">
										<h3 style="font-size: 42px !important; line-height: 64px !important; font-family: \'Open Sans\', Arial, sans-serif !important; color: #4285f4 !important; margin: 0; padding: 0;">Тендер # '.$idtender.'</h3>
										<h4 style="color: #777777 !important; font-size: 19px !important; font-family: Arial, sans-serif !important; margin: 0; padding: 0;">Тендер разместил: '.$name.', '.f_normalizedate($datetender).'</h4>
									  </td>
									</tr>
									<!-- кнопкав хэдере контента -->
									<tr style="margin: 0; padding: 0;">
									  <td style="margin: 0; padding: 0;">
										<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;" width="100%">
										  <tr style="margin: 0; padding: 0;">
											<td align="left" style="font-family: Arial,sans-serif; font-size: 22px; vertical-align: top; margin: 0; padding: 0;" valign="top">
											  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
												<tr style="margin: 0; padding: 0;">
												  <td style="font-family: Arial,sans-serif; font-size: 22px; vertical-align: top; border-radius: 2px; text-align: center; background-color: #4285f4; margin: 0; padding: 0;" valign="top" bgcolor="#3498db" align="center">
													<a href="http://nadookna.com/showtender.php?idt='.$idtender.'&ido='.$idorg.'" target="_blank" style="display: inline-block; color: #ffffff; border-radius: 2px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 22px; font-weight: bold; text-transform: capitalize; background-color: #4285f4; padding: 14px 27px; border: 2px solid #4285f4;">Показать телефон</a>
												  </td>
												</tr>
											  </table>
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
									<!-- отступ -->
									<tr style="margin: 0; padding: 0; line-height: 0;"><td height="10" style="margin: 0; padding: 0;">&nbsp;</td></tr>';
									
									// добавляем в тендер его окна
									$message .=	$win_at_tender;

									$message .= '<!-- отступ -->
									<tr style="margin: 0; padding: 0; line-height: 0;"><td height="10" style="margin: 0; padding: 0;">&nbsp;</td></tr>
									<!-- кнопкав в подвале контента контента -->
									<tr style="margin: 0; padding: 0;">
									  <td style="margin: 0; padding: 0;">
										<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;" width="100%">
										  <tr style="margin: 0; padding: 0;">
											<td align="center" style="font-family: Arial,sans-serif; font-size: 24px; vertical-align: top; margin: 0; padding: 0;" valign="top">
											  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
												<tr style="margin: 0; padding: 0;">
												  <td style="font-family: Arial,sans-serif; font-size: 24px; vertical-align: top; border-radius: 2px; text-align: center; background-color: #4285f4; margin: 0; padding: 0;" valign="top" bgcolor="#3498db" align="center">
													<a href="http://nadookna.com/showtender.php?idt='.$idtender.'&ido='.$idorg.'" target="_blank" style="display: inline-block; color: #ffffff; border-radius: 2px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 24px; font-weight: bold; background-color: #4285f4; padding: 14px 27px; border: 2px solid #4285f4;">Показать телефон заказчика</a>
												  </td>
												</tr>
											  </table>
											</td>
										  </tr>
										</table>
									  </td>
									</tr>
									<!-- отступ -->
									<tr style="margin: 0; padding: 0; line-height: 0;"><td height="30" style="margin: 0; padding: 0;">&nbsp;</td></tr>
								  </table>
								  <!-- подвал -->
								  <table border="0" cellspacing="0" cellpadding="20" width="600" align="center">
									<tr style="margin: 0; padding: 0;">
									  <td height="40" style="margin: 0; padding: 0;"></td>
									</tr>
									<tr style="margin: 0; padding: 0;">
									  <td align="center" style="margin: 0; padding: 0;">
										<p style="font-size: 17px; line-height: 23px; font-family: Arial,sans-serif; color: #444444; margin: 0; padding: 0;">
										  Все тендеры можно посмотреть в личном кабинете<br>
										  <a href="http://nadookna.com/login.php" target="_black" style="color: #2573D2;"><b>Вход в личный кабинет</b></a><br>
										  <br>
										  © Надоокна 2014-2017 
										</p>
									  </td>
									</tr>
									<!-- отступ -->
									<tr style="margin: 0; padding: 0;"><td height="40" style="margin: 0; padding: 0;"></td></tr>
								  </table>
								</td>
							  </tr>
							</table>
						  </body>
						</html>';
						
					 
					/*	Отправляем тендер с окнами организации из данной итерации 
						(в цикле который бегает по организациям из города создания тендера).
						Когда пробежим по всем организациям выйдем из цикла и перейдем
						на слудующую итерация родительского цикла for, который бегает по тендерам.
					 */
					mail($to, $subject, $message, $header);
					
				}
			
				// обунуляем переменную с окнами в тендере, иначе в следующем письме в тендере будут окна из предыдущего тендера
				$win_at_tender = '';
				
				// меняем статус тенедера на "в работе", чтобы он больше не рассылался по оконщикам
				mysql_query("UPDATE `tenders` SET `atwork`=1 WHERE `idtender`='$idtender'",$db);
			}  
		}
		
		
		
		
		
		
	}

	
 ?>