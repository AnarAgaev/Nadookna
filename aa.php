<?php

	/*************

		Данная страница производит добавление нового поста в блог
		и его редактирование. Так же вместе с добавлением поста
		добавляется новый url в файлы sitemap.xlm как отдельных
		городов, так и sitemap.xml основного домена.

	*************/


 
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
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>
	
<style type="text/css">	
	.form_post{
		width: 100%;
		overflow: hidden;
		position: relative;
		margin-bottom: 100px;
		
	}

	.input100p{
		width: 80%;
		outline: 0;
		border: 1px solid #ddd;
		padding: 0 15px;
		margin-top: 7px;
		margin-bottom: 25px;
		height: 40px;
		background-color: #fff;
		font: 16px/40px Arial, Vrinda, sans-serif;
		display: block;
		text-align: left;
		position: relative;
		letter-spacing: 0.5px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.for_txt{
		width: 96%;
		outline: 0;
		border: 1px solid #ddd;
		padding: 10px 15px;
		margin-top: 7px;
		margin-bottom: 25px;
		background-color: #fff;
		font: 16px Arial, Vrinda, sans-serif;
		display: block;
		text-align: left;
		position: relative;
		letter-spacing: 0.5px;
	}
	.sbmt_form{
		color: #fff;
		background-color: #4285f4;
		line-height: 70px;
		height: 70px;
		font-size: 22px;
		text-align: center;
		text-decoration: none;
		width: 300px;
		text-shadow: 0 1px rgba(0,0,0,0.1);
		font-family: Arial, Vrinda, sans-serif;
		font-weight: 400;
		position: relative;
		display: block;
		margin-top: 50px;
		cursor: pointer;
	 }
	 .sbmt_form:hover{background-color: #0072ff;}
	 
	 
	 h3 {
		font: 700 27px/1.1 'Open Sans', Arial;
		color: #4285f4;
		display: block;
		width: 100%;
		text-align: center;
	 }
	 
	 h1.tit_text {
		margin: 70px auto 50px;
		text-align: center;
		font: 700 44px/1.2 'Roboto', Arial;
		color: #4285f4;
		position: relative;
		display: block;
		text-align: center;
		padding: 30px;
		width: 400px;
		background-color: #f3f3f3;
	}	
	.podskaz{
		max-width: 800px;
		font: 15px/1.4 Arial, sans-serif;
		position: relative;
		margin: 0 auto;
		padding: 0 20px 30px;
	}

	td {
		padding-right: 30px;
	}
	.tbls {
		width: 800px;
		font: 15px/1.4 Arial, sans-serif;
		position: relative;
		padding: 0 20px 30px;
		position: relative;
		margin: 0 auto;
	}
	
	label{
		width: 80%;
		font: 16px Arial, Vrinda, sans-serif;
		display: block;
		text-align: left;
		position: relative;
		overflow: hidden;
		margin: 0 auto;
		left: -15px;
	}

	.pre_cunt{
		width: 80%;
		font: 14px Arial, Vrinda, sans-serif;
		text-align: left;
		position: relative;
		overflow: hidden;
		margin: 0 auto;
		padding: 5px 0;
		left: -15px;	
	}
	
	.cunt{
		width: 80%;
		font: 14px Arial, Vrinda, sans-serif;
		text-align: left;
		position: relative;
		overflow: hidden;
		margin: 0 auto;
		padding: 5px 0;
		left: -15px;	
	
	}
</style>


<script type="text/javascript">
	$(function() {
		$("input, textarea").keyup(function count(){
			$(this).prev().html('Сейчас: <b>'+$(this).val().length+'</b>');
		});
	});
	
	
	$( document ).ready(function() {
		// Автоматический подсчёт символов в полях input и textarea при редактировании поста
		
	});
</script>

</head>
<body> 
	
	<?php 
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
			include_once("pattern/dbconnect.php"); // подключаем БД
			
			// Просто выводим пост
			if (isset($_GET['id_post']) and !isset($_GET['edit_post'])){ 
				
				$id_post = $_GET['id_post'];
				$arr = mysql_fetch_assoc(mysql_query ("SELECT * FROM `posts` WHERE `id_post` = '$id_post'", $db));
				
			}
			
			
			// Добавляем пост в БД и записи в карты сайтов городов и сновного домена
			if (isset($_GET['add_post'])) {
				
 				$name = $_POST['name'];				
				$titel = $_POST['titel'];				
				$description = $_POST['description'];				
				$keywords = $_POST['keywords'];				
				$subtitle = $_POST['subtitle'];				
				$blogtitel = $_POST['blogtitel'];				
				$preview = $_POST['preview'];				
				$image = $_POST['image'];				
				$content = addslashes($_POST['content']);	
				
				mysql_query("INSERT INTO `posts`(`id_post`, `name`, `titel`, `subtitle`, `blogtitel`, `preview`, `description`, `keywords`, `content`, `image`, `date`) VALUES (NULL,'$name','$titel','$subtitle','$blogtitel','$preview','$description','$keywords','$content','$image',NOW())", $db);
				
				// ИД только что добавленного поста !!!!!!!!!!!!!!!!!!!!!!!!!!
				$new_id = mysql_insert_id(); 
				
				
		/***************************
		
			ДОБАВЛЯЕМ URL СОЗДАННОГО ПОСТАВ В ФАЙЛЫ SITEMAP.XML ВСЕХ ГОРОДОВ
			И ОТДЕЛЬНО В SITEMAP.XML ОСНОВНОГО ДОМЕНА
		
		***************************/  
				
				
				// ПОЛУЧАЕМ МАССИВ СОДЕРАЖАЩИЙ ВСЕ ПАПКИ С ИМЕНАМИ ГОРОДОВ В КОТОРЫХ ЛЕЖАТ ФАЙЛЫ XML, КОТОРЫЕ В ПОСЛЕДСТВИИ БУДЕТ РЕДАКТИРОВАТЬ

				
				$skip = array('.', '..');
				$files = scandir('sitemaps');
				
				// удаляем пустые точки из списка папок
				// in_array ищет в массиве заначения. В нашем случае ищем точку или двоеточие
				$i=0;
				$sity = array();
				foreach($files as $file) {
					if(!in_array($file, $skip))
						$sity[$i] = $file;
						$i++; 
				}
			 
				// удаляем sitemap.xml из списка папок и записываем данные в новый (результирующий) массив сгородами $city
				$b=0;
				$city = array();
				foreach($sity as $val){
					if ($val != 'sitemap.xml'){
					 $city[$b] = $val;
					 $b++;
					}
				}

				/***************************
				
					$city - МАССИВ СОДЕРЖАЩИЙ ВСЕ ПАПКИ С КАРТАМИ САЙТА
				
				***************************/  
				
				
				/*************
					ДОБАВЛЕНИИЕ URL В SITEMAP.XML В ПАПКАХ ГОРОДОВ
				************/
				
				foreach($city as $gorod){
					$xml = simplexml_load_file('sitemaps/'.$gorod.'/sitemap.xml'); // читаем xml файл
					
					$url = $xml->addChild('url'); // добавляем узел в корневой раздел <urlset> и записываем метку на добавленный узел в переменную $url

					$url->addChild('loc', 'http://'.$gorod.'.nadookna.com/blog/'.$name.'.html'); // доавляем в толькочто созданный узел ещё один дочерний узел loc
					$url->addChild('lastmod', date("Y-m-d")); // доавляем в толькочто созданный узел ещё один дочерний узел lastmod
					$url->addChild('priority', '0.8'); // доавляем в толькочто созданный узел ещё один дочерний узел priority

					// Чтобы в результирующем файле xml было нормальное форматирование переводим xml в dom и только после этого записываем в файл
					$dom = new DOMDocument('1.0','utf-8');
					$dom->preserveWhiteSpace = false; // настройки для нормального форматирования
					$dom->formatOutput = true; // настройки для нормального форматирования

					//@var $xml SimpleXMLElement
					$dom->loadXML($xml->asXML());
					$dom->save('sitemaps/'.$gorod.'/sitemap.xml');
				}
				
				// Отдельно добавляем url в sitemap.xml для основного домена
				$xml = simplexml_load_file('sitemaps/sitemap.xml'); // читаем xml файл
				
				$url = $xml->addChild('url'); // добавляем узел в корневой раздел <urlset> и записываем метку на добавленный узел в переменную $url

				$url->addChild('loc', 'http://nadookna.com/blog/'.$name.'.html'); // доавляем в толькочто созданный узел ещё один дочерний узел loc
				$url->addChild('lastmod', date("Y-m-d")); // доавляем в толькочто созданный узел ещё один дочерний узел lastmod
				$url->addChild('priority', '0.8'); // доавляем в толькочто созданный узел ещё один дочерний узел priority

				// Чтобы в результирующем файле xml было нормальное форматирование переводим xml в dom и только после этого записываем в файл
				$dom = new DOMDocument('1.0','utf-8');
				$dom->preserveWhiteSpace = false; // настройки для нормального форматирования
				$dom->formatOutput = true; // настройки для нормального форматирования

				//@var $xml SimpleXMLElement
				$dom->loadXML($xml->asXML());
				$dom->save('sitemaps/sitemap.xml');
			}
			
			if (isset($_GET['id_post']) and isset($_GET['edit_post'])) {
				
				// Редактируем пост в БД
				
				$id_post = $_GET['id_post'];
 				$name = $_POST['name'];				
				$titel = $_POST['titel'];				
				$description = $_POST['description'];				
				$keywords = $_POST['keywords'];				
				$subtitle = $_POST['subtitle'];				
				$blogtitel = $_POST['blogtitel'];				
				$preview = $_POST['preview'];				
				$image = $_POST['image'];				
				$content = addslashes($_POST['content']);
				$date = $_POST['date'];
				
				mysql_query("UPDATE `posts` SET `name`='$name',`titel`='$titel',`subtitle`='$subtitle',`blogtitel`='$blogtitel',`preview`='$preview',`description`='$description',`keywords`='$keywords',`content`='$content',`image`='$image',`date`='$date' WHERE `id_post` = '$id_post'", $db);
				$arr = mysql_fetch_assoc(mysql_query ("SELECT * FROM `posts` WHERE `id_post` = '$id_post'", $db));
			}			

			if (!isset($_GET['id_post']) and !isset($_GET['edit_post']) and !isset($_GET['add_post'])) echo '<h1 class="tit_text">Добавление поста в блог</h1>';
			if (isset($_GET['id_post'])) echo '<h1 class="tit_text">Редактирование поста в блоге</h1>';
		
		
		
			if (isset($_GET['add_post'])){
				
				
				echo '<h1 class="tit_text">Пост удачно довлен в Базу данных</h1>';
				echo '<br><br><br><br>';
				echo '<h3>Идентификатор поста в Базе данных: <br><br><span style="font-size: 150px; font-weight: 600;">'.$new_id.'</span></h3>';
				echo '<br><br><br><br>';
				echo '<a style="margin: 0 auto;" class="sbmt_form roundBorder" href="http://nadookna.com/aa.php?id_post='.$new_id.'">Редактировать пост</a>';
			}
			else{
				?>
				
					<p class="podskaz">
						<b>В контенте статьи надо менять текст который находится<br>между звёздочками на соответстующий</b>
						<br>************  ИЗМЕНЯЕМЫЙ ТЕКСТ  ************
					</p>
					
					<p class="podskaz">
						При копировании статьи необходимо<br><b>менять все Разместить Заявку, Создать Заявку на Разместить Тендер</b><br>и т.д.
					</p>
					
					<br>
					<p class="podskaz">
				
					<b>ШПАРГАЛКА ДЛЯ ЗАМЕНЫ ГОРОДОВ НА ПЕРЕМЕННЫЕ</b>
					<br>В тексте поста надо менять город на соответствующую пермеменную
					
						<div class="tbls">
							<table>
								<tr>
									<td>Именительный</td>
									<td>Ваш город</td>
									<td>Ярославль</td>
									<td>$ime</td>
								</tr>
								<tr>
									<td>Родительный</td>
									<td>Вашего города</td>
									<td>Ярославля</td>
									<td>$rod</td>
								</tr>
								<tr>
									<td>Дательный</td>
									<td>Вашему городу</td>
									<td>Ярославлю</td>
									<td>$dat</td>
								</tr>
								<tr>
									<td>Винительный</td>
									<td>Ваш город</td>
									<td>Ярославль</td>
									<td>$vin</td>
								</tr>
								<tr>
									<td>Творительный</td>
									<td>Вашим городом</td>
									<td>Ярославлем</td>
									<td>$tvo</td>
								</tr>
								<tr>
									<td>Предложной</td>
									<td>о Вашем городе</td>
									<td>о Ярославле</td>
									<td>$pre</td>
								</tr>
								<tr>
									<td>Где</td>
									<td>в Вашем городе</td>
									<td>в Ярославле</td>
									<td>$gde</td>
								</tr>
								<tr>
									<td>Куда</td>
									<td>в Ваш город</td>
									<td>в Ярославль</td>
									<td>$kud</td>
								</tr>
								<tr>
									<td>Откуда</td>
									<td>из Вашего города</td>
									<td>из Ярославля</td>
									<td>$otk</td>
								</tr>
							</table>
						</div>
					</p>
	
					<form class="form_post" action="aa.php?<?php if (!isset($_GET['add_post']) and !isset($_GET['id_post']) and !isset($_GET['edit_post'])) echo 'add_post=true'; else echo 'id_post='.$_GET['id_post'].'&edit_post=true'; ?>" method="post" charset="utf-8">
						<br><label><b>Имя статьи в Базе Данных.</b> СЕО оптимизированное, на латинице, через тире <br><br>БЕЗ РАСШИРЕНИЯ (.php писать НЕ НАДО!!!!!!!!!!)</label><div class="pre_cunt">Макс символов 100.</div><div class="cunt">Сейчас: </div><input type="text" name="name" class="input100p" value="<?php echo $arr['name']; ?>" required>
						<br><br><label><b>Тайтл в заголовке страницы.</b> То что будет между тегами title: &lt;title&gt;Вот здесь&lt;/title&gt;</label><div class="pre_cunt">Макс символов 200.</div><div class="cunt">Сейчас:</div><input type="text" name="titel" class="input100p" value="<?php echo $arr['titel']; ?>" required>
						<label><b>Дескрипшн в заголовке страницы</b> name=''description'' content=''То что будет ВОТ ЗДЕСЬ''</label><div class="pre_cunt">Макс символов 300.</div><div class="cunt">Сейчас: </div><input type="text" name="description" class="input100p" value="<?php echo $arr['description']; ?>" required>
						<label><b>Ключи в заголовке страницы</b> name=''keywords'' content=''То что будет ВОТ ЗДЕСЬ''</label><div class="pre_cunt">Макс символов 200.</div><div class="cunt">Сейчас: </div><input type="text" name="keywords" class="input100p" value="<?php echo $arr['keywords']; ?>" required>
						<br><br><label><b>Заголовок поста в выдаче на странице БЛОГ</b></label><div class="pre_cunt">Макс символов 200.</div><div class="cunt">Сейчас: </div><input type="text" name="blogtitel" class="input100p" value="<?php echo $arr['blogtitel']; ?>" required>
						<label><b>Подзаголовок поста в выдаче на странице БЛОГ</b></label><div class="pre_cunt">Макс символов 200.</div><div class="cunt">Сейчас: </div><input type="text" name="subtitle" class="input100p" value="<?php echo $arr['subtitle']; ?>" required>
						<label><b>Превью текста статьи в выдаче на странице БЛОГ</b></label><div class="pre_cunt">Макс символов 300.</div><div class="cunt">Сейчас: </div><textarea style="height: 100px; width: 80%;" class="for_txt" name="preview" required><?php echo $arr['preview']; ?></textarea>
						<br><br><label><b>Имя картинки в папке на хосте.</b> СЕО оптим, на латинице, через тире, С РАСШИРЕНИЕМ (.jpg)<br>Картинку загружать в img/blog/</label><div class="pre_cunt">Макс символов 100.</div><div class="cunt">Сейчас: </div><input type="text" name="image" class="input100p" value="<?php echo $arr['image']; ?>" required>
						
						
						<?php if(isset($_GET['id_post'])) echo '<p><label><b>Дата создания поста</b> в формате ГОД-МЕСЯЦ-ДЕНЬ (ГГГГ-ММ-ДД).</label><input type="text" name="date" class="input100p" value="'.$arr['date'].'" required></p>' ?>
						
						
						
						
						<br><br>
						<label><b>Весь текст страницы с тегами, картинками и текстом</b></label><div class="pre_cunt">Макс символов 11000.</div><div class="cunt">Сейчас: </div>
						
							<textarea style="height: 1000px;" class="for_txt" name="content" required><?
									if (isset($_GET['id_post']) or isset($_GET['add_post'])) echo $arr['content'];
									else echo <<<HERE
<!-- Хлебные крошки -->
<div class="content_wrap">	
	<div class="breadCrumbs">
		<div class="trigBredCrumbs"></div>
		<a class="breadCrumbs" href="../">Главная</a>/
		<a class="breadCrumbs" href="../blog/">Оконный Блог</a>/
		************   ЗАГОЛОВОК СТАТЬИ  ************
	</div>
</div>

<!-- Шапка контента -->
<div class="title_col">
	<img class="title_img" 
	  src="../../img/blog/************   ИМЯ КАРТИНКИ В БД  ************.jpg" 
	  alt=" ************   ЗАГОЛОВОК СТАТЬИ  ************  " 
	  title=" ************   ЗАГОЛОВОК СТАТЬИ  ************ ">
	<h1 class="zagolovok"> ************   ЗАГОЛОВОК СТАТЬИ  ************ </h1>
	<h2 class="podzagolovok"> ************   ПОДЗАГОЛОВОК СТАТЬИ  ************ </h2>
</div>

<a class="for_txt" href="/" target="_blank"> ************   ТЕКСТ ССЫЛКИ  ************ </a>

<!-- Текст статьи -->
<h3> ************   ЗАГОЛОВОК АБЗАЦА СТАТЬИ  ************ </h3>
<p class="text_in_article">
	 ************   ТЕКСТ ОДНОГО ИЗ АБЗАЦЕВ СТАТЬИ  ************ 
</p>

<!-- Рисунок в статье-->
<img class="title_img" src="../../img/blog/************   ИМЯ РИСУНКА С РАШИРЕНИЕМ  ************" alt="" title="">
<div class="podpos_img_post">************   ПОДПИСЬ К РИСУНКУ  ************</div>

<!-- Рекламный баннер на Урок о ПВХ окнах -->
<br><br>
<div class="action_to_course_for_stati">
	<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
	Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
	Узнайте как сэкономить до 10%.
	<a href="../urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder" target="_blank">Как выбрать пластиковые окна</a>
</div>

<!-- Рекламный баннер на страницу создания Тендера -->
<div class="action_to_course_for_stati">
	<div class="titel_act_to_cours">Хочешь купить пластиковые окна со скидкой?</div>
	Разместите тендер на покупку пластиковых окон и получите 10 предложений со скидками от оконных компаний $rod.
	<a href="/" class="btnCrtTenderBig roundBorder">Узнать подробнее</a>
</div>

<!-- Дата выхода статьи -->
<p class="podois">
	 <b> ************   ДАТА СТАТЬИ В ФОРМАТЕ 7 апреля 2016 года  ************ </b>
	 <br>Надоокна - сервис покупки пластиковых окон $gde
<p>

<!-- Видео с YOUTUBE на страницах с контентом -->
<div class="video_at_txt">
	<h2 class="medium_blu">Видео: как делают пластиковые окна</h2>
	В данном видео, помимо подробного описания процесса сборки 
	пластикового окна, описаны основные элементы, технология 
	производства оконного профиля, стеклопакета, других деталей.<br><br>
	<img class="block_f_moove" src="../img/img_f_video/v2.jpg" alt="Видео как делаются пластиковые окна" title="Видео как делаются пластиковые окна" onclick="f_showvideo('//www.youtube.com/embed/VaXaKmgLhuo?rel=0&autoplay=1&showinfo=0')">
</div>
HERE;
?> 
							</textarea>
						<input type="submit" accesskey="s" class="sbmt_form roundBorder" value="<?php if (isset($_GET['id_post'])) echo 'Сохранить изменения'; else echo 'Добавить пост в БД'; ?>">
					</form>
			<?php }?>	
		
		<!--************************************               ФУТЕР               *****************************-->
		<?php include_once("pattern/footer.php");  ?>
		
	</div>
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  
</body>
</html>