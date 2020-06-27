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
    <meta name="description" content="Профильные системы Aluplast - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Алюпласт <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="aluplast, алюпласт, окна aluplast, окна алюпласт, aluplast <?php echo $_SESSION['morph']['ime']; ?>, алюпласт <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Aluplast <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Алюпласт.</title>
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
				Профильные системы Aluplast
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Aluplast</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Алюпласт.
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
		
		<img class="imgBrend" src="../img/img_f_brands/aluplast/aluplast.jpg" alt="оконный профиль aluplast"  title="оконный профиль aluplast" />
		<p class="aboutBrend">
			Aluplast (Алюпласт), компания, существующая уже более 30 лет и входящая 
			в пятёрку лидеров Европейского рынка производства пластиковых профильных 
			систем. Основанное в 1982 году Манфредом Юргеном в Германии, как семейное 
			предприятие, оно и по сегодняшний день ставит своим ориентиром удовлетворение 
			широкого спектра потребностей в ПВХ профильных системах во многих странах мира. 
			Производственная и предпринимательская деятельность компании была по достоинству 
			оценена, что подтверждает присуждение звания лауреата бизнес-премии "MOE-Award", 
			а так же звания "Предприниматель 2005 и 2007 года" в Германии. С 2002 года с 
			созданием предприятия в городе Быково Московской области, российские потребители 
			получили возможность оценить высочайшее качество продукции Aluplast.		
		</p>
		
		<p class="aboutBrend">
			Постоянное развитие технологий компании обеспечивает ей наличие конкурентных 
			преимуществ по сравнению с другими производителями. Aluplast уделяет огромное 
			внимание качеству своей продукции, возможности использования вне зависимости 
			от климатических особенностей региона и архитектурных особенностей зданий и 
			помещений. Можно с высокой долей уверенности сказать, что 
			<a class="for_txt" href="../">пластиковые окна</a> этой 
			марки являются технологически совершенными, удовлетворяя высочайшим требования 
			экологии, тепло и шумоизоляции не только России, но и Европы.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Aluplast Energeto <span class="smollTitelModel">Алюпласт Энергето</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/energeto.jpg" alt="Aluplast Energeto" title="Aluplast Energeto">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 41</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,97</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Использование в качестве усилительного элемента нового материала Ultradur® High Speed позволило добиться более высоких, на 20%, теплоизолирующих качеств и существенного, на 60%, снижения массы, без ущерба для механических характеристик</li>
			</ul>
			<h2 class="titelModel">Aluplast Ideal 8000 - Система Advance <span class="smollTitelModel">Алюпласт Идеал 8000 - Система Эдванс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/ideal8000.jpg" alt="Aluplast Ideal 8000 - Система Advance" title="Aluplast Ideal 8000 - Система Advance">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>85</b></li>
				<li>Толщина стеклопакета, мм: <b>до 51</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>1,00</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>3</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Уплотнитель устанавливается на створке, а не в раме, что делает невозможным повреждение уплотнителя в открытом проеме и увеличивает срок его эксплуатации</li>
			</ul>
			<h2 class="titelModel">Aluplast Ideal 4000 - Система Exzellent <span class="smollTitelModel">Алюпласт Идеал 4000 - Система Экселент</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/ideal4000exzellent.jpg" alt="Aluplast Ideal 4000 - Система Exzellent" title="Aluplast Ideal 4000 - Система Exzellent">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 41</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,78</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Превосходная белоснежная глянцевая поверхность, которая не меняет оттенка под воздействием УФ-излучений и атмосферных осадков</li>
			</ul>
			<h2 class="titelModel">Aluplast Ideal 4000 - Система Elegant <span class="smollTitelModel">Алюпласт Идеал 4000 - Система Элегант</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/ideal4000elegant.jpg" alt="Aluplast Ideal 4000 - Система Elegant" title="Aluplast Ideal 4000 - Система Elegant">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 41</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,71</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Современный дизайн: благодаря гладкой поверхности и элегантным 15-ти и 45-ти градусным скосам на видимой поверхности, окна из профилей Elegant придадут Вашему дому привлекательный внешний вид</li>
			</ul>
			<h2 class="titelModel">Aluplast Ideal 2000 - Система Klassik <span class="smollTitelModel">Алюпласт Идеал 2000 - Система Классик</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/ideal2000klassik.jpg" alt="Aluplast Ideal 2000 - Система Klassik" title="Aluplast Ideal 2000 - Система Klassik">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 33</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,69</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Klassik – сочетание классических традиций с самыми строгими немецкими стандартами по тепло- и энергосбережению</li>
			</ul>
			<h2 class="titelModel">Aluplast Ideal 2000 - Система Praktisch <span class="smollTitelModel">Алюпласт Идеал 2000 - Система Практиш</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/aluplast/ideal2000praktisch.jpg" alt="Aluplast Ideal 2000 - Система Praktisch" title="Aluplast Ideal 2000 - Система Praktisch">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 33</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,62</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Диапазон температур: <b>от -60 до +70°С</b></li>
				<li>Экологичность: <b>экологичный профиль без свинца</b></li>
				<li><br>Предложение для практичных - praktisch сочетает в себе качество с экономически выгодным решением как защитить свой дом от непогоды и суеты города</li>
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