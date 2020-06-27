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
    <meta name="description" content="ВСЕ Акции и Скидки ЗДЕСЬ! Пластиковые окна от оконных компаний <?php echo $_SESSION['morph']['rod']; ?>. Распечатайте купон и получите скидку.">
    <meta name="keywords" content="акции и скидки пвх окна, акции и скидки пластиковые окна, акция, акции, скидки, скидка, пластиковые окна, пвх окна, много скидок, <?php echo $_SESSION['morph']['ime'].', '.$_SESSION['morph']['gde']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Акции и скидки до 30% на пластиковые окна <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
		include_once("pattern/popup.php"); // подключаем popup уведомления
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>
	
	
	<!-- всплывающий блок в котором выводим подроное описание акции и компании её разместившей -->
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
			<span id="popup_phone" class="span_blue"></span><br>
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
			
		
			//если пользователь выбрал город выводим акции с учётом города, иначе говорим, чтобы вывбрал город
			if ($_SESSION['city'] == 'Ваш город' or $_SESSION['city'] == 'Выберите Ваш город'){
				// говорим пользлователю, что бы выбрал город
				?>
					<div class="title_col" style="margin-top: 120px;">
						<div class="img_tit _percent"></div>
						<div>
							<h1 class="tit_text">Акции и скидки</h1>
							<div class="no_action" style="max-width: 400px;">
								Для просмотра Акций и предложений со скидками, выберите Ваш город.
							</div>
						</div>
					</div>
					
					<!-- Рекламный баннер на Урок о ПВХ окнах -->
					<div class="action_to_course_for_stati">
						<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
						Пройди БЕСПЛАТНЫЙ урок.
						Узнайте как сэкономить до 10%.
						<a href="urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
					</div>
					<br>
				<?php					
			}
			else {

				// считаем колличество акций в выбраном городе и если акций нет, говорим об этом
				$total = mysql_result(mysql_query("
					SELECT COUNT(*) 
					FROM `action` 
					WHERE `id_city`=(SELECT `id_city` FROM `city` WHERE `city`='".$_SESSION['city']."') 
					AND UNIX_TIMESTAMP() < UNIX_TIMESTAMP(data_finish)"),0,0);
				if ($total == 0){
					?>
						<div class="title_col" style="margin-top: 120px;">
							<div class="img_tit _percent"></div>
							<div>
								<h1 class="tit_text">Акции и скидки</h1>
								<div class="no_action">
									К сожалению, сейчас на нашем сайте нет 
									действующих акций или предложений со скидоками <?php echo $_SESSION['morph']['gde']; ?>
								</div>
							</div>
						</div>
						<!-- Рекламный баннер на Урок о ПВХ окнах -->
						<div class="action_to_course_for_stati">
							<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
							Пройди БЕСПЛАТНЫЙ урок.
							Узнайте как сэкономить до 10%.
							<a href="urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
						</div>
						<br>
					<?php					
				}
				else{
					
					
					//сохраним в переменную количечтво страниц (число всех акций делим на количество акций на одной странице и округляем до большего)
					$num_pages = ceil($total / $num_elements); 

					//если передаваемая методом гет страница которую необходимо вывести больше количества страниц, то выводим последнюю
					if ($p > $num_pages) $p = $num_pages;
					
					//Стартовая позиция выборки из БД
					$start = ($p - 1) * $num_elements; 
				
					// выбираем из БД акции соответствующие номеру страницы
					$res = mysql_query("
						SELECT `id_action`, `title`, `text`, `data_start`, `data_finish`, `id_org` 
						FROM `action` 
						WHERE `id_city`=(SELECT `id_city` FROM `city` WHERE `city`='".$_SESSION['city']."') 
						AND UNIX_TIMESTAMP() < UNIX_TIMESTAMP(data_finish) 
						ORDER BY `data_start` 
						ASC LIMIT ".$start.",".$num_elements,$db);
					
					// если это первая страница выводим оглавление
					if ($p == 1){
						?>
							<!-- ******** Шапка контента ******** -->
							
							<div class="title_col">
								<div class="img_tit _percent"></div>
								<div>
									<h1 class="tit_text">Акции и скидки</h1>
									<p class="cont_tit_text">
										Как часто от приобретения новых пластиковых окон Вас удерживали цены производителей? 
										Теперь у Вас появилась реальная возможность сэкономить на покупке. Для того чтобы 
										заказать качественные и недорогие окна, воспользуйтесь разделом сайта Акции 
										и скидки от оконных компаний <?php echo $_SESSION['morph']['rod']; ?>.<br><br><br>
									</p>							 
								</div>
							</div>
						<?php
					}
					else {
						?>
							<!-- ******** Шапка контента ******** -->
							
							<div class="title_col">
								<div class="img_tit _percent"></div>
								<div>
									<h1 class="tit_text">Акции и скидки</h1>
								</div>
								<br><br><br>
							</div>
						<?php
					}
					
					//в цикле выводим, полученные из бд акции	
					echo '<div class="action_content">';
					for ($i = 0; $i < mysql_num_rows($res); $i++)
					{
						$id_org = mysql_result($res, $i, "id_org"); // идентификатор организации 
						$id_action = mysql_result($res, $i, "id_action"); // идентификатор акции
						$title = mysql_result($res, $i, "title"); // заголовок
						$text = mysql_result($res, $i, "text"); // содержание акции
						$data_start = f_normdatewithoutyear(mysql_result($res, $i, "data_start")); // дата начала
						$data_finish = f_normdatewithoutyear(mysql_result($res, $i, "data_finish")); // дата окончания
						$orgname = mysql_fetch_assoc(mysql_query("SELECT `name` FROM `orgs` WHERE `idorg`='".$id_org."'",$db));
						
							echo '<div class="action">';
								echo '<h2 class="post_titel" onclick="f_show_action('.$id_action.')">#'.$id_action.': '.$title.'</h2>';
								echo '<p class="post_preview">'.$text.'</p>';
								echo '<p class="post_preview" style="line-height: 1.3;">Размещена компанией <a class="from_acr_to_org" href="okonnaya-kompaniya.php?idorg='.$id_org.'" target="blank">'.$orgname['name'].'</a>, город '.$_SESSION['morph']['ime'].'</b><br>';
								echo 'Можно воспользоваться с <b style="font-size: 16px; color: #676767;">'.$data_start.'</b> по <b style="font-size: 16px; color: #676767;">'.$data_finish.'</b></p>';
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
	<script async src="script/js/showaction.js" type="text/javascript"></script><!-- скрипт показывает подробное орисание акции в всплывающем окне -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>