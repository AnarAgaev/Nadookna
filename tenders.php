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

	include_once("pattern/dbconnect.php");// подключаем БД
	
	include_once("pattern/normalizedate.php");// приведение даты к читаемому виду
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
	<title>Тендеры</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="style/tender.css" />
	<link rel="stylesheet" type="text/css" href="style/verification.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/logout.js" type="text/javascript"></script><!-- Выход из аккаунта -->

</head>
<body> 

	<div class="fon_blok" onclick="$('.fon_blok,.win_content').css('display','none');"></div>
	
	<div class="win_content" style="position: absolute; left: calc(50% - 400px); z-index: 1000; background-color: #fff;  display: none; width: 100%">
		<div class="del_win" onclick="$('.fon_blok,.win_content').css('display','none');">×</div>
		<div class="bodyOrderPopUp">
			<div class="id_bodyOrder" id="id_bodyOrder"></div>
			<div class="txt_bodyOrder" id="txt_bodyOrder"></div>
			<div class="phone_bodyOrder" id="phone_bodyOrder"></div>
			<a class="showPhone roundBorder" id="button_atTop" href="" style="display: none;">Показать телефон</a>
		</div>
	</div>	

	<?php 
		include_once("pattern/dopnavorg.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>
	
	<div class="wrapper">
		<?php
			/* *****************    Навигация     ***************** */
			include_once("pattern/navigationorg.php");
		?>
	
		<div class="content">
		
			<?php
					//  Если организация не залогинена говорим, что для просмотра тендеров нужно войти в личный кабинет
					if(isset($_SESSION['idorg'])){
						
						
						echo '<div class="title_vhod" style="padding-bottom: 50px;">
							<div>
								<img class="vhod" src="../img/order_index.png">
								<h1 class="tit_date">На этой странице Вы можете посмотреть все<br>тендеры, проходящие'.$_SESSION['morph']['gde'].'</h1>
							</div>
						</div>';		
						
						echo '<div class="tenders_content">';
					
						$idorg = $_SESSION['idorg'];
						$rowphones = mysql_query("SELECT `idtender` FROM `openconts` WHERE `idorg`='$idorg'",$db);
						for ($i = 0; $i < mysql_num_rows($rowphones); $i++){
							$tenders[$i] = mysql_result($rowphones, $i, "idtender");
						}
					
						// получаем ид города организации
						$city = $_SESSION['city'];
						$rowcity = mysql_fetch_assoc(mysql_query("SELECT `id_city` FROM `city` WHERE `city`='$city'",$db));
						$idcity = $rowcity['id_city'];
						// получаем тендеры из города регистрации организации
						$res = mysql_query("SELECT `idtender`, `phone`, `name`, `date` FROM `tenders` WHERE `verifi`=1 AND `idcity`='$idcity' ORDER BY `idtender` DESC",$db);
						for ($i = 0; $i < mysql_num_rows($res); $i++)
							{
								$idtender = mysql_result($res, $i, "idtender");
								$name = mysql_result($res, $i, "name");
								$date = f_normalizedate(mysql_result($res, $i, "date"));
								
								if (in_array($idtender, $tenders)) {
									$phone = mysql_result($res, $i, "phone");
								}
								else $phone = null;
								
								echo '<div class="bodyOrder" id="'.$idtender.'" onclick="f_showtender('.$idorg.','.$idtender.',\''.$name.'\',\''.$city.'\',\''.$date.'\',\''.$phone.'\')">';
									echo '<div class="id_bodyOrder"># '.$idtender.'</div>';
									echo '<div class="txt_bodyOrder">'.$name.' - '.$city.' - '.$date.'</div>';
									
									if ($phone == null) echo '<a class="showPhone roundBorder" href="showtender.php?idt='.$idtender.'&ido='.$idorg.'">Показать телефон</a>';
									else echo '<div class="phone_bodyOrder">'.$phone.'</div>';
								echo '</div>';
							}
						echo '</div>';
					}
					else{
						echo '<div class="title_vhod">
								<div>
									<img class="vhod" src="../img/order_index.png">
									<h1 class="tit_date">На этой странице Вы можете посмотреть все<br>тендеры, проходящие '.$_SESSION['morph']['gde'].'</h1>
								</div>
								<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px; margin-top: 50px;">
									Для просмотра тендеров,<br>необходимо войти в личный кабинет.<br>
									<a class="for_txt" href="login.php">Войти в личный кабинет</a>
								</p>
							</div>';	
					} 
			?>
		
			
			
			<div class="footer">
				&copy; Надоокна 2014-2017&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
			</div>		
		</div>
	</div>
	<script async src="script/js/showtender.js" type="text/javascript"></script>	
	<script async src="script/js/edittagcontent.js" type="text/javascript"></script><!-- увеличиваем высоту контента для мобильных устройств -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице --> 

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>