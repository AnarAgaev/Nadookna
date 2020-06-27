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

	// получаем урл страницы
	include_once("script/php/geturl.php"); 
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Добавить Акцию</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/login.css" />
	<!-- Подключаем стили для datepicker jQuery ***  всплывающее окно выбора даты -->
	<link type="text/css" href="script/jquery/datepicker/css/flick/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
	<link type="text/css" href="script/jquery/datepicker/css/datepicker.css" rel="stylesheet" />

	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/logout.js" type="text/javascript"></script><!-- Выход из аккаунта -->

</head>
<body> 

	<?php 
		include_once("pattern/dopnavorg.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - полдожка под всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>

	<div class="wrapper">
		<?php
			/* *****************    Навигация     ***************** */
			include_once("pattern/navigationorg.php");
		?>
	
		<div class="content">
		
			<!--******** Шапка контента ********-->
			<div class="title_vhod"">
				<div>
					<img class="vhod" src="../img/org_percent.png">
					<h1 class="tit_date">Запуск новой Акции</h1>
				</div>
			</div>
			
			<div class="dateContent">

				<form action="promotions.php" method="post" enctype="multipart/form-data" id="form_editAction">
					<input type="hidden" name="addaction" value="true">
				</form>
				
				<div class="boxEditData">
					<div class="errEditAction" id="no_titel">Укажите заговолок Акции</div>
					<div class="errEditAction" id="long_titel">Заголовок акции не должен превышать 100 символов</div>
					<div class="titelPointEditData">Как называется Акция</div>
					<textarea name="name" id="name" style="height: 60px;" class="textareaEditData" form="form_editAction"><?php echo htmlspecialchars(stripslashes($row['title'])); ?></textarea>
					
					<div class="errEditAction" id="no_txt">Напишите текст Акции</div>
					<div class="errEditAction" id="long_txt">Описание акции не должно превышать 500 символов</div>
					<div class="titelPointEditData">Что вы предлагаете Вашим покупателям</div>
					<textarea name="about" id="about" class="textareaEditData" form="form_editAction"><?php echo htmlspecialchars(stripslashes($row['text'])); ?></textarea>
					
					<div class="errEditAction" id="err_finish_data" style="top: 35px;">Дата окончания раньше даты начала</div>
					<div class="errEditAction" id="err_data" style="top: 35px;">Совпадают дата начала и дата окончания Акции</div>
					<div class="errEditAction" id="no_start" style="top: 35px;">Укажите когда начнётся Акции</div>
					<div class="errEditAction" id="no_finish" style="top: 35px;">Укажите дату завершения Акции</div>
					
					<div class="titelPointEditData" style="margin-top: 40px;">Дата начала Акции</div>
					<div class="datepicker_conteiner"><input type="text" name="dsa" id="data_start_action" class="datepicker" style="cursor: pointer;" form="form_editAction" value="" readonly></div>
					
					<div class="titelPointEditData">Дата окончания Акции</div>
					<div class="datepicker_conteiner"><input type="text" name="dfa" id="data_finish_action" class="datepicker" style="cursor: pointer;" form="form_editAction" value="" readonly></div>
					
					<div class="saveEditData roundBorder" onclick="f_edit_action()">Создать Акцию</div>
				</div>		
			</div>
			
			<div class="footer">
				&copy; Надоокна 2014-2016&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
			</div>		
		</div>
	</div>
	
	<script async src="script/js/editaction.js" type="text/javascript"></script><!-- скрипт валидации данных компании при их редактировании -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->
	<!-- Подключаем datepicker jQuery ***  всплывающее окно выбора даты-->
	<script src="script/jquery/datepicker/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="script/jquery/datepicker/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
	<script src="script/jquery/datepicker/js/i18n/jquery-ui-i18n.js" type="text/javascript"></script>
	<script src="script/jquery/datepicker/js/datepicker.js" type="text/javascript"></script>

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>