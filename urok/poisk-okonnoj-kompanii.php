<?php 
	session_start();
	
	/**********************
	
	Подключаем файл в котором указываем домен под которым будем создавать куки, 
	что бы при переходе между поддоменами при выборе города куки сохранялись
	
	***********************/
	include_once("../pattern/iniset.php");
	

	/**********************
	
	Поключаем морфер для автоматического изменения города пользователя в нужный падеж
	В нутри морфера определяем город пользователя манипулируя поддоменом в url
	
	***********************/
	include_once("../pattern/morpher.php");
	
	// получаем урл страницы
	include_once("../script/php/geturl.php"); 
		
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
	<title>Поиск оконной компании <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<meta name="description" content="Не знаете как купить окна ПВХ?. БЕСПЛАТНО расскажем как купить окна. Поиск оконной компании.">
	<meta name="keywords" content="поиск оконной компании">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lessix.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 

	<?php 
		include_once("../pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("../pattern/selectcity.php"); // подключаем форму выбора города
		include_once("../pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<?php 
			include_once("../pattern/header.php"); // подключаем шапку сайта
			include_once("../pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?>
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		<div class="content_wrap">
		
			<div class="line_course">
				<img src="../img/course/line_six.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_blu txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Как купить окна: поиск оконной компании.</h1>
			</div>

			
			
			
			<div class="list_urok">
				<div class="point_urok">
					<div class="num_urok">1</div>
					<a class="point_urok" href="vybor-profilya-steklopaketa-i-furnitury.php">Выбор профиля, стеклопакета и фурнитуры</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">2</div>
					<a class="point_urok" href="vybor-stvorok.php">Выбор створок</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">3</div>
					<a class="point_urok" href="otkosy-podokonnik-otliv.php">Откосы, подоконник, отлив</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">4</div>
					<a class="point_urok" href="predvaritelnyj-zamer-okna.php">Предварительный замер окна</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">5</div>
					<a style="color: #4285f4;" class="point_urok" href="poisk-okonnoj-kompanii.php">Поиск оконной компании</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">6</div>
					<a class="point_urok" href="poisk-nailuchshej-ceny.php">Поиск наилучшей цены</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">7</div>
					<a class="point_urok" href="podgotovka-pomeshcheniya.php">Подготовка помещения</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">8</div>
					<a class="point_urok" href="ustanovka-okon.php">Установка окон</a>
				</div>
			</div>
			
			
			<div class="txt_articl">
				<p class="txt_articl">Пятый этап - поиск оконной компании. На оконном рынке множество продавцов <a class="for_txt" href="../">пластиковых окон</a>. Не все из них добросовестны. Не стоит гнаться за дешевизной, можно попасть на фирму однодневку, и, в случае возникновения гарантийного ремонта, не найти продавца. Выбирая оконную компанию, обратите внимание на срок её работы на рынке, срок гарантии на окна и на монтаж, стоимость монтажных работ, и выполняется ли монтаж по ГОСТу. Обязательно попросите сертификат соответствия стандартам качества и санитарным нормам. Поинтересуйтесь входит ли в стоимость демонтаж старых окон и уборка строительного мусора после установки. Прочтите отзывы о выбранной компании в интернете.</p>
				<p class="nest_part">Далее Чать 6: <a class="nest_part" href="poisk-nailuchshej-ceny.php">Поиск наилучшей цены.</a></p>
			</div>
			<a class="go_to_next_part roundBorder" href="poisk-nailuchshej-ceny.php">Поиск наилучшей цены</a>
			
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>

	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>