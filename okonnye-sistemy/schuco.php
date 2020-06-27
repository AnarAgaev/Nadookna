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
    <meta name="description" content="Профильные системы Schüco - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Шуко <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="schuco, шуко, окна schuco, окна шуко, schuco <?php echo $_SESSION['morph']['ime']; ?>, шуко <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Schüco <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Шуко.</title>
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
				Профильные системы Schüco
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Schüco</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Шуко.
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
		
		<img class="imgBrend" src="../img/img_f_brands/schuco/schuco.png" alt="оконныйе профили шуко" title="оконныйе профили шуко" />
		<p class="aboutBrend">
			Уже в далёком 1951 году Компания Schuco начала своё движение к успеху. В начале своего пути, 
			производила витрины и алюминиевые элементы фасадов. Первое предприятие оконной индустрии 
			Германии вышедшее на мировой рынок уже в семидесятых годах. Сегодня – это один из ведущих 
			производителей Европы и мира не только ПВХ систем, но и свето-прозрачных конструкций из 
			алюминия. Все окна под маркой Schuco изготавливаются в Германии. Это единственный 
			производитель пластиковых окон, комплектующий оконную продукцию собственной фурнитурой 
			и собственными системами вентиляции, что позволяет спроектировать и создать единый механизм, 
			каждый из элементов которого идеально встроен в общую систему.
		</p>
		
		<p class="aboutBrend">
			<a class="for_txt" href="../">Пластиковые окна Schuco</a> 
			 – это союз качества, дизайна и инноваций. Широкий выбор моделей ПВХ 
			систем, разнообразие комплектаций и расцветок, позволяет сделать Ваш дом не только уютным, 
			но и индивидуальным. Применение передовых технологических решений позволяет достичь высочайших 
			показателей в экономии энергии, безопасности, звуко- и теплоизоляции. Окна Schuco очень удобны 
			в обиходе и техническом обслуживании.
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Schuco Corona SI 82+ <span class="smollTitelModel">Шуко Корона СИ 82 плюс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-si-82-plus.jpg" alt="Schuco Corona SI 82 plus" title="Schuco Corona SI 82 plus">
				<li>Количество камер: <b>8</b></li>
				<li>Монтажная ширина, мм: <b>85</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,9</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>3</b></li>
				<li><br>Наличие трех независимых уровней уплотнения защищают от шума, холода, сырости и гарантируют эффективную и долговечную защиту от сквозняков и выпадения конденсата.</li>
			</ul>
			<h2 class="titelModel">Schuco Corona SI 82 <span class="smollTitelModel">Шуко Корона СИ 82</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-si-82.jpg" alt="Schuco Corona SI 82" title="Schuco Corona SI 82">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>82</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>1,1</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>3</b></li>
				<li><br>На основе системы Corona SI 82 изготавливаются экономящие энергию окна Thermo 6. Это - идеальный ответ при растущих ценах на энергию и повышенных требованиях к экологичности жилья.</li>
			</ul>
			<h2 class="titelModel">Schuco Corona CT 70 Cava <span class="smollTitelModel">Шуко Корона СТ 70 Кава</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-ct-70-cava.jpg" alt="Schuco Corona CT 70 Cava" title="Schuco Corona CT 70 Cava">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,72</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>2-3</b></li>
				<li><br>Оконная система Corona CT 70 является наиболее универсальной из оконных систем с высокой теплоизоляцией и обширным ассортиментом комплектующих.</li>
			</ul>
			<h2 class="titelModel">Schuco Corona CT 70 Rondo <span class="smollTitelModel">Шуко Корона СТ 70 Рондо</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-ct-70-rondo.jpg" alt="Schuco Corona CT 70 Rondo" title="Schuco Corona CT 70 Rondo">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,72</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>2-3</b></li>
				<li><br>Приобретая Corona CT 70, вы получаете окно, которое через много лет будет действовать так же надежно, как в первый день после установки.</li>
			</ul>
			<h2 class="titelModel">Schuco Corona CT 70 Classic<span class="smollTitelModel">Шуко Корона СТ 70 Классик</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-ct-70-classic.jpg" alt="Schuco Corona CT 70 Classic" title="Schuco Corona CT 70 Classic">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,72</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>2-3</b></li>
				<li><br>Взгляните на сечение профиля: Многокамерная конструкция профиля с пятью камерами и повышенной толщиной рамы, равной 70 мм - вот условие превосходной изоляции.</li>
			</ul>
			<h2 class="titelModel">Schuco Corona CT 70 Plus <span class="smollTitelModel">Шуко Корона СТ 70 Плюс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusBtn20" src="../img/img_f_brands/schuco/schuco-corona-ct-70-plus.jpg" alt="Schuco Corona CT 70 Plus" title="Schuco Corona CT 70 Plus">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>48</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,76</b></li>
				<li>Исполнение: <b>белое, цветоное, имитация дерева</b></li>
				<li>Цвет уплотнений: <b>Серебристо-серый</b></li>
				<li>Срок службы: <b>до 50 лет</b></li>
				<li>Количество уровней уплотнения: <b>2-3</b></li>
				<li><br>Corona CT 70 Plus представляет собой пластиковую профильную систему на основе Corona CT 70 с наружной алюминиевой накладкой, обеспечивающую повышенную износостойкость и долговечность.</li>
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