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
    <meta name="description" content="Профильные системы Rehau - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Рехау <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="rehau, рехау, окна rehau, окна рехау, rehau <?php echo $_SESSION['morph']['ime']; ?>, рехау <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Rehau <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Рехау.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="stylesheet" type="text/css" href="../style/aboutbrend.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body>
	<?php
		include_once("../pattern/btnscroll.php"); // поключаем кнопку скрола страницы наверх
		include_once("../pattern/videobox.php"); // поключаем блок в котором будем показывать всплывающее видео
		include_once("../pattern/popup.php"); // подключаем popup уведомления
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
		
		
		<!-- Хлебные крошкни -->
		<div class="content_wrap">	
			<div class="breadCrumbs">
				<div class="trigBredCrumbs"></div>
				<a class="breadCrumbs" href="../">Главная</a>/
				<a class="breadCrumbs" href="okonnye-sistemy.php">Оконные системы</a>/
				Профильные системы Rehau
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Rehau</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Рехау.
					Виды производимого профиля и его эксплуатационные характеристики.
				</p>							
			</div>
		</div>
	
		
		<!-- Анкоры на внутренние страницы с описанием марок ПВХ профиля -->
		
		<div class="text_for_brands">
			<p class="hand_text_for_brends">
				<a class="letter" href="veka.php">Veka</a>
				<a class="letter" href="rehau.php">Rehau</a>
				<a class="letter" href="kbe.php">KBE</a>
				<a class="letter" href="trocal.php">Trocal</a>
				<a class="letter" href="deceuninck.php">Deceuninck</a>
				<a class="letter" href="aluplast.php">Aluplast</a><br>
				<a class="letter" href="montblanc.php">Montblanc</a>
				<a class="letter" href="novotex.php">Novotex</a>
				<a class="letter" href="gealan.php">Gealan</a>
				<a class="letter" href="proplex.php">Proplex</a>
				<a class="letter" href="salamander.php">Salamander</a><br>
				<a class="letter" href="brusbox.php">Brusbox</a>
				<a class="letter" href="kaleva.php">Kaleva</a>
				<a class="letter" href="schuco.php">Schüco</a>
				<a class="letter" href="plafen.php">Plafen</a>
			</p>
		</div>	
		
		
		<!-- Рекламный баннер на Урок о ПВХ окнах -->
		
		<div class="action_to_course">
			<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
			Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
			Узнайте как сэкономить до 10%.
			<a href="../urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
		</div>
		
		
		<!-- Описание бренда -->
		
		<img class="imgBrend" src="../img/img_f_brands/rehau/rehau.jpg" alt="оконныйе профили rehau" title="оконныйе профили rehau">
		<p class="aboutBrend">
			История компании Rehau (Рехау) насчитывает уже многие десятилетия. Основанная в 1984 в одноименном городе Рехау, 
			на сегодняшний момент она имеет более 170 представительств по всему миру. Изначально производство, состоящее 
			всего из 4 человек, было ориентированно на автомобильную промышленность и, даже первое предприятие, открытое 
			за пределами германии (в Австрии) не имело отношения к оконным профильным системам. Лишь в 1958 году свет 
			увидит первый профиль от компании Rehau, который начал долгий путь инноваций и усовершенствований к 
			современным профильным системам.
		</p>
		
		<p class="aboutBrend">
			Благодаря собственному исследовательскому центру в Эрлангене (Германия) и постоянному внедрению инновационных 
			методов исследования и производства компании Rehau уже более полувека удается оставаться лидером рынка производства 
			профильных ПВХ систем. Линейка оконных и дверных профилей Rehau способна не только удовлетворить сложнейший 
			архитектурный замысел, но и создать атмосферу тепла и уюта в вашем доме. 
			<a class="for_txt" href="../">Качество пластиковых окон</a> компании Rehau является ориентиром для многих компаний, 
			производящих профильные системы.
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Rehau GENEO <span class="smollTitelModel">Рехау Генео</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/geneo.jpg" alt="rehau geneo" title="rehau geneo">
				<li>Монтажная ширина, мм: <b>86</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее): <b>1,05 м2 с/вт</b></li>
				<li>Звукоизоляция в соответствии с требованиями<br>европейских норм: <b>до 5 класса</b></li>
				<li>Легкость установки запирающих устройств.<br>Взломобезопасность: <b>от класса 2</b></li>
				<li>Исполнение: <b>неограниченные возможности форм и цветовых решений</b></li>
			</ul>
			<h2 class="titelModel">Rehau INTELIO <span class="smollTitelModel">Рехау Интелио</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/intelio.jpg" alt="Rehau INTELIO" title="Rehau INTELIO">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>86</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее): <b>0,95 м2 с/вт</b></li>
				<li>Звукоизоляция в соответствии с требованиями<br>европейских норм: <b>до 4 класса</b></li>
				<li>Легкость установки запирающих устройств.<br>Взломобезопасность: <b>до 3 класса</b></li>
				<li>Исполнение: <b>неограниченные возможности форм и цветовых решений</b></li>
				<li><b></b></li>
				<li><b></b></li>
				<li><b></b></li>
			</ul>
			<h2 class="titelModel">Rehau BRILLANT-DESIGN <span class="smollTitelModel">Рехау Бриллиант-дизайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/brillant_design.jpg" alt="Rehau BRILLANT-DESIGN" title="Rehau BRILLANT-DESIGN">
				<li>Количество камер: <b>5 (6)</b></li>
				<li>Монтажная ширина, мм: <b>70 (80мм)</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее):<b>0,79 м2 с/вт</b></li>
				<li>Звукоизоляция в соответствии с требованиями<br>европейских норм: <b>до класса 5</b></li>
				<li>Взломобезопасность: <b>установка усиленных приборов запирания благодаря смещению оси приборного паза на 13 мм</b></li>
				<li>Поверхность: <b>высококачественная, идеально гладкая, удобная для ухода</b></li>
				<li>Исполнение: <b>белый или любой цвет, имитацией структуры дерева</b></li>
				<li><b></b></li>
				<li><b></b></li>
			</ul>
			<h2 class="titelModel">Rehau DELIGHT-DESIGN <span class="smollTitelModel">Рехау Делайт-дизайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/delight_design.jpg" alt="Rehau DELIGHT-DESIGN" title="Rehau DELIGHT-DESIGN">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее):<b>0,8 м2 с/вт</b></li>
				<li>Воздухо- и водонепроницаемость: <b>надежная защита от сквозняков, пыли и воды благодаря двум контурам уплотнений (нахлест уплотнений по 7/8 мм снаружи / внутри).</b></li>
				<li>Взломобезопасность: <b>установка усиленных приборов запирания благодаря смещению оси приборного паза 13 мм.</b></li>
				<li>Поверхность: <b>высококачественная, идеально гладкая, удобная для ухода</b></li>
				<li>Исполнение: <b>белый или любой цвет, имитацией структуры дерева</b></li>
			</ul>
			<h2 class="titelModel">Rehau SIB-DESIGN <span class="smollTitelModel">Рехау Сиб-дизайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/sib_design.jpg" alt="Rehau SIB-DESIGN" title="Rehau SIB-DESIGN">
				<li>Количество камер: <b>многокамерная</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее):<b>0,71 м2 с/вт</b></li>
				<li>Воздухо- и водонепроницаемость: <b>надежная защита от сквозняков, пыли и воды благодаря двум контурам уплотнений (нахлест уплотнений по 7/8 мм внутри).</b></li>
				<li>Взломобезопасность: <b>установка усиленных приборов запирания благодаря смещению оси приборного паза 13 мм.</b></li>
				<li>Поверхность: <b>высококачественная, идеально гладкая, удобная для ухода</b></li>
				<li>Исполнение: <b>белый или любой цвет, имитацией структуры дерева</b></li>
			</ul>
			<h2 class="titelModel">Rehau EURO-DESIGN <span class="smollTitelModel">Рехау Евро-дизайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/euro_design.jpg" alt="Rehau EURO-DESIGN" title="Rehau EURO-DESIGN">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее):<b>0,64 м2 с/вт</b></li>
				<li>Воздухо- и водонепроницаемость: <b>надежная защита от сквозняков, пыли и воды благодаря двум контурам уплотнений (нахлест уплотнений по 7/8 мм снаружи и внутри).</b></li>
				<li>Взломобезопасность: <b>установка усиленных приборов запирания благодаря смещению оси приборного паза 13 мм.</b></li>
				<li>Поверхность: <b>гладкая, легко очищаемая</b></li>
			</ul>
			<h2 class="titelModel">Rehau BLITZ <span class="smollTitelModel">Рехау Блиц</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/rehau/blitz.jpg" alt="Rehau BLITZ" title="Rehau BLITZ">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Теплоизоляция: коэффициент сопротивления<br>теплопередачи (не менее):<b>0,63 м2 с/вт</b></li>
				<li>Воздухо- и водонепроницаемость: <b>надежная защита от сквозняков, пыли и воды благодаря двум контурам уплотнений (нахлест уплотнений по 7/8 мм снаружи и внутри).</b></li>
				<li>Взломобезопасность: <b>установка усиленных приборов запирания благодаря смещению оси приборного паза 13 мм.</b></li>
				<li>Поверхность: <b>высококачественная, идеально гладкая, удобная для ухода</b></li>
			</ul>
		</div>
		
		
		<!-- Видео с YOUTUBE на страницах с контентом -->
		 
		<div class="video_at_txt">
			<h2 class="medium_blu">Видео: выбор оконной системы</h2>
			В данном видео ролике автором хорошо раскрыт вопрос, 
			что такое ПВХ профиль пластикового окна. Рассказываются 
			отличительные особенности профилей, их структура и различия.<br><br>
			<img class="block_f_moove" src="../img/img_f_video/v10.jpg" alt="ПВХ профиль видео" title="ПВХ профиль видео" onclick="f_showvideo('//www.youtube.com/embed/2LG0mKZb0lw?rel=0&amp;autoplay=1&amp;showinfo=0')">
		</div>
			
			
		
		<?php 
		
			/******************       КОМЕНТАРИИ         *******************/
			include_once("../pattern/coments.php");  
		
			/******************       ФУТЕР         *******************/
			include_once("../pattern/footer.php");  
		
		?>
	</div>
	
	<script async src="../script/js/showvideo.js" type="text/javascript"></script><!-- подключаем скрипт который показывает видео на странице -->  
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>