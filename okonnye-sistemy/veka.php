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
    <meta name="description" content="Оконный ПВХ профиль Veka <?php echo $_SESSION['morph']['gde']; ?>. Выбрать ПВХ профиль Века <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="оконные системы века, марки ПВХ профиля veka, пластиковый профиль века, пвх профиль века, века, veka">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Veka <?php echo $_SESSION['morph']['ime']; ?>. ПВХ профиль пластиковых окон Века.</title>
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
				Профильные системы Veka
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _col"></div>
			<div>
				<h1 class="tit_text">Профильные системы Veka</h1>
				<p class="cont_tit_text">
					Краткая информация о компании Века.
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
		
		<img class="imgBrend" src="../img/img_f_brands/veka/veka.jpg" alt="оконныйе профили века" title="оконныйе профили века">
		<p class="aboutBrend">
			Компания VEKA (Века) зарекомендовала себя как надёжный производитель качественного оконного и дверного ПВХ профиля. 
			Из небольшой и малоизвестной компании, основанной в конце шестидесятых годов прошлого века, она превратилась, 
			вначале в европейского, а затем и в мирового лидера. Основателем компании является Генрих Лауманн. 
			На сегодняшний момент компания насчитывает более чем 25 дочерних предприятий на трёх континентах и 
			является крупнейшим производителем ПВХ профиля в мире. Все производственные подразделения осуществляют 
			свою деятельность под постоянным контролем головного офиса компании.
		</p>
		
		<p class="aboutBrend">
			Независимо от места производства профиля, <a class="for_txt" href="../">покупателям пластиковых окон</a> VEKA гарантированно 
			высокое качество, выдержанное в самых строгих экологических стандартах и подтвержденное сертификатами. Продукция компании 
			может быть использована во всех климатических зонах, в том числе и в районах с повышенной влажностью и сверхнормативными 
			ветровыми нагрузками, а так же в районах севера и юга. Разнообразие профилей, предлагаемых компанией VEKA, позволяет 
			воплощать архитектурные задачи любой сложности, независимо от климатических условий регионов России.		
		</p>
		
		
		<!-- Описание профилей пластиковых окон -->
		
		<div class="model">
			<h2 class="titelModel">VEKA EUROLINE <span class="smollTitelModel">Века Евролайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/euroline.jpg" alt="veka euroline" title="veka euroline">
				<li>Количество камер: <b>3</b></li>
				<li>Монтажная ширина, мм: <b>58</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 32</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,64</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>черный, серый, карамель</b></li>
				<li>Ширина комбинации и рама-створка в световом проеме (типовой вариант): <b>113 мм</b></li>
				<li>Высота фальца, мм: <b>18</b></li>
				<li>Материал уплотнений: <b>АРТК, силикон</b></li>
			</ul>
			<h2 class="titelModel">VEKA PROLINE <span class="smollTitelModel">Века Пролайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/proline.jpg" alt="veka proline" title="veka proline">
				<li>Количество камер: <b>4</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 42</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,75</b></li>
				<li>Исполнение: <b>белое</b></li>
				<li>Цвет уплотнений: <b>черный</b></li>
				<li>Ширина комбинации рама-створка в световом проеме (типовой вариант): <b>112 мм</b></li>
				<li>Высота фальца, мм: <b>21</b></li>
				<li>Материал уплотнений: <b>АРТК, ТРЕ (коэкструдированный), силикон</b></li>
			</ul>
			<h2 class="titelModel">VEKA SOFTLINE <span class="smollTitelModel">Века Софтлайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/softline.jpg" alt="veka softline" title="veka softline">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 42</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,78</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>черный, серый, карамель</b></li>
				<li>Ширина комбинации и рама-створка в световом проеме (типовой вариант): <b>118 мм</b></li>
				<li>Высота фальца, мм: <b>21</b></li>
				<li>Материал уплотнений: <b>АРТК, силикон</b></li>
			</ul>
			<h2 class="titelModel">VEKA SWINGLINE <span class="smollTitelModel">Века Свинглайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/swingline.jpg" alt="veka swingline" title="veka swingline">
				<li>Количество камер: <b>5</b></li>
				<li>Монтажная ширина, мм: <b>70</b></li>
				<li>Толщина стеклопакета, мм: <b>от 4 до 42</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>0,77</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>черный, серый, карамель</b></li>
				<li>Ширина комбинации и рама-створка в световом проеме (типовой вариант): <b>118 мм</b></li>
				<li>Высота фальца, мм: <b>21</b></li>
				<li>Материал уплотнений: <b>АРТК, силикон</b></li>
			</ul>
			<h2 class="titelModel">VEKA SOFTLINE 82 <span class="smollTitelModel">Века Софтлайн 82</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/softline82.jpg" alt="veka softline 82" title="veka softline 82">
				<li>Количество камер: <b>рама 7/ створка 6</b></li>
				<li>Монтажная ширина, мм: <b>82</b></li>
				<li>Толщина стеклопакета, мм: <b>от 24 до 52</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>1,06</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>черный, серый, карамель</b></li>
				<li>Ширина комбинации и рама-створка в световом проеме (типовой вариант): <b>124 мм</b></li>
				<li>Высота фальца, мм: <b>25</b></li>
				<li>Материал уплотнений: <b>АРТК, ТРЕ (коэкструдированный), силикон</b></li>
			</ul>
			<h2 class="titelModel">VEKA ALPHALINE <span class="smollTitelModel">Века Альфалайн</span></h2>
			<ul class="optionsModel">
				<img class="imgModel" src="../img/img_f_brands/veka/alphaline.jpg" alt="veka alphaline" title="veka alphaline">
				<li>Количество камер: <b>6</b></li>
				<li>Монтажная ширина, мм: <b>90</b></li>
				<li>Толщина стеклопакета, мм: <b>от 24 до 50</b></li>
				<li>Сопротивление теплопередаче (с установленным армированием), м²С/Вт: <b>1,04</b></li>
				<li>Исполнение: <b>белое, цветное</b></li>
				<li>Цвет уплотнений: <b>черный, серый, карамель</b></li>
				<li>Ширина комбинации и рама-створка в световом проеме (типовой вариант): <b>118 мм</b></li>
				<li>Высота фальца, мм: <b>21</b></li>
				<li>Материал уплотнений: <b>АРТК, силикон</b></li>
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