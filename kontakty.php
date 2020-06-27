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
    <meta name="description" content="Страница контакты сервиса Надоокна понадобится вам если вы захотите оставить сообщение или связаться с нами по какому либо вопросу.">
    <meta name="keywords" content="контакты, надоокна, <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Контакты. Надоокна <?php echo $_SESSION['morph']['ime']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?> 
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		<!--******** Шапка контента ********-->
		
		<div class="title_vhod">
			<div>
				<img class="vhod" src="../img/order_index.png">
				<h1 class="tit_date">Есть вопрос или предложениe?</h1>
			</div>
			<p class="subtitelCont">
				Замечание по работе ресурса или хотите обсудить сотрудничество? 
				Напишите нам, заполнив форму ниже. 
				Мы обязательно ответим Вам.	
				Мы всегда внимательны к сообщениям из формы Контакты.
			</p>
		</div>
		
			
		<!--******** Фома обратной связи ********-->
		
		<div class="boxinput">
			<input type="hidden" id="cityAtFormKont" value="<?php if ($_SESSION['city'] == 'Выберите Ваш город') echo 'Город пользователя не определён.'; else echo $_SESSION['city']; ?>">
			
			<div class="errEditData" id="no_contakt">Укажите Ваш емэйл</div>
			<div class="errEditData" id="no_txt">Напишите Ваше сообщение</div>
			
			<div class="title_input">Ваши Емэйл</div>
			<input type="text" id="kontakty" class="input_kontakty" placeholder="ivanov@mail.com">
			
			<div class="title_input">Текст сообщения</div>
			<textarea id="text_kontakty" class="text_kontakty"  placeholder="Ваш вопрос или предложение"></textarea>
			
			<div id="go_kontakty" class="roundBorder" onclick="f_kontakty_validate();">Отправить</div>
		</div>		
		
			
		<!--********   ФУТЕР   *********-->
		<?php include_once("pattern/footer.php");  ?>
	
		
	</div>
	
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="script/js/kontakty.js" type="text/javascript"></script><!-- скрипт для страницы контакты с помощью которого валидируется форма отправки сообщения с сайта -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>