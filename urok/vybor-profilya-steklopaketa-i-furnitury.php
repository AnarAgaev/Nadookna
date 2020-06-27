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
	<title>Выбор профиля, стеклопакета и фурнитуры <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<meta name="description" content="Не знаете как купить окна ПВХ?. БЕСПЛАТНО расскажем как купить окна. Выбор профиля, стеклопакета и фурнитуры.">
	<meta name="keywords" content="как купить окна, выбор профиля, выбор стеклопакета, выбор фурнитуры.">    
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
				<h1 class="tit_les">Выбор профиля, стеклопакета и фурнитуры.</h1>
			</div>

			
			
			
			<div class="list_urok">
				<div class="point_urok">
					<div class="num_urok">1</div>
					<a style="color: #4285f4;" class="point_urok" href="vybor-profilya-steklopaketa-i-furnitury.php">Выбор профиля, стеклопакета и фурнитуры</a>
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
					<a class="point_urok" href="poisk-okonnoj-kompanii.php">Поиск оконной компании</a>
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
				<p class="txt_articl">Первое, с чего надо начать <a class="for_txt" href="../">покупку пластиковых окон</a> - выбор профиля, стеклопакета и фурнитуры.</p>
				<p class="txt_articl">На рынке большое разнообразие профильных систем. У каждого производителя ПВХ профиль имеет уникальные характеристики теплоизоляции, количества камер, монтажную ширину. Самые важные - ширина профиля и количество камер.</p> 
				<p class="txt_articl">Наиболее значимые характеристики стеклопакетов – количество камер, ширина, наличие энергосберегающих стёкол.</p>
				<p class="txt_articl">При выборе ПВХ профиля и стеклопакета ориентируйтесь на климатические и шумовые характеристики. Чем более холодный климат в месте Вашего проживания и чем больше шума за окном, тем выше тепло- и шомо-изоляционные характеристики должны быть у будущих окон. Если вы живёт в месте с холодным климатом, (и)или ваши окна выходят на шумную улицу - количество камер стеклопакета и профиля должно быть больше: не менее 5 камер для профиля и не менее 2 камер для стеклопакета. В районах умеренного климата достаточно однокамерного стеклопакета и трёх-камерного профиля.</p> 
				<p class="txt_articl">Фурнитура - важнейшая часть <a class="for_txt" href="../">пластикового окна</a>, так как именно она позволяет открывать, закрывать и проветривать окно. Разнообразие марок фурнитуры не так велико. Все их можно разделить на две группы: бюджетная фурнитура и более дорогая. Фурнитура большей ценовой категории более качественна, это, как правило, немецкие или австрийские марки. В бюджетном сегменте находятся производители из Турции, Китая и России, не такие дорогие, но и не такие качественные. В независимости от выбранной марки на долговечность фурнитуры влияет её эксплуатация. Даже недорогая фурнитура при правильном использовании может прослужить долгие годы.</p>
				<p class="nest_part">Далее Чать 2: <a class="nest_part" href="vybor-stvorok.php">Выбор створок</a></p>
			</div>
			<a class="go_to_next_part roundBorder" href="vybor-stvorok.php">Выбор створок</a>
			
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