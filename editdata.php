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
	<title>Редактирование данных компании</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
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
			<div class="title_vhod">
				<div>
					<img class="vhod" src="../img/order_index.png">
					<h1 class="tit_date">Редактирование данных<br>Вашей оконной компании</h1>
				</div>
			</div>
			
			<?php
				// Получим данные компании
				
				$idOrg = $_SESSION['idorg'];
				$row = mysql_fetch_assoc(mysql_query("SELECT `name`, `email`, `url`, `adds`, `info`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`, `profil`, `furnitura` FROM `orgs` WHERE `idorg`='$idOrg'",$db));
			?>
			
			<div class="dateContent">

				<form action="data.php" method="post" enctype="multipart/form-data" id="form_editData">
					<input type="hidden" name="editdata" value="true">
				</form>
				
				<div class="boxEditData">
					<div class="titelPointEditData">Название Вашей компании</div>
					<div class="errEditData" id="no_name">Укажите как называется Ваша компания</div>
					<input type="text" name="name" id="name" class="inputEditData" form="form_editData" value="<?php echo $row['name']; ?>">
					
					<div class="titelPointEditData">Почему клиент должен выбрать именно Вас</div>
					<textarea name="about" id="about" class="textareaEditData" form="form_editData"><?php echo $row['info']; ?></textarea>
					
					
					<div class="titelPointEditData" style="margin-top: 40px;">По какому адресу Вас могут найти клиенты</div>
					<input type="text" name="adres" id="adres" class="inputEditData" form="form_editData" value="<?php echo $row['adds']; ?>">
					
					<div class="titelPointEditData">В какое время Вы работаете</div>
					<input type="text" name="timework" id="timework" class="inputEditData" form="form_editData" value="<?php echo $row['wtime']; ?>">
					
					<div class="titelPointEditData">Ваш номер телефона</div>
					<input type="text" name="phone" id="phone" class="inputEditData" form="form_editData" value="<?php echo $row['phone1']; ?>">
					<div class="titelPointEditData" id="ph2">Телефон 2</div>
					<input type="text" name="phone2" id="phone2" class="inputEditData" form="form_editData" value="<?php echo $row['phone2']; ?>">
					<div class="titelPointEditData" id="ph3">Телефон 3</div>
					<input type="text" name="phone3" id="phone3" class="inputEditData" form="form_editData" value="<?php echo $row['phone3']; ?>">
					<div class="titelPointEditData" id="ph4">Телефон 4</div>
					<input type="text" name="phone4" id="phone4" class="inputEditData" form="form_editData" value="<?php echo $row['phone4']; ?>">
					<div class="titelPointEditData" id="ph5">Телефон 5</div>
					<input type="text" name="phone5" id="phone5" class="inputEditData" form="form_editData" value="<?php echo $row['phone5']; ?>">
					
					
					<div class="titelPointEditData" id="adds">Адрес электронной почты</div>
					<div class="errEditData" id="no_mail">Напишите адрес электронной почты</div>
					<div class="errEditData" id="err_mail">Некорректный адрес почты</div>
					<input type="text" name="email" id="email" class="inputEditData" form="form_editData" value="<?php echo $row['email']; ?>">
					
					<div class="titelPointEditData">Ваш сайт</div>
					<input type="text" name="site" id="site" class="inputEditData" form="form_editData" value="<?php echo $row['url']; ?>">
					
					
					<div class="titelPointEditData" style="margin-top: 40px;">Используемый профиль</div>
					<input type="text" name="profil" id="profil" class="inputEditData" form="form_editData" value="<?php echo $row['profil']; ?>">
					
					<div class="titelPointEditData">Используемая фурнитура</div>
					<input type="text" name="furnitura" id="furnitura" class="inputEditData" form="form_editData" value="<?php echo $row['furnitura']; ?>">
					
					<div class="saveEditData roundBorder" onclick="f_edit_data()">Сохранить изменения</div>
				</div>		
			</div>
			
			<div class="footer">
				&copy; Надоокна 2014-2016&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
			</div>		
		</div>
	</div>
	
	<script async src="script/js/editdata.js" type="text/javascript"></script><!-- скрипт валидации данных компании при их редактировании -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>