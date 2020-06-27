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

	if (!isset($_COOKIE['help_view_course'])) SetCookie("help_view_course","true",time()+31536000,"/");
	
	// получаем урл страницы
	include_once("../script/php/geturl.php"); 
		
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Пред покупкой пластиковых окон <?php echo $_SESSION['morph']['gde']; ?> необходимо понять из чего они состоят, узнать их основный элементы.">
    <meta name="keywords" content="элементы пластиковых окон, из чего состоит пластиковое окно">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Основные элементы пластиковых окон <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
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
		
		
		
			<?php 
				if (!isset($_COOKIE['help_view_course'])){
					echo <<<HERE
						<div class="help_les_one roundBorder" id="help_les_one"><!--  Всплывающая подсказка о просмотре определений -->
							<div class="trig_right_red"></div>
							Чтобы посмотреть описание<br>элемента окна, 
							наведите курсор<br>на его название
						</div>
HERE;
				}
			?>

		
			<div class="line_course">
				<img src="../img/course/line_one.png">
				<div>
					<div class="line_txt_blu txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_grey txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Основные элементы пластиковых окон</h1>
			</div>	
			
			<img class="img_les_one" src="../img/course/jelementy-plastikovogo-okna.png" alt="Элементы пластикового окна" title="Элементы пластикового окна">
			<h2 class="txt_mark rama" onmouseover="$('#a_rama').css({'display':'block'});" onmouseout="$('#a_rama,#help_les_one').css({'display':'none'});">Рама</h2>
			<h2 class="txt_mark furnit" onmouseover="$('#a_furnit').css({'display':'block'});" onmouseout="$('#a_furnit,#help_les_one').css({'display':'none'});">Фурнитура</h2>
			<h2 class="txt_mark petlia" onmouseover="$('#a_petl').css({'display':'block'});" onmouseout="$('#a_petl,#help_les_one').css({'display':'none'});">Петля</h2>
			<h2 class="txt_mark rutka" onmouseover="$('#a_rutka').css({'display':'block'});" onmouseout="$('#a_rutka,#help_les_one').css({'display':'none'});">Ручка</h2>
			<h2 class="txt_mark pov_stvor" onmouseover="$('#a_stvor').css({'display':'block'});" onmouseout="$('#a_stvor,#help_les_one').css({'display':'none'});">Створка</h2>
			<h2 class="txt_mark impost" onmouseover="$('#a_impost').css({'display':'block'});" onmouseout="$('#a_impost,#help_les_one').css({'display':'none'});">Импост</h2>
			<h2 class="txt_mark shtapik" onmouseover="$('#a_shtapik').css({'display':'block'});" onmouseout="$('#a_shtapik,#help_les_one').css({'display':'none'});">Штапик</h2>
			<h2 class="txt_mark steklo" onmouseover="$('#a_steklo').css({'display':'block'});" onmouseout="$('#a_steklo,#help_les_one').css({'display':'none'});">Стеклопакет</h2>
			<h2 class="txt_mark uplot"  onmouseover="$('#a_uplot').css({'display':'block'});" onmouseout="$('#a_uplot,#help_les_one').css({'display':'none'});">Уплотнитель</h2>
			<div class="about" id="a_rama">
				<h2 class="top_about">Рама</h2>
				<div class="txt_about">
					<span class="b_color">Неподвижно зафиксированный в проеме элемент окна, который служит для 
					закрепления на нём створок или монтажа стеклопакета (в случае глухих окон).</span><br><br>
					Рама состоит из, соединённых между собой методом сварки, пластиковых профилей (брусков) с 
					вмонтированным внутрь металлическим армированием (каркасом).<br><br>
					Рама один из важнейших элементов пластиковой конструкции, так как отвечает
					за прочность всего окна и от её качества зависит долговечность всего изделия.
				</div>
			</div>
			<div class="about" id="a_furnit">
				<h2 class="top_about">Фурнитура</h2>
				<div class="txt_about">
					<span class="b_color">Механизм, располагающаяся по периметру створки и внутри рамы, 
					задачей которого является управление окном, его запирание, 
					отпирание, откидывание и поворот.</span><br><br>
					Так как фурнитура отвечает за прилегание створки окна к раме, 
					от её качества и правильной установки зависит долговечность 
					окна, удобство эксплуатации и теплозащитные характеристики.
				</div>
			</div>
			<div class="about" id="a_petl">
				<h2 class="top_about">Петля</h2>
				<div class="txt_about">
					<span class="b_color">Металлическая деталь в пластмассовом корпусе.
					Применяется, чтобы обеспечить подвижный крепёж створки к раме.</span><br><br>
					Петли позволяют створке вращаться вокруг оси, за счёт чего 
					осуществляется открытие и закрытие окна.					
				</div>
			</div>
			<div class="about" id="a_rutka">
				<h2 class="top_about">Ручка</h2>
				<div class="txt_about">
					<span class="b_color">Рычажный элемент пластикового окна позволяющий передать 
					усилие человека на открывающий механизм створки из одной точки.</span><br><br>
					С помощью ручки производятся такие операции как открытие, 
					закрытие и откидывание створки.<br><br> 
					Ручки могут быть изготовлены как из пластика, 
					так и из металла и иметь различную окраску.					
				</div>
			</div>
			<div class="about" id="a_stvor">
				<h2 class="top_about">Створка</h2>
				<div class="txt_about">
					<span class="b_color">Пластиковый элемент оконной конструкции с вмонтированным в него стеклопакетом.</span><br><br>
					Как и раму створку изготавливают из спаянных между собой 
					пластиковых брусков (оконного профиля).<br><br>
					Створка подвижно соединена с рамой с помощью петель, 
					что позволяет открывать, закрывать и откидывать её, обеспечивая 
					удобное использование пластикового окна.					
				</div>
			</div>
			<div class="about" id="a_impost">
				<h2 class="top_about">Импост</h2>
				<div class="txt_about">
					<span class="b_color">Элемент пластикового окна в виден горизонтальной или 
					вертикальной балки, а иногда их комбинации, делящий окно на части.</span><br><br> 
					Зачастую, в окнах сложной конструкции, 
					импост имеет Т-образную форму.<br><br> 
					Его так же как раму и створку изготавливают из 
					пластикового бруска (оконного профиля) с вмонтированным 
					внутрь металлическим сердечником.<br><br>
					Импост используют в качестве элемента жесткости для окон 
					больших размеров и для закрепления на нём 
					створок в окнах с тремя и более створками.					
				</div>
			</div>
			<div class="about" id="a_shtapik">
				<h2 class="top_about">Штапик</h2>
				<div class="txt_about">
					<span class="b_color">Пластиковый брусок неправильной 
					формы, предназначенный для крепления стеклопакета в раме.</span><br><br> 
					Штапик крепится в специальные фальцы (защёлки) створки 
					по периметру стеклопакета, благодаря чему надёжно 
					удерживает его в раме, препятствуя выпадению 
					под действием различный нагрузок.
				</div>
			</div>
			<div class="about" id="a_steklo">
				<h2 class="top_about">Стеклопакет</h2>
				<div class="txt_about">
					<span class="b_color">Прозрачная часть пластикового окна.</span><br><br> 
					Стеклопакет представляет собой несколько стёкол, склеенных по 
					периметру между собой через алюминиевую или пластиковую рамку 
					таким образом, что между стёклами образуется воздушная камера.<br><br> 
					Мы подробнее рассмотрим стеклопакет в одном из следующих уроков.
					</div>
			</div>
			<div class="about" id="a_uplot">
				<h2 class="top_about">Уплотнитель</h2>
				<div class="txt_about">
					<span class="b_color">Резиновый или силиконовый шнур для герметизации стыков между деталями окна.</span><br><br> 
					Уплотнитель крепится к раме или створке в местах их примыкания, 
					а также между стеклопакетом и створкой.<br><br>
					Задача уплотнителя сделать стыки между деталями окна в 
					местах их соединений более герметичными, 
					чтобы не допустить продувания окон.
				</div>
			</div>
			
			<div class="foot_les">
				<span style="margin-left:20px;"></span>Не только пластиковое, но и обычное окно - это целая система из множества 
				составных частей и механизмов, собранных в единый блок. Каждая часть ПВХ стеклопакета служит своим целям, 
				предназначена решать конкретные задачи. Перед покупкой, обязательно выучите элементы пластиковых окон, не 
				только основные, но и дополнительные, из <a class="for_txt" href="dop-elementy-plastikovyh-okon.php">Урока 4</a>. 
				Разберитесь из чего состоит пластиковое окно. Это поможет Вам уверенней общаться с менеджерами оконных компаний <?php echo $_SESSION['morph']['rod']; ?> и более полно 
				понимать, какие именно окна Вам нужны.	
			</div>
			<div class="ex roundBorder" onclick="f_show_ex()">Проверить полученные знания</div>
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>
	
	
	<!--********   Проверочный тест   *********-->
	<div class="ex_ok" id="ex1_ok">
		<div class="top_ex_ok"><img src="../img/course/ok.png"></div>
		<div class="bd_ex_ok">Отличное начало.<br>Первый урок пройден.</div>
		<a class="les" href="stvorki-plastikovyh-okon.php">Урок 2</a>
	</div>

	<div class="test" id="ex_one">
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
				<div class="pod_tre_left"></div>
			</div>
		</div>	
		
		<div class="top_ex">
			<div class="close_popup" onclick="f_all_close()">×</div>
			<div class="txt_ex1"><span class="tit_zd">Задание 1:</span><br>Укажите как называются элементы<br>пластикового окна на картинке</div>
			<div class="tit_zd1"></div>
			<div class="tft_f_hlp">Чтобы указать название<br>элемента, кликните по пустому<br>полю и выберите один из<br>пунктов в выпадающем списке</div>
		</div>
		
		<div class="test_ex_one roundBorder" id="tst_ex1" onclick="f_test_ex1()">Проверить задание</div>
		<div class="test_ex_one_new roundBorder" id="tst_ex1_new" onclick="f_test_new()">Пройти задание ещё раз</div>
		<div class="test_ex_one_close roundBorder" id="txt_ex1_close" onclick="f_all_close()">Повторить урок</div>
		
		<img class="img_ex_one" src="../img/course/ex_one.png" alt="Урок 1. Элементы пластикового окна">
		
		<div class="err_tst1 roundBorder err_rama"><div class="trig_right_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_uplot"><div class="trig_right_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_steklo"><div class="trig_right_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_shtapik"><div class="trig_right_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_furnit"><div class="trig_left_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_petl"><div class="trig_left_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_ruchka"><div class="trig_left_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_stvor"><div class="trig_left_red_err"></div>Ошибка</div>
		<div class="err_tst1 roundBorder err_impost"><div class="trig_left_red_err"></div>Ошибка</div>
		
		<div class="sel_rama">
			<div class="select_ex roundBorder" id="select_rama" onclick="f_slide_rama()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_rama" style="z-index:4000;">
					<div class="point_select top_border_point" onclick="f_slide_rama('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_rama('Уплотнитель')">Уплотнитель</div>
					<div class="point_select top_border_point" onclick="f_slide_rama('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_rama('Штапик')">Штапик</div>
					<div class="point_select top_border_point" onclick="f_slide_rama('Рама')">Рама</div>
				</div>
			</div>
		</div>
		
		<div class="sel_uplot">
			<div class="select_ex roundBorder" id="select_uplot" onclick="f_slide_uplot()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_uplot" style="z-index:3000;">
					<div class="point_select top_border_point" onclick="f_slide_uplot('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_uplot('Уплотнитель')">Уплотнитель</div>
					<div class="point_select top_border_point" onclick="f_slide_uplot('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_uplot('Штапик')">Штапик</div>
					<div class="point_select top_border_point" onclick="f_slide_uplot('Рама')">Рама</div>
				</div>
			</div>
		</div>

		<div class="sel_steklo">
			<div class="select_ex roundBorder" id="select_steklo" onclick="f_slide_steklo()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_steklo" style="z-index:2000;">
					<div class="point_select top_border_point" onclick="f_slide_steklo('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_steklo('Уплотнитель')">Уплотнитель</div>
					<div class="point_select top_border_point" onclick="f_slide_steklo('Фурнитура')">Фурнитура</div>
					<div class="point_select top_border_point" onclick="f_slide_steklo('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_steklo('Рама')">Рама</div>
				</div>
			</div>
		</div>

		<div class="sel_shtapik">
			<div class="select_ex roundBorder" id="select_shtapik" onclick="f_slide_shtapik()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_shtapik" style="z-index:1000;">
					<div class="point_select top_border_point" onclick="f_slide_shtapik('Импост')">Импост</div>
					<div class="point_select top_border_point" onclick="f_slide_shtapik('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_shtapik('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_shtapik('Штапик')">Штапик</div>
				</div>
			</div>
		</div>
		
		<div class="sel_furnit">
			<div class="select_ex roundBorder" id="select_furnit" onclick="f_slide_furnit()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_furnit">
					<div class="point_select top_border_point" onclick="f_slide_furnit('Импост')">Импост</div>
					<div class="point_select top_border_point" onclick="f_slide_furnit('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_furnit('Уплотнитель')">Уплотнитель</div>
					<div class="point_select top_border_point" onclick="f_slide_furnit('Фурнитура')">Фурнитура</div>
					<div class="point_select top_border_point" onclick="f_slide_furnit('Рама')">Рама</div>
				</div>
			</div>
		</div>
	
		<div class="sel_petl">
			<div class="select_ex roundBorder" id="select_petl" onclick="f_slide_petl()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_petl" style="z-index:4000;">
					<div class="point_select top_border_point" onclick="f_slide_petl('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_petl('Фурнитура')">Фурнитура</div>
					<div class="point_select top_border_point" onclick="f_slide_petl('Штапик')">Штапик</div>
					<div class="point_select top_border_point" onclick="f_slide_petl('Петля')">Петля</div>
					<div class="point_select top_border_point" onclick="f_slide_petl('Рама')">Рама</div>
				</div>
			</div>
		</div>
		
		<div class="sel_ruchka">
			<div class="select_ex roundBorder" id="select_ruchka" onclick="f_slide_ruchka()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_ruchka" style="z-index:3000;">
					<div class="point_select top_border_point" onclick="f_slide_ruchka('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_ruchka('Фурнитура')">Фурнитура</div>
					<div class="point_select top_border_point" onclick="f_slide_ruchka('Ручка')">Ручка</div>
					<div class="point_select top_border_point" onclick="f_slide_ruchka('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_ruchka('Рама')">Рама</div>
				</div>
			</div>
		</div>
		
		<div class="sel_stvor">
			<div class="select_ex roundBorder" id="select_stvor" onclick="f_slide_stvor()"></div>
			<div class="body_select" style="background_color;red;">
				<div class="slide_select" id="slide_stvor" style="z-index:2000;">
					<div class="point_select top_border_point" onclick="f_slide_stvor('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_stvor('Уплотнитель')">Уплотнитель</div>
					<div class="point_select top_border_point" onclick="f_slide_stvor('Стеклопакет')">Стеклопакет</div>
					<div class="point_select top_border_point" onclick="f_slide_stvor('Штапик')">Штапик</div>
					<div class="point_select top_border_point" onclick="f_slide_stvor('Рама')">Рама</div>
				</div>
			</div>
		</div>
		
		<div class="sel_impost">
			<div class="select_ex roundBorder" id="select_impost" onclick="f_slide_impost()"></div>
			<div class="body_select">
				<div class="slide_select" id="slide_impost" style="z-index:1000;">
					<div class="point_select top_border_point" onclick="f_slide_impost('Импост')">Импост</div>
					<div class="point_select top_border_point" onclick="f_slide_impost('Створка')">Створка</div>
					<div class="point_select top_border_point" onclick="f_slide_impost('Штапик')">Штапик</div>
					<div class="point_select top_border_point" onclick="f_slide_impost('Рама')">Рама</div>
				</div>
			</div>
		</div>
	</div>
	
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="../script/js/lesone.js" type="text/javascript"></script><!-- подключаем файл скриптов для проверки полученных знаний  --> 

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>