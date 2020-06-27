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
    <meta name="description" content="Профильные системы Salamander - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Саламандр <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="salamander, саламандр, окна salamander, окна саламандр, salamander <?php echo $_SESSION['morph']['ime']; ?>, саламандр <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Salamander <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Саламандр.</title>
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
				Профильные системы Salamander
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Salamander</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Саламандр.
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
		
		<img class="imgBrend" src="../img/img_f_brands/salamander/salamander.jpg" alt="оконный профиль salamander" title="оконный профиль salamander" />
		<p class="aboutBrend">
			Всем известна обувь под маркой Salamander (Саламандр) и услышав об окнах 
			этой марки, мало кто может подумать, что это одна и та же компания, 
			хотя и с разделёнными производствами, конечно же, обувь и ПВХ профили 
			не делают на одном предприятии. В планах по производству, основанной 
			в 1885 году небольшой фирмы, не было пластиковых окон и вообще ПВХ 
			продукции. Но уже в 1973 году Salamander выпускает первые профильные 
			системы на заводе в городе Тюркхайм, Бавария. Постоянный поиск новых 
			материалов, усовершенствование технологий производства позволило 
			обувной компании не только войти в новую для них экономическую нишу, 
			но и занять лидирующие позиции в производстве ПВХ продукции. Этим же 
			принципам постоянного внедрения инноваций, поиск новых технологий 
			производства и разработки Salamander руководствуется и сегодня, 
			благодаря чему с 2010 года производится принципиально новая, 
			энергоэффективная система bluEvolution (блюЭволюшн).	
		</p>
		
		<p class="aboutBrend">
			Сегодня группа Salamander Industrie-Produkte GmbH объединяет под собой 
			два бренда, Salamander и Brugmann, производящих продукцию, по настоящему, 
			эталонного качества. <a class="for_txt" href="../">Пластиковые окна
			под маркой Salamander</a>  отличают высочайшие 
			потребительские характеристики и безупречное качество исполнения в 
			соответствии с мировыми стандартами и требованиями, которое, несомненно, 
			оценят требовательные российские потребители. Профильные системы могут 
			быть использованы в любом климате и для решения самых сложных архитектурных 
			и дизайнерских задач.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Salamander Design 2D <span class="smollTitelModel">Саламандр Дизайн 2Д</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/salamander/2d.jpg" alt="Salamander Design 2D" title="Salamander Design 2D">
				<li>Количество камер: <b>3-4</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>32</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,64</b></li>
				<li>Шумоизоляция, дБ: <b>39-42</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Долговечность профиля, условных лет: <b>более 45</b></li>
				<li><br>Двойной скошенный фальц</li>
			</ul>
			<h2 class="titelModel">Salamander Design 3D <span class="smollTitelModel">Саламандр Дизайн 3Д</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/salamander/3d.jpg" alt="Salamander Design 3D" title="Salamander Design 3D">
				<li>Количество камер: <b>5 камер в раме и 4 камеры в створке</b></li>
				<li>Монтажная ширина, мм: <b>76</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,79</b></li>
				<li>Шумоизоляция, дБ: <b>47</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>3</b></li>
				<li>Долговечность профиля, условных лет: <b>более 45</b></li>
				<li><br>Трехконтурная система уплотнения позволяет профильной системе предложить п окупателю тепло- и звукоизоляцию самого высокого уровня</li>
			</ul>
			<h2 class="titelModel">Salamander Streamline <span class="smollTitelModel">Саламандр Стримлайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/salamander/streamline.jpg" alt="Salamander Streamline" title="Salamander Streamline">
				<li>Количество камер: <b>5 камер в раме и створке</b></li>
				<li>Монтажная ширина, мм: <b>76</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,72</b></li>
				<li>Шумоизоляция, дБ: <b>41</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Долговечность профиля, условных лет: <b>более 45</b></li>
				<li><br>Система испытана на морозостойкость при -55°C</li>
			</ul>
			<h2 class="titelModel">Salamander bluEvolution <span class="smollTitelModel">Саламандр блюЭволюшн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/salamander/bluevolution.jpg" alt="Salamander bluEvolution" title="Salamander bluEvolution">
				<li>Количество камер: <b>6 камер в раме и створке</b></li>
				<li>Монтажная ширина, мм: <b>92</b></li>
				<li>Толщина стеклопакета, мм: <b>до 60</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>до 1,25</b></li>
				<li>Шумоизоляция, дБ: <b>47</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>3</b></li>
				<li>Долговечность профиля, условных лет: <b>более 45</b></li>
				<li><br>Наряду с белым цветом представлен широкий спектр высококачественных ламинационных пленок</li>
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