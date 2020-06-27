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
    <meta name="description" content="Профильные системы Montblanc - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Монблан <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="montblanc, монблан, окна montblanc, окна монблан, montblanc <?php echo $_SESSION['morph']['ime']; ?>, монблан <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Montblanc <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Монблан.</title>
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
				Профильные системы Montblanc
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Montblanc</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Монблан.
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
		
		<img class="imgBrend" src="../img/img_f_brands/montblanc/monlog.jpg" alt="оконный профиль montblanc" title="оконный профиль montblanc" />
		<p class="aboutBrend">
			Хотя история производства оконного и дверного профиля Montblanc (Монблан) 
			не является столь значительной как у других лидеров рынка эти ПВХ профили 
			по качеству и потребительским характеристикам не уступают известным в 
			России маркам. Первые ПВХ окна Montblanc появились уже в 2001 году с 
			открытием завода в подмосковной Электростали. Подписанный в 2000 году 
			контракт с мировым лидером в области экструзионной технологии A+G Extrusion 
			Technology GmbH позволил под её контролем добиться по настоящему эталонного 
			качества производимой продукции.</br></br>
			С момента выпуска первого ПВХ профиля Montblanc Termo 60 в июне 2001 года 
			ассортимент компании постоянно расширяется, стремясь удовлетворить всё 
			возрастающие потребности Российского потребителя, и на сегодняшний момент 
			насчитывает уже семь линеек профиля.		
		</p>
		
		<p class="aboutBrend">
			<a class="for_txt" href="../">Пластиковые окна Montblanc</a> разрабатывались и 
			создавались с учетом климатических условий именно России, стремясь отвечать 
			самым обширным требованиям заказчиков. Пластиковый ПВХ профиль Montblanc 
			отличается высокой степенью экологичности и соответствует всем ГОСТам. 
			Приобретая ПВХ окна из профиля Montblanc, вы можете быть уверены в 
			надёжности и долговечности ваших окон.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Montblanc TERMO 60<span class="smollTitelModel">Монблан Термо 60</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/termo.jpg" alt="Montblanc TERMO 60" title="Montblanc TERMO 60">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 32</b></li>
			</ul>
			<h2 class="titelModel">Montblanc QUADRO 70 <span class="smollTitelModel">Монблан Квадро 70</span></h2>
			<ul class="optionsModel plusButtom70">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/quadro.jpg" alt="Montblanc QUADRO 70" title="Montblanc QUADRO 70">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Сопротивление теплопередаче м²С/Вт:<b>0,76 с оцинкованным стальным усилительным вкладышем и 0,80 без усилительного вкладыша</b></li>
				<li>Цвет уплотнений:<b>черный / белый</b></li>
			</ul>
			<h2 class="titelModel">Montblanc NORD 70 <span class="smollTitelModel">Монблан Норд 70</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/nord.jpg" alt="Montblanc NORD 70" title="Montblanc NORD 70">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Сопротивление теплопередаче м²С/Вт:<b>0,77 с оцинкованным стальным усилительным вкладышем и 0,82 без усилительного вкладыша</b></li>
			</ul>
			<h2 class="titelModel">Montblanc LOGIC <span class="smollTitelModel">Монблан Логик</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/logic.jpg" alt="Montblanc LOGIC" title="Montblanc LOGIC">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>до 32</b></li>
			</ul>
			<h2 class="titelModel">Montblanc GRAND 80 <span class="smollTitelModel">Монблан Гранд 80</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/rgand.jpg" alt="Montblanc GRAND 80" title="Montblanc GRAND 80">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>80</b></li>
				<li>Толщина стеклопакета, мм: <b>до 52</b></li>
				<li>Сопротивление теплопередаче м²С/Вт:<b>0,82 с оцинкованным стальным усилительным вкладышем</b></li>
			</ul>
			<h2 class="titelModel">Montblanc ECO 60 <span class="smollTitelModel">Монблан Эко 60</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/eco.jpg" alt="Montblanc ECO 60" title="Montblanc ECO 60">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 32</b></li>
				<li>Сопротивление теплопередаче м²С/Вт:<b>0,58</b></li>
			</ul>
			<h2 class="titelModel">Montblanc CITY 120 <span class="smollTitelModel">Монблан Сити 120</span></h2>
			<ul class="optionsModel plusButtom100">
				<img class="imgModel plusTop" src="../img/img_f_brands/montblanc/city.jpg" alt="Montblanc CITY 120" title="Montblanc CITY 120">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>120</b></li>
				<li>Долговечность: <b>более 60 условных лет</b></li>
				<li>Сопротивление теплопередаче м²С/Вт:<b>0,72 с оцинкованным стальным усилительным вкладышем</b></li>
			</ul>
			<br>
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