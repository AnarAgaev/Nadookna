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
	<title>Как замерить окно <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<meta name="description" content="Не знаете как замерить окно? Читать обязательно. Перед обращение в оконную компанию, очень важно сделать правильный замер.">
	<meta name="keywords" content="как замерить окно, пластиковые окна замер">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lesfive.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 

	<?php 
		include_once("../pattern/videobox.php"); // поключаем блок в котором будем показывать всплывающее видео
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
				<img src="../img/course/line_five.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_blu txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_grey txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Как правильно замерить окно</h1>
			</div>	
		
			<img class="img_les_five" src="../img/course/kak-zamerit-okno.png" alt="Как замерить окно" title="Как замерить окно">
			<div class="text_left text_kursiv">Вид на окно<br>из помещения<img class="arr_left" src="../img/course/arr_les4_left.png"></div>
			<div class="text_right text_kursiv">Вид на окно<br>с улицы<img class="arr_right" src="../img/course/arr_les4_right.png"></div>
			<h2 class="txt_mark visota" onmouseover="$('#visota').css({'display':'block'});" onmouseout="$('#visota').css({'display':'none'});">Высота окна</h2>
			<h2 class="txt_mark otkos" onmouseover="$('#otkos').css({'display':'block'});" onmouseout="$('#otkos').css({'display':'none'});">Ширина откосов</h2>
			<h2 class="txt_mark shirina" onmouseover="$('#shirina').css({'display':'block'});" onmouseout="$('#shirina').css({'display':'none'});">Ширина окна</h2>
			<h2 class="txt_mark podok" onmouseover="$('#podok').css({'display':'block'});" onmouseout="$('#podok').css({'display':'none'});">Глубина подоконника</h2>
			<h2 class="txt_mark otliv" onmouseover="$('#otliv').css({'display':'block'});" onmouseout="$('#otliv').css({'display':'none'});">Глубина отлива</h2>
			<div class="about" id="visota">
				<h2 class="top_about">Высота окна</h2>
				<div class="txt_about">
					<div class="b_color">Расстояние от подоконника<br>до верхнего откоса.</div>
				</div>
			</div>
			<div class="about" id="otkos">
				<h2 class="top_about">Ширина откосов</h2>
				<div class="txt_about">
					<div class="b_color">Это глубина внутренней стены<br>
					от рамы до края стены слева,<br>справа или сверху от окна.</div>
				</div>
			</div>
			<div class="about" id="shirina">
				<h2 class="top_about">Ширина окна</h2>
				<div class="txt_about">
					<div class="b_color">Расстояние между левым<br>и правым откосами.</div>
				</div>
			</div>
			<div class="about" id="podok">
				<h2 class="top_about">Глубина (ширина) подоконника</h2>
				<div class="txt_about" style="text-align:left;">
					<div class="b_color" style="text-align:left;">Это глубина внутренней стены,<br>от края стены до 
					нижней части рамы,<br>плюс величина выступа подоконника<br>(около 100мм).</div><br><br>
					Как правило у вашего окна уже есть подоконник. Просто измерьте его глубину.
					При измерении ширины подоконника очень важно учитывать, что он не должен 
					закрывать отопительный радиатор больше, чем на 1/3.
				</div>
			</div>
			<div class="about" id="otliv">
				<h2 class="top_about">Глубина (ширина) отлива</h2>
				<div class="txt_about" style="text-align:left;">
					<div class="b_color" style="text-align:left;">Глубина отлива измеряется по глубине внешней
					стены, от нижней части рамы до края стены, плюс 30-40 мм выступ отлива от края стены.</div><br><br>
					Если у вашего окна уже есть отлив, то просто измерьте его глубину.
					
				</div>
			</div>
			<div class="foot_les">
				<span style="margin-left:20px;"></span>Пред звонком в одну из оконных компаний <?php echo $_SESSION['morph']['rod']; ?>, 
				разберитесь как замерить окно и правильно снять размеры пластиковых окон. На основе полученных данных 
				(размер на пластиковые стеклопакеты), менеджер рассчитает предварительную стоимость заказа. Не бойтесь 
				незначительно ошибиться в размерах. В дальнейшем, к вам придёт мастер-замерщик для определения 
				точных параметров, на основе которых и буду изготовлены будущие ПВХ стеклопакеты. Сделанный Вами 
				замер и полученные размеры пластиковых окон, являются предварительными и нужены для того, 
				чтобы в оконной компании могли быстро посчитать примерную стоимость необходимых Вам ПВХ стеклопакетов. 
				Зная размеры пластиковых окон, Вы сможете быстрее найти наиболее подходящие предложения от оконных компаний 
				<?php echo $_SESSION['morph']['rod']; ?>.
				
				
				<div class="les_video">
					Это видео поможет замерить<br>окно и получить првильные<br>размеры ПВХ окон:
					<div class="kadr" onclick="f_showvideo('//www.youtube.com/embed/KtgBG08d_YY?rel=0&autoplay=1&showinfo=0')"></div>
				</div>
			</div>
		
			<div class="ex roundBorder" onclick="f_show_ex()">Проверить полученные знания</div>
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>
	
	
	<!--********   Проверочный тест   *********-->

	<div class="ex_ok" id="ex5_ok">
		<div class="top_ex_ok"><img src="../img/course/ok.png"></div>
		<div class="bd_ex_ok">Пятое задание выполнено.<br>Остался всего один урок.</div>
		<a class="les less1" href="kupit-okna.php">Урок 6</a>
	</div>
	<div class="test" id="ex_five">
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
				<span class="tit_zd">Задание 5:</span>
				<br>Определите размеры<br>пластикового окна на картинке.
			</div>
			<div class="tit_zd1"></div>
			<div class="tft_f_hlp">Чтобы указать ответ,<br>кликните по пустому полю<br>и выберите один из пунктов<br>в выпадающем списке</div>
			<div class="close_popup" onclick="f_all_close()">×</div>
			<div class="close_popup" onclick="f_all_close()">×</div>
			<div class="close_popup" onclick="f_all_close()">×</div>
		</div>
		<div class="test_ex_one" id="tst_ex5" onclick="f_test_ex5()">Проверить задание</div>
		<div class="test_ex_one_new" id="tst_ex5_new" onclick="f_tst5_new()">Пройти задание ещё раз</div>
		<div class="test_ex_one_close" id="txt_ex5_close" onclick="f_all_close()">Повторить урок</div>
		<img class="img_ex_five" src="../img/course/ex_five.png">
		<div class="razmer r_shirina">1600 мм</div>
		<div class="razmer r_visota">1400 мм</div>
		<div class="razmer r_otkos">300 мм</div>
		<div class="razmer r_otliv">200 мм</div>
		<div class="razmer r_podok">400 мм</div>
		<div class="err_tst1 err_shirina"><div class="trig_top_red_err"></div>Ошибка</div>
		<div class="err_tst1 err_visota"><div class="trig_top_red_err"></div>Ошибка</div>
		<div class="err_tst1 err_otkos"><div class="trig_top_red_err"></div>Ошибка</div>
		<div class="err_tst1 err_podok"><div class="trig_top_red_err"></div>Ошибка</div>
		<div class="err_tst1 err_otliv"><div class="trig_top_red_err"></div>Ошибка</div>
		<div class="txt_pole txt_shirina">Ширина окна</div>
		<div class="sel_shirina">
			<div class="select_ex" id="select_shirina" onclick="f_slide_shirina()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_shirina">
					<div class="point_select top_border_point" onclick="f_slide_shirina('300 мм')">300 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_shirina('1600 мм')">1600 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_shirina('400 мм')">400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_shirina('1400 мм')">1400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_shirina('200 мм')">200 мм</div>
				</div>
			</div>
		</div>
		<div class="txt_pole txt_visota">Высота окна</div>
		<div class="sel_visota">
			<div class="select_ex" id="select_visota" onclick="f_slide_visota()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_visota">
					<div class="point_select top_border_point" onclick="f_slide_visota('1600 мм')">1600 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_visota('200 мм')">200 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_visota('1400 мм')">1400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_visota('400 мм')">400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_visota('300 мм')">300 мм</div>
				</div>
			</div>
		</div>
		<div class="txt_pole txt_otkos">Ширина откосов</div>
		<div class="sel_otkos">
			<div class="select_ex" id="select_otkos" onclick="f_slide_otkos()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_otkos">
					<div class="point_select top_border_point" onclick="f_slide_otkos('400 мм')">400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otkos('1400 мм')">1400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otkos('1600 мм')">1600 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otkos('200 мм')">200 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otkos('300 мм')">300 мм</div>
				</div>
			</div>
		</div>
		<div class="txt_pole txt_podok">Подоконник</div>
		<div class="sel_podok">
			<div class="select_ex" id="select_podok" onclick="f_slide_podok()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_podok">
					<div class="point_select top_border_point" onclick="f_slide_podok('300 мм')">300 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_podok('400 мм')">400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_podok('1400 мм')">1400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_podok('200 мм')">200 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_podok('1600 мм')">1600 мм</div>
				</div>
			</div>
		</div>
		<div class="txt_pole txt_otliv">Глубина отлива</div>
		<div class="sel_otliv">
			<div class="select_ex" id="select_otliv" onclick="f_slide_otliv()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_otliv">
					<div class="point_select top_border_point" onclick="f_slide_otliv('1400 мм')">1400 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otliv('300 мм')">300 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otliv('1600 мм')">1600 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otliv('200 мм')">200 мм</div>
					<div class="point_select top_border_point" onclick="f_slide_otliv('400 мм')">400 мм</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../script/js/lesfive.js" type="text/javascript"></script><!-- подключаем файл скриптов для проверки полученных знаний  --> 
	<script async src="../script/js/showvideo.js" type="text/javascript"></script><!-- подключаем скрипт который показывает видео на странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>