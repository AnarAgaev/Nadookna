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
    <meta name="description" content="Самый полный оконный словарь Пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?>. Слова на букву 'К'">
    <meta name="keywords" content="кронштейн, коэффициент теплопроводности, коррозия, коробка, конфигурация стеклопакета, контур уплотнения, конструкция окна, конденсат, козырёк, климат-инжиниринг, климабокс, клапанная створка, камера стеклопакета, камера оконного профиля">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Оконный словарь - буква "К".</title>
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
				Слова на букву "К"
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _dic"></div>
			<div>
				<h1 class="tit_text">Оконный словарь<br>Слова на букву "К"</h1>
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
				<h2 class="word_dict">Камера оконного профиля </h2>
				- замкнутые отсеки внутри пластикового профиля. Камера может состоять 
				из “подкамер”, которые разделены между собой перегородками и образуют 
				изолированные либо нет отсеки. Современные профильные системы 
				<a class="for_txt" href="../">пластиковых окон</a> имеют, как правило, от 3-х и более камер.
			</p>
			<p>
				<h2 class="word_dict">Камера стеклопакета </h2>
				- камерами стеклопакета (не путайте с камерами оконного профиля) называют 
				пространство между стёклами, заполняемое инертным газом. Современные 
				стеклопакеты имеют от одной и более камер, а наибольшей популярностью 
				пользуются двухкамерные стеклопакеты.
			</p>
			<p>
				<h2 class="word_dict">Клапанная створка </h2>
				- это навесной элемент пластикового окна шириной около 25 см. 
				и служащий для проветривания за счёт того что через имеющие 
				в нем отверстия воздух с улицы попадает внутрь помещения.
			</p>
			<p>
				<h2 class="word_dict">Климабокс </h2>
				- этот элемент позволяет понизить герметичность <a class="for_txt" href="../">пластикового окна</a> тем 
				самым дает возможность внешнему воздуху попасть внутрь помещения 
				за счёт разности давления. Использование климабокса позволяет 
				понизить влажность в помещении и улучшить приток свежего воздуха, 
				не создавая сквозняка. Климабоксы могут оснащаться воздушными фильтрами.
			</p>
			<p>
				<h2 class="word_dict">Климат-инжиниринг </h2>
				- во время данного процесса специалисты оконной компании изучат микроклимат 
				предполагаемого к остеклению помещения  и дадут свои рекомендации по оптимальному 
				остеклению, удовлетворяющему всем санитарным требованиям.
			</p>
			<p>
				<h2 class="word_dict">Козырёк </h2>
				- элемент оконной конструкции предназначенный для того чтобы отводить 
				дождевую воду от фасада здания. Устанавливается  на карниз и изготавливается, 
				как правило, из оцинкованной стали или алюминия.
			</p>
			<p>
				<h2 class="word_dict">Конденсат </h2>
				- это влага, появляющаяся на поверхности пластикового окна вследствие 
				определенных физических процессов. Причиной появления влажности 
				являются специфические условиях разности температуры и влажности 
				внутри и снаружи помещения.
			</p>
			<p>
				<h2 class="word_dict">Конструкция окна </h2>
				- это архитектурная характеристика, отражающая в совокупности 
				таких элементов как: рама, створки, стеклопакет и фурнитура.
			</p>
			<p>
				<h2 class="word_dict">Контур уплотнения </h2>
				- это место где створка примыкает к раме по её периметру резиновым уплотнителем.
			</p>
			<p>
				<h2 class="word_dict">Конфигурация стеклопакета </h2>
				- описывает различные виды стеклопакета. Конфигурации отличаются между собой толщиной, 
				как отдельных стекол, так и всего стеклопакета, количеством стекол и воздушных камер между ними.
			</p>
			<p>
				<h2 class="word_dict">Коробка </h2>
				- это элемент пластиковой конструкции, который неподвижно закрепляется в оконном 
				или дверном проеме и служит для навешивания на него створок или двери и отвечает 
				за прочностные характеристики. Коробка состоит соединённых между собой ПВХ 
				профилей методом сварки. Внутри профиля вмонтирован алюминиевый каркас, 
				который необходим коробке, чтобы она могла выдержать нагрузку навешанных 
				на неё створок или балконной двери. Часто коробку называют рамой.
			</p>
			<p>
				<h2 class="word_dict">Коррозия </h2>
				- это химический процесс на металлических поверхностях характеризующийся разрушением материала.
			</p>
			<p>
				<h2 class="word_dict">Коэффициент теплопроводности </h2>
				- это числовой показатель, который описывает способность <a class="for_txt" href="../">пластикового окна</a> сохранять тепло. 
				Чем меньше значение коэффициента теплопроводности, тем выше эта способность.
			</p>
			<p>
				<h2 class="word_dict">Кронштейн </h2>
				- металлический уголок под подоконник, обеспечивающий дополнительную прочность.
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