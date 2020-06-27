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
	
	include_once("script/php/geturl.php"); // получаем урл страницы
	
	include_once("pattern/dbconnect.php"); // Подключаемся к БД
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
	<meta name="description" content="Тендер пластиковые ПВХ окна <?php echo $_SESSION['morph']['gde']; ?>. Калькулятор окон ПВХ <?php echo $_SESSION['morph']['gde']; ?>.">
    <meta name="keywords" content="купить пластиковые пвх окна <?php echo $_SESSION['morph']['gde']; ?>, тендер пластиковые пвх окна <?php echo $_SESSION['morph']['gde']; ?>, калькулятор окон пвх <?php echo $_SESSION['morph']['gde']; ?>, пластиковые окна <?php echo $_SESSION['morph']['ime']; ?>, калькулятор окон, калькулятор ПВХ окон, калькулятор пластиковых окон, купить окна, надоокна, надоокна <?php echo $_SESSION['morph']['ime']; ?>, окна <?php echo $_SESSION['morph']['ime']; ?>, пластиковые окна, пластиковые окна <?php echo $_SESSION['morph']['ime']; ?>, пвх окна, пвх окна <?php echo $_SESSION['morph']['ime']; ?>, тендер окна пвх, пластиковые окна тендер">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Тендер пластиковые ПВХ окна. Калькулятор пластиковых ПВХ окон.</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/tender.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
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
	
	<div class="addActionButton" data-is-city="<? if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ) echo 'false'; else echo 'true'; ?>">
		<img src="img/plusaction.png" alt="Тендер пластиковые ПВХ окна <?php echo $_SESSION['morph']['gde']; ?>" title="Тендер пластиковые ПВХ окна <?php echo $_SESSION['morph']['gde']; ?>">
	</div>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok<? if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ) echo ' d-block'; ?>" style="cursor: default;"></div>
	
	<? // спрашиваем контакты заказчика?>
	<div class="colme" id="user_cont" style="margin-top: -224px;">
		<div class="top_forms" style="margin-bottom: 25px;">
			<img src="../img/man_in.png">
			<div class="close_popup" onclick="f_close_make_tender();">×</div>
		</div>
		<div class="txt_tender_input">Eсли у менеджера возникнут вопросы по тендеру</div>
		<div class="title_tender_input">Как к Вам обратиться</div>
		<div class="err" id="err_name_user">Укажите Ваше имя</div>
		<input type="text" id="user" class="input200" placeholder="Ваше имя" style="margin-top: 10px;">
		<div class="title_tender_input">Ваш телфон</div>
		<div class="err" id="err_phone_user">Укажите Ваш телефон</div>
		<input type="text" id="phone" class="input200" placeholder="Номер телефона"  style="margin-top: 10px;">
		<div class="title_tender_input privacy_text">
			Нажимаю кнопку Разместить тендер Вы соглашаетесь с 
			<a class="for_txt" href="/download/personal_data_policy.pdf" target="_blank">
				Политика в отношении обработки персональных данных.</a>
		</div>
		<div class="enter_input roundBorder" onclick="f_make_tender();">Разместить тендер</div>
	</div>
	
	
	<? 
		// Ругаемся на отсутсвие выбранного горда. 
		if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ): ?>
		
		<div class="addorgOk" id="askCityTender"<? if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ) echo ' style="display: block;"'; ?>>
			<div class="adorgTitBlock">
				<img src="../img/warily.png">
				<div class="adorgTit">Будьте<br>внимательны</div>
			</div>
			<div class="adorgTxt">
				К сожалению, нельзя создать тендер не выбрав город. Пожалуйста выберите Ваш город.
				<div>
					<div class="btnAskCity roundBorder">Выбрать город</div>
				</div>
			</div>
		</div>

	<? endif; ?>
	
	
	<!-- Говорим об удачном создании тендера -->
	<div class="popUpOk" id="tender_ok" style="margin-top: -158px;">
		<div class="close_popup" onclick="f_all_close()">×</div>
		<div class="tipPopUp"><img src="../img/send_ok.png"></div>
		<div class="textPopUp">
			<span class="tender_add_true">Тендер удачно размещён</span><br><br>
			Номер Вашего тендера: <span class="tender_add_true" id="idmaketender"></span><br>
			Запишите его, он пригодится<br>в случае обращения в службу<br>поддержки.
		</div>
	</div>
	
	
	<!-- Блок в кторый будем выводить подсказки -->
	<div class="addorgOk" id="help_tender" style="display: none;">
		<div class="del_win" onclick="f_close_help()">×</div>
		<div class="adorgTitBlock" style="height: 272px;"><img id="help_img" src=""></div>
		<div class="tit_help_txt" id="tit_help_txt"></div>
		<div class="adorgTxt" style="padding: 10px 40px 40px;" id="help_txt"></div>
	</div>
	
	
	<?php
		// если  не показвали подсказку выбора типа открывания, показываем её
		if (!isset($_COOKIE['showHelpClick']) and !isset($_SESSION['showHelpClick'])){
			echo <<<HERE
				<!-- Блок в кторый будем выводить подсказку про изменение типов открывания -->
				<div class="addorgOk" id="help_click" style="display: none; max-width: 400px; margin-left: -200px; margin-top: -220px;">
					<div class="del_win" onclick="f_close_help_click()">×</div>
					<div class="adorgTitBlock"><img id="help_img" src="img/addtndr/help/help_click.png"></div>
					<div class="tit_help_txt" id="tit_help_txt">Как изменить тип открывания?</div>
					<div class="adorgTxt" style="padding: 10px 40px 20px;" id="help_txt">Чтобы выбрать тип открывания створок, кликайте по изображению окна.</div>
					<div class="btn_help_click roundBorder" onclick="f_close_help_click()">Понятно</div>
				</div>
HERE;
		}
	?>
	
	<!-- Перед удаление окна справшиваем надо ли удалять -->
	<div class="addorgOk" id="delwin" style="max-width: 350px; margin-left: -175px; margin-top: -156px; display: none;">
		<div class="close_popup" onclick="f_ques_del(false)">×</div>
		<div class="adorgTitBlock">
			<img src="../img/warily.png">
			<div class="adorgTit">Будьте<br>внимательны</div>
		</div>
		<div class="adorgTxt" style="padding:20px 40px">Вы уверены,<br>что хотите удалить окно?</div>
		<div class="btn_help_click roundBorder" id="btn_help_left" onclick="f_ques_del(true)" style="width: 90px; left: calc(50% - 110px); float: left;">Да</div>
		<div class="btn_help_click roundBorder" id="btn_help_right" onclick="f_ques_del(false)" style="width: 90px; left: calc(50% - 70px); float: left;">Нет</div>
	</div>
	
	
	
	<!-- Говорим, что не выбрано окно -->
	<div class="addorgOk" id="nohave_win" style="max-width: 350px; margin-left: -175px; margin-top: -156px; display: none;">
		<div class="close_popup" onclick="$('#nohave_win').css('display','none'); $('.fon_blok').css('z-index','900');">×</div>
		<div class="adorgTitBlock">
			<img src="../img/warily.png">
			<div class="adorgTit">Будьте<br>внимательны</div>
		</div>
		<div class="adorgTxt" style="padding:20px 40px">Вы не выбрали ни одной<br>оконной конструкции</div>
		<div class="btn_help_click roundBorder" onclick="$('#nohave_win').css('display','none'); $('.fon_blok').css('z-index','900');">Закрыть</div>
	</div>

	
	<!-- Говорим, что размеры окна указаны неверно -->
	<div class="addorgOk" id="err_size" style="max-width: 350px; margin-left: -175px; margin-top: -192px; display: none;">
		<div class="close_popup" onclick="$('#err_size').css('display','none'); $('.fon_blok').css('z-index','900');">×</div>
		<div class="adorgTitBlock">
			<img src="../img/warily.png">
			<div class="adorgTit">Будьте<br>внимательны</div>
		</div>
		<div class="adorgTxt" style="padding:20px 40px; max-width: 70%;">Вы не верно указали размеры оконной конструкции.<br><br>Используйте только цифры, все размеры обязательны для заполнения.</div>
		<div class="btn_help_click roundBorder" onclick="$('#err_size').css('display','none'); $('.fon_blok').css('z-index','900');">Закрыть</div>
	</div>


	
	
	
	<div class="block_for_create" id="block_for_create" style="display: none;">
		<div class="top_for_create">
			<div class="close_popup" onclick="f_close_crttndr();">×</div>
			<div class="back" id="back" onclick="f_back_step();" src="img/arradd.png"></div>
			
			<!-- Линейка -->
			<div class="linebox" id="line">
				<div class="connectline"></div>
				<div class="lineblock lba" id="lb1">
					<img class="linetit" id="il1" src="img/addtndr/activline.png" alt="Выбор типа окна" title="Выбор типа окна">
					<div class="linetxtactiv" id="tl1">Выбор<br>типа окна</div>
				</div>
				<div class="lineblock lbp" id="lb2">
					<img class="linetit" id="il2" src="img/addtndr/passiveline.png" alt="Выбор типа створок и размеров" title="Выбор типа створок и размеров">
					<div class="linetxtpassive" id="tl2">Выбор типа створок<br>и размеров</div>
				</div>
				<div class="lineblock lbp" id="lb3">
					<img class="linetit" id="il3" src="img/addtndr/passiveline.png" alt="Выбор дополнительных параметров" title="Выбор дополнительных параметров">
					<div class="linetxtpassive" id="tl3">Выбор доп.<br>параметров</div>
				</div>
			</div>
		</div>
		
		<!-- Окно 1 -->
		<div class="bodystep" id="step1"  style="display: block;">
			<div class="win1 win" id="win1" onclick="f_add_window(1);"><img class="win_parm" src="img/addtndr/win1.png"></img></div>
			<div class="win2 win" id="win2" onclick="f_add_window(2);"><img class="win_parm" src="img/addtndr/win2.png"></img></div>
			<div class="win3 win" id="win3" onclick="f_add_window(3);"><img class="win_parm" src="img/addtndr/win3.png"></img></div>
			<div class="win4 win" id="win4" onclick="f_add_window(4);"><img class="win_parm" src="img/addtndr/win4.png"></img></div>
			<div class="win5 win" id="win5" onclick="f_add_window(5);"><img class="win_parm" src="img/addtndr/win5.png"></img></div>
			<div class="win6 win" id="win6" onclick="f_add_window(6);"><img class="win_parm" src="img/addtndr/win6.png"></img></div>
		</div>
		
		<!-- Окно 2 -->
		<div class="bodystep" id="step2" style="display: none;">
			<div class="body_open">
				<div class="txt_body_open">Выберите тип открывания<br>створок и укажите размеры</div>
				<img class="tip_open" src="" onclick="f_change_open();">
			
				<div class="tit_param" id="txt_shirina">Ширина окна<br>(в миллиметрах)</div>
				<input type="text" id="shirina" class="input_razmer" placeholder="в мм." style="display: block;">
				<div class="tit_param">Высота окна<br>(в миллиметрах)</div>
				<input type="text" id="visota_okna" class="input_razmer" placeholder="в мм." style="display: block;">
				<div class="tit_param" id="tit_vd">Высота двери<br>(в миллиметрах)</div>
				<input type="text" id="visota_dveri" class="input_razmer" placeholder="в мм." style="display: none;">
				<div class="tit_param" id="tit_shd">Ширина двери<br>(в миллиметрах)</div>
				<input type="text" id="shirina_dveri" class="input_razmer" placeholder="в мм." style="display: none;">
			</div>
			<div class="body_param">
				<div class="param">
					<div>Количество камер<span class="ques" onclick="f_show_help('kam_steklo.png');">?</span><br>стеклопакета</div>
					<input type="text" id="kol_steklo" class="input_param" value="2" style="margin-bottom: 25px;">
				</div>
				<div class="param">
					<div>Количество камер<span class="ques" onclick="f_show_help('kam_prof.png');">?</span><br>профиля</div>
					<input type="text" id="kol_profil" class="input_param" value="3" style="margin-bottom: 25px;">
				</div>
				<div class="param">
					<div>Количество<br>таких окон</div>
					<input type="text" id="kolvo" class="input_param" value="1">
				</div>
			</div>
		</div>

		<!-- Окно 3 -->
		<div class="bodystep" id="step3" style="display: none;">
			<div class="block_step3">
				<img class="img_step3" src="img/addtndr/otliv.png" alt="Оконный отлив" title="Оконный отлив">
				<div class="txt_step3">Отлив<span class="ques" onclick="f_show_help('otliv.png');">?</span></div>
				<input type="text" id="otliv" class="input_step3" value="не нужен" onclick="f_otliv_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_otliv">
						<div class="point_select" onclick="f_otliv_sel('не нужен')">не нужен</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('15 см')">15 см</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('20 см')">20 см</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('25 см')">25 см</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('30 см')">30 см</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('35 см')">35 см</div>
						<div class="point_select top_border_point" onclick="f_otliv_sel('40 см')">40 см</div>
					</div>
				</div>
			</div>
			<div class="block_step3">
				<img class="img_step3" src="img/addtndr/otkos.png" alt="Оконный откос" title="Оконный откос">
				<div class="txt_step3">Откосы<span class="ques" onclick="f_show_help('otkos.png');">?</span></div>
				<input type="text" id="otkos" class="input_step3" value="не нужны" onclick="f_otkos_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_otkos">
						<div class="point_select" onclick="f_otkos_sel('не нужны')">не нужны</div>
						<div class="point_select top_border_point" onclick="f_otkos_sel('8-20 см')">8-20 см</div>
						<div class="point_select top_border_point" onclick="f_otkos_sel('21-35 см')">21-35 см</div>
						<div class="point_select top_border_point" onclick="f_otkos_sel('36-50 см')">36-50 см</div>
						<div class="point_select top_border_point" onclick="f_otkos_sel('51-65 см')">51-65 см</div>
					</div>
				</div>
			</div>
			<div class="block_step3">
				<img class="img_step3" src="img/addtndr/podokonnik.png" alt="Оконный подоконник" title="Оконный подоконник">
				<div class="txt_step3">Подоконник<span class="ques" onclick="f_show_help('podok.png');">?</span></div>
				<input type="text" id="podok" class="input_step3" value="не нужен" onclick="f_podok_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_podok">
						<div class="point_select" onclick="f_podok_sel('не нужен')">не нужен</div>
						<div class="point_select top_border_point" onclick="f_podok_sel('20 см')">20 см</div>
						<div class="point_select top_border_point" onclick="f_podok_sel('30 см')">30 см</div>
						<div class="point_select top_border_point" onclick="f_podok_sel('40 см')">40 см</div>
						<div class="point_select top_border_point" onclick="f_podok_sel('50 см')">50 см</div>
						<div class="point_select top_border_point" onclick="f_podok_sel('60 см')">60 см</div>
					</div>
				</div>
			</div>
			<div class="block_step3">
				<img class="img_step3" src="img/addtndr/montage.png" alt="Монтаж пластикового окна" title="Монтаж пластикового окна">
				<div class="txt_step3">Монтаж<span class="ques" onclick="f_show_help('montage');">?</span></div>
				<input type="text" id="montag" class="input_step3" value="не нужен" onclick="f_montage_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_montage">
						<div class="point_select" onclick="f_montage_sel('не нужен')">не нужен</div>
						<div class="point_select top_border_point" onclick="f_montage_sel('монтаж без демонтажа')">монтаж без демонтажа</div>
						<div class="point_select top_border_point" onclick="f_montage_sel('монтаж и демонтаж')">монтаж и демонтаж</div>
					</div>
				</div>
			</div>
			<div class="block_step3">
				<img class="img_step3" src="img/addtndr/moskitnaya-setka.png" alt="Москитная сетка" title="Москитная сетка">
				<div class="txt_step3">Москитная сетка<span class="ques" onclick="f_show_help('moskit.png');">?</span></div>
				<input type="text" id="moscit" class="input_step3" value="не нужна" onclick="f_moscit_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_moscit">
						<div class="point_select" onclick="f_moscit_sel('не нужна')">не нужна</div>
						<div class="point_select top_border_point" onclick="f_moscit_sel('нужна')">нужна</div>
					</div>
				</div>
			</div>
			<div class="block_step3" id="last_block_step3">
				<img class="img_step3" src="img/addtndr/detskij-zamok.png" alt="Детский замок" title="Детский замок">
				<div class="txt_step3">Детский замок<span class="ques" onclick="f_show_help('zamok.png');">?</span></div>
				<input type="text" id="zamok" class="input_step3" value="не нужен" onclick="f_zamok_sel()" readonly>
				<div class="body_select">
					<div class="slide_select" id="slide_zamok">
						<div class="point_select" onclick="f_zamok_sel('не нужен')">не нужен</div>
						<div class="point_select top_border_point" onclick="f_zamok_sel('замок на створку')">замок на створку</div>
						<div class="point_select top_border_point" onclick="f_zamok_sel('ручка с замком')">ручка с замком</div>
						<div class="point_select top_border_point" onclick="f_zamok_sel('съемная ручка')">съемная ручка</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="body_btn">
			<div class="btn_tender roundBorder" id="btnaddwin" onclick="f_next_step();">Выбрать тип створок и указать размеры</div>
		</div>
	
	</div>
	
	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?>
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		<div class="no_wins">
			<div class="img_tit _tender"></div>
			<div>
				<h1 class="tit_text">Разместите тендер<br><?php echo $_SESSION['morph']['gde']; ?></h1>
				<div class="no_action show_off" style="margin-top: 40px;">
					Чтобы разместить тендер, в него необходимо добавить одно или несколько окон, указав желаемые параметры. 
					Чтобы добавить окно к тендеру, нажмите плюс в правом нижнем углу, или кликните Добавить окно ниже.<br><br>
					Если в процессе добавления окна к тендеру у Вас возникнут сложности, 
					пройдите<br><a class="for_txt txt_add_tndr" href="urok/elementy-plastikovyh-okon.php" style="font-size: 16px;">
					бесплатный урок Как выбрать и купить Пластиковые окна <?php echo $_SESSION['morph']['gde']; ?>.</a>
				</div>
				<div class="add_tender roundBorder show_off" data-is-city="<? if( $_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город' ) echo 'false'; else echo 'true'; ?>">Добавить окно</div>
			</div>
			
			<!-- Рекламный баннер на Урок о ПВХ окнах -->
			<div class="action_to_course_for_stati show_off" style="width: initial; margin-bottom: 0;">
				<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
				Пройди БЕСПЛАТНЫЙ урок.
				Узнайте как сэкономить до 10%.
				<a href="urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
			</div>
		</div>
		
		
		<!-- Блок в который будем добавляеть созданные пользователем окна -->
		<div class="win_content"></div>
		
		<div class="add_tender roundBorder" id="make_tender" onclick="f_open_make_tender();" style="display: none; margin-bottom: 20px;">Разместить тендер</div>		
		
		<!-- ФУТЕР -->
		<?php include_once("pattern/footer.php");  ?>
		
	</div>
	<script async src="script/js/tender.js" type="text/javascript"></script><!-- валидация создания тендера -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>