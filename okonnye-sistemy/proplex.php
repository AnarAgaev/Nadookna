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
    <meta name="description" content="Профильные системы Proplex - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Проплекс <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="proplex, проплекс, окна proplex, окна проплекс, proplex <?php echo $_SESSION['morph']['ime']; ?>, проплекс <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Proplex <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Проплекс.</title>
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
				Профильные системы Proplex
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Proplex</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Проплекс.
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
		
		<img class="imgBrend" src="../img/img_f_brands/proplex/proplex.jpg" alt="оконный профиль proplex" title="оконный профиль proplex">
		<p class="aboutBrend">
			В 1999 году, в подмосковном Подольске компания Proplex (Проплекс) начала производство 
			профильных систем по Австрийской технологии. Использование оборудования и передовых 
			технологий от мировых лидеров Австрии и Германии Krauss Maffei, A+G extrusion technology 
			GmbH, Technoplast, Chemson позволило с первых дней работы производства добиться высочайшего 
			качества выпускаемой продукции. Пластиковые окна и двери этой марки адаптированны к экстремальным 
			условиям эксплуатации от крайнего севера до юга и отвечают всем необходимым Российским и мировым 
			стандартам и требованиям, а разработка с ориентиром именно на Российский рынок позволило создать 
			продукцию идеально подходящую для отечественного потребителя.		
		</p>
		
		<p class="aboutBrend">
			Огромное внимание, уделяемое компанией Proplex выбору сырья для 
			<a class="for_txt" href="../">производства пластиковых окон</a>, технологическому 
			процессу, инженерным и экологическим характеристикам производимых ими профилей позволило гарантировать 
			своим потребителям надёжность, комфорт и защиту на высочайшем уровне. Профильные системы Proplex 
			могут быть использованы при воплощении архитектурных решений любой сложности.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Proplex Optima <span class="smollTitelModel">Проплекс Оптима</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/proplex/optima.jpg" alt="Proplex Optima" title="Proplex Optima">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 34</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,75 без стального армирования и 0,64 с армированием</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
				<li><br>Конструкция и расположение камер импоста исключают возможность промерзания профиля</li>
			</ul>
			<h2 class="titelModel">Proplex Optima, дверная система <span class="smollTitelModel">Проплекс Оптима, дверная система</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop40" src="../img/img_f_brands/proplex/optimadoor.jpg" alt="Proplex Optima, дверная система" title="Proplex Optima, дверная система">
				<li>Количество камер: <b>2, 3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 34</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
			</ul>
			<h2 class="titelModel">Proplex Comfort <span class="smollTitelModel">Проплекс Комфорт</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/proplex/comfort.jpg" alt="Proplex Comfort" title="Proplex Comfort">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>от 12 до 42</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,79 без стального армирования и 0,70 с армированием</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
				<li><br>Класс по стойкости к климатическим воздействиям (согласно ГОСТ 30673-99) - морозостойкое исполнение</li>
			</ul>
			<h2 class="titelModel">Proplex БАЛКОН <span class="smollTitelModel">Проплекс БАЛКОН</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/proplex/balkon.jpg" alt="Proplex БАЛКОН" title="Proplex БАЛКОН">
				<li>Количество камер: <b>2</b></li>
				<li>Монтажная ширина, мм: <b>46</b></li>
				<li>Толщина стеклопакета, мм: <b>от 2 до 24</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,63</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
				<li><br>Рама, створка и импост усиливаются металлическими вкладышами. Это позволяет конструкции выдерживать ветровую нагрузку и препятствовать прогибанию створки под весом стеклопакетов</li>
			</ul>
			<h2 class="titelModel">Proplex Premium <span class="smollTitelModel">Проплекс Премиум</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/proplex/premium.jpg" alt="Proplex Premium" title="Proplex Premium">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>от 12 до 42</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,81</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
				<li><br>Увеличенная ширина фальца стеклопакета позволяет использовать всю гамму стеклопакетов, в том числе морозостойких, толщиной до 40 мм</li>
			</ul>
			<h2 class="titelModel">Proplex Lux <span class="smollTitelModel">Проплекс Люкс</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/proplex/lux.jpg" alt="Proplex Lux" title="Proplex Lux">
				<li>Количество камер: <b>рама-5, створка-3 камеры</b></li>
				<li>Монтажная ширина, мм: <b>рамы 127, створки 58 мм</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 34</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,78 без стального армирования и 0,71 с армированием</b></li>
				<li>Исполнение: <b>белое, цветное, ламинация под дерево</b></li>
				<li>Долговечность профиля, условных лет: <b>60</b></li>
				<li><br>С рамой 127 мм откосы сохраняют комнатную температуру, а за счет большей ширины коробки уменьшается вероятность выпадения на них конденсата</li>
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