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
    <meta name="description" content="Профильные системы KBE - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль КБЕ <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="kbe, кбе, окна kbe, окна кбе, kbe <?php echo $_SESSION['morph']['ime']; ?>, кбе <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>KBE <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна КБЕ.</title>
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
				Профильные системы KBE
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы KBE</h1>
				<p class="cont_tit_text">
					Краткая информация о компании КБЕ.
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
		
		<img class="imgBrend" src="../img/img_f_brands/kbe/kbe.jpg" alt="оконный пофиль KBE, оконный профиль КБЕ" title="оконный пофиль KBE, оконный профиль КБЕ">
		<p class="aboutBrend">
			Компания KBE (КБЕ) по праву занимает одно из лидирующих мест на Российском рынке ПВХ конструкций. 
			Используя современные технологии и оборудование, она на протяжении многих лет сохраняет высочайшее 
			качество своей продукции, отвечающей всем необходимым стандартам. В сравнении с другими лидерами рынка, 
			история этой компании не так велика, что, тем не менее, не помешало её накопить огромный опыт в 
			производстве оконного и дверного профиля. Основана компания KBE, была 5 июля 1980 года в Германии, 
			а своё первое представительство в России открыла в 1995 году, и уже в 1996 году в Москве стал 
			функционировать учебный центр.		
		</p>
		
		<p class="aboutBrend">
			Знаменитое немецкое качество и точное соблюдение <a class="for_txt" href="../">технологии производства пластиковых окон</a> 
			позволило профилям KBE получить огромную популярность среди Российских покупателей. И это не удивительно, ведь профильные 
			системы KBE с лёгкостью выдерживают любые перепады температур, а также экстремальную жару и холод. Стоит обязательно 
			упомянуть о технологии Green line (грин лайн), суть которой заключается в том, что из структуры ПВХ полностью исключён 
			свинец. Этот факт явился дополнительным мотивом, чтобы остановить свой выбор на высококачественных ПВХ конструкциях 
			от компании KBE.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">KBE Эталон</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kbe/etalon.jpg" alt="KBE Эталон" title="KBE Эталон">
				<li>Количество камер: <b>рама 3 / створка 3 / импост 3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>до 34</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,70</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Цвет уплотнений: <b>черный/серый</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
			</ul>
			<h2 class="titelModel">KBE Энджин</h2>
			<ul class="optionsModel">
				<img class="imgModel"src="../img/img_f_brands/kbe/endgine.jpg" alt="KBE Энджин" title="KBE Энджин">
				<li>Количество камер: <b>рама 3 / створка 3 / импост 3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>до 34</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,70</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Цвет уплотнителя в стандартном исполнении: <b>черный</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
			</ul>
			<h2 class="titelModel">KBE Эталон +</h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/kbe/etalonplus.jpg" alt="KBE Эталон плюс" title="KBE Эталон плюс">
				<li>Монтажная ширина, мм: <b>127 мм</b></li>
				<li>Уменьшение теплопотерь через края оконного проема в стене</li>
				<li>Более высокий коэффицент сопротивления теплопередаче</li>
				<br><br>
			</ul>
			<h2 class="titelModel">KBE СЕЛЕКТ 70 мм</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kbe/select.jpg" alt="KBE СЕЛЕКТ 70 мм" title="KBE СЕЛЕКТ 70 мм">
				<li>Количество камер: <b>рама 5 / створка 5 / импост 4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,77</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Цвет уплотнителя в стандартном исполнении: <b>серый</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
			</ul>
			<h2 class="titelModel">KBE Эксперт</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kbe/expert.jpg" alt="KBE Эксперт" title="KBE Эксперт">
				<li>Количество камер: <b>рама 5 / створка 5 / импост 4(3)</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,83</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Цвет уплотнителя в стандартном исполнении: <b>черный</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
			</ul>
			<h2 class="titelModel">KBE Эксперт +</h2>
			<ul class="optionsModel">
				<img class="imgModel plusTop" src="../img/img_f_brands/kbe/expertplus.jpg" alt="KBE Эксперт плюс" title="KBE Эксперт плюс">
				<li>Монтажная ширина, мм: <b>127 мм</b></li>
				<li>Уменьшение теплопотерь через края оконного проема в стене</li>
				<li>Более высокий коэффицент сопротивления теплопередаче</li>
				<br><br>
			</ul>
			<h2 class="titelModel">KBE Энергия</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kbe/energie.jpg" alt="KBE Энергия" title="KBE Энергия">
				<li>Количество камер: <b>рама 3 / створка 3 / импост 3</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>до 42</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,81</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Цвет уплотнителя в стандартном исполнении: <b>черный</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
			</ul>
			<h2 class="titelModel">KBE Системы 88 мм</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/kbe/system88.jpg" alt="KBE Системы 88 мм" title="KBE Системы 88 мм">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>88</b></li>
				<li>Толщина стеклопакета, мм: <b>до 52</b></li>
				<li>Морозостойкость: <b>до -60°С</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>1,04</b></li>
				<li>Долговечность (условных лет): <b>более 40 лет</b></li>
				<li>Экологичность: <b>greenline (без свинца!)</b></li>
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