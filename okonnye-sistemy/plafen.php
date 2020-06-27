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
    <meta name="description" content="Профильные системы Plafen - оконный и дверной ПВХ профиль. Выбрать ПВХ профиль Plafen <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="plafen, плафен, окна plafen, окна плафен, plafen пвх окна, плафен пвх окна, пластиковые окна плафен, пвх окна plafen<?php echo $_SESSION['morph']['ime']; ?>, plafen <?php echo $_SESSION['morph']['ime']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Plafen <?php echo $_SESSION['morph']['ime']; ?>. Пластиковые ПВХ окна Plafen.</title>
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
				Профильные системы Plafen
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Plafen</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Plafen (Плафен).
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
		
		<img class="imgBrend" src="../img/img_f_brands/plafen/plafen.png" alt="оконный профиль plafen"  title="оконный профиль plafen" />
		<p class="aboutBrend">
			Своё начало организация «Плафен» берёт в далёком 1992 году в небольшом городке Нижегородской области - Дзержинске, где и по сей день располагается головное производство. В 1997 году организация начинает активную экспансию на российский рынок. Расширяется производство ПВХ-систем в крупных городах, и открываются региональные представительства по всей стране. В 2000 году  организация «Плафен» регистрирует свою собственную торговую марку PLAFEN при поддержке австрийских инженеров и конструкторов компании Greiner Extrusion. К 2008 году количество региональных представительств в странах СНГ и по всей территории РФ насчитывает 19 отделений (филиалы компании повсеместно встречаются от Абакана до Минска). Также в этом году организаций «Плафен» становится одним из значительнейших производителей <a class="for_txt" href="/">ПВХ-окон</a> В Российской федерации и ближнем зарубежье. Начиная с 2012 года и по сей день, компания работает по принципу "Качество. Сервис. Команда". Именно данная концепция позволила организации пережить сложные кризисные года (2010-12) и остаться наиболее востребованной и сегодня.
		</p>
		<p class="aboutBrend">
			Линейка компании охватывает весь ценовой сегмент рынка: 
			люксовый: S-line; универсальный: T-line; Оптимальный: E-line и L-line; Экономичный: C-line. Над производством ПВХ-систем трудятся не только специалисты компании «Плафен», но и австрийской компаниии Greiner Extrusion. Структура профильной системы Plafen позволяет изготавливать окна любой сложности и удовлетворять запросы даже самых искушенных покупателей. Вся продукция компании «Плафен» сертифицирована, соответствует ГОСТу 30673-99, отлично переносит  климатические перепады российской погоды, а также прошла всевозможные проверки на соответствие европейским стандартам качества.
		</p>
		<p class="aboutBrend">
			Во всей линейке компании «Плафен» присутствуют:<br>
			&emsp;- Гарантирующий надежность закрепления петли наплав створки с дополнительными элементами жесткости;<br>
			&emsp;- Две разновидности армирования - разомкнутое и замкнутое;<br>
			&emsp;- А также значительно снижающий риск взлома 13 мм осевой размер фурнитурного паза, позволяющий использовать противовзломную фурнитуру.<br>  
		</p>
				
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">S-line <span class="smollTitelModel">Плафен С-лайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plafen-model" src="../img/img_f_brands/plafen/s-line.png" alt="Plafen S-line" title="Plafen S-line">
				<li>Количество камер <b>5</b></li>
				<li>Ширина <b>75 мм</b></li>
				<li>Количество контуров уплотнения <b>3</b></li>
				<li>Цвет контуров уплотнения <b>серый и черный</b></li>
				<li>Теплосбережение <b>0,869 м²°С/Вт</b></li>
				<li>Высота рамы <b>снаружи – 73 мм, внутри – 44 мм</b></li>
				<li>Высота рамы со створкой <b>122 мм</b></li>
				<li>Срок эксплуатации <b>60 лет</b></li>
				<li>Толщина стеклопакета <b>24, 38 и 40 мм</b></li>
				<li>Глубина установки стеклопакета <b>21 мм (вместо стандартных 15 мм)</b></li>
				<li>
					<br>• Приведенное сопротивление теплопередаче пластиковых профилей без усилительного вкладыша - 0,869 м²°С/Вт, с усилительным вкладышем - 0,841 м²°С/Вт;
					<br>• Единый армирующий профиль для створок и рамы значительно ускоряет производство окон;
					<br>• Возможно производство с протянутыми сварными уплотнителями.
				</li>
			</ul>
		</div>
		
		<div class="model">
			<h2 class="titelModel">T-line <span class="smollTitelModel">Плафен Т-лайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plafen-model" src="../img/img_f_brands/plafen/t-line.png" alt="Plafen Т-line" title="Plafen Т-line">
				<li>Количество камер <b>5</b></li>
				<li>Ширина <b>70 мм</b></li>
				<li>Количество контуров уплотнения <b>2</b></li>
				<li>Цвет контуров уплотнения <b>серый и черный</b></li>
				<li>Теплосбережение <b>0,849  м²°С/Вт</b></li>
				<li>Высота рамы <b>снаружи – 64 мм, внутри – 43 мм</b></li>
				<li>Высота рамы со створкой <b>112 мм</b></li>
				<li>Срок эксплуатации <b>60 лет</b></li>
				<li>Толщина стеклопакета <b>24, 32 и 40 мм	</b></li>			
				<li>
					<br>• Приведенное сопротивление теплопередаче пластиковых профилей без стального усилительного вкладыша составляет 0,849 м²°С/Вт, со стальным вкладышем - 0,815 м²°С/Вт.
					<br>• Увеличенная глубина посадки стеклопакета				
				</li>
			</ul>
		</div>

		<div class="model">
			<h2 class="titelModel">E-line <span class="smollTitelModel">Плафен Е-лайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plafen-model" src="../img/img_f_brands/plafen/e-line.png" alt="Plafen E-line" title="Plafen E-line">
				<li>Количество камер <b>4</b></li>
				<li>Ширина <b>60 мм</b></li>
				<li>Количество контуров уплотнения <b>2</b></li>
				<li>Цвет контуров уплотнения <b>серый и черный</b></li>
				<li>Теплосбережение <b>0,782 м²°С/Вт</b></li>
				<li>Высота рамы <b>снаружи – 66 мм, внутри – 46 мм</b></li>
				<li>Высота рамы со створкой <b>115 мм</b></li>
				<li>Срок эксплуатации <b>60 лет</b></li>
				<li>Толщина стеклопакета <b>24, 32 мм</b></li>
				<li>Cтекло <b>5 мм</b></li>		
				<li>
					<br>• По толщине лицевых стенок относится к классу «A»
					<br>• Приведенное сопротивление теплопередаче пластиковых профилей без усилительного вкладыша - 0,782 м²°С/Вт, с усилительным вкладышем - 0,738 м²°С/Вт.
					<br>• Единый армирующий профиль для створок и рамы значительно ускоряет производство окон;
					<br>• Используется универсальный крепеж импоста в раму и створку. Конструкция крепежа позволяет выполнять крестовые соединения;
					<br>• Рама увеличена до 46 мм, благодаря чему створка открывается шире, чем у стандартного окна;
					<br>• Система включает в себя дверную группу внутреннего, наружного и двухстворчатого открывания, а также алюминиевый порог;
					<br>• Возможность установки усиленного металлопрофиля в створку и раму обеспечивает более высокую сопротивляемость ветровой нагрузке, позволяя собирать окна больших размеров;
					<br>• Возможно производство с протянутыми сварными уплотнителями.
				</li>
			</ul>
		</div>
		
		<div class="model">
			<h2 class="titelModel">L-line <span class="smollTitelModel">Плафен Л-лайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plafen-model" src="../img/img_f_brands/plafen/l-line.png" alt="Plafen L-line" title="Plafen L-line">
				<li>Количество камер <b>3</b></li>
				<li>Ширина <b>60 мм</b></li>
				<li>Количество контуров уплотнения <b>2</b></li>
				<li>Цвет контуров уплотнения <b>серый и черный</b></li>
				<li>Теплосбережение <b>0,730 м²°С/Вт</b></li>
				<li>Высота рамы <b>снаружи – 66 мм, внутри – 46 мм</b></li>
				<li>Высота рамы со створкой <b>115 мм</b></li>
				<li>Срок эксплуатации <b>60 лет</b></li>
				<li>Толщина стеклопакета <b>24, 32 мм</b></li>
				<li>Cтекло <b>5 мм</b></li>				
				<li>
					<br>• По толщине лицевых стенок относится к классу «В»;
					<br>• Приведенное сопротивление теплопередаче пластиковых профилей без усилительного вкладыша - 0,730 м²°С/Вт, с усилительным вкладышем - 0,645 м²°С/Вт;
					<br>• Единый армирующий профиль для створок и рамы значительно ускоряет производство окон.;
					<br>• Используется универсальный крепеж импоста в раму и створку. Конструкция крепежа позволяет выполнять крестовые соединения;
					<br>• Система включает в себя дверную группу внутреннего, наружного и двухстворчатого открывания, а также алюминиевый порог;
					<br>• Возможность установки усиленного металлопрофиля в створку и раму обеспечивает более высокую сопротивляемость ветровой нагрузке, позволяя собирать окна больших размеров;
					<br>• Возможно производство с протянутыми сварными уплотнителями.
				</li>
			</ul>
		</div>
		
		<div class="model">
			<h2 class="titelModel">C-line <span class="smollTitelModel">Плафен Ц-лайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel plafen-model" src="../img/img_f_brands/plafen/c-line.png" alt="Plafen C-line" title="Plafen C-line">
				<li>Количество камер <b>3</b></li>
				<li>Ширина <b>58 мм</b></li>
				<li>Количество контуров уплотнения <b>2</b></li>
				<li>Цвет контуров уплотнения <b>серый и черный</b></li>
				<li>Теплосбережение <b>0,727  м²°С/Вт</b></li>
				<li>Высота рамы <b>снаружи – 61 мм, внутри – 43 мм</b></li>
				<li>Высота рамы со створкой <b>110 мм</b></li>
				<li>Срок эксплуатации <b>60 лет</b></li>
				<li>Толщина стеклопакета <b>24, 32 мм</b></li>
				<li>Cтекло <b>5 мм</b></li>				
				<li>
					<br>• По толщине лицевых стенок относится к классу «В»;
					<br>• Окна из профиля C-line отлично пропускают свет за счет увеличенного светового проема;
					<br>• Приведенное сопротивление теплопередаче пластиковых профилей без стального усилительного вкладыша составляет 0,727 м²°С/Вт, со стальным вкладышем - 0,640 м²°С/Вт.;
					<br>• Возможно изготовление с протянутыми сварными уплотнителями.
				</li>
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