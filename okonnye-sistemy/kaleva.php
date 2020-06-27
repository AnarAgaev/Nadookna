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
    <meta name="description" content="Профильные системы Kaleva - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Калева <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="kaleva, калева, окна kaleva, окна калева, kaleva <?php echo $_SESSION['morph']['ime']; ?>, калева <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Kaleva <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Калева.</title>
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
				Профильные системы Kaleva
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Kaleva</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Калева.
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
				<a class="letter" href="schuco.php">Schuco</a>
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
		
		<img class="imgBrend" src="../img/img_f_brands/kaleva/kaleva.png" alt="оконныйе профили калева" title="оконныйе профили калева" />
		<p class="aboutBrend">
			История компании Kaleva, как и многое, началась с идеи. С идеи производить качественную, 
			относительно новую для России продукцию – пластиковые окна. Начиная с открытия небольшого 
			офиса в 1994 году уже в 1996 открыла первое, хоть и небольшое, но собственное производство. 
			Качественное управление и рост копании позволил ей уже через десять лет, в 2006 году 
			основать и запустить собственную промышленную площадку. В начале своего пути компания 
			ориентировалась на производство пластиковых окон из профиля марки Rehau, но уже в 2007 
			году компания приступает к выпуску уникального ПВХ профиля под собственным брендом Kaleva, 
			отвечающим потребностям российского потребителя. Сегодня производство под маркой Kaleva 
			- крупнейший заводов пластиковых конструкций в России.
		</p>
		
		<p class="aboutBrend">
			Обладая собственными техническими лабораториями, удалось достичь высочайших результатов 
			в деле улучшения качества. <a class="for_txt" href="../">Каждый покупатель 
			пластиковых окон</a> этой марки, получает самые 
			современные оконные конструкции, отвечающие всем техническим и экологическим требованиям, 
			надёжную зуко, теплоизоляцию, комфортный микроклимат помещения. За компанию говорят её 
			результаты. Пластиковые окна марки Kaleva выбрало уже более 670000 россиян.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Kaleva Standart <span class="smollTitelModel">Калева Стандарт</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kaleva/standart.jpg" alt="Kaleva Standart" title="Kaleva Standart">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0.80</b></li>
				<li>Исполнение: <b>белое</b></li>
				<li>Цвет уплотнений: <b>белый</b></li>
				<li>Надёждность открывания: <b>40 000 открываний</b></li>
				<li>Срок службы: <b>до 60 лет</b></li>
				<li><br>Выбор большинства Россиян. Надежность, комфорт и тепло по доступной цене.</li>
			</ul>
			<h2 class="titelModel">Kaleva Vita <span class="smollTitelModel">Калева Вита</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kaleva/vita.jpg" alt="Kaleva Vita" title="Kaleva Vita">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,81</b></li>
				<li>Исполнение: <b>белое</b></li>
				<li>Цвет уплотнений: <b>белый</b></li>
				<li>Надёждность открывания: <b>80 000 открываний</b></li>
				<li>Срок службы: <b>до 60 лет</b></li>
				<li><br>Светопропускание на 11% выше, чем у обычных пластиковых окон. Прекрасное соотношение цены и качества.</li>
			</ul>
			<h2 class="titelModel">Kaleva Design <span class="smollTitelModel">Калева Дизайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kaleva/design.jpg" alt="Kaleva Design" title="Kaleva Design">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,81</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>белый</b></li>
				<li>Надёждность открывания: <b>80 000 открываний</b></li>
				<li>Срок службы: <b>до 60 лет</b></li>
				<li><br>Идеальная система для индивидуального строительства. Широкий выбор дизайнерских решений.</li>
			</ul>
			<h2 class="titelModel">Kaleva Design Plus <span class="smollTitelModel">Калева Дизайн плюс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kaleva/design-plus.jpg" alt="Kaleva Design Plus" title="Kaleva Design Plus">
				<li>Количество камер: <b>4 - рама, 5 - створка</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 58</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,83</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Цвет уплотнений: <b>белый</b></li>
				<li>Надёждность открывания: <b>80 000 открываний</b></li>
				<li>Срок службы: <b>до 60 лет</b></li>
				<li><br>Самые «тихие» окна. Необыкновенно толстый стеклопакет — 58 мм.</li>
			</ul>
			<h2 class="titelModel">Kaleva Deco <span class="smollTitelModel">Калева Деко</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kaleva/deco.jpg" alt="Kaleva Deco" title="Kaleva Deco">
				<li>Количество камер: <b>5 - рама, 6 - створка</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,91</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Цвет уплотнений: <b>белый</b></li>
				<li>Надёждность открывания: <b>80 000 открываний</b></li>
				<li>Срок службы: <b>до 60 лет</b></li>
				<li>Количество контуров уплотнения: <b>3</b></li>
				<li><br>Максимальное светопропускание — на 23,4% больше, чем у обычных пластиковых окон. Модель элитного уровня.</li>
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