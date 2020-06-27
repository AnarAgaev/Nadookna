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
	<title>Дополнительные элементы пластиковых окон.</title>
	<meta name="description" content="Не знаете какие дополнительные элементы пластиковых окон сделают ПВХ стеклопакеты более красивыми и долговечными? Читать обязательно.">
	<meta name="keywords" content="дополнительные элементы пластиковых окон">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lesfour.css" />
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
				<img src="../img/course/line_four.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_blu txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_grey txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Дополнительные элементы пластиковых окон</h1>
			</div>	
		


			<img class="img_les_four" src="../img/course/dopolnitelnye-jelementy-plastikovogo-okna.png" alt="Дополнительные элементы пластиковых окон <?php echo $_SESSION['morph']['gde']; ?>." title="Дополнительные элементы пластиковых окон <?php echo $_SESSION['morph']['gde']; ?>.">
			
			<div class="text_left text_kursiv">Вид на окно<br>из помещения<img class="arr_left" src="../img/course/arr_les4_left.png"></div>
			<div class="text_right text_kursiv">Вид на окно<br>с улицы<img class="arr_right" src="../img/course/arr_les4_right.png"></div>
			
			<h2 class="txt_mark otkos" onmouseover="$('#otkos').css({'display':'block'});" onmouseout="$('#otkos').css({'display':'none'});">Откосы</h2>
			<h2 class="txt_mark podok" onmouseover="$('#podok').css({'display':'block'});" onmouseout="$('#podok').css({'display':'none'});">Подоконник</h2>
			<h2 class="txt_mark zamok" onmouseover="$('#zamok').css({'display':'block'});" onmouseout="$('#zamok').css({'display':'none'});">Замок от детей</h2>
			<h2 class="txt_mark moskit" onmouseover="$('#moskit').css({'display':'block'});" onmouseout="$('#moskit').css({'display':'none'});">Москитная сетка</h2>
			<h2 class="txt_mark otliv" onmouseover="$('#otliv').css({'display':'block'});" onmouseout="$('#otliv').css({'display':'none'});">Отлив</h2>
		
			<div class="about" id="otkos">
				<h2 class="top_about">Откосы</h2>
				<div class="txt_about">
					<span class="b_color">Плоская часть оконного проема, расположенная внутри 
					(внутренние откосы) или снаружи (наружние откосы) помещения, создавая как 
					бы торец стены справа, слева и сверху пластикового окна и обрамляя его.</span><br><br>
					Отделка внутренних откосов сделает вид окон более красивым и аккуратным. Отделка внешних
					откосов поможет защитить стены от пыли и влаги.<br><br>
					Откосами также могут называться плоские панели, которыми закрывается оконный 
					проём сверху и по бокам пластикового окна.					
				</div>
			</div>
		
			<div class="about" id="podok">
				<h2 class="top_about">Подоконник</h2>
				<div class="txt_about">
					<span class="b_color">Элемент пластикового окна, который монтируется к нижней части рамы со 
					стороны помещения и закрывает нижнюю плоскость оконного проёма.</span><br><br>
					Использование подоконника обусловлено, прежде всего, эстетическими потребностями, 
					чтобы закрыть монтажный шов окна, а также нижнюю плоскость оконного проёма внутри 
					помещения и сделать внешний вид окна более красивым и аккуратным.
				</div>
			</div>
		
			<div class="about" id="zamok">
				<h2 class="top_about">Детский замок</h2>
				<div class="txt_about">
					<span class="b_color">Механизм, который полностью или частично блокирует возможность открывания окна,
					оставляя функцию откидывания рамы в режим проветривания.</span><br><br>
					В целях безопасности бывает необходимо ограничить возможность манипуляций с окном. 
					Для этого при изготовлении можно использовать ручки с ключом, детский замок на створку, 
					или сделать ручку смъемнной, что полностью исключить возможность открытия.<br><br> 
					Использование детского замка обезопасит ваших детей от случайного открытия окна в отсутсуии взрослых.
				</div>
			</div>
		
			<div class="about" id="moskit">
				<h2 class="top_about">Москитная сетка</h2>
				<div class="txt_about">
					<span class="b_color">Полиуретановая сетка, которая крепится на пластиковую рамку и размещается 
					со внешней стороны окна напроитв открывающейся створки.</span><br><br>
					Предназначена для того чтобы предотвратить попадание в помещение насекомых, пыли и пуха в тот 
					момент когда окно открыто или находится в состоянии проветривания.<br><br>
					Для крепления москитной сетки, на раму крепятся специальные элементы фурнитуры, 
					а на саму сетку два держателя, что позволяет удобно снимать её на зимний период 
					или для удаления загрязнения.
				</div>
			</div>
		
			<div class="about" id="otliv">
				<h2 class="top_about">Отлив</h2>
				<div class="txt_about">
					<span class="b_color">Элемент окна представляющий собой подоконник со стороны улицы, 
					закрывающий нижнюю плоскость оконного проёма и монтажные швы.</span><br><br>
					Отлив изготавливается из алюминия или пластика. Основной его функцией является отведение 
					влаги от фасада здания и от окна, но он также защищает нижнюю часть рамы от попадания 
					туда загрязнений, пыли и влаги, прикрывая нижний монтажный шов.
				</div>
			</div>
		
		
			<div class="foot_les">
				<span style="margin-left:20px;"></span>Дополнительные элементы пластиковых окон не обязательны, 
				но их использование придает пластиковым окна более эстетический вид и делает их более практичными. 
				Такие элементы как  отлив, москитная сетка, детский замок улучшают эксплуатационные характеристики 
				и увеличивают срок службы, откосы и подоконник делают окно внешне более красивым и аккуратным.
				Выбирая одну из оконный компаний <?php echo $_SESSION['morph']['rod']; ?>, помните, использование дополнительных элементов 
				повышает цену ПВХ стеклопакетов, но делает их более долговечными, практичными и безопасными.						
			</div>

		
			<div class="ex roundBorder" onclick="f_show_ex()">Проверить полученные знания</div>
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>
	
	
	<!--********   Проверочный тест   *********-->

			<div class="ex_ok" id="ex4_ok">
				<div class="top_ex_ok"><img src="../img/course/ok.png"></div>
				<div class="bd_ex_ok">Четвёртый урок выучен.<br>Осталось всего два.</div>
				<a class="les less1" href="kak-zamerit-okno.php">Урок 5</a>
			</div>
			
			<div class="test" id="ex_four">
			
				<div class="text_left_ex text_kursiv">Вид на окно<br>из помещения<img class="arr_left" src="../img/course/arr_les4_left.png"></div>
				<div class="text_right_ex text_kursiv">Вид на окно<br>с улицы<img class="arr_right" src="../img/course/arr_les4_right.png"></div>
			
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
						<span class="tit_zd">Задание 4:</span>
						<br>Определите как называются дополнительные<br>элементы пластикового окна на картинке.
					</div>
					<div class="tit_zd1"></div>
					<div class="tft_f_hlp">Чтобы указать ответ,<br>кликните по пустому полю<br>и выберите один из пунктов<br>в выпадающем списке</div>
					<div class="close_popup" onclick="f_all_close()">×</div>
					<div class="close_popup" onclick="f_all_close()">×</div>
				</div>
				
				<div class="test_ex_one" id="tst_ex4" onclick="f_test_ex4()">Проверить задание</div>
				<div class="test_ex_one_new" id="tst_ex4_new" onclick="f_tst4_new()">Пройти задание ещё раз</div>
				<div class="test_ex_one_close" id="txt_ex4_close" onclick="f_all_close()">Повторить урок</div>
				
				<img class="img_ex_four" src="../img/course/ex_four.png">
				
				<div class="err_tst1 err_otkos"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_podok"><div class="trig_right_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_zamok"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_moskit"><div class="trig_left_red_err"></div>Ошибка</div>
				<div class="err_tst1 err_otliv"><div class="trig_left_red_err"></div>Ошибка</div>

				
				<div class="sel_otkos">
					<div class="select_ex" id="select_otkos" onclick="f_slide_otkos()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_otkos">
							<div class="point_select top_border_point" onclick="f_slide_otkos('Замок от детей')">Замок от детей</div>
							<div class="point_select top_border_point" onclick="f_slide_otkos('Отлив')">Отлив</div>
							<div class="point_select top_border_point" onclick="f_slide_otkos('Подоконник')">Подоконник</div>
							<div class="point_select top_border_point" onclick="f_slide_otkos('Москитная сетка')">Москитная сетка</div>
							<div class="point_select top_border_point" onclick="f_slide_otkos('Откосы')">Откосы</div>
						</div>
					</div>
				</div>
			
				<div class="sel_podok">
					<div class="select_ex" id="select_podok" onclick="f_slide_podok()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_podok"  style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_podok('Москитная сетка')">Москитная сетка</div>
							<div class="point_select top_border_point" onclick="f_slide_podok('Подоконник')">Подоконник</div>
							<div class="point_select top_border_point" onclick="f_slide_podok('Отлив')">Отлив</div>
							<div class="point_select top_border_point" onclick="f_slide_podok('Замок от детей')">Замок от детей</div>
							<div class="point_select top_border_point" onclick="f_slide_podok('Откосы')">Откосы</div>
						</div>
					</div>
				</div>
			
				<div class="sel_zamok">
					<div class="select_ex" id="select_zamok" onclick="f_slide_zamok()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_zamok" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_zamok('Замок от детей')">Замок от детей</div>
							<div class="point_select top_border_point" onclick="f_slide_zamok('Москитная сетка')">Москитная сетка</div>
							<div class="point_select top_border_point" onclick="f_slide_zamok('Подоконник')">Подоконник</div>
							<div class="point_select top_border_point" onclick="f_slide_zamok('Отлив')">Отлив</div>
							<div class="point_select top_border_point" onclick="f_slide_zamok('Откосы')">Откосы</div>
						</div>
					</div>
				</div>
				
				<div class="sel_moskit">
					<div class="select_ex" id="select_moskit" onclick="f_slide_moskit()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_moskit" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_moskit('Отлив')">Отлив</div>
							<div class="point_select top_border_point" onclick="f_slide_moskit('Замок от детей')">Замок от детей</div>
							<div class="point_select top_border_point" onclick="f_slide_moskit('Подоконник')">Подоконник</div>
								<div class="point_select top_border_point" onclick="f_slide_moskit('Москитная сетка')">Москитная сетка</div>
							<div class="point_select top_border_point" onclick="f_slide_moskit('Откосы')">Откосы</div>
						</div>
					</div>
				</div>
				
				<div class="sel_otliv">
					<div class="select_ex" id="select_otliv" onclick="f_slide_otliv()"></div>
					<div class="body_select">
						<div class="slide_select" id="slide_otliv" style="z-index:1000;">
							<div class="point_select top_border_point" onclick="f_slide_otliv('Отлив')">Отлив</div>
							<div class="point_select top_border_point" onclick="f_slide_otliv('Откосы')">Откосы</div>
							<div class="point_select top_border_point" onclick="f_slide_otliv('Подоконник')">Подоконник</div>
							<div class="point_select top_border_point" onclick="f_slide_otliv('Замок от детей')">Замок от детей</div>
							<div class="point_select top_border_point" onclick="f_slide_otliv('Москитная сетка')">Москитная сетка</div>
						</div>
					</div>
				</div>
			</div>
	
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../script/js/lesfour.js" type="text/javascript"></script><!-- подключаем файл скриптов для проверки полученных знаний  --> 

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>