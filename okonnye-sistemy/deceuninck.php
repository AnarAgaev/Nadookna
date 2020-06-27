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
    <meta name="description" content="Профильные системы Deceuninck - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Декёнинк <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="deceuninck, декёнинк, окна deceuninck, окна декёнинк, deceuninck <?php echo $_SESSION['morph']['ime']; ?>, декёнинк <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Deceuninck <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Декёнинк.</title>
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
				Профильные системы Deceuninck
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Deceuninck</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Декёнинк.
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
		
		<img class="imgBrend" src="../img/img_f_brands/deceuninck/deceuninck.jpg" alt="оконный профиль deceuninck" title="оконный профиль deceuninck" />
		<p class="aboutBrend">
			Deceuninck (Декёнинк) производитель мирового масштаба, уже более 40 лет занимающаяся разработкой 
			и производством профильных ПВХ систем. В состав комплекса производства входят 32 подразделения 
			в США, Европе и Азии, реализующие продукцию в 75 странах мира. Постоянный поиск новых и 
			усовершенствование уже имеющихся материалов позволил компании вырасти из европейского игрока, 
			со штаб квартирой в Бельгии, в мирового лидера и войти в тройку ведущих европейских разработчиков 
			и производителей ПВХ систем. С самого начала своего пути в 1937 году до сегодняшних дней, в своей 
			деятельности Deceuninck исповедует принципы непрерывного совершенства, предлагая всё новые виды 
			продукции в соответствии самыми высокими экологическими требованиями и стандартами энергоэффективности. 
			В 2004 году компания открыла подразделение в России под названием Deceuninck Rus Ltd. (ООО "Декёнинк Рус") 
			которое является частью большой группы Deceuninck и придерживается той же философии и принципов.
		</p>
		
		<p class="aboutBrend">
			Ассортимент этой компании насчитывает весь необходимый перечень основных и доборных профилей используемых 
			при воплощении сложнейших проектов. Не зависимо от вида продукции, на которой вы остановите свой выбор, 
			вы можете быть уверены в безупречном качестве, в использовании самых передовых материалов и высочайших 
			технологий производства. Вся продукция отвечает самым строгим экологическим нормам, что подтверждают 
			полученные в 2010 и 2011 годах премии «Берегите энергию». 
			<a class="for_txt" href="../">Пластиковые окна Deceuninck</a> будут долгие годы хранить 
			тепло вашего дома, создавая надёжную преграду шуму, ветру и пыли улиц.
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">Deceuninck Эфорте</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/deceuninck/eforte.jpg" alt="Deceuninck Эфорте" title="Deceuninck Эфорте">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>84</b></li>
				<li>Толщина стеклопакета, мм: <b>до 56</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>1.09 без стального усилителя и 1.05 с усилителем</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>3</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Долговечность профиля, условных лет: <b>более 40</b></li>
				<li><br>Благодаря своему уникальному химическому составу профиль относится к классу морозостойких и может без проблем выдерживать температуры от -60°С до +75°С в течении всего срока эксплуатации</li>
			</ul>
			<h2 class="titelModel">Deceuninck Фаворит спэйс</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/deceuninck/favorit_space.jpg" alt="Deceuninck Фаворит спэйс" title="Deceuninck Фаворит спэйс">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>76</b></li>
				<li>Толщина стеклопакета, мм: <b>от 24 до 49</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0.94 без стального усилителя и 0.87 с усилителем</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>3</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Долговечность профиля, условных лет: <b>более 60</b></li>
				<li><br>Благодаря своему уникальному химическому составу профиль относится к классу морозостойких и может без проблем выдерживать температуры от -60°С до +75°С в течении всего срока эксплуатации</li>
			</ul>
			<h2 class="titelModel">Deceuninck Фаворит</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/deceuninck/favorit.jpg" alt="Deceuninck Фаворит" title="Deceuninck Фаворит">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>71</b></li>
				<li>Толщина стеклопакета, мм: <b>до 47</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,82</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Долговечность профиля, условных лет: <b>более 40</b></li>
				<li><br>Благодаря своему уникальному химическому составу профиль относится к классу морозостойких и может без проблем выдерживать температуры от -60°С до +75°С в течении всего срока эксплуатации</li>
			</ul>
			<h2 class="titelModel">Deceuninck Баутек</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/deceuninck/bautec.jpg" alt="Deceuninck Баутек" title="Deceuninck Баутек">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>71</b></li>
				<li>Толщина стеклопакета, мм: <b>до 47</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,76</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>чёрный</b></li>
				<li>Долговечность профиля, условных лет: <b>более 40</b></li>
				<li><br>Благодаря своему уникальному химическому составу профиль относится к классу морозостойких и может без проблем выдерживать температуры от -60°С до +75°С в течении всего срока эксплуатации</li>
			</ul>
			<h2 class="titelModel">Deceuninck Форвард</h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/deceuninck/forward.jpg" alt="Deceuninck Форвард" title="Deceuninck Форвард">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>60</b></li>
				<li>Толщина стеклопакета, мм: <b>до 38</b></li>
				<li>Сопротивление теплопередаче м²С/Вт: <b>0,65</b></li>
				<li>Кол-во контуров уплотнения, шт: <b>2</b></li>
				<li>Цвет уплотнений: <b>серый</b></li>
				<li>Долговечность профиля, условных лет: <b>более 40</b></li>
				<li><br>Конструкторские идеи делают окна Форвард привлекательными с экономической точки зрения и доступными для широкого круга покупателей</li>
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