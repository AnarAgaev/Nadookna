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
	<title>Стеклопакет и профиль ПВХ <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<meta name="description" content="Стеклопакет и профиль ПВХ - важнейшие элементы пластикового окна. От их качества и эксплуатационных характеристик зависит Ваш будущий комфорт.">
	<meta name="keywords" content="стеклопакет, профиль пвх, пвх профиль">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lesthree.css" />
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
				<img src="../img/course/line_three.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_blu txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_grey txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Стеклопакет и ПВХ профиль</h1>
			</div>	
		
			<img class="img_les_three" src="../img/course/steklopaket-profil-pvh.png" alt="Стеклопакет и профиль ПВХ <?php echo $_SESSION['morph']['gde']; ?>." title="Стеклопакет и профиль ПВХ <?php echo $_SESSION['morph']['gde']; ?>.">
			<h2 class="txt_mark steklo" onmouseover="$('#steklo').css({'display':'block'});" onmouseout="$('#steklo').css({'display':'none'});">
				<a class="a_for_course" target="blank">Стеклопакет</a>
			</h2>
			<h2 class="txt_mark profil" onmouseover="$('#profil').css({'display':'block'});" onmouseout="$('#profil').css({'display':'none'});">
				<a class="a_for_course" target="blank">ПВХ профиль</a>
			</h2>
			<h2 class="txt_mark armir" onmouseover="$('#armir').css({'display':'block'});" onmouseout="$('#armir').css({'display':'none'});">Армирование</h2>
			<h2 class="txt_mark stek_kam1" style="line-height: 1.3;" onmouseover="$('#stek_kam').css({'display':'block'});" onmouseout="$('#stek_kam').css({'display':'none'});">Камера<br>стеклопакета</h2>
			<h2 class="txt_mark stek_kam2" style="line-height: 1.3;" onmouseover="$('#stek_kam').css({'display':'block'});" onmouseout="$('#stek_kam').css({'display':'none'});">Камера<br>стеклопакета</h2>
			<h2 class="txt_mark prof_kam" onmouseover="$('#prof_kam').css({'display':'block'});" onmouseout="$('#prof_kam').css({'display':'none'});">Камеры ПВХ профиля</h2>
			<div class="about" id="steklo">
				<h2 class="top_about">Стеклопакет</h2>
				<div class="txt_about">
					<span class="b_color">Несколько стёкол, склеенных по периметру между собой 
					с помощью алюминиевой или пластиковой рамки таким образом, что между 
					стёклами образуется воздушная камера.</span><br><br>
					Стеклопакет важнейших элемент пластикового окна, так как от его качества
					и правильной установки зависят тепло и шумоизоляционные характеристики окна.<br><br>
					Для улучшения тепловых характеристик стеклопакета, воздушные 
					камеры, зачастую, заполняются специальным инертным газом либо на 
					одно из стёкол наносят тепло-отражающее напыление.						
					Стеклопакеты бывают одно, двух или трёх камерными.
				</div>
			</div>
			<div class="about" id="profil">
				<h2 class="top_about">Профиль ПВХ</h2>
				<div class="txt_about">
					<span class="b_color">Пластиковый брусок неправильной формы, из которого сделана 
					рама и створка окна, а так же дополнительные элементы оконной конструкции.</span><br><br>
					Профиль один из важнейших элементов пластикового окна. 
					На него приходятся основные нагрузки, так как из профиля
					изготавливают раму, створки и дополнительные 
					элементы пластиковых окон.<br><br>
					Длинный брусок профиля вначале раскраивают на отрезки необходимой длинны,
					которые затем соединяют, путём сварки в раму или створку окна.<br><br>
					Каждый производитель изготавливает уникальный профиль, 
					имеющий индивидуальные тепло и шумоизоляционные характеристики.
				</div>
			</div>
			<div class="about" id="armir">
				<h2 class="top_about">Армирование</h2>
				<div class="txt_about">
					<span class="b_color">Усиливающий профиль стальной элемент, находящийся 
					внутри профиля и придающий прочность всей конструкции.</span><br><br>
					Армирование - это своего рода скелет пластикового окна, на который приходятся
					основная нагрузка. Использование профился с армированием увеличит
					надёжность ваших окон и срок их эксплуатации.<br><br>
					Существует замкнутое армирование (труба квадратного сечения), П-образное или С-образное.
				</div>
			</div>
			<div class="about" id="stek_kam">
				<h2 class="top_about">Камеры стеклопакета</h2>
				<div class="txt_about">
					<span class="b_color">Герметичная полость, заключённая между двумя стеклами.</span><br><br>
					Воздушные камеры заполненнают либо инертным газом, либо осушённым воздухом.<br><br>
					Камеры могут быть различной ширины, что напрямую влияет на тепло и шумоизоляционные характеристики
					стеклопакета а заначит и пластикового окна.
				</div>
			</div>
			<div class="about" id="prof_kam">
				<h2 class="top_about">Камеры ПВХ профиля</h2>
				<div class="txt_about">
					<span class="b_color">Замкнутые полости внутри пластикового профиля.</span><br><br>
					Камеры разделены между собой перегородками и образуют изолированные отсеки профиля.<br><br>
					Современные профильные системы пластиковых окон имеют от 3-х и более камер.
					От количества камер в профиле зависят теплоизоляционные характеристики окна.<br><br>
					Как правило, считают только вертикальные полости, не учитывая горизонтальные перегородки.
				</div>
			</div>
			<div class="foot_les">
				<span style="margin-left:20px;"></span>Стеклопакет и профиль ПВХ. От их качества, в первую 
				очередь, зависит шумо и теплоизоляция вашей квартиры. Выбирая, ориентируйтесь, прежде всего, 
				на характеристики помещения. Не используйте однокамерный стеклопакет и дешёвую фурнитуру, 
				если окна выходят на шумную автостраду. Очень тщательно подходите к выбору марки профиля. 
				Дешёвые варианты могут со временем пожелтеть и деформироваться, что приведёт к продуванию 
				и сквозняку. Рекомендуем использовать <?php echo $_SESSION['morph']['gde']; ?>, как минимум, двухкамерный стеклопакет 
				и трёхкамерный ПВХ профиль. 			
			</div>
			
			<div class="ex roundBorder" onclick="f_show_ex()">Проверить полученные знания</div>
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>
	
	
	<!--********   Проверочный тест   *********-->

			<div class="ex_ok" id="ex3_ok">
				<div class="top_ex_ok"><img src="../img/course/ok.png"></div>
				<div class="bd_ex_ok">Третий урок освоен.<br>Пройдена половина.</div>
				<a class="les less1" href="dop-elementy-plastikovyh-okon.php">Урок 4</a>
			</div>
			<div class="test" id="ex_three">
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
					<div class="txt_ex1">
						<span class="tit_zd">Задание 3:</span>
						<br>На рисунке 1 определите как называются элементы пластикового окна.
						<br>На рисунке 2 определите количество камер в элементе окна.
					</div>
					<div class="tit_zd1" style="right: 50px;"></div>
					<div class="tft_f_hlp" style="right: 160px;">Чтобы указать ответ,<br>кликните по пустому полю<br>и выберите один из пунктов<br>в выпадающем списке</div>
					<div class="close_popup" onclick="f_all_close()">×</div>
				</div>
				<div class="test_ex_one" id="tst_ex3" onclick="f_test_ex3()">Проверить задание</div>
				<div class="test_ex_one_new" id="tst_ex3_new" onclick="f_tst3_new()">Пройти задание ещё раз</div>
				<div class="test_ex_one_close" id="txt_ex3_close" onclick="f_all_close()">Повторить урок</div>
				<img class="img_ex_three" src="../img/course/ex_three.png">
				<div class="ris ris1">Рисунок 1.</div>
				<div class="ris ris2">Рисунок 2.</div>
				<div class="err_tst1 err_steklop"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_profil"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_armir"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_kam_stek"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_kam_prof"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="sel_steklop">
					<div class="select_ex" id="select_steklop" onclick="f_slide_steklop()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_steklop" style="z-index:3000;">
							<div class="point_select top_border_point" onclick="f_slide_steklop('Створка')">Створка</div>
							<div class="point_select top_border_point" onclick="f_slide_steklop('Камера')">Камера</div>
							<div class="point_select top_border_point" onclick="f_slide_steklop('Стеклопакет')">Стеклопакет</div>
							<div class="point_select top_border_point" onclick="f_slide_steklop('Рамка')">Рамка</div>
						</div>
					</div>
				</div>
				<div class="sel_profil">
					<div class="select_ex" id="select_profil" onclick="f_slide_profil()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_profil" style="z-index:2000;">
							<div class="point_select top_border_point" onclick="f_slide_profil('Рама')">Рама</div>
							<div class="point_select top_border_point" onclick="f_slide_profil('Створка')">Створка</div>
							<div class="point_select top_border_point" onclick="f_slide_profil('Армирование')">Армирование</div>
							<div class="point_select top_border_point" onclick="f_slide_profil('ПВХ профиль')">ПВХ профиль</div>
						</div>
					</div>
				</div>
				<div class="sel_armir">
					<div class="select_ex" id="select_armir" onclick="f_slide_armir()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_armir" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_armir('Створка')">Створка</div>
							<div class="point_select top_border_point" onclick="f_slide_armir('Армирование')">Армирование</div>
							<div class="point_select top_border_point" onclick="f_slide_armir('ПВХ профиль')">ПВХ профиль</div>
							<div class="point_select top_border_point" onclick="f_slide_armir('Рама')">Рама</div>
						</div>
					</div>
				</div>
				<div class="sel_kam_stek">
					<div class="select_ex" id="select_kam_stek" onclick="f_slide_kam_stek()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_kam_stek" style="z-index:2000;">
							<div class="point_select top_border_point" onclick="f_slide_kam_stek('1')">1</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_stek('2')">2</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_stek('3')">3</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_stek('4')">4</div>
						</div>
					</div>
				</div>
				<div class="sel_kam_prof">
					<div class="select_ex" id="select_kam_prof" onclick="f_slide_kam_prof()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_kam_prof" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_kam_prof('1')">1</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_prof('2')">2</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_prof('3')">3</div>
							<div class="point_select top_border_point" onclick="f_slide_kam_prof('4')">4</div>
						</div>
					</div>
				</div>
			</div>

	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../script/js/lesthree.js" type="text/javascript"></script><!-- подключаем файл скриптов для проверки полученных знаний  --> 

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>