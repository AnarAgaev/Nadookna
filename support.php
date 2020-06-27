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
	
	include_once("script/php/geturl.php"); // получаем урл страницы
	
	include_once("pattern/dbconnect.php"); // Подключаемся к БД
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
	<title>Служба поддержки</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
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



	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>

	<div class="wrapper">
		<?php
			/* *****************    Навигация     ***************** */
			include_once("pattern/navigationorg.php");
		?>
	
		<div class="content">

			<!-- Всплывающее окно просьба перезвонить удачно отправлена -->
			<div class="popUpOk" id="colMeOk">
				<div class="close_popup" onclick="f_all_close()">×</div>
				<div class="tipPopUp"><img src="../img/send_ok.png"></div>
				<div class="textPopUp">
					Сообщение отправлено в службу<br>
					поддержки. Менеджер свяжется<br>
					с Вами в ближайшее время.
				</div>
			</div>	
		
		
		
			<?php
				// проверяем залогинена ли организация от кого будем посылать сообщение с просьбой перезвонить
				if (!isset($_SESSION['idorg'])){
					// Говорим, что для отправки сообщения необходимо выполнить вход
						?>
							<div class="title_vhod">
								<div>
									<img class="vhod" src="../img/order_index.png">
									<h1 class="tit_date">На этой странице Вы можете послать сообщение в службу поддержни копмании Надоокна.</h1>
								</div>
								<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px; margin-top: 50px;">
									Для отправки сообщения,<br>необходимо войти в личный кабинет.<br>
									<a class="for_txt" href="login.php">Войти в личный кабинет</a>
								</p>
							</div>

					<?php	
				}
				else {
					?>
						<!--******** Шапка контента ********-->
						<div class="title_vhod">
							<div>
								<img class="vhod" src="../img/order_index.png">
								<h1 class="tit_date">Есть вопрос или замечание по работе ресурса? Воспользуйтесь формой ниже.</h1>
							</div>
						</div>
							
						<?php
							// Перед отправкой получим данные компании
							$idOrg = $_SESSION['idorg'];
							$row = mysql_fetch_assoc(mysql_query("SELECT `name`, `email`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5` FROM `orgs` WHERE `idorg`='$idOrg'",$db));
						?>

						<!--******** Фома обратной связи ********-->
						<div class="boxinput_supp">
							
							<input type="hidden" id="orgName" value="<?php echo $row['name']; ?>">
							<input type="hidden" id="orgCity" value="<?php echo $_SESSION['city']; ?>">
							<input type="hidden" id="orgMail" value="<?php echo $row['email']; ?>">
							<input type="hidden" id="phone1" value="<?php echo $row['phone1']; ?>">
							<input type="hidden" id="phone2" value="<?php echo $row['phone2']; ?>">
							<input type="hidden" id="phone3" value="<?php echo $row['phone3']; ?>">
							<input type="hidden" id="phone4" value="<?php echo $row['phone4']; ?>">
							<input type="hidden" id="phone5" value="<?php echo $row['phone5']; ?>">
							
							<div class="errEditData" id="no_contakt" style="margin-top: 20px;">Укажите телефон или емэйл</div>
							<div class="errEditData" id="no_txt">Напишите Ваше сообщение</div>

							<div class="titelPointEditData" style="width: 80%;">Ваши контактные данные</div>
							<input type="text" id="kontakty" class="inputSupp" placeholder="Телефон или емэйл">
							<div class="titelPointEditData" style="width: 80%;">Текст сообщения</div>
							<textarea id="text_kontakty" class="textareaSupp"  placeholder="Ваш вопрос или предложение"></textarea>
							<div id="go_kontakty" class="roundBorder" onclick="f_supp_validate();">Отправить</div>
						</div>
					<?php
				}
			?>
		
		
			<div class="footer">
				&copy; Надоокна 2014-2017&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
			</div>		
		</div>
	</div>
	
	<script async src="script/js/edittagcontent.js" type="text/javascript"></script><!-- увеличиваем высоту контента для мобильных устройств -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="script/js/support.js" type="text/javascript"></script><!-- скрипт для страницы саппорт с помощью которого валидируется форма отправки сообщения с сайта -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>