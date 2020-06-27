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
    <meta name="description" content="Профильные системы Trocal - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Трокаль <?php echo $_SESSION['morph']['gde']; ?>">
    <meta name="keywords" content="trocal, трокаль, окна trocal, окна трокаль, trocal <?php echo $_SESSION['morph']['ime']; ?>, трокаль <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Trocal <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Трокаль.</title>
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
				Профильные системы Trocal
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Trocal</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Трокаль.
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
		
		<img class="imgBrend" src="../img/img_f_brands/trokal/trokal.jpg" alt="оконный профиль trocal" title="оконный профиль trocal">
		<p class="aboutBrend">
			Выбирая продукцию одного из ведущих производителей профильный ПВХ систем, потребители желают получить не только громкое имя, 
			но и поистине высочайшее <a class="for_txt" href="../">качество пластиковых окок</a>. Именно такое качество, обеспеченное 
			строгими стандартами, уже на протяжении многих десятилетий предлагает своим покупателям компания Trocal (Трокаль). 
			С момента выпуска первого в мире пластикового окна в 1954 году компания неизменно следует своим принципам постоянного 
			внедрения инноваций. Ведь именно компания Trocal первой создала возможность использования цветного акрилового покрытия 
			и использовала комбинацию пластика и алюминия в производстве профильных систем. Первыми в Росси пластиковыми окнами были 
			также окна от Trocal. Ещё в 1970 году при строительстве гостиницы «Россия» в Москве использовался профиль этой по настоящему 
			исторической компании.
		</p>
		
		<p class="aboutBrend">
			Пластиковые окно из профиля Trocal отличает современная бес свинцовая рецептура, современный дизайн, а так же возможность 
			использования в уникальных конструктивных решениях. Окна от Trocal бесспорно справятся с использование в крупных и сложных 
			объектах и при реставрации исторических зданий, когда цена ошибки слишком велика и неправильный выбор может привести к потере 
			уникальных и исторически бесценных характеристик зданий.	
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Trocal InnoWave <span class="smollTitelModel">Трокаль ИнноУайв</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/trokal/innowave.jpg" alt="Trocal InnoWave" title="Trocal InnoWave">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,80</b></li>
				<li>Дополнительный контур уплотнения: <b>есть</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Экологичность: <b>greenline (без свинца)</b></li>
			</ul>
			<h2 class="titelModel">Trocal InnoNova 70M5 <span class="smollTitelModel">Иннова 70М5</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/trokal/innonova70m5.jpg" alt="Trocal InnoNova 70M5" title="Trocal InnoNova 70M5">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 58</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,84</b></li>
				<li>Уплотнительный котур: <b>среднее уплотнение</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Экологичность: <b>greenline (без свинца)</b></li>
			</ul>
			<h2 class="titelModel">Trocal InnoNova 70А5 <span class="smollTitelModel">Иннова 70А5</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/trokal/innonova70a5.jpg" alt="Trocal InnoNova 70А5" title="Trocal InnoNova 70А5">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,85</b></li>
				<li>Количество контуров уплотнения: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Экологичность: <b>greenline (без свинца)</b></li>
			</ul>
			<h2 class="titelModel">Trocal Balance <span class="smollTitelModel">Трокаль Баланс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/trokal/balance.jpg" alt="Trocal Balance" title="Trocal Balance">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,84</b></li>
				<li>Количество контуров уплотнения: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Срок службы: <b>50 лет</b></li>
				<li>Экологичность: <b>greenline (без свинца)</b></li>
			</ul>
			<h2 class="titelModel">Trocal Solid <span class="smollTitelModel">Трокаль Солид</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/trokal/solid.jpg" alt="Trocal Solid" title="Trocal Solid">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,71</b></li>
				<li>Количество контуров уплотнения: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Срок службы: <b>50 лет</b></li>
				<li>Экологичность: <b>greenline (без свинца)</b></li>
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