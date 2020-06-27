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
    <meta name="description" content="Профильные системы Gealan - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Геалан <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="gealan, геалан, окна gealan, окна геалан, gealan <?php echo $_SESSION['morph']['ime']; ?>, геалан <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Gealan <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Геалан.</title>
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
				Профильные системы Gealan
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Gealan</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Геалан.
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
		
		<img class="imgBrend" src="../img/img_f_brands/gealan/gealan.jpg" alt="оконный профиль gealan" title="оконный профиль gealan" />
		<p class="aboutBrend">
			Концерн Gealan Fenster System GmbH, представляющий на Российском рынке 
			профильные системы под маркой Gealan (Геалан), имея производство в более 
			50 странах, входит в состав лидеров России, Европы и мира. Gealan была в 
			числе первых компаний, внедривших основы инновационного и высокотехнологичного 
			оконного производства. Уже в 1968 была запущена первая экструзионная линия по 
			производству профильных систем, а в 1980 появились первые цветные оконные 
			профили acrylcolor. Немецкая скрупулёзность и внимание к деталям позволили 
			окнам Gealan иметь лучшие оценки качества и надёжности, а благодаря успешному 
			прохождению международных испытаний получить сертификат высшего международного 
			стандарта.		
		</p>
		
		<p class="aboutBrend">
			Использование в производстве сырья высочайшего качества в купе с передовыми 
			технологиями обеспечило продукт наивысшего качества, соответствующего всем 
			Европейским и Российским стандартам и нормам. Оконные системы Gealan являются 
			законченной системой используемой в производстве окон, дверей и межкомнатных 
			перегородок, обеспечивая высокий уровень по шумоизоляции, сохранению тепла и 
			обеспечению преграды ветру и влаге. 
			<a class="for_txt" href="../">Пластиковые окна Gealan</a> могут быть применимы на всей 
			территории России, не зависимо от климатических условий, от крайнего севера 
			до юга.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">GEALAN S 3000 <span class="smollTitelModel">Геалан С 3000</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/gealan/s3000.jpg" alt="GEALAN S 3000" title="GEALAN S 3000">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>62</b></li>
				<li>Толщина стеклопакета, мм: <b>до 33 мм в плоскосмещённых и до 49 мм в плоскосовмещённых створках</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>0,72 без стального усилителя и 0,63 с усилителем</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность: <b>в соответствии с ГОСТ 30973-2002 составляет 40 условных лет</b></li>
				<li><br>Запатентованная система вентиляции GECCO обеспечивает и повышает комфорт внутри помещения</li>
			</ul>
			<h2 class="titelModel">GEALAN S 7000 IQ <span class="smollTitelModel">Геалан С 7000 АйКью</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/gealan/s7000.jpg" alt="GEALAN S 7000 IQ" title="GEALAN S 7000 IQ">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>74</b></li>
				<li>Толщина стеклопакета, мм: <b>до 48</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>0,88 м²x°C/Вт без стального усилителя и 0,82 м²x°C/Вт с усилителем</b></li>
				<li>Исполнение: <b>глянцевая поверхность, белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность: <b>в соответствии с ГОСТ 30973-2002 составляет 40 условных лет</b></li>
				<li><br>Запатентованная система вентиляции GECCO обеспечивает и повышает комфорт внутри помещения</li>
			</ul>
			<h2 class="titelModel">GEALAN S 8000 IQ <span class="smollTitelModel">Геалан С 8000 АйКью</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/gealan/s8000.jpg" alt="GEALAN S 8000 IQ" title="GEALAN S 8000 IQ">
				<li>Количество камер: <b>4, 6 или 7</b></li>
				<li>Монтажная ширина, мм: <b>74</b></li>
				<li>Толщина стеклопакета, мм: <b>до 45</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>0,82 м²x°C/Вт без стального усилителя и 0,75 м²x°C/Вт с усилителем</b></li>
				<li>Исполнение: <b>белое, цветное acrylcolor, ламинация под дерево</b></li>
				<li>Долговечность: <b>в соответствии с ГОСТ 30973-2002 составляет 40 условных лет</b></li>
				<li><br>Запатентованная система вентиляции GECCO обеспечивает и повышает комфорт внутри помещения</li>
			</ul>
			<h2 class="titelModel">GEALAN S 9000 IQ <span class="smollTitelModel">Геалан С 9000 АйКью</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/gealan/s9000.jpg" alt="GEALAN S 9000 IQ" title="GEALAN S 9000 IQ">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>83</b></li>
				<li>Толщина стеклопакета, мм: <b>до 54</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>1,08 м²x°C/Вт без стального усилителя и 0,92 м²x°C/Вт с усилителем</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li><br>Запатентованная система вентиляции GECCO обеспечивает и повышает комфорт внутри помещения</li>
				<li><br>Третий уплотнитель среднего уплотнения не только повышает показатели тепло- и звукоизоляции, но и предохраняет фурнитуру окна от воздействия влаги</li>
			</ul>
			<h2 class="titelModel">GEALAN S 7000 IQ plus<br><span class="smollTitelModel">Геалан С 7000 АйКью Плюс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/gealan/s7000iqplus.jpg" alt="GEALAN S 7000 IQ plus" title="GEALAN S 7000 IQ plus">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>83</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>0,83</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li><br>Отличные технические характеристики в сочетании с прекрасным внешним видом</li>
			</ul>
			<h2 class="titelModel">GEALAN S 8000 IQ plus<br><span class="smollTitelModel">Геалан С 8000 АйКью Плюс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/gealan/s8000iqplus.jpg" alt="GEALAN S 8000 IQ plus" title="GEALAN S 8000 IQ plus">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>83</b></li>
				<li>Толщина стеклопакета, мм: <b>до 48</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>0,83</b></li>
				<li><br>Многообразие комбинаций, благодаря совместимости данной системы с системой S 8000 IQ</li>
			</ul>
			<h2 class="titelModel">GEALAN S 7000 IQ Passivhaus<br><span class="smollTitelModel">Геалан С 7000 АйКью Пассивхаус</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/gealan/s7000iqp.jpg" alt="GEALAN S 7000 IQ Passivhaus" title="GEALAN S 7000 IQ Passivhaus">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>74</b></li>
				<li>Толщина стеклопакета, мм: <b>до 45</b></li>
				<li>Сопротивление теплопередаче, м²С/Вт: <b>высокое</b></li>
				<li>Долговечность: <b>более 40 условных лет</b></li>
				<li>Принадлежности системы S 7000 IQ могут использоваться для изготовления окна системы S 7000 IQ „Passivhaus“</li>
				<li>Широкий выбор цветовых характеристик окон</li>
				<li>С внешней стороны система снабжена специальными алюминиевыми накладками</li>
				<li>Высокая герметичность окна по всему периметру обеспечивает надёжную защиту от проливного дождя и сквозняков</li>
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