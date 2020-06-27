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
    <meta name="description" content="Самый полный оконный словарь Пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?>. Слова на букву 'А'">
    <meta name="keywords" content="абразивная стойкость, абсорбент, адгезионная прочность, аддитивы, алюминий, алюминиевый порог, анкер, анкерная пластина, аргон, арка, армированное стекло, армирующий профиль, артикул ПВХ профиля, архитектурный рисунок оконного блока">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Оконный словарь - буква "А".</title>
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
		
		
		<!-- Хлебные крошки -->
		<div class="content_wrap">
			<div class="breadCrumbs">
				<div class="trigBredCrumbs"></div>
				<a class="breadCrumbs" href="../">Главная</a>/
				<a class="breadCrumbs" href="okonnyj-slovar.php">Оконный словарь</a>/
				Слова на букву "А"
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _dic"></div>
			<div>
				<h1 class="tit_text">Оконный словарь<br>Слова на букву "А"</h1>
				<p class="cont_tit_dictionary">
					Знание оконной терминологии поможет<br>Вам правильно выбрать и
					<a class="for_txt" href="../">купить пластиковые окна</a>.
				</p>							
			</div>
		</div>
	
		
		<!-- Анкоры на внутренние страницы с описанием марок терминов оконного словаря -->
		
		<div class="text_for_brands">
			<p class="hand_text_for_brends">
				<a class="bukva" href="okonnyj-slovar-bukva-a.php" >А</a>
				<a class="bukva" href="okonnyj-slovar-bukva-b.php" >Б</a>
				<a class="bukva" href="okonnyj-slovar-bukva-v.php" >В</a>
				<a class="bukva" href="okonnyj-slovar-bukva-g.php" >Г</a>
				<a class="bukva" href="okonnyj-slovar-bukva-d.php" >Д</a>
				<a class="bukva" href="okonnyj-slovar-bukva-j.php" >Ж</a>
				<a class="bukva" href="okonnyj-slovar-bukva-z.php" >З</a>
				<a class="bukva" href="okonnyj-slovar-bukva-i.php" >И</a>
				<a class="bukva" href="okonnyj-slovar-bukva-k.php" >К</a>
				<a class="bukva" href="okonnyj-slovar-bukva-l.php" >Л</a>
				<a class="bukva" href="okonnyj-slovar-bukva-m.php" >М</a>
				<a class="bukva" href="okonnyj-slovar-bukva-n.php" >Н</a>
				<a class="bukva" href="okonnyj-slovar-bukva-o.php" >О</a>
				<a class="bukva" href="okonnyj-slovar-bukva-p.php" >П</a>
				<a class="bukva" href="okonnyj-slovar-bukva-r.php" >Р</a>
				<a class="bukva" href="okonnyj-slovar-bukva-s.php" >С</a>
				<a class="bukva" href="okonnyj-slovar-bukva-u.php" >У</a>
				<a class="bukva" href="okonnyj-slovar-bukva-f.php" >Ф</a>
				<a class="bukva" href="okonnyj-slovar-bukva-sh.php" >Ш</a>
			</p>
		</div>
		
		
		<!-- Рекламный баннер на Урок о ПВХ окнах -->
		
		<div class="action_to_course">
			<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
			Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
			Узнайте как сэкономить до 10%.
			<a href="../urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
		</div>
		
		
		
		
		<!-- Описание терминов пластиковых окон -->
		
		<div class="dictionary">
			<p>
				<h2 class="word_dict">Абразивная стойкость </h2> 
				- сопротивление действию истирающих нагрузок.
			</p>
			<p>
				<h2 class="word_dict">Абсорбент </h2> 
				- вещество, использующееся в качестве материала, препятствующего образованию 
				влаги в стеклопакете вследствие своей способности поглощать влагу и газ.
			</p>
			<p>
				<h2 class="word_dict">Адгезионная прочность </h2> 
				- показатель измерения степени устойчивости двух поверхностей к разъединению.
			</p>
			<p>
				<h2 class="word_dict">Аддитивы </h2> 
				- компонент, придающий белизну окну. Добавляется непосредственно в сырье для изготовления профилей.
			</p>
			<p>
				<h2 class="word_dict">Алюминий </h2> 
				- один из материалов, использующийся при изготовлении профилей и фурнитуры пластиковых окон.
			</p>
			<p>
				<h2 class="word_dict">Алюминиевый порог </h2> 
				- элемент, используемый в целях стягивания боковых сторон рамы.
			</p>
			<p>
				<h2 class="word_dict">Анкер </h2> 
				- строительный элемент, предназначенный для крепления деталей к различным поверхностям.
			</p>
			<p>
				<h2 class="word_dict">Анкерная пластина </h2> 
				- этот строительный элемент представляет собой небольшую пластину длинной около 150-250 мм. 
				шириной около 15 мм., изготовленный из оцинкованной стали толщиной 1,5 мм. Основным 
				предназначением анкерной пластины служит фиксация коробки 
				<a class="for_txt" href="../">пластикового окна</a> в оконном 
				проёме, причём сначала анкерная пластина крепится к пластиковому окну шурупами, а потому 
				уже вместе с окном к торцу оконного проёма с помощью дюбель-гвоздей. При правильной 
				установке расстояние между анкерными пластинами не должно быть более 700 мм.
			</p>

			<p>
				<h2 class="word_dict">Аргон </h2> 
				- инертный газ без цвета и запаха, закачиваемый в стеклопакет при изготовлении для улучшения теплоизоляции
			</p>
			<p>
				<h2 class="word_dict">Арка </h2> 
				- криволинейное перекрытие проемов в стене или между опорами оконной рамы
			</p>
			<p>
				<h2 class="word_dict">Армированное стекло </h2> 
				- стекло совмещенное с металлической сеткой, обладающее повышенной прочностью.
			</p>
			<p>
				<h2 class="word_dict">Армирующий профиль </h2> 
				(армирование) - усиливающий ПВХ-профиль стальной элемент, находящийся внутри него и придающий 
				жёсткость оконному элементу и всей конструкции 
				<a class="for_txt" href="../">пластикового окна</a>.
			</p>
			<p>
				<h2 class="word_dict">Артикул ПВХ профиля </h2> 
				- устанавливаемое в технической документации буквенно-цифровое обозначение конструкции профиля, входящего в профильную систему.
			</p>
			<p>
				<h2 class="word_dict">Архитектурный рисунок оконного блока </h2> 
				- фронтальный вид оконного блока, определяющий конфигурацию и пропорции его габаритных размеров, полей остекления.
			</p>
		</div>
		
		
		<!-- Видео с YOUTUBE на страницах с контентом -->
		 
		<div class="video_at_txt">
			<h2 class="medium_blu">Видео: как делают пластиковые окна</h2>
			В данном видео, помимо подробного описания процесса сборки 
			пластикового окна, описаны основные элементы, технология 
			производства оконного профиля, стеклопакета, других деталей.<br><br>
			<img class="block_f_moove" src="../img/img_f_video/v2.jpg" alt="Видео как делаются пластиковые окна" title="Видео как делаются пластиковые окна" onclick="f_showvideo('//www.youtube.com/embed/VaXaKmgLhuo?rel=0&autoplay=1&showinfo=0')">
		</div>
			
		
		<?php 
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