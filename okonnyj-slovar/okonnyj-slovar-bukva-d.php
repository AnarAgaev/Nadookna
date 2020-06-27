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
    <meta name="description" content="Самый полный оконный словарь Пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?>. Слова на букву 'Д'">
    <meta name="keywords" content="дефекты, детский замок, демонтаж, двухкамерный стеклопакет, дверь приподъемно-раздвижная, дверной профиль, дистанционная рамка, спейсор, дистанционная подкладка под стеклопакет, дилер, деформационная устойчивость монтажного шва, дюбель, дренажные отверстия, дормас, долговечность профилей, доводчик, доборный профиль, вспомогательный профиль, расширительный профиль">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Оконный словарь - буква "Д".</title>
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
				Слова на букву "Д"
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _dic"></div>
			<div>
				<h1 class="tit_text">Оконный словарь<br>Слова на букву "Д"</h1>
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
				<h2 class="word_dict">Дверной профиль </h2> 
				- это ПВХ профиль, отличающийся от оконного толщиной и большим размером сечения и 
				изготавливаемый специально для производства дверных створок и коробок.
			</p>
			<p>
				<h2 class="word_dict">Дверь приподъемно-раздвижная </h2> 
				- как правило, многостворчатая дверь, использующаяся для перекрытия крупноразмерных проемов.
			</p>
			<p>
				<h2 class="word_dict">Двухкамерный стеклопакет </h2> 
				- как понятно из названия, это сам стеклопакет, состоящее из набора стёкол и камер. 
				В двухкамерном стеклопакете это 3-и стекла и 2-е воздушные камеры их разделяющие, 
				что и дало название этому элементу пластикового окна.
			</p>
			<p>
				<h2 class="word_dict">Декоративный козырёк (капельник) </h2> 
				надеваемое на внешнюю сторону профиля водосливное отверстие.
			</p>
			<p>
				<h2 class="word_dict">Демонтаж </h2> 
				- это процесс во время которого удаляется старое окно с коробкой 
				из оконного проёма. Демонтаж, как правило, не включается в стоимость 
				нового <a class="for_txt" href="../">пластикового окна</a>, 
				а его проведение лучше доверить профессионалам т.к. 
				в процессе самостоятельного удаления, без необходимых на то 
				инструментов и навыков возможно повреждение проема и откосов, 
				что в дальнейшем усложнит процесс монтажа нового окна.
			</p>
			<p>
				<h2 class="word_dict">Детский замок </h2> 
				- в целях безопасности бывает необходимо ограничить возможность 
				манипуляций с окном детьми. Для этого при изготовлении окна 
				можно использовать ручки с ключом или детский замок, который 
				оставляет лишь функцию откидывания рамы, но не 
				открывания её поворотом. 
			</p>
			<p>
				<h2 class="word_dict">Дефекты </h2> 
				- это всевозможные повреждения поверхностей в пластиковых 
				окнах, такие как вздутия, царапины, трещины, раковины и различные расслоения.
			</p>
			<p>
				<h2 class="word_dict">Деформационная устойчивость монтажного шва </h2> 
				- это его способность сохранить свои свойства и характеристики 
				в следствии изменения и деформации монтажного зазора по 
				причине воздействия различных эксплуатационных причин.
			</p>
			<p>
				<h2 class="word_dict">Дилер </h2> 
				- это отдельная организация либо частный предприниматель, 
				который осуществляет продажу и монтаж 
				<a class="for_txt" href="../">пластиковых окон</a> 
				при это не производит сами оконные конструкции. 
				Дилер, как правило, представляет одну или несколько 
				оконных компаний производителем.
			</p>
			<p>
				<h2 class="word_dict">Дистанционная подкладка под стеклопакет </h2> 
				- это небольшая пластина, которая подкладывается между 
				стеклопакетом и оконным профилем и обеспечивает 
				уменьшение зазора между кромкой стеклопакета и створкой.
			</p>
			<p>
				<h2 class="word_dict">Дистанционная рамка (спейсор) </h2> 
				- это алюминиевая деталь стеклопакета, предназначенная для 
				разделения стёкол в стеклопакете. Внутри дистанционной рамки 
				находится специальный осушитель, который предназначен для 
				препятствования запотеванию.
			</p>
			<p>
				<h2 class="word_dict">Доборный профиль (вспомогательный или расширительный профиль) </h2> 
				- это замкнутый профиль, который не несет на себе нагрузок 
				и выполняет функцию увеличения размеров изделия по высоте 
				и ширине. Используется как правило в балконных и дверных 
				конструкциях, для того чтобы после наращивания стен и 
				потолков они упирались в доборы а не в стекло.
			</p>
			<p>
				<h2 class="word_dict">Доводчик </h2> 
				- это механизм фурнитуры 
				<a class="for_txt" href="../">пластикового окна</a>, 
				который позволяет 
				раме или двери закрываться плавно и автоматически.
			</p>
			<p>
				<h2 class="word_dict">Долговечность профилей </h2> 
				- это временной показатель (как правило, в годах) определяющий 
				способность сохранять эксплуатационные качества в процессе 
				всего срока использования. Долговечность профилей должна 
				быть подтверждена сертификатами о проведении лабораторных испытаний.
			</p>
			<p>
				<h2 class="word_dict">Дормас </h2> 
				- расстояние между фальцем створки пластикового окна и центром отверстия для ручки.
			</p>
			<p>
				<h2 class="word_dict">Дренажные отверстия </h2> 
				- эти отверстия, находящиеся в створке и раме окна, 
				служат для отведения влаги в следствии появления конденсата.
			</p>
			<p>
				<h2 class="word_dict">Дюбель </h2> 
				- это металлический крепёж для фиксации рамы 
				<a class="for_txt" href="../">пластикового 
				окна</a> в проёме. Дюбель помещается в просверленное отверстие 
				в стене, а затем в него через раму вкручивается шуруп, 
				который распирая дюбель, позволяет надёжно зафиксировать 
				его в оконном проёме.
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