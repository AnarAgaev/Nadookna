<?php 

	header("HTTP/1.1 404 Not Found");

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
	
	/**********************************
	
		создаем переменные куки с метками, что ползователю показан popup баннер
		в дальнейшем при загрузки страницы будем проверять этот маркер
		и если он существует, показвать рекламу не надо, т.к. она уже была показана
		
		Дополнительно устанавливаем переменную в сессию на случай если куки отключены
	
	***********************************/
	
	// popup баннер лежит в pattern/popup.php
	if (!isset($_COOKIE['popupSetTender']) and !isset($_SESSION['popupSetTender'])){
		SetCookie("popupSetTender","true",time()+31536000,"/",".nadookna.com");	
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Запрашиваемой страницы нет на сайте.">
    <meta name="keywords" content="страница отсутствует, ошибка 404">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Страница не найдена.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/404.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
		include_once("pattern/popup.php"); // подключаем popup уведомления
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
		
		<!-- Хлебные крошки -->
		<div class="content_wrap">	
			<div class="breadCrumbs">
				<div class="trigBredCrumbs"></div>
				<a class="breadCrumbs" href="../">Главная</a>/
				Ошибка 404
			</div>
		</div>
		
		<!--******** Шапка контента ********-->
		
		<div class="title_col">
			<div class="err404">404...</div>
			<div>
				<h1 class="tit_text">Этой страницы нет</h1>
				<p class="cont_tit_text">
					<br>К сожалению, данной страницы на сайте больше нет. Возможно, она переименована, перенесена в другой раздел или удалена.<br><br>

					<b>Чтобы устранить причину ошибки, выполните следующие действия:</b><br><br>

					1. Проверьте, правильно ли набран URL-адрес страницы в адресной строке браузера.<br><br> 

					2. Если Вы считаете, что это наша ошибка, сообщите нам, пожалуйста,
					на странице <a class="for_txt" href="../kontakty.php">Контакты</a> с указанием ссылки на неработающую страницу.<br><br> 
					<a class="go_to_index roundBorder" href="../">Перейти на главную</a>
				</p>							
			</div>
		</div>
		
			
		<!--********   ФУТЕР   *********-->
		<?php include_once("pattern/footer.php");  ?>
	
		
	</div>
	
	<script async src="../../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../../script/js/kontakty.js" type="text/javascript"></script><!-- скрипт для страницы контакты с помощью которого валидируется форма отправки сообщения с сайта -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>