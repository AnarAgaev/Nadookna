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
	<title>Установка пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?> по ГОСТу.</title>
	<meta name="description" content="Не знаете как купить окна ПВХ?. БЕСПЛАТНО расскажем как купить окна. Установка, монтаж пластиковых ПВХ окон.">
	<meta name="keywords" content="установка монтаж пластиковых ПВХ окон">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="../../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/course.css" />
	<link rel="stylesheet" type="text/css" href="../style/lessix.css" />
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
				<img src="../img/course/line_six.png">
				<div>
					<div class="line_txt_grey txt_1">Урок 1<a class="to_less" href="elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_2">Урок 2<a class="to_less" href="stvorki-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_3">Урок 3<a class="to_less" href="steklopaket-profil-pvh.php"></a></div>
					<div class="line_txt_grey txt_4">Урок 4<a class="to_less" href="dop-elementy-plastikovyh-okon.php"></a></div>
					<div class="line_txt_grey txt_5">Урок 5<a class="to_less" href="kak-zamerit-okno.php"></a></div>
					<div class="line_txt_blu txt_6">Урок 6<a class="to_less" href="kupit-okna.php"></a></div>
				</div>
				<h1 class="tit_les">Как купить окна: установка окон.</h1>
			</div>

			
			
			
			<div class="list_urok">
				<div class="point_urok">
					<div class="num_urok">1</div>
					<a class="point_urok" href="vybor-profilya-steklopaketa-i-furnitury.php">Выбор профиля, стеклопакета и фурнитуры</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">2</div>
					<a class="point_urok" href="vybor-stvorok.php">Выбор створок</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">3</div>
					<a class="point_urok" href="otkosy-podokonnik-otliv.php">Откосы, подоконник, отлив</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">4</div>
					<a class="point_urok" href="predvaritelnyj-zamer-okna.php">Предварительный замер окна</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">5</div>
					<a class="point_urok" href="poisk-okonnoj-kompanii.php">Поиск оконной компании</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">6</div>
					<a class="point_urok" href="poisk-nailuchshej-ceny.php">Поиск наилучшей цены</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">7</div>
					<a class="point_urok" href="podgotovka-pomeshcheniya.php">Подготовка помещения</a>
				</div>
				<div class="point_urok">
					<div class="num_urok">8</div>
					<a style="color: #4285f4;" class="point_urok" href="ustanovka-okon.php">Установка окон</a>
				</div>
			</div>
			
			
			<div class="txt_articl">
				<p class="txt_articl">Заключительный этап - установка. Не стесняйтесь во время установки наблюдать за работой и задавать вопросы. Помните - Вы заплатили за услугу и имеетое полное право на разъяснения. Процесс установки <a class="for_txt" href="../">пластиковых окон</a> включает следующие стадии:</p>
				<p class="txt_articl">- Демонтаж – первый этап работы монтажников. На этом этапе мастера снимут старое окно, раму. По необходимости, снимут лишний раствор с внутренних и внешних откосов, снимут старый подоконник, отлив. Демонтаж - самая «грязная» стадия установки пластиковых окон.</p>
				<div class="center_img">
					<img src="../img/course/ustanovka-plastikovyh-okon.jpg" alt="Установка пластиковых окон." title="Установка пластиковых окон."></br>
					<span class="signature_center"><br>Установка пластиковых окон<br>начинается с демонтажа старого окна.</span>
				</div>				
				<p class="txt_articl">- Грунтование поверхностей. Проводится для лучшей адгезии (прилипания) монтажных материалов к поверхностям.</p>
				<p class="txt_articl">- Крепление различных типов лент к раме пластикового окна. Ленты необходимы для выведения остаточной влаги и закрытия технологических швов. </p>
				<p class="txt_articl">- Крепление анкерных пластин, с помощью которых монтажники закрепят выставленную по уровню раму в оконном проёме перед основным креплением.</p>
				<div class="center_img">
					<img src="../img/course/ankernye-plastiny-plastikovyh-okon.jpg" alt="Крепление анкерных пластин."  title="Крепление анкерных пластин."></br>
					<span class="signature_center"><br>Установленые на раме анкерные пластины<br>помогут правильно закрепить раму в проёме.</span>
				</div>
				<p class="txt_articl">- Крепление оконной рамы в оконный проём на подставочный профиль. Оконная рама обязательно ставиться точно по уровню. При необходимости, используются монтажные клинья, позволяющие точно выровнять оконный блок. Раму необходимо зафиксировать в проёме с помощью закреплённых анкерных пластин. Помимо анкерных пластин, раму обязательно крепят в проем с помощью анкерных болтов прямым креплением.</p>
				<div class="center_img">
					<img src="../img/course/ankernyj-bolt.jpg" alt="Крепление рамы анкерным болтом."  title="Крепление рамы анкерным болтом."></br>
					<span class="signature_center"><br>Для жёсткой фиксации рамы в оконном проёме,<br>её необходимо фиксировать анкерными болтами.</span>
				</div>
				<p class="txt_articl">- Запенивание зазоров между рамой и оконным проёмом.</p>
				<div class="center_img">
					<img src="../img/course/zapenivanie-proyoma.jpg" alt="Запенивания зазоров между рамойи оконным проёмом." title="Запенивания зазоров между рамойи оконным проёмом."></br>
					<span class="signature_center"><br>Зазоры между рамой и оконным проёмом<br>нужно обязательно закрыть монтажной пеной.</span>
				</div>				
				<p class="txt_articl">- Установка подоконника и отлива. Лучше если установка подоконника будет на раствор, а не на монтажную пену. </p>
				<p class="txt_articl">- Установка внутренних и внешних откосов. Все щели и швы между откосами, рамой и подоконником необходимо герметизировать специальным силиконовым, монтажным герметиком.</p>
				<div class="center_img">
					<img src="../img/course/otkosy-plastikovyh-okon.jpg" alt="Установка откосов пластикового окна." title="Установка откосов пластикового окна."></br>
					<span class="signature_center"><br>Откосы пластикового окна закрываются<br>специальными пластиковыми панелями.</span>
				</div>				
				<p class="txt_articl">- Цементирование или штукатурка выходов монтажной пены, большие промежутки между рамой и оконных проёмом.</p>
				<p class="txt_articl">- Крепление на раме створок с дальнейшей регулировкой.</p>
				<p class="txt_articl">- Последний этап установки пластиковых окон – монтаж стеклопакетов и фиксация их с помощью штапика.</p>
				<div class="center_img">
					<img src="../img/course/ustanovka-steklopaketa.jpg" alt="Установка откосов пластикового окна." title="Установка откосов пластикового окна."></br>
					<span class="signature_center"><br>Последний этап установки пластиковых<br>окон - монтаж стеклопакета.</span>
				</div>				
				<p class="txt_articl">Эти основные этапы должны быть соблюдены, чтобы установка окон в Ярославле была проведена в соответствии с ГОСТом и, чтобы ПВХ окна радовали и дарили тепло долгие годы. </p>
				<div class="txt_urok_under"><br><br><br>Надеемся, пройденый урок помог Вам разобраться в том, что такое пластиковые окна и теперь Вы без труда сможете самостоятельно купить новые окна или разместить тендер на нашем рессурсе.</div>
			
			</div>


			<div class="action_struct">
				Разместите тендер на покупку пластиковых окон.<br>
				Купите окна со скидкой до 10%.
				<a href="../tender-plastikovye-pvh-okna.php" class="btn_six roundBorder">Разместить тендер бесплатно</a>
				<div class="txt_un_btn_six">Это займёт не более 7 минут</div>
			</div>

			
		</div>
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("../pattern/footer.php");  ?>
	
	</div>
	
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>