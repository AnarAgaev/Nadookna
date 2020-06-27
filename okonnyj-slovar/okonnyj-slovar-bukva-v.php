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
    <meta name="description" content="Самый полный оконный словарь Пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?>. Слова на букву 'В'">
    <meta name="keywords" content="высота окна, высота профиля, воздухопроницаемость, водопроницаемость, водоотводящий канал, водоотвод, внутренние стенки профиля, внешний уплотнитель, влажность, витраж, вилатерм, вентиляция, вакуумметр">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Оконный словарь - буква "В".</title>
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
				Слова на букву "В"
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _dic"></div>
			<div>
				<h1 class="tit_text">Оконный словарь<br>Cлова на букву "В"</h1>
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
				<h2 class="word_dict">Вакуумметр </h2> 
				- позволяющий измерить давление разряженных газов прибор. В оконном производстве 
				используется, как привило, для измерения давления газа внутри стеклопакета.
			</p>
			<p>
				<h2 class="word_dict">Варианты открывания створок: </h2> 
				</br>- распашное - поворот створок вокруг вертикальной оси;
				</br>- подвесное - поворот створок вокруг верхней горизонтальной оси;
				</br>- откидное - поворот створок вокруг нижней горизонтальной оси;
				</br>- поворотно-откидное - поворот створок вокруг вертикальной и горизонтальной нижней оси;
				</br>- среднеповоротное - поворот створок вокруг средней вертикальной или средней горизонтальной оси;
				</br>- раздвижное - поворот створок в горизонтальном направлении методом скольжения (слайдерс);
				</br>- подъемное - поворот створок в вертикальном положении;
				</br>- комбинированное - когда различные виды открывания створок сочетаются в одном изделии. 
			</p>
			<p>
				<h2 class="word_dict">Вентиляция </h2> 
				- процесс циркуляции воздуха внутри помещений. В процессе установки <a class="for_txt" href="../">пластиковых окон</a> очень важно учитывать 
				этот фактор. В случае отсутствия системы вентиляции в помещениях, оборудованных пластиковыми окнами, 
				значительно снижается уровень комфортного проживания.
			</p>
			<p>
				<h2 class="word_dict">Вилатерм </h2> 
				- служащий для утепления монтажных швов вспененный полиэтиленовый утеплитель.
			</p>
			<p>
				<h2 class="word_dict">Витраж </h2> 
				</br>- остекление, при котором стекла разделены профильной сеткой. Как правило, витражи крепятся в проеме прямо к откосу. Существуют различные виды витражей:
				</br>- классический - это художественно оформленное стекло, изготовленное из отдельных элементов, окрашенных в разные цвета и собранных мозаикой или в виде панно с помощью специального медного шнура;
				</br>- витраж с применение краски - в этом случае на цельное стекло наносятся полимерные краски, обладающие устойчивостью к ультрафиолетовому излучения и к температурным перепадам, благодаря чему долгое время сохраняют свой внешний вид;
				</br>- пленочный витраж - в случае плёночного витража вместо красок на стекло наносится специализированная цветная пленка, а между её участками клеится шнур, имитирующий медную проволоку классического витража.	
			</p>
			<p>
				<h2 class="word_dict">Влажность </h2> 
				- выраженный в процентах показатель содержания влаги от массы сухого материала.
			</p>
			<p>
				<h2 class="word_dict">Внешний уплотнитель </h2> 
				- элемент уплотнения створки с рамой, состоящий из двух элементов, один из которых установлен на раме, а другой на створке.
			</p>
			<p>
				<h2 class="word_dict">Внутренние стенки профиля </h2> 
				- это перегородки, расположенные внутри полости профиля ПВХ.
			</p>
			<p>
				<h2 class="word_dict">Водоотводящий канал или водоотвод </h2> 
				- расположенный внутри пластикового профиля канал ли отверстие, основной целью которого является вывод наружу конденсата и влаги.
			</p>
			<p>
				<h2 class="word_dict">Водопроницаемость </h2> 
				- это способность конструкции пластиковых окон, при наличии разности давления снаружи и внутри помещения,  пропускать влагу.
			</p>
			<p>
				<h2 class="word_dict">Воздухопроницаемость </h2> 
				- свойство <a class="for_txt" href="../">пластиковых окон</a> пропускать воздух в закрытом состоянии, возникающее , как правило, в следствии разности давления воздуха снаружи и внутри оконного блока.
			</p>
			<p>
				<h2 class="word_dict">Высота профиля </h2> 
				- высота поперечного сечения оконного профиля.
			</p>
			<p>
				<h2 class="word_dict">Высота окна </h2> 
				- расстояние от подоконника до верхнего откоса.
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