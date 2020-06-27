<?php 
	session_start();
	
	/**********************
	
	Подключаем файл в котором указываем домен под которым будем создавать куки, 
	что бы при переходе между поддоменами при выборе города куки сохранялись
	
	***********************/
	include_once("pattern/iniset.php");
	

	/**********************
	
	Поключаем морфер для автоматического изменения города пользователя в нужный падеж
	В нутри морфера определяем город пользователя манипулируя поддоменом в url
	
	***********************/
	include_once("pattern/morpher.php");
	
	// Подключаемся к БД
	include_once("pattern/dbconnect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Восстановление пароля для входа в личный кабинет на сервисе покупки пластиковых окон Надоокна">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Восстановление пароля</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/login.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body class="background"> 
		
		<!--******** Шапка контента ********-->
		
		<div class="title_vhod">
			<a class="to_start" href="../">НАDООКНА</a>
			<div>
				<img class="vhod" src="../img/lock.png">
				<h1 class="tit_text">Восстановление<br>пароля</h1>
			</div>
		</div>
		
		<?php

			if(isset($_POST['email'])){
				
				$mail = trim($_POST['email']);
				$mail = strip_tags($mail); 
				$mail = htmlspecialchars($mail,ENT_QUOTES);
				if (get_magic_quotes_gpc())	$mail = stripcslashes($mail);
				
				// создаем новый пароль
				mt_srand((double)microtime() * 1000000); // задаем начальное значение генератора случайных чисел
				$newpas = mt_rand(); // создаем переменную с новым паролем и записываем в нее случайное число
				$md5pas = md5($newpas); //шифруем новый пароль, именно его мы будем сохранять в базе
				
				// обновляем пароль в базе
				mysql_query("UPDATE `orgs` SET `pass`='$md5pas' WHERE `email`='$mail'",$db);
				
				// Посылаем письмо на указанный мэйл с новым паролем
				$message = "Восстановление пароля на сайте Надоокна:\r\n\n\n";
				$message .= "Здравструйте! Вы получили это письмо, так как ваш адрес электронной почты был указан при восстановлении пароля на сайте Надоокна.\r\n\n\n";
				$message .="Ваш логин: ".$mail."\r\n";
				$message .="Ваш новый пароль: ".$newpas."\r\n\n\n";
				$message .= "Пароль был создан для вас автоматически.\r\n\n\n";
				$message .="Если вы получили это письмо по ошибке, то просто проигнорируйте или удалите его. Не отвечайте на данное сообщение.\r\n";
				$message .="С уважением, ";
				$message .="администрация сервиса покупки пластиковых окон Надоокна";	
				
				$subject = "Восстановление пароля от Надоокна";
				$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
				
				$from = "Надоокна - сервиса покупки пластиковых окон.";
				$from = "=?utf-8?b?". base64_encode($from) ."?=";	
				
				$header = "Content-type: text/plain; charset=utf-8\r\n";
				$header .= "From: ".$from."<support@nadookna.com>\r\n";
				$header .= "MIME-Version: 1.0\r\n"; 
				$header .= "Date: ".date('D, d M Y h:i:s O');

				//отправляем сообщение
				if (mail($mail, $subject, $message, $header)) echo '<div class="recgood">На указанный вами адрес<br>выслано письмо с новым паролем.<br>Проверьте почту.</div><br><a class="back_log" href="login.php">Войти в аккаунт</a>'; 
				else echo '<div class="recgood">К сожалению не удалось восстановить пароль.<br>Повторите попытку позже.</div>';
				
				
			} 
			else{
				?>
					<!--******** Фома восстановления пароля ********-->
					<form action="pasrecovery.php" method="post" enctype="multipart/form-data" id="form_input"></form>
					
					<div class="boxinput">
						<div class="tit_rec">Введите адрес электронной почты от Вашего аккаунта</div>
						<div class="err" id="err_mail" style="margin-top: 10px;">Напишите адрес электронной почты</div>
						<div class="err" id="war_mail" style="margin-top: 10px; text-align: center;">Некорректный адрес почты</div>
						<div class="err" id="no_mail" style="margin-top: 10px; text-align: center;">Такой адрес не зарегистрирован</div>
						<input type="text" name="email" id="email" class="inputVhod" placeholder="Адрес электронной почты" form="form_input" <?php if (isset($_COOKIE['login'])) echo 'value="'.$_COOKIE['login'].'"'; ?>>
						<div id="go_vhod" class="roundBorder" onclick="f_pasrecovery()">Новый пароль</div>
						<br>
					</div>
					<br>					
				<?php
			}
		?>		
		
		<div class="footer">
			&copy; Надоокна 2014-2016&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
		</div>		

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/verifypasrecovery.js" type="text/javascript"></script><!-- верификация пароля при восставновлении входа в ЛК -->  
	
	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>