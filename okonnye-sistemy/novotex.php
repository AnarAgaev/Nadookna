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
    <meta name="description" content="Профильные системы Novotex - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Новотекс <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="novotex, новотекс, окна novotex, окна новотекс, novotex <?php echo $_SESSION['morph']['ime']; ?>, новотекс <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Novotex <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Новотекс.</title>
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
				Профильные системы Novotex
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Novotex</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Новотекс.
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
		
		<img class="imgBrend" src="../img/img_f_brands/novotex/novotex.jpg" alt="оконный профиль novotex" title="оконный профиль novotex" />
		<p class="aboutBrend">
			Что такое по настоящему практичные и оптимальные по соотношению 
			цена качество окна? Этим вопросом ещё в 2002 году задалась 
			компания «Народный пластик», когда приступила к разработке 
			новых профильных систем Российского производства под маркой 
			Novotex (Новотекс). Производство разместилось в подмосковном 
			Климовске, а экструзионное оборудование от лучших европейских 
			фирм, таких как Demag и Krauss-Maffei (Германия), Technoplast 
			и Grainer (Австрия), Barberan (Испания) и Amut (Италия) должно 
			было послужить основой качеству, не уступающему лучшим европейским 
			маркам. В итоге на производство поступили оконные профильные системы, 
			адаптированные к Российским условиям эксплуатации, к перепадам 
			температур и не теряющие своих характеристик в холод и непогоду.		
		</p>
		
		<p class="aboutBrend">
			<a class="for_txt" href="../">Пастиковые окна
			из профиля Novotex</a>  имеют наилучшие технические характеристики 
			по шумоизоляции, по предотвращению проникновению в помещение холода, 
			влаги и ветра. В состав ПВХ для окон введен специализированный не 
			воспламеняющийся компонент, поэтому окна Novotex обладают высокой 
			степенью пожароустойчивости. Приобретая окна Novotex, вы сэкономите 
			средства и получите высочайшее качество на долгие годы, ведь срок 
			службы этих окон не менее 40 лет.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Novotex Light <span class="smollTitelModel">Новотекс Лайт</span></h2>
			<ul class="optionsModel plusButtom70">
				<img class="imgModel plusTop" src="../img/img_f_brands/novotex/light.jpg" alt="Novotex Light" title="Novotex Light">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>до 36</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0.64</b></li>
				<li>Контур уплотнения: <b>одинаковые уплотнения притвора в раме и створке</b></li>
				<li>Звукоизоляция: <b>до 46 Дб (зависит от толщины заполнения)</b></li>
			</ul>
			<h2 class="titelModel">Novotex Classic <span class="smollTitelModel">Новотекс Классик</span></h2>
			<ul class="optionsModel plusButtom70">
				<img class="imgModel plusTop" src="../img/img_f_brands/novotex/classic.jpg" alt="Novotex Classic" title="Novotex Classic">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li><br>Благодаря наплаву высотой 20 мм краевая зона стеклопакета надежно защищена от разрушающего воздействия УФ-лучей</li>
			</ul>
			<h2 class="titelModel">Novotex Termo <span class="smollTitelModel">Новотекс Термо</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/novotex/termo.jpg" alt="Novotex Termo" title="Novotex Termo">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Звукоизоляция: <b>от 45 дБ со стеклопакетом 36 мм</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,78</b></li>
				<li><br>Элегантный контур благодаря 35-ти градусным скосам на лицевых поверхностях одинаковые уплотнения притвора в раме и створке</li>
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