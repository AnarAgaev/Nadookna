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
    <meta name="description" content="Профильные системы Brusbox - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Брусбокс <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="brusbox, брусбокс, окна brusbox, окна брусбокс, brusbox <?php echo $_SESSION['morph']['ime']; ?>, брусбокс <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Brusbox <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Брусбокс.</title>
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
				Профильные системы Brusbox
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Brusbox</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Брусбокс.
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
		
		<img class="imgBrend" src="../img/img_f_brands/brusbox/brusbox.jpg" alt="оконный профиль brusbox" title="оконный профиль brusbox" />
		<p class="aboutBrend">
			С момента своего основания в 2003 году компания Brusbox (Брусбокс) стала крупнейшим 
			в России производителем ПВХ профильных систем, прочно заняв своё место на рынке. 
			Производственное предприятие, расположенное в городе Брянске, не уступает по 
			мощности и объемам продукции другим игрокам отрасли. Используя, на 28 экструзионных 
			линиях, передовое оборудование фирмы Krauss Maffei Technologies GmbH, Brusbox создает 
			принципиально новый, качественный ПВХ профиль для Российского потребителя. Профильные 
			системы компании являются экономически оптимальными, создавая лучшее соотношение 
			цена-качество. Неуклонно следуя принципам постоянного развития и технологического 
			совершенствования, Brusbox создает наиболее полную и экономически оправданную 
			систему ПВХ профилей России.
		</p>
		
		<p class="aboutBrend">
			Производимые компанией системы состоят из трёхкамерных и четырёхкамерных профилей, 
			отвечающих всем ГОСТам и техническим условиям, и могут быть использованы для создания 
			наиболее сложных архитектурных решений. Так как продукция компании создавалась в России 
			и для российского потребителя, она в полной мере отвечает всем климатическим и 
			экологическим требованиям и применима в независимости от окружающих условий вашего 
			региона, будь то крайний север или юг России. 
			<a class="for_txt" href="../">Пластиковые окна Brusbox</a> являются оптимальным выбором, 
			который сохранит комфорт вашего дома.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Brusbox 60-3 <span class="smollTitelModel">Брусбокс 60-3</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/brusbox/brusbox603.jpg" alt="Brusbox 60-3" title="Brusbox 60-3">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 32</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,76</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Звукоизоляция: <b>в разной сборке окна достигает 46 ДБ</b></li>
				<li>Высота наплава, мм: <b>20</b></li>
				<li><br>Профильная система надёжна, благодаря своей простоте и технологичности, оптимальная для изготовления всех основных типов окон и идеально подходящая для объектного сегмента.</li>
			</ul>
			<h2 class="titelModel">Brusbox 60-4 <span class="smollTitelModel">Брусбокс 60-4</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/brusbox/brusbox604.jpg" alt="Brusbox 60-4" title="Brusbox 60-4">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 32</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,82</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Звукоизоляция: <b>в разной сборке окна достигает 46 ДБ</b></li>
				<li>Высота наплава, мм: <b>20</b></li>
				<li><br>Универсальная, самая доступная, наиболее известная профильная система, благодаря высокому уровню потребительских свойств и безупречному качеству. Подходит для использования в самых разных климатических условиях нашей Родины и на самых разнообразных строительных объектах.</li>
			</ul>
			<h2 class="titelModel">Brusbox 70-6 <span class="smollTitelModel">Брусбокс 70-6</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/brusbox/brusbox706.jpg" alt="Brusbox 70-6" title="Brusbox 70-6">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 40</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Звукоизоляция: <b>в разной сборке окна достигает 46 ДБ</b></li>
				<li>Высота наплава, мм: <b>20</b></li>
				<li><br>Этот высококачественный профиль призван удовлетворить требования самых северных регионов, наиболее требовательных к теплосбережению. Система "Brusbox 70-6" - новейшее достижение в разработке идеальных профильных систем от компании Brusbox.</li>
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