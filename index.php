<?php

	session_start();

	/**********************
	
	Подключаем файл в котором указываем домен под которым будем создавать куки, 
	что бы при переходе между поддоменами при выборе города куки сохранялись
	
	***********************/
	include_once("pattern/iniset.php");
	

	/**********************
	
	Поключаем морфер для автоматического изменения города пользователя в нужный падеж
	В нутри морфера определяем город пользователя манипулируя поддоменом в url
	
	***********************/
	include_once("pattern/morpher.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Помогаем выбрать и купить пластиковые окна <?php echo $_SESSION['morph']['gde']; ?>. Справочник оконных компаний. Акции и скидки на окна <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="купить окна, надоокна, надоокна <?php echo $_SESSION['morph']['ime']; ?>, окна <?php echo $_SESSION['morph']['ime']; ?>, пластиковые окна, пластиковые окна <?php echo $_SESSION['morph']['ime']; ?>, пвх окна, пвх окна <?php echo $_SESSION['morph']['ime']; ?>, тендер окна пвх, пластиковые окна тендер">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Надоокна <?php if( $_SESSION['morph']['ime'] != 'Ваш город' ) echo $_SESSION['morph']['ime'] + ' '; ?>- Сервис покупки пластиковых окон.</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/index.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<?php include_once("pattern/yandex_verification.php"); //верификация для Яндекс вэбмастер ?>
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?> 
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		<!--************************************   img_slide.jpg     1.jpg        Слайдер на главной странице                  *****************************-->
	
		<div id="slider">
			<img id="img_slide" src="img/2.jpg" alt="Помогаем купить пластиковые окна <?php echo $_SESSION['morph']['gde']; ?>" title="Помогаем купить пластиковые окна <?php echo $_SESSION['morph']['gde']; ?>">
			<h1>
				<span class="slide_titel">Помогаем купить пластиковые</span>
				<span class="slide_titel_bottom">окна <?php echo $_SESSION['morph']['gde']; ?></span>
			</h1>
		
			<div class="txt_to_crt">
				<div class="trig_f_indx"></div>
				<img class="i_f_t_index" src="img/order_index.png" alt="пластиковые окна" title="пластиковые окна">
				<div class="b_f_t_index">Разместите тендер на покупку<br>пластиковых окон</div>
				<div class="s_f_t_index">и получите лучшие предложения<br>от оконных компаний <?php echo $_SESSION['morph']['rod']; ?></div>
				<a href="tender-plastikovye-pvh-okna.php" class="btn_f_t_index roundBorder">Разместить тендер</a>
				<div class="txt_f_t_index">Это бесплатно и займёт не более 7 минут</div>
			</div>
			<div class="action_to_tender">
				<a href="tender-plastikovye-pvh-okna.php" class="btn_t_tender roundBorder">Разместить тендер</a>
				<div class="txt_un_btn">Это бесплатно и займёт не более 7 минут</div>			
			</div>
		</div>
		
		
		
		
		<!--************************************                Как работает этот сервис                 *****************************-->
		
		<div id="howWork">
			<div class="topTitleText">
				<h2>Как это работает</h2>
			</div>
			<div class="iconBlock" id="icb1">
				<img class="textIcon" src="img/text.png" alt="Бесплатно разместите тендер">
				<div class="textIndexBigText">Бесплатно<br>разместите тендер</div>
				<div class="textIndexSmall">Всего 7 минут, что бы указать<br>параметры желаемых окон</div>
			</div>
			<div class="iconBlock" id="icb2">
				<img class="textIcon" src="img/mess.png" alt="Получите предложения от оконных компаний">
				<div class="textIndexBigText">Получите предложения<br>от оконных компаний</div>
				<div class="textIndexSmall">Сравнивайте цены,<br>задайте вопросы</div>
			</div>
			<div class="iconBlock" id="icb3">
				<img class="textIcon" src="img/clock.png" alt="Выберите лучшее предложение">
				<div class="textIndexBigText">Выберите лучшее<br>предложение</div>
				<div class="textIndexSmall">Экономьте Ваше время<br>и деньги</div>
			</div>
			<div class="btnCrtTender">
				<a href="tender-plastikovye-pvh-okna.php" class="btnCrtTenderBig roundBorder">Разместить тендер бесплатно</a>
				<div class="txt_fo_btn">Это займёт не более 7 минут</div>
			</div>
		</div>
		
		
		
		<!--************************************                Нам доверяют                *****************************-->
		
		<div id="doverie">
			<div class="content_wrap">
				<div class="topTitleText">
					<h2>Нам доверяют</h2>
				</div>
				<div class="iconBlock" id="icb1">
					<img class="textIcon" src="img/list_in.png" alt="Размещеённых заявок">
					<div class="bbText">578</div>
					<div class="sbText">Размещеённых<br>заявок</div>
				</div>
				<div class="iconBlock" id="icb2">
					<img class="textIcon" src="img/win_in.png" alt="Купленных окна">
					<div class="bbText">1332</div>
					<div class="sbText">Купленных<br>окна</div>
				</div>
				<div class="iconBlock" id="icb3">
					<img class="textIcon" src="img/man_in.png" alt="Оконных компаний">
					<div class="bbText">79</div>
					<div class="sbText">Оконных<br>компаний</div>
				</div>
			</div>
		</div>
	
	
	
	
	
		<!--************************************                Отзывы                *****************************-->
		
		<div id="otzivi">
			<div class="topTitleText">
				<h2>Удобно покупать окна</h2>
			</div>
			<div class="feedConten">
				<div class="pipl_fed">
					<img id="pipl" class="pipl_fed" src="img/feed/5.png" alt="Отзывы от наших пользователей">
					<div id="piplatribut"><span style="font-weight: bold;">Андрей</span><br>г. Ярославль</div>
				</div>
				<div class="txt_feed_back">
					<div class="kavichki kav_open">«</div>
					<div class="kavichki kav_close">»</div>
					<div id="feed_contetnt" class="feed_contetnt">
						Отличный урок про ПВХ окно, всё доступно и понятно.
						Сайт удобный, помог быстро преобрести стеклопаеты в Ярославле.
						Нашел по запросу "Пластиковые окна в Ярославле цены" или 
						"Окна ПВХ в Ярославле", точно не помню.
					</div>
				</div>
			</div>
			<div class="scrollMenuContent">
				<div class="scrollMenu">
					<div id="point1" class="activePoint" onclick="f_clickFeed(1)"></div>
					<div id="point2" class="passivePoint" onclick="f_clickFeed(2)"></div>
					<div id="point3" class="passivePoint" onclick="f_clickFeed(3)"></div>
					<div id="point4" class="passivePoint" onclick="f_clickFeed(4)"></div>
					<div id="point5" class="passivePoint" onclick="f_clickFeed(5)"></div>						
				</div>
			</div>
		</div>
		
		
		
		
		
		<!--************************************                5 ПРИЧИН               *****************************-->
		
		<div id="prichini">
			<div class="topTitleText">
				<h2>5 причин создать Тендер</h2>
			</div>
			<div class="prichiniContent">
				<ul>
					<li>Это абсолютно бесплатно</li>
					<li>На размещение тендера понадобится 5-7 минут</li>
					<li>Вы быстро узнаете цены на пластиковые окна у большинства оконных компаний <?php echo $_SESSION['morph']['rod']; ?>. Останется только выбрать</li>
					<li>Не обязательно покупать окна у фирм сдлавших предложения</li>
					<li>Соревнуясь за Ваш заказ, организации снизят цены до 10%</li>
				</ul>
			</div>
			<div class="bottomTextPrichini">
				Разместите тендер, чтобы просто узнать стоимость будущих окон
			</div>
		</div>
		
		
		
		
		
		
		<!--************************************               ТЕНДЕР ЭТО                 *****************************-->
		
		<div id="tenderEto">
			<div class="topTitleText">
				<h2>Тендер на окна это</h2>
			</div>
			<div class="iconBlock" id="icb1">
				<img class="textIcon" src="img/rub.png" alt="купить пластиковое окно <?php echo $_SESSION['morph']['gde']; ?>" title="купить пластиковое окно <?php echo $_SESSION['morph']['gde']; ?>">
				<div class="textIndexBigText">Выгода</div>
				<div class="textIndexSmall">Купить окна<br>со скидкой до 10%</div>
			</div>
			<div class="iconBlock" id="icb2">
				<img class="textIcon" src="img/win.png" alt="окна <?php echo $_SESSION['morph']['ime']; ?> цены" title="окна <?php echo $_SESSION['morph']['ime']; ?> цены">
				<div class="textIndexBigText">Выбор</div>
				<div class="textIndexSmall">Узнать цены большинства<br>компаний <?php echo $_SESSION['morph']['rod']; ?>
			</div>
			</div>
			<div class="iconBlock" id="icb3">
				<img class="textIcon" src="img/clock.png" alt="окна пластиковые купить" title="окна пластиковые купить">
				<div class="textIndexBigText">Время</div>
				<div class="textIndexSmall">Самый быстрый способ<br>купить пластиковые окна</div>
			</div>
			<div class="btnCrtTender">
				<a href="tender-plastikovye-pvh-okna.php" class="btnCrtTenderBig roundBorder">Разместить тендер бесплатно</a>
				<div class="txt_fo_btn">Это займёт не более 7 минут</div>
			</div>
		</div>
		
		<!--************************************               ФУТЕР               *****************************-->
		<?php include_once("pattern/footer.php");  ?>
		
	</div>
	
	<script async src="script/js/slidefeed.js" type="text/javascript"></script><!-- скрипт для слайдера отзывы -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>