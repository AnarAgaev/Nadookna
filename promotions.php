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
	<title>Акции и Скидки</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script async src="script/js/logout.js" type="text/javascript"></script><!-- Выход из аккаунта -->

</head>
<body> 

	
	<?php 
	
		/*   Если организация залогинена показываем кнопку добавить акцию  */
		if(isset($_SESSION['idorg'])) echo '<a class="addActionButton" href="addaction.php"><img src="img/plusaction.png" alt="Добавить акцию" title="Добавить акцию"></a>'; 
		
		// подключаем выезжащдий слева блок с дополнительной навигацией
		include_once("pattern/dopnavorg.php"); 
		
	?>
	
	
	
	<div class="wrapper">
	
		<?php
			/* *****************    Навигация     ***************** */
			include_once("pattern/navigationorg.php");
			
			
			/* *****************    Если пришла переменная  $_POST['editdata'], редактируем данные акции в БД    ***************** */
			if (isset($_POST['editaction']) && $_POST['editaction'] == true &&  isset($_POST['id_action'])) { 
			
				$id = $_POST['id_action']; // идентификатор редактируемой акции
				$name = $_POST['name']; // заголовок акции
				$about = $_POST['about']; // описание акции
				$dsa = $_POST['dsa']; // дата начала проведения акции
				$dfa = $_POST['dfa']; // дата оконончания акции
				
				// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
				if (get_magic_quotes_gpc()) {
					$id = stripcslashes($id);
					$name = stripcslashes($name);
					$about = stripcslashes($about);
					$dsa = stripcslashes($dsa);
					$dfa = stripcslashes($dfa);
				}
				// Экранируем спецсимволы во всех переменных
				$id = mysql_real_escape_string($id);
				$name = mysql_real_escape_string($name);
				$about = mysql_real_escape_string($about);
				$dsa = mysql_real_escape_string($dsa);
				$dfa = mysql_real_escape_string($dfa);
				
				//удаляем лишние пробелы
				$id = trim($id);
				$name = trim($name);
				$about = trim($about);
				$dsa = trim($dsa);
				$dfa = trim($dfa);
				
				//переформатируем дату на дату которую можно вставить в базу yyyy-mm-dd
				$dt_start = explode(".",$dsa); //разбиваем строку с разделителем точка на элементы массива
				$dsa = $dt_start[2]."-".$dt_start[1]."-".$dt_start[0]; //собираем новую дату с разделителем тире
				
				//переформатируем дату на дату которую можно вставить в базу yyyy-mm-dd
				$dt_finish = explode(".",$dfa); //разбиваем строку с разделителем точка на элементы массива
				$dfa = $dt_finish[2]."-".$dt_finish[1]."-".$dt_finish[0]; //собираем новую дату с разделителем тире
				
				// проверяем залогинена ли организация чью акцию мы должны отредактировать
				if (!isset($_SESSION['idorg'])){
					?>
						<script async type="text/javascript">
							$(document).ready(function() { alert('Для редактирования Акции выполните Вход в свой аккаунт. Изменения не сохранены!');});
						</script>
					<?php
				}
				else {
					// проверяем принадлежит ли акция которую будем изменять залогиненноq организации
					$idOrgRow = mysql_fetch_array(mysql_query("SELECT `id_org` FROM `action` WHERE `id_action`='$id'",$db));
					
					if ($idOrgRow['id_org'] == $_SESSION['idorg']){
						// Изменяем данные в БД
						$rslt = mysql_query("UPDATE `action` SET `title`='$name',`text`='$about',`data_start`='$dsa',`data_finish`='$dfa' WHERE `id_action`='$id'",$db);
					}
					else {
						?>
							<script async type="text/javascript">
								$(document).ready(function() { alert('Редактируемая акция не принадлежит залогиненной организации! Изменения не сохранены!');});
							</script>
						<?php
					}
				}
				
				// Если акция удачно отредактирована в БД, говорим пользователю об этом
				if ($rslt != FALSE){
					?>
						<!-- полупрозрачный блок, расятнутый на всю область экрана - полдожка под всплывающие формы и popup окна -->
						<div class="fon_blok"  onclick="f_all_close()" style="display: block;"></div>
					
						<!-- Всплывающее окно данные компании удачно изменены -->
						<div class="popUpOk" style="display: block;" id="colMeOk">
							<div class="close_popup" onclick="f_all_close()">×</div>
							<div class="tipPopUp"><img src="../img/ok.png"></div>
							<div class="textPopUp">
								Изменения данных Акции<br>
								успешно схранены<br>
							</div>
						</div>	
					<?php
				}
			}
			
			
			
			
			
			
			
			
			
			/* *****************    Если пришла переменная  $_POST['addaction'], добавляем новую акция для залогиненной организации    ***************** */
			if (isset($_POST['addaction']) && $_POST['addaction'] == true) { 
			
				$name = $_POST['name']; // заголовок акции
				$about = $_POST['about']; // описание акции
				$dsa = $_POST['dsa']; // дата начала проведения акции
				$dfa = $_POST['dfa']; // дата оконончания акции
				
				
				// Получаем идентификатор города в котором будет проходить Акция
				$city = $_SESSION['city'];
				$idCityRow = mysql_fetch_array(mysql_query("SELECT `id_city` FROM `city` WHERE `city`='$city'",$db));
				$idcity = $idCityRow['id_city'];
				
				
				// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
				if (get_magic_quotes_gpc()) {
					$name = stripcslashes($name);
					$about = stripcslashes($about);
					$dsa = stripcslashes($dsa);
					$dfa = stripcslashes($dfa);
				}
				// Экранируем спецсимволы во всех переменных
				$name = mysql_real_escape_string($name);
				$about = mysql_real_escape_string($about);
				$dsa = mysql_real_escape_string($dsa);
				$dfa = mysql_real_escape_string($dfa);
				
				//удаляем лишние пробелы
				$name = trim($name);
				$about = trim($about);
				$dsa = trim($dsa);
				$dfa = trim($dfa);
				
				//переформатируем дату на дату которую можно вставить в базу yyyy-mm-dd
				$dt_start = explode(".",$dsa); //разбиваем строку с разделителем точка на элементы массива
				$dsa = $dt_start[2]."-".$dt_start[1]."-".$dt_start[0]; //собираем новую дату с разделителем тире
				
				//переформатируем дату на дату которую можно вставить в базу yyyy-mm-dd
				$dt_finish = explode(".",$dfa); //разбиваем строку с разделителем точка на элементы массива
				$dfa = $dt_finish[2]."-".$dt_finish[1]."-".$dt_finish[0]; //собираем новую дату с разделителем тире
				
				// проверяем залогинена ли организация чью акцию мы должны отредактировать
				if (!isset($_SESSION['idorg'])){
					?>
						<script async type="text/javascript">
							$(document).ready(function() { alert('Для добавления Акции выполните Вход в свой аккаунт. Акция не добавлена!');});
						</script>
					<?php
				}
				else {
					// Добавляем акцию в БД
					$idorg = $_SESSION['idorg'];
					$rslt = mysql_query("INSERT INTO `action`(`id_action`, `title`, `text`, `data_start`, `data_finish`, `id_org`, `id_city`) VALUES (NULL, '$name', '$about', '$dsa', '$dfa', '$idorg', '$idcity')",$db);
				}



				
				// Если акция удачно добавлена в БД, говорим пользователю об этом
				if ($rslt != FALSE){
					?>
						<!-- полупрозрачный блок, расятнутый на всю область экрана - полдожка под всплывающие формы и popup окна -->
						<div class="fon_blok"  onclick="f_all_close()" style="display: block;"></div>
					
						<!-- Всплывающее окно данные компании удачно изменены -->
						<div class="popUpOk" id="colMeOk" style="display: block;" >
							<div class="close_popup" onclick="f_all_close()">×</div>  
							<div class="tipPopUp"><img src="../img/ok.png"></div>
							<div class="textPopUp">
								Акция успешно<br>
								запущена
							</div>
						</div>	
					<?php
				}
			}
		?>
	
	
	
	
	
	
	
	
		<div class="content" style="padding-top: 0;">
		
			<?php
				//в цикле выводим, полученные из бд акции	
				echo '<div class="action_content">';
				
					//  Если организация не залогинена говорим, что для просмотра акций нужно войти в личный кабинет
					if(isset($_SESSION['idorg'])){
						
							//извлекаем из БД все акции залогиненной оргинизации
							$res = mysql_query("SELECT `id_action`, `title`, `text`, `data_start`, `data_finish` FROM `action` WHERE `id_org` = '$idOrg' ORDER BY `data_start` DESC",$db);
							
							//сохраняем в переменную колличество строк в запросе
							$count = mysql_num_rows($res); 

							if($count>0){ //если колличество полученных из БД записей больше нуля выводим в цикле данные акции
								?>
									<!-- ******** Шапка контента ******** -->
									<div class="title_vhod" style="padding-bottom: 50px;">
										<div>
											<img class="vhod" src="../img/org_percent.png">
											<h1 class="tit_date">На этой странице Вы можете посмотреть все свои акции, отредактировать их и добавить новые.</h1>
										</div>
									</div>
								<?php
									
								include_once("pattern/normalizedate.php"); // Подключаем приведение даты к нормальному виду
										
								for ($i = 0; $i < $count; $i++)
								{
									$id_action = mysql_result($res, $i, "id_action"); // идентификатор акции
									$title = mysql_result($res, $i, "title"); // заголовок
									$text = mysql_result($res, $i, "text"); // содержание акции
									$data_start = f_normalizedate(mysql_result($res, $i, "data_start")); // дата начала
									$data_finish = f_normalizedate(mysql_result($res, $i, "data_finish")); // дата окончания
									
									
									
									$df = mysql_result($res, $i, "data_finish"); //дата окончания акции
									$data_finish_for_close_action = strtotime($df); // переводим дату в UNIX т.е. количество секунд прошедшее с 1 января 1970 г
									
									// экранируем текст акции для првильного вывода кавычек и перевода строки
									$text = htmlspecialchars(stripslashes($text)); // обрабатываем текст темы чтобы кавычки в заголовке и другие спец символы выводились корректно
									$text = preg_replace("/(\r\n){2,}/", "<br/><br/>", $text); //если 2 и более подряд то на два <br/>
									$text = preg_replace("/(\r\n)/", "<br/>", $text); // если 1 на один <br/>
									
									
										echo '<div class="action"'; if ($count == 1) echo 'style="margin-bottom: 100px;"'; echo '>';
											echo '<a class="post_titel" href="editaction.php?id_action='.$id_action.'">#'.$id_action.': '.$title.'</a>';
											if ($data_finish_for_close_action < strtotime(date("Y-m-d"))) echo '<p class="action_end">АКЦИЯ ЗАВЕРШЕНА</p>';					
											echo '<p class="post_preview">'.$text.'<br>';
											echo '<span class="date_action">Время проведения акции с <b style="color: #777;">'.$data_start.'</b> по <b style="color: #777;">'.$data_finish.'</b></spabn></p>';
										echo '</div>';
								}
							}
							else {
								?>
									
									<!-- ******** Говорим пользователю, что у него нет акций ******** -->
									<div class="title_vhod">
										<div>
											<img class="vhod" src="../img/org_percent.png">
											<h1 class="tit_date">На этой странице Вы можете посмотреть все свои акции, отредактировать их и добавить новые.<div style="color: #4285f4; margin-top: 50px;">Вы пока не создали ни одной Акции.</div></h1>
										</div>
										<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px;">
											Акции и скидки увеличиваю продажи вашей компании.<br>
											Создайте свою первую акцию.
											<a class="for_txt" href="addaction.php">Создать акцию</a>
										</p>
									</div>
					
								<?php
							}
					}
					else { // Говорим, что для просмотра акций нужно войти в личный кабинет
						?>
							<div class="title_vhod">
								<div>
									<img class="vhod" src="../img/org_percent.png">
									<h1 class="tit_date">На этой странице Вы можете посмотреть все свои акции, отредактировать их и добавить новые.</h1>
								</div>
								<p class="cont_tit_text" style="text-align: center; margin-bottom: 80px; margin-top: 50px;">
									Для просмотра и редактирования Акций,<br>необходимо войти в личный кабинет.<br>
									<a class="for_txt" href="login.php">Войти в личный кабинет</a>
								</p>
							</div>

						<?php		
					}
					
				?>		
		</div>
		<div class="footer">
			&copy; Надоокна 2014-2017&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a>
		</div>		
	</div>
	
	
	<script async src="script/js/edittagcontent.js" type="text/javascript"></script><!-- увеличиваем высоту контента для мобильных устройств -->  
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>