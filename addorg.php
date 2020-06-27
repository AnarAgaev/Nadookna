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
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Добавьте свою оконную компанию в справочник города <?php echo $_SESSION['morph']['rod']; ?> и получите максиму новых покупателей пластиковых окон.">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Добавить оконную компанию <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/addorg.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 

	<?
/* 	
	<!-- Обращаем внимание на город в котором будет добавлена оконная компания -->
	<div class="addorgOk" id="addorgOk">
		<div class="close_popup" onclick="f_all_close()">×</div>
		<div class="adorgTitBlock">
			<img src="../img/warily.png">
			<div class="adorgTit">Будьте<br>внимательны</div>
		</div>
		<div class="adorgTxt">
			Оконная компания будет добавлена<br>в справочник !!!!!!Открываем PHP скрипт echo $_SESSION['morph']['rod']; !!!!!!Закрываем PHP скрипт    .<br><br> 
			Если Вы хотите добавить организацию в другом городе, измените его кликнув на город в левом верхнем углу рядом с логотипом.
		</div>
	</div>
	
 */	?>
	
	<?php 
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok" id="popup-background"></div>


	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?>
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		<div class="content">
			<div class="title_vhod">
				<div>
					<img class="vhod" src="../img/addorg.png">
					<h1 class="tit_date">Добавить оконную<br>компанию <?php echo $_SESSION['morph']['gde']; ?></h1>
				</div>
			</div>
			
			<div class="dateContent">
				<form action="okonnym-kompaniyam.php" method="post" enctype="multipart/form-data" id="form_adorg">
					<input type="hidden" name="addorg" value="true">
				</form>
				
				<div class="boxEditData">
				
					<? if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ): ?>
					
						<div class="errTitleData">
							Вы не выбрали город в котором работает Ваша компания. 
							К сожалению размещение оконной компании в справочнике 
							без указания города не возможно.
						</div>
						<div class="btnQues btnSelectCityOrg roundBorder" id="btnSelectCityOrg">Выбрать город</div>
						
					<? endif; ?>
					
					<div class="titelPointEditData">Название Вашей компании</div>
					<div class="errEditData" id="no_name">Укажите как называется Ваша компания</div>
					<input type="text" name="nameorg" id="nameorg" class="inputEditData" form="form_adorg" placeholder="Только Имя. Не используйте ООО, ИП и т.д.">
					
					<div class="titelPointEditData">Почему клиент должен выбрать именно Вас</div>
					<div class="errEditData" id="no_about">Опишите Вашу организацию</div>
					<textarea name="about" id="about" class="textareaEditData" form="form_adorg" placeholder="Коротко опишите преимущества вашей оконной компании. Яркое и запоминающееся описание выделит Вас среди других организаций в оконном справочнике."></textarea>
					
					<div class="titelPointEditData" id="place">По какому адресу Вас могут найти клиенты</div>
					<div class="errEditData" id="no_adres">Укажите адрес Вашей компании</div>
					<input type="text" name="adres" id="adres" class="inputEditData" form="form_adorg" placeholder="Улица, дом (в скобках доп. инфо: офис, этаж и т.д.)">
					
					<div class="titelPointEditData">В какое время Вы работаете</div>
					<div class="errEditData" id="no_timework">Укажите рабочее время</div>
					<input type="text" name="timework" id="timework" class="inputEditData" form="form_adorg" placeholder="Например: Пн-Пт 9:00-19:00, Сб-Вс выходной ">
					
					<div class="titelPointEditData">Ваш номер телефона</div>
					<div class="errEditData" id="no_phone">Необходимо указать хотя бы один контактный номер</div>
					<input type="text" name="phone" id="phone" class="inputEditData" form="form_adorg" placeholder="8 (1234) 123-45-67">
					<div class="titelPointEditData" id="ph2">Телефон 2</div>
					<input type="text" name="phone2" id="phone2" class="inputEditData" form="form_adorg" placeholder="Не обязательно">
					<div class="titelPointEditData" id="ph3">Телефон 3</div>
					<input type="text" name="phone3" id="phone3" class="inputEditData" form="form_adorg" placeholder="Не обязательно">
					<div class="titelPointEditData" id="ph4">Телефон 4</div>
					<input type="text" name="phone4" id="phone4" class="inputEditData" form="form_adorg" placeholder="Не обязательно">
					<div class="titelPointEditData" id="ph5">Телефон 5</div>
					<input type="text" name="phone5" id="phone5" class="inputEditData" form="form_adorg" placeholder="Не обязательно">
					
					
					<div class="titelPointEditData" id="adds">Адрес электронной почты</div>
					<div class="errEditData" id="no_mail">Напишите адрес электронной почты</div>
					<div class="errEditData" id="err_mail">Некорректный адрес почты</div>
					<div class="errEditData" id="have_mail">Этот адрес почты уже используется</div>
					<input type="text" name="email" id="email" class="inputEditData" form="form_adorg" placeholder="Понадобится для Входа в личный кабинет.">
					
					<div class="titelPointEditData">Пароль</div>
					<div class="errEditData" id="no_pass">Укажите пароль для входа в личный кабинет</div>
					<div class="errEditData" id="err_pass">Пароли должны совпадать</div>
					<input type="password" name="pass" id="pass" class="inputEditData" form="form_adorg">
					<div class="titelPointEditData" id="pc">Повторите пароль</div>
					<div class="errEditData" id="no_passcopy">Повторите введенный пароль</div>
					<input type="password" id="passcopy" class="inputEditData">
					
					<div class="titelPointEditData" id="ws">Ваш сайт</div>
					<input type="text" name="site" id="site" class="inputEditData" form="form_adorg" placeholder="Если есть веб-сайт, укажите его.">
					
					<div class="titelPointEditData" style="margin-top: 40px;">Используемый профиль</div>
					<div class="errEditData" id="no_profil">Какой оконный профиль Вы используете</div>
					<input type="text" name="profil" id="profil" class="inputEditData" form="form_adorg" placeholder="Например Veka, Rehau, BrusBox">
					
					<div class="titelPointEditData">Используемая фурнитура</div>
					<div class="errEditData" id="no_furnitura">Укажите используемую Вами фурнитуру</div>
					<input type="text" name="furnitura" id="furnitura" class="inputEditData" form="form_adorg" placeholder="Например ROTO, Internika, GU (Gretsch-Unitas)">
					
					<div class="titelPointEditData">
						Нажимаю кнопку Добавить компанию Вы соглашаетесь с 
						<a class="for_txt" href="/download/personal_data_policy.pdf" target="_blank">
							Политика в отношении обработки персональных данных.</a>
					</div>
					
					<div class="saveEditData roundBorder" onclick="f_valid_data()">Добавить компанию</div>
				</div>		
			</div>
		</div>

		<!-- ФУТЕР -->
		<?php include_once("pattern/footer.php");  ?>
		
	</div>
	
	<script async src="script/js/addorg.js" type="text/javascript"></script><!-- валидация данных формы -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>