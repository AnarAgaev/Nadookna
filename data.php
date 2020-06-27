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
	
	// получаем урл страницы
	include_once("script/php/geturl.php"); 

	
	// Сохраняем в переменную ИД залогиненной организации для дальнейшего юзанья
	$idOrg = $_SESSION['idorg'];
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Данные компании</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/logout.js" type="text/javascript"></script><!-- Выход из аккаунта -->
	
</head>
<body> 


	<?php 
		include_once("pattern/dopnavorg.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>


	<div class="wrapper">
		<?php
			/* *****************    Навигация     ***************** */
			include_once("pattern/navigationorg.php");
			
			
			/* *****************    Если пришла переменная  $_POST['editdata'], редактируем данные компании в БД    ***************** */
			if (isset($_POST['editdata']) && $_POST['editdata'] == true ) { 
				$name = $_POST['name'];
				$about = $_POST['about'];
				$adres = $_POST['adres'];
				$timework = $_POST['timework'];
				$phone = $_POST['phone'];
				$phone2 = $_POST['phone2'];
				$phone3 = $_POST['phone3'];
				$phone4 = $_POST['phone4'];
				$phone5 = $_POST['phone5'];
				$email = $_POST['email'];
				$site = $_POST['site'];
				$profil = $_POST['profil'];
				$furnitura = $_POST['furnitura'];
				
				// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
				if (get_magic_quotes_gpc()) {
					$name = stripcslashes($name);
					$about = stripcslashes($about);
					$adres = stripcslashes($adres);
					$timework = stripcslashes($timework);
					$phone = stripcslashes($phone);
					$phone2 = stripcslashes($phone2);
					$phone3 = stripcslashes($phone3);
					$phone4 = stripcslashes($phone4);
					$phone5 = stripcslashes($phone5);
					$email = stripcslashes($email);
					$site = stripcslashes($site);
					$profil = stripcslashes($profil);
					$furnitura = stripcslashes($furnitura);
				}
				// Экранируем спецсимволы во всех переменных
				$name = mysql_real_escape_string($name);
				$about = mysql_real_escape_string($about);
				$adres = mysql_real_escape_string($adres);
				$timework = mysql_real_escape_string($timework);
				$phone = mysql_real_escape_string($phone);
				$phone2 = mysql_real_escape_string($phone2);
				$phone3 = mysql_real_escape_string($phone3);
				$phone4 = mysql_real_escape_string($phone4);
				$phone5 = mysql_real_escape_string($phone5);
				$email = mysql_real_escape_string($email);
				$site = mysql_real_escape_string($site);
				$profil = mysql_real_escape_string($profil);
				$furnitura = mysql_real_escape_string($furnitura);
				
				//удаляем лишние пробелы
				$name = trim($name);
				$about = trim($about);
				$adres = trim($adres);
				$timework = trim($timework);
				$phone = trim($phone);
				$phone2 = trim($phone2);
				$phone3 = trim($phone3);
				$phone4 = trim($phone4);
				$phone5 = trim($phone5);
				$email = trim($email);
				$site = trim($site);
				$profil = trim($profil);
				$furnitura = trim($furnitura);
				
				// Изменяем данные в БД
				$rslt = mysql_query("UPDATE `orgs` SET `name`='$name',`email`='$email',`url`='$site',`adds`='$adres',`info`='$about',`wtime`='$timework',`phone1`='$phone',`phone2`='$phone2',`phone3`='$phone3',`phone4`='$phone4',`phone5`='$phone5',`profil`='$profil',`furnitura`='$furnitura' WHERE `idorg` = '$idOrg'",$db);
			
				if ($rslt != FALSE){
					?>
						<!-- полупрозрачный блок, расятнутый на всю область экрана - полдожка под всплывающие формы и popup окна -->
						<div class="fon_blok"  onclick="f_all_close()" style="display: block;"></div>
					
						<!-- Всплывающее окно данные компании удачно изменены -->
						<div class="popUpOk" style="display: block;" id="colMeOk">
							<div class="close_popup" onclick="f_all_close()">×</div>
							<div class="tipPopUp"><img src="../img/ok.png"></div>
							<div class="textPopUp">
								Изменения в данных Вашей<br>
								компании успешно схранены<br>
							</div>
						</div>	
					<?php
				}
			}
		?>
	
	
		<div class="content" style="padding-top: 0;">
		
			<?php
				// проверяем залогинена ли организация чьи данные неоходимо вывести на экран
				if (!isset($_SESSION['idorg'])){
					// Говорим, что для просмотра данных необходимо выполнить вход
						?>
							<div class="title_vhod">
								<div>
									<img class="vhod" src="../img/order_index.png">
									<h1 class="tit_date">На этой странице Вы можете посмотреть и отредактировать данные своей оконной компании.</h1>
								</div>
								<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px; margin-top: 50px;">
									Для просмотра и редактирования,<br>необходимо войти в личный кабинет.<br>
									<a class="for_txt" href="login.php">Войти в личный кабинет</a>
								</p>
							</div>

						<?php	
				}
				else {
						// Получим данные компании
						$row = mysql_fetch_assoc(mysql_query("SELECT `name`, `email`, `idcity`, `url`, `adds`, `info`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`, `profil`, `furnitura` FROM `orgs` WHERE `idorg`='$idOrg'",$db));
						$idcityorg = $row['idcity'];
						$rowcity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcityorg'",$db));
						// Создаем адрес организации для того чтобы потом использовать его при создании карты и внесения на нее метки организации
						// полседний параметр GET - &results=1 для того чтобы из всех полученныех точег геокодирования в вывод брались только первые координаты
						$adres_for_ymap = 'Россия '.$rowcity['city'].' '.$row['adds'].'&results=1';
						$adres_for_ymap = str_replace (' ','+',$adres_for_ymap);
					?>
					
						<div class="tit_for_map">
							<h1 class="dataTitle"><?php echo $row['name']; ?></h1>
							<h2 class="underTitle">г. <?php echo $rowcity['city']; ?></h2>
						</div>
					
						<!--******** выводим блок в коттором в последствии будет размещаться карта Яндекса ********-->
						<div class="ymap" id="map"></div>
							
						<div class="dateContent">
							<p class="about"><?php if($row['info'] == '') echo '<span class="addabout">Добавьте описание Вашей компании</span>'; else echo $row['info']; ?></p>
							<p class="txt">
								<span class="titelPointData">Адрес: </span><?php echo $row['adds']; ?><br>
								<span class="titelPointData">Режим работы: </span><?php echo $row['wtime']; ?><br>
								
								<br>
								<?php
									echo '<span class="span_blue">';
										if ($row['phone1'] != '') echo $row['phone1'].'<br>';
										if ($row['phone2'] != '') echo $row['phone2'].'<br>';
										if ($row['phone3'] != '') echo $row['phone3'].'<br>';
										if ($row['phone4'] != '') echo $row['phone4'].'<br>';
										if ($row['phone5'] != '') echo $row['phone5'];
									echo '</span>';
								?>
								<br>
								
								<span class="titelPointData">Емэйл: </span><?php echo $row['email']; ?><br>
								<span class="titelPointData">Сайт организации: </span><?php echo $row['url']; ?><br><br>
								<span class="titelPointData">Используемый профиль: </span><?php echo $row['profil']; ?><br>
								<span class="titelPointData">Используемая фурнитура:  </span><?php echo $row['furnitura']; ?>
							</p>
							<a class="editData roundBorder" href="editdata.php">Редактировать данные</a>
						</div>
					<?php
				}
			?>
			<div class="footer">
				&copy; Надоокна 2014-2017&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
			</div>		
		</div>
	</div>
	
	<script async src="script/js/edittagcontent.js" type="text/javascript"></script><!-- увеличиваем высоту контента для мобильных устройств -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<!-- подключение модулей яндекс карты --> 
	<script async src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
	<script async src="http://yandex.st/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	
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