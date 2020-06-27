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
	
	// Получим данные компании
	if(isset($_GET['idorg'])){
		
		$idorg = $_GET['idorg'];
		$row = mysql_fetch_assoc(mysql_query("SELECT `name`, `email`, `idcity`, `url`, `adds`, `info`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`, `profil`, `furnitura` FROM `orgs` WHERE `idorg`='$idorg'",$db));
		
		if ($row == '') $idorg = 'eror';
		else {
			$idcityorg = $row['idcity'];
			$rowcity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcityorg'",$db));
			$res = mysql_query("SELECT `user`, `fromsite`, `url`, `date`, `review` FROM `reviews` WHERE `idorg`='$idorg' AND `correct`='1' ORDER BY `date` DESC",$db); //Получаем отзывы об оконной компании
		}
		// Создаем адрес организации для того чтобы потом использовать его при создании карты и внесения на нее метки организации
		// полседний параметр GET - &results=1 для того чтобы из всех полученныех точег геокодирования в вывод брались только первые координаты
		$adres_for_ymap = 'Россия '.$rowcity['city'].' '.$row['adds'].'&results=1';
		$adres_for_ymap = str_replace (' ','+',$adres_for_ymap);
		
	}
	else $idorg = 'eror';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="<?php echo $row['name']; ?>. Справочник компаний, фирм и организаций устанавливающих Пластиковые ПВХ окна.">
    <meta name="keywords" content="<?php echo $row['name']; ?>, оконные компании <?php echo $_SESSION['morph']['gde']; ?>, справочник, каталог оконных фирм, пластиковые окна, пвх окна, <?php echo $_SESSION['morph']['ime'].', '.$_SESSION['morph']['gde']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title><?php echo $row['name'].' '; echo $_SESSION['morph']['ime']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="stylesheet" type="text/css" href="style/org.css" />
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

	<!-- полупрозрачный блок, расятнутый на всю область экрана - подложка под всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>
	
	<!-- Всплывающее окно данные компании удачно изменены -->
	<div class="popUpOk" id="colMeOk">
		<div class="close_popup" onclick="f_all_close()">×</div>
		<div class="tipPopUp"><img src="../img/ok.png" alt="Хорошо"></div>
		<div class="textPopUp">
			Спасибо за Ваше мнение.<br>
			Отзыв будет размещён<br>
			после проверки модератером.
		</div>
	</div>	

	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
			include_once("pattern/normalizedate.php"); // приведение даты к нормальному виду
		?>
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>


		<div class="content">
		
			<?php
				// если ИД организации не передавался или организации с переданным ИД нет в БД, говорим об этом
				if ($idorg == 'eror'){
					// Говорим, что для просмотра данных необходимо выполнить вход
						?>
							<div class="title_vhod">
								<div>
									<img class="vhod" src="../img/book.png" alt="Ошибка идентификатора оконной компании">
									<h1 class="tit_date">Ошибка идентификатора<br>оконной компании</h1>
								</div>
								<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px; margin-top: 50px;">
									Запрашиваемой оконной организации<br>нет в справочнике<br>
									<a class="for_txt" href="okonnye-kompanii.php">Перейти в оконный справочник</a>
								</p>
							</div>

						<?php	
				}
				else {
					?>
						
						<div class="tit_for_map">
							<h1 class="dataTitle"><?php echo $row['name']; ?></h1>
							<h2 class="underTitle">г. <?php echo $rowcity['city']; ?></h2>
						</div>
						
						<!--******** выводим блок в коттором в последствии будет размещаться карта Яндекса ********-->
						<div class="ymap" id="map"></div>
						
						<div class="dateContent">
							<?php if($row['info'] != '') echo '<p class="about">'.$row['info'].'</p>'; ?>
							<p class="txt">
								<span class="titelPointData">Адрес: </span><?php echo $row['adds']; ?><br>
								<?php if($row['wtime'] != '') echo '<span class="titelPointData">Режим работы: </span>'.$row['wtime'].'<br>'; ?>
								
								<br>
								<?php
									echo '<span class="popup_phones" style="margin-left: 0;">';
										if ($row['phone1'] != '') echo $row['phone1'].'<br>';
										if ($row['phone2'] != '') echo $row['phone2'].'<br>';
										if ($row['phone3'] != '') echo $row['phone3'].'<br>';
										if ($row['phone4'] != '') echo $row['phone4'].'<br>';
										if ($row['phone5'] != '') echo $row['phone5'];
									echo '</span>';
								?>
								<br>
								
								<?php if($row['email'] != '') echo '<span class="titelPointData">Емэйл: </span>'.$row['email'].'<br>'; ?>
								<?php if($row['url'] != '') echo '<span class="titelPointData">Сайт организации: </span>'.$row['url'].'<br><br>'; ?>
								<?php if($row['profil'] != '') echo '<span class="titelPointData">Используемый профиль: </span>'.$row['profil'].'<br>'; ?>
								<?php if($row['furnitura'] != '') echo '<span class="titelPointData">Используемая фурнитура:  </span>'.$row['furnitura']; ?>
							</p>
							<a name="review"></a>
							<div class="review" style="max-width: 700px; margin: 0 auto;">
								
								<h3>Отзывы и оценки</h3>
								<div class="titrev">Напишите свой отзыв</div>
								<div class="errEditData" id="no_name_rev">Укажите Ваше имя</div>
								<input type="text" id="namerev" class="input_namerev" placeholder="Ваше имя" style="left: 0;">
								<div class="errEditData" id="no_txt_rev">Напишите отзыв</div>
								<textarea id="text_rev" class="text_rev" placeholder="Ваш отзыв о <?php echo $row['name']; ?>"></textarea>
								<div class="btn_cont"><div class="save_rev roundBorder" onclick="f_add_review(<?php echo $_GET['idorg']; ?>)">Оставить отзыв</div></div>
								
								<div class="revcont">
									<?php
										for ($i = 0; $i < mysql_num_rows($res); $i++)
										{
											echo '<div class="headrev">';
												echo '<img class="imgrev" src="img/revicon.png" alt="Отзыв">';
												echo '<div class="namerev">'.mysql_result($res, $i, "user").'</div>';
												echo '<div class="daterev">'.f_normalizedate(mysql_result($res, $i, "date")).'</div>';
											echo '</div>';
											echo '<div class="reviewrev">'.mysql_result($res, $i, "review").'</div>';
											if(mysql_result($res, $i, "fromsite") != '') echo '<a class="urlrev" href="'.mysql_result($res, $i, "url").'" target="blank" rel="nofollow">Читать полностью на '.mysql_result($res, $i, "fromsite").'</a>'; 
										}
									?>
								</div>
								
							</div>

						</div>
					<?php
				}
			?>
		</div>

		<!--********   ФУТЕР   *********-->
		<?php include_once("pattern/footer.php");  ?>
	
		
	</div>
	
	
	<!-- основной скрип в котором лежат функции использоуемые на каждой странице -->
	<script async src="script/js/script.js" type="text/javascript"></script> 
	<!-- скрипт который добавляет отзыв к оконной компании -->
	<script async src="script/js/addreview.js" type="text/javascript"></script> 
	<?php
		/*  подключение модулей яндекс карты  */
		if (isset($_SESSION['city'])) echo '<script async src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>'; 
	?>
	
	<!--******** выводим Яндекс карту ********-->
	<script async type="text/javascript"><!--   Скрипт для отображения карты с нанесенной на ней меткой полученной методом геокодирования от Яндекс Карты    -->
		window.onload = function () {
			ymaps.ready(function () {
				// Создание экземпляра карты
				var map = new ymaps.Map('map', {
					center: [0,0],
					zoom: 17
				});
				window.myMap = map;
			  // Загрузка YMapsML-файла
				ymaps.geoXml.load("http://geocode-maps.yandex.ru/1.x/?geocode= <?php echo $adres_for_ymap;  ?>")
					 .then(function (res) {
						 res.geoObjects.each(function (item) {
							 var bounds = item.properties.get("boundedBy");
							 // Добавление геообъекта на карту
							 myMap.geoObjects.add(item);
							 // Изменение области показа карты
							 myMap.setBounds(bounds);
							 myMap.setType('yandex#map');
							 // если у организации нет адреса занчит на карте не нужет такой большой масштаб - делаем его меньше
							 myMap.setZoom(17, {duration: 0});
							 //myMap.behaviors.enable('scrollZoom'); // зум карты с помощью колёсика мыши
							 myMap.controls.add('smallZoomControl', { left: 20, top: 170 }) // маленькая (только плюс и минус) линейка изменения масштаба
							 // myMap.controls.add('zoomControl', { left: 10, top: 50 });  // показывает линейку изменения мосштаба
							 // myMap.controls.add('mapTools', { left: 10});     // страндартные кнопки рука, увеличить, измерение расстояния (линейка)
						
						});
					 },
					 function (error) {   // Вызывается в случае неудачной загрузки YMapsML-файла
						 alert("При загрузке YMapsML-файла произошла ошибка: " + error);
					 });
			});
		}
	</script>	

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>