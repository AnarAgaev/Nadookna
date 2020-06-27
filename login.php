<?php 
	session_start();
	
	//print_r($_SERVER);
	
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
    <meta name="description" content="Вход в личный кабинет сервиса покупки пластиковых окон Надоокна для представителей оконных компаний">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Вход для представителей оконных компаний</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/login.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/verifyuser.js" type="text/javascript"></script><!-- верификация пользователя -->  

</head>
<body class="background"> 
		
	<!--******** Шапка контента ********-->
	
	<div class="title_vhod">
		<a class="to_start" href="#">НАDООКНА</a>
		<div>
			<img class="vhod" src="../img/men.png">
			<h1 class="tit_text">Вход для представителей оконных компаний</h1>
		</div>
	</div>
	
		
	<!--******** Фома входа ********-->
	
	<form action="tenders.php" method="post" enctype="multipart/form-data" id="form_input"></form>
	
	<div class="boxinput">
		<div class="err" id="err_mail_input">Напишите адрес электронной почты</div>
		<div class="err" id="war_mail">Некорректный адрес почты</div>
		<div class="err" id="no_mail">Такой адрес не зарегистрирован</div>
		<div class="err" id="err_pass">Напишите пароль</div>
		<div class="err" id="war_pass">Неверный пароль</div>
		<input type="text" name="email" id="email" class="inputVhod" placeholder="Адрес электронной почты" form="form_input" <?php if (isset($_COOKIE['login'])) echo 'value="'.$_COOKIE['login'].'"'; ?>>
		<input type="password" name="pas" id="pas" class="inputVhod"  placeholder="Пароль" form="form_input" <?php if (isset($_COOKIE['password'])) echo 'value="'.$_COOKIE['password'].'"'; ?>>
		<a rel="nofollow" class="pass" href="pasrecovery.php">Забыли пароль?</a>
		<div id="go_vhod" class="roundBorder" onclick="f_enter_input()">Войти</div>
		<div class="check">
			<input id="check" name="check" type="checkbox" value="check" checked="checked">
			<label for="check" id="span_for_check"></label>
			<label for="check">	Оставаться в системе</label>
		</div>
	</div>		
	
	<div class="footer">
		&copy; Надоокна 2014-2016&nbsp;&nbsp; <a class="input" href="#">Перейти на Главную</a>
	</div>		

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>