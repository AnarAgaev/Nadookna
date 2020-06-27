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
	
	// popup баннер лежит в pattern/popup.php
	if (!isset($_COOKIE['popupSetTender']) and !isset($_SESSION['popupSetTender'])){
		SetCookie("popupSetTender","true",time()+31536000,"/",".nadookna.com");	
	}
	
	// подключаем БД
	include_once("pattern/dbconnect.php");
	
	// получаем урл страницы
	include_once("script/php/geturl.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Все оконные компании <?php echo $_SESSION['morph']['rod']; ?> ЗДЕСЬ. Справочник фирм производителей пластиковых ПВХ окон. <?php if(isset($_GET['page'])) echo ' Страница '.$_GET['page'].'.'; ?>">
    <meta name="keywords" content="оконные компании <?php echo $_SESSION['morph']['gde']; ?>, справочник, каталог оконных фирм, пластиковые окна, пвх окна, <?php echo $_SESSION['morph']['ime'].', '.$_SESSION['morph']['gde']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Справочник оконных фирм <?php echo $_SESSION['morph']['rod']; ?>. <?php if(isset($_GET['page'])) echo ' Страница '.$_GET['page'].'.'; ?></title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php
	
		/************************ 
			ТОЛЬКО на этой странице подключаем срипт Яндекс в любом случае, т.к. у нас есть яднекс карты для которых он нужен,
			a если его подключить дважды, то он не сработает и город пользователя не будет определен.
			Если не использовать else, то скрипт подключится один раз.
		************************/
		
		if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url 
		else echo '<script async src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>';
	?>

</head>
<body> 
	
	<?php 
		include_once("pattern/popup.php"); // подключаем popup уведомления
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - подложка под всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>
	
	
	<!-- всплывающий блок в котором выводим подробное описание оконной компании -->
	<div class="popupOrg" id="popupOrg">
		<div class="top_popup" style="text-align: left; border-bottom: none;">
			<div class="close_popup" onclick="f_all_close()">×</div>
			<h2 class="popup_titel_org" id="popup_titel_org"></h2>
			<div class="adrs_org" id="adrs_org"></div>
		</div>
		<div class="ymaporg" id="map"></div><!-- блок в который динамически подгруаем карты Яндекса ********-->
		<div class="text_popup" id="text_popup" style="margin-top: 20px; margin-bottom: 10px;"></div>
		<span class="popup_phones" id="phones"></span>
		<!-- В этот контейрен будем динамически добавлять режим работы, емэйл, сайт, профиль и фурнитуру -->
		<p class="cont_popup" id="cont_popup"></p>
		<!-- Блок с отзывами -->
		<div class="review">
			<h3>Отзывы и оценки</h3>
			<div class="revcont" id="revcont"></div>
			<a class="adrev roundBorder" id="adrev" href=""></a>
		</div>
	</div>
	
	
	<!-- всплывающий блок в котором выводим подроное описание акции -->
	<div class="popupAction" id="popupAction">
		<div class="top_popup">
			<div class="close_popup" onclick="f_all_close()">×</div>
			<h2 class="popup_titel" id="popup_titel"></h2>
		</div>
		<div class="text_popup" id="text_popup_act"></div>
		<div class="from_to_popup">Можно воспользоваться <b style="font-size: 16px; color: #676767;">с <span id="data_start"></span> по <span id="data_finish"></span></b></div>
		
		<p class="cont_popup">
			<a id="popup_name" href="" target="blank"></a>
			<span class="akcent_popup">Адрес: </span><span id="popup_adres"></span><br>
			<span class="akcent_popup">Режим работы: </span><span id="popup_timework"></span><br>
			<span class="akcent_popup">Емэйл: </span><span id="popup_email"></span><br>
			<span id="popup_phone" class="span_blue"></span>
			<a class="popup_name roundBorder" href="akcii-i-skidki-na-plastikovye-okna.php">Больше предложений в разделе Акции и Скидки</a><br>
		</p>
	</div>
	

	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
			include_once("pattern/normalizedate.php"); // приведение даты к нормальному виду
			
			echo <<<HERE
				<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
				<div id="vacuumBlock"></div>
HERE;

			
			// ****************           ПОСТРАНИЧНЫЙ ВЫВОД             *********************
				
			if(!isset($_GET['page'])){//если переменная с номером страницы не передавалась, значит пользователь зашел первый раз, т.е. на первую страницу
					$p = 1;
			}
			else{  
				// обрататываем переменную и защищаем от отрицательных занчений
				$p = addslashes(strip_tags(trim($_GET['page'])));
				if($p < 1) $p = 1;
			}
				
			// *******       устанавливаем число записей выводимых на странице       *******	
			$num_elements = 7; 
			
		
			//если пользователь выбрал город, выводим компании с учётом города, иначе говорим, чтобы вывбрал город
			if ($_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город'){
				// говорим пользлователю, что бы выбрал город
				?>
					<div class="title_col" style="margin-top: 120px;">
						<div class="img_tit _blog"></div>
						<div>
							<h1 class="tit_text">Справочник оконных компаний</h1>
							<div class="no_action" style="max-width: 400px;">
								Для просмотра информации об оконных компаниях, выберите Ваш город.
							</div>
						</div>
					</div>
					
					<!-- Рекламный баннер на Урок о ПВХ окнах -->
					<div class="action_to_course_for_stati">
						<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
						Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
						Узнайте как сэкономить до 10%.
						<a href="urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
					</div>
					<br>
				<?php					
			}
			else {

				// считаем колличество компаний в выбраном городе и если компаний нет, говорим об этом
				$total = mysql_result(mysql_query("
					SELECT COUNT(*) 
					FROM `orgs` 
					WHERE `idcity`=(SELECT `id_city` FROM `city` WHERE `city`='".$_SESSION['city']."')"),0,0);
					
				if ($total == 0){
					?>
						<div class="title_col" style="margin-top: 120px;">
							<div class="img_tit _blog"></div>
							<div>
								<h1 class="tit_text">Справочник оконных компаний <?php echo $_SESSION['morph']['rod']; ?></h1>
								<div class="no_action">
									К сожалению, на сайте пока не зарегистрировалась 
									ни одна оконная компания из <?php echo $_SESSION['morph']['rod']; ?>
								</div>
							</div>
						</div>
						<!-- Рекламный баннер на Урок о ПВХ окнах -->
						<div class="action_to_course_for_stati">
							<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
							Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
							Узнайте как сэкономить до 10%.
							<a href="urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
						</div>
						<br>
					<?php					
				}
				else{
					
					//сохраним в переменную количечтво страниц (число всех компаний делим на количество компаний на одной странице и округляем до большего)
					$num_pages = ceil($total / $num_elements); 

					//если передаваемая методом гет страница которую необходимо вывести больше количества страниц, то выводим последнюю
					if ($p > $num_pages) $p = $num_pages;
					
					//Стартовая позиция выборки из БД
					$start = ($p - 1) * $num_elements; 
				
					// выбираем из БД компании соответствующие номеру страницы
					$res = mysql_query("
						SELECT  `idorg` ,  `name` ,  `email` ,  `url` ,  `adds` ,  `info` ,  `wtime` ,  `phone1` ,  `phone2` ,  `phone3` ,  `phone4` ,  `phone5` ,  `profil` ,  `furnitura` 
						FROM  `orgs` 
						WHERE  `idcity` = ( 
							SELECT  `id_city` 
							FROM  `city` 
							WHERE  `city` =  '".$_SESSION['city']."' )
						AND `active` = 1
						ORDER BY  `rang` DESC 
						LIMIT ".$start." , ".$num_elements,$db);
					
					// если это первая страница выводим оглавление
					if ($p == 1){
						?>
							<!-- ******** Шапка контента ******** -->
							
							<div class="title_col">
								<div class="img_tit _blog"></div>
								<div>
									<h1 class="tit_text">Справочник оконных компаний <?php echo $_SESSION['morph']['rod']; if(isset($_GET['page'])) echo ' cтр. '.$_GET['page'];?></h1>
									<p class="cont_tit_text">
										Самый простой и удобный способ найти оконную компанию - воспользоваться нашим справочником. 
										Множество людей, ежедневно, узнают адреса и телефоны, читают и оставляют отзывы о производителях 
										пластиковых окон <?php echo $_SESSION['morph']['rod']; ?>.<br><br><br>
									</p>							 
								</div>
							</div>
						<?php
					}
					else {
						?>
							<!-- ******** Шапка контента ******** -->
							
							<div class="title_col">
								<div class="img_tit _blog"></div>
								<div>
									<h1 class="tit_text">Справочник оконных компаний <?php echo $_SESSION['morph']['rod']; if(isset($_GET['page'])) echo ' cтр. '.$_GET['page'];?></h1>
								</div>
								<br><br><br>
							</div>
						<?php
					}
					
					//в цикле выводим, полученные из бд компании	
					echo '<div class="action_content">';
					for ($i = 0; $i < mysql_num_rows($res); $i++)
					{
						$idorg = mysql_result($res, $i, "idorg"); // идентификатор компании
						$name = preg_replace("/ {2,}/"," ",mysql_result($res, $i, "name")); // наименование
						$email = mysql_result($res, $i, "email"); // емэйл
						$url = mysql_result($res, $i, "url"); // сайт
						$adds = mysql_result($res, $i, "adds"); // адрес
						$info = mysql_result($res, $i, "info"); // краткая информация о компании
						$wtime = mysql_result($res, $i, "wtime"); // рабочее время
						$phone1 = mysql_result($res, $i, "phone1"); // телефон 1
						$phone2 = mysql_result($res, $i, "phone2"); // телефон 1
						$phone3 = mysql_result($res, $i, "phone3"); // телефон 1
						$phone4 = mysql_result($res, $i, "phone4"); // телефон 1
						$phone5 = mysql_result($res, $i, "phone5"); // телефон 1
						$profil = mysql_result($res, $i, "profil"); // используемый оконный профиль
						$furnitura = mysql_result($res, $i, "furnitura"); // используемая фурнитура
						
						// смотрим есть ли отзывы
						$count_rev = mysql_query("SELECT COUNT(*) FROM `reviews` WHERE `idorg`='$idorg'",$db); 
						
						
						echo '<div class="action">';
							echo '<h2 class="post_titel" onclick="f_show_org('.$idorg.')">'.$name.'</h2>';
							echo '<a class="t_blanc" target="blank" href="okonnaya-kompaniya.php?idorg='.$idorg.'"><img src="img/targetblanc.png" alt="Оконная компания"></a>';
							if (mysql_result($count_rev, 0) != 0) {
								include_once("script/php/morphnum.php"); // подключаем морфинг для слова отзывы
								echo '<div class="count_rev" onclick="f_show_org('.$idorg.')">';
								echo mysql_result($count_rev, 0).' ' . true_wordform(mysql_result($count_rev, 0), 'отзыв', 'отзыва', 'отзывов');
								echo '</div>';
							}
							if ($adds != '') echo '<p class="post_preview" style="font-size: 16px; color: #717171;"><b>'.$adds.'</b></p>';
							if ($info != '') echo '<p class="post_preview">'.$info.'</p>';
							
							// смотрим есть ли акции и скидки
							$count_act = mysql_query("SELECT COUNT(*) FROM `action` WHERE `id_org`='$idorg' AND UNIX_TIMESTAMP() < UNIX_TIMESTAMP(`data_finish`)",$db); 
							if (mysql_result($count_act, 0) != 0) {
								// получаем ид самой "свежей" акции
								$idact = mysql_fetch_assoc(mysql_query("SELECT `id_action` FROM `action` WHERE `id_org`='$idorg' ORDER BY `data_start` DESC LIMIT 1",$db));
								echo '<div class="open_action" onclick="f_show_action('.$idact['id_action'].')">';
								echo 'Скидки этой компании';
								echo '</div>';
							}
							
							echo '<p class="post_preview" style="line-height: 1.4;">';
								if ($wtime != '') echo '<div class="wtime"><span style="color: #4285f4;">Режим работы:</span> '.$wtime.'</div>';
								echo '<span class="span_blue">';
									if ($phone1 != '') echo $phone1.'<br>';
									if ($phone2 != '') echo $phone2.'<br>';
									if ($phone3 != '') echo $phone3.'<br>';
									if ($phone4 != '') echo $phone4.'<br>';
									if ($phone5 != '') echo $phone5;
								echo '</span>';
							echo '</p>';
						echo '</div>';
					}
					echo '</div>';
					
					// Навигация по страница с акциями	
					if ($num_pages != 1){
						//подключаем функцию формирующую строку ссылок на страницы с другими акциями
						include ('script/php/navaction.php'); 
						//выодим строку ссылок на другие страницы с акциямми
						echo '<div class="navaction"><div class="straction">Страницы:</div>'.GetNav($p, $num_pages).'</div>';
					} 
				} 
			}
?>		
		
		
		<!--********   ФУТЕР   *********-->
		<?php include_once("pattern/footer.php");  ?>
	
		
	</div>
	
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
	<script async src="script/js/showorg.js" type="text/javascript"></script><!-- скрипт показывает подробное орисание оконной компании в всплывающем окне -->  
	<script async src="script/js/showaction.js" type="text/javascript"></script><!-- скрипт показывает подробное орисание акции в всплывающем окне -->  
	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>