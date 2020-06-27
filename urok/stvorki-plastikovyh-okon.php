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
	
	// получаем урл страницы
	include_once("../script/php/geturl.php"); 
		
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
	<title>Створки пластиковых окон <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<meta name="description" content="Разновидности открывания створки пластикового окна. Как определить и выбрать, что бы ПВХ стеклопакеты были удобными и практичными.">
	<meta name="keywords" content="створки пластиковых окон">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lestwo.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
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
		
		<div class="content_wrap">
		
			<div class="line_course">
				<img src="../img/course/line_two.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_blu txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_grey txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Створки пластиковых окон</h1>
			</div>	
			
			
			
			
			
			<img class="img_les_two" src="../img/course/stvorki-plastikovyh-okon.png" alt="Cтворки пластиковых окон" title="Cтворки пластиковых окон">
			<h2 class="txt_mark razdv" onmouseover="$('.about_razdv').css({'display':'block'});" onmouseout="$('.about_razdv').css({'display':'none'});">Раздвижная створка</h2>
			<h2 class="txt_mark otk" onmouseover="$('#otk').css({'display':'block'});" onmouseout="$('#otk').css({'display':'none'});">Откидная створка</h2>
			<h2 class="txt_mark pov" onmouseover="$('#povor').css({'display':'block'});" onmouseout="$('#povor').css({'display':'none'});">Поворотная створка</h2>
			<h2 class="txt_mark pov_otk" onmouseover="$('#pov_otk').css({'display':'block'});" onmouseout="$('#pov_otk').css({'display':'none'});">Поворотно-откидная створка</h2>
			<h2 class="txt_mark gluh" onmouseover="$('#gluh').css({'display':'block'});" onmouseout="$('#gluh').css({'display':'none'});">Глухая створка</h2>
			<div class="about_razdv">
				<h2 class="top_about_razdv">Раздвижная створка</h2>
				<div class="txt_about_razdv">
					<span class="b_color">Створка, которая в процессе открывания сдвигается параллельно 
					плоскости всего окна.</span><br><br>
					Окна с раздвижными створка иногда называют окнами "Слайдерс". Такими окнами обычно, 
					оснащают балконы и лоджии, так как они имеют более лёгкий вес по сравнению с 
					обычными типами окон и менее требовательны к несущей конструкции, при этом окна 
					с раздвижными створками уступают распашным по шумовым и тепловым характеристикам.<br><br>
					Также раздвижные конструкции часто используются внутри рабочего пространства в 
					качестве перегородок или раздвижных дверей.
				</div>
				<div class="img_razdv"><img src="../img/course/slider.png"><div class="txt_img_razdv">Раздвижная створка</div></div>
			</div>
			<div class="about" id="otk">
				<h2 class="top_about">Откидная</h2>
				<div class="txt_about">
					<span class="b_color">В этом случае створка как бы откидывается внутрь помещения на 
					петлях, установленных на нижней горизонтальной оси створки.</span><br><br>
					Откидывание створки чаще всего используется в режиме проветривания, поэтому 
					механизм откидывания как правило используется на небольших створках или как 
					дополнительный вариант открывания для поворотных створок. 
				</div>
			</div>
			<div class="about" id="povor" >
				<h2 class="top_about">Поворотная</h2>
				<div class="txt_about">
					<span class="b_color">Створка, которая поворачиваются на вертикальной оси вокруг 
					одной из своих сторон.</span><br><br>
					Различают поворотные створки правого и левого открывания, которые распахиваются 
					соответственно направо и налево.<br><br>
					Поворотная створка, наиболее распространённый вариант оконных створок, 
					так как является оптимальными по соотношению цены и эксплуатационных 
					характеристик. У много створчатого пластикового окна поворотными 
					могут быть как одна створка так и все.
				</div>
			</div>
			<div class="about" id="gluh">
				<h2 class="top_about">Глухая</h2>
				<div class="txt_about">
					<span class="b_color">Створка жестко закрепленная в оконной конструкции 
					и не имеющая открывающего механизма в результате чего исключается 
					возможность открывания окна.</span><br><br>
					Это не совсем створка, так как створки как таковой в этом случае нет. 
					На самом деле это стеклопакет напрямую вмонтированный в раму и 
					зафиксированный в ней с помощью штапика.<br><br> 
					Глухие створки, как правило, используются в много створчатых окнах, 
					когда возможность проветривания обеспечивается открыванием одной из 
					нескольких створок, а использование глухой створки удешевляет окно.
				</div>
			</div>
			<div class="about" id="pov_otk">
				<h2 class="top_about">Поворотно-откидная</h2>
				<div class="txt_about">
					<span class="b_color">Подвижная створка, откидывющаяся в двух плоскостях и позволяющая 
					открывать окно как в горизонтальной так и в вертикальной плоскости.</span><br><br>
					Этот тип створки объединяет в себе два типа открывания: поворотный и откидной.<br><br>
					Наиболее распространённый тип створок, так как является самым функциональным 
					для использования в обычных жилых квартирах. Использование этого типа створок 
					позволяет легко как проветривать окна, так и мыть их.
				</div>
			</div>
			<div class="foot_les">
				<span style="margin-left:20px;"></span>Выбирая окна <?php echo $_SESSION['morph']['gde']; ?>, 
				определите какие створки пластиковых окон подходят Вам более всего. Для этого представьте 
				как вы будете использовать будущие окна, открывать, закрывать, проветривать. Подумайте какая 
				створка пластикового окна будут отвечать вашим потребностям и будет наиболее удобна.
			</div>
			<div class="ex" onclick="f_show_ex()">Проверить полученные знания</div>
		
		
		
		
		
		
		</div>
		
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	</div>
	
	
	<!--********   Проверочный тест   *********-->
			<div class="ex_ok" id="ex2_ok">
				<div class="top_ex_ok"><img src="../img/course/ok.png"></div>
				<div class="bd_ex_ok">Второй урок выучен.<br>Так держать.</div>
				<a class="les less1" href="steklopaket-profil-pvh.php">Урок 3</a>
			</div>
			<div class="test" id="ex_two">
				<div class="hlp_ex1_right">
					<div class="hlp1" id="hlp_ex1_right">
						<div class="tp_txt_hlp_ex1_right">Подсказка</div>
						<div class="bd_hlp_ex1_right" id="bd_hlp_ex1_right"></div>
						<div class="tre_left_hlp_ex1"></div>
						<div class="tre_right_hlp_ex1"></div>
					</div>
				</div>
				<div class="hlp_ex1_left">
					<div class="hlp1" id="hlp_ex1_left">
						<div class="tp_txt_hlp_ex1_right">Подсказка</div>
						<div class="bd_hlp_ex1_left" id="bd_hlp_ex1_left"></div>
						<div class="tre_left_hlp_ex1"></div>
						<div class="tre_right_hlp_ex1"></div>
					</div>
				</div>	
				<div class="top_ex">
					<div class="txt_ex1"><span class="tit_zd">Задание 2:</span><br>Определите типы открывания створок<br>пластикового окна, указанные на картинках.</div>
					<div class="tit_zd1"></div>
					<div class="tft_f_hlp">Чтобы указать тип открывания<br> створки, кликните по пустому<br>полю и выберите один из<br>пунктов в выпадающем списке</div>
					<div class="close_popup" onclick="f_all_close()">×</div>
				</div>
				<div class="test_ex_one" id="tst_ex2" onclick="f_test_ex2()">Проверить задание</div>
				<div class="test_ex_one_new" id="tst_ex2_new" onclick="f_tst2_new()">Пройти задание ещё раз</div>
				<div class="test_ex_one_close" id="txt_ex2_close" onclick="f_all_close()">Повторить урок</div>
				<img class="img_ex_two" src="../img/course/ex_two.png">
				<div class="err_tst1 err_otk"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_gluh"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_dvig"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_povor"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="sel_otk">
					<div class="select_ex" id="select_otk" onclick="f_slide_otk()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_otk">
							<div class="point_select top_border_point" onclick="f_slide_otk('Откидная')">Откидная</div>
							<div class="point_select top_border_point" onclick="f_slide_otk('Раздвижная')">Раздвижная</div>
							<div class="point_select top_border_point" onclick="f_slide_otk('Глухая')">Глухая</div>
							<div class="point_select top_border_point" onclick="f_slide_otk('Поворотная')">Поворотная</div>
						</div>
					</div>
				</div>
				<div class="sel_gluh">
					<div class="select_ex" id="select_gluh" onclick="f_slide_gluh()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_gluh" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_gluh('Глухая')">Глухая</div>
							<div class="point_select top_border_point" onclick="f_slide_gluh('Раздвижная')">Раздвижная</div>
							<div class="point_select top_border_point" onclick="f_slide_gluh('Откидная')">Откидная</div>
							<div class="point_select top_border_point" onclick="f_slide_gluh('Поворотная')">Поворотная</div>
						</div>
					</div>
				</div>
				<div class="sel_dvig">
					<div class="select_ex" id="select_dvig" onclick="f_slide_dvig()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_dvig">
							<div class="point_select top_border_point" onclick="f_slide_dvig('Откидная')">Откидная</div>
							<div class="point_select top_border_point" onclick="f_slide_dvig('Глухая')">Глухая</div>
							<div class="point_select top_border_point" onclick="f_slide_dvig('Поворотная')">Поворотная</div>
							<div class="point_select top_border_point" onclick="f_slide_dvig('Раздвижная')">Раздвижная</div>
						</div>
					</div>
				</div>
				<div class="sel_povor">
					<div class="select_ex" id="select_povor" onclick="f_slide_povor()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_povor" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_povor('Поворотная')">Поворотная</div>
							<div class="point_select top_border_point" onclick="f_slide_povor('Раздвижная')">Раздвижная</div>
							<div class="point_select top_border_point" onclick="f_slide_povor('Глухая')">Глухая</div>
							<div class="point_select top_border_point" onclick="f_slide_povor('Откидная')">Откидная</div>
						</div>
					</div>
				</div>
			</div>

	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../script/js/lestwo.js" type="text/javascript"></script><!-- подключаем файл скриптов для проверки полученных знаний  --> 

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>