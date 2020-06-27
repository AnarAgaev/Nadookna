<?php

	/*************

		Данная страница производит манипуляциии с файлами sitemap.xml как в папках городов
		так и в файле sitemap.xml основного домена.
		Сначала получаем список всех папок/городов, чтобы получить путь к файлам sitemap.xml,
		а далее производим манюпуляции.

	*************/

	// ПОЛУЧАЕМ МАССИВ СОДЕРАЖАЩИЙ ВСЕ ПАПКИ С ИМЕНАМИ ГОРОДОВ В КОТОРЫХ ЛЕЖАТ ФАЙЛЫ XML, КОТОРЫЕ В ПОСЛЕДСТВИИ БУДЕТ РЕДАКТИРОВАТЬ

	include('pattern/dbconnect.php'); // доавляем файл содержащий подключение к бд
	
	$skip = array('.', '..');
	$files = scandir('sitemaps');
	
	// удаляем пусты точки из списка папок
	// in_array ищет в массиве заначения. В нашем случае ищем точку или двоеточие
	$i=0;
	$sity = array();
	foreach($files as $file) {
		if(!in_array($file, $skip))
			$sity[$i] = $file;
			$i++; 
	}
 
	// удаляем sitemap.xml из списка папок и записываем данные в новый (результирующий) массив с городами $city
	$b=0;
	$city = array();
	foreach($sity as $val){
		if ($val != 'sitemap.xml'){
		 $city[$b] = $val;
		 $b++;
		}
	}

	/***************************
	
	!!!!!	$city - МАССИВ СОДЕРЖАЩИЙ ВСЕ ПАПКИ С КАРТАМИ САЙТА
	
	***************************/  
	
?>
 

<?

	/*************
		ПРОВЕРКА НА ОТСУТСВИЕ ПАПКИ ГОРОДА В БД 
	************
	foreach($city as $g){
		$row = mysql_fetch_assoc(mysql_query("SELECT `id_city`, `city`  FROM `city` WHERE `translit` = '$g'",$db));
		if(!$row) echo $g.'<br>';

	}
	
	*/ 



	/*************
		РЕДКТИРОВАНИЕ ИЗВЕСТНОГО УЗЛА (в примере редактируме 64-й урл, счёт с нуля)
	************
	
	foreach($city as $gorod){
		$xml = simplexml_load_file('sitemaps/'.$gorod.'/sitemap.xml'); // читаем xml файл
		
		echo '<pre>';
		//echo $xml->url[107]->loc[0];
		
		
		//$xml->url[73]->lastmod[0] = '2017-10-03';
		//$xml->url[64]->loc[0] = 'http://'.$gorod.'.nadookna.com/blog/okna-plastikovye-kupit.html'; // редактируем нужный узел
		//$xml->asXML('sitemaps/'.$gorod.'/sitemap.xml'); // перезаписываем наш xml файл
	}
	*/
	
	
	
	/*************
		УДАЛЕНИЕ УЗЛА (счёт узлов начинается с нуля)
	***********
	
		foreach($city as $gorod){
			$xml = simplexml_load_file('sitemaps/'.$gorod.'/sitemap.xml'); // читаем xml файл с sitemap из соответствующего города
		
			// ищем узел данные в котором совпадают с искомыми
			for ($i = 0; $i < count($xml); $i++) {
				$stripos_res = stripos( $xml->url[$i]->loc[0] , 'sekrety-uhoda-za-pvh-oknami-chast-odin.html' );
				
				if ( $stripos_res ) {
					//echo 'совпадение найдено в позиции: ' . $stripos_res . ' - совпадение найдено в узеле: '. $i . '<br>';
					unset($xml->url[$i]);
				}
			}
			
			// Перезаписываем XML Sitemap
			// Чтобы в результирующем файле xml было нормальное форматирование переводим xml в dom и только после этого записываем в файл
			$dom = new DOMDocument('1.0','utf-8');
			$dom->preserveWhiteSpace = false; // настройки для нормального форматирования
			$dom->formatOutput = true; // настройки для нормального форматирования

			//@var $xml SimpleXMLElement
			$dom->loadXML($xml->asXML());
			$dom->save('sitemaps/'.$gorod.'/sitemap.xml');
		}

	
	*/

	/*************
		УДАЛЕНИЕ КОММЕНТАРИЕВ ИЗ XML ФАЙЛА
	***********
	
	foreach($city as $gorod){
		
		$xml = simplexml_load_file('sitemaps/'.$gorod.'/sitemap.xml'); // читаем xml файл
		unset($xml->comment); //удаляем узел comment, содеращий коментарии
		
		$dom = new DOMDocument('1.0','utf-8');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		
		//@var $xml SimpleXMLElement
		$dom->loadXML($xml->asXML());
		$dom->save('sitemaps/'.$gorod.'/sitemap.xml');
	}

	*/
	
	
	
	
	/*************
		ДОБАВЛЕНИИЕ СТРАНИЦЫ ОКОННЫХ КОМПАНИЙ ИЗ ВСЕХ ГОРОДОВ РОССИИ
		В СООТВЕТСТВУЮЩИЕ ФАЙЛЫ SITEMAP ИЗ ГОРОДА РЕГИСТРАЦИИ КОМПАНИИ
	**********

		// получаем ИД всех городов
		$res = mysql_query("SELECT `id_city`, `translit` FROM `city`",$db);
		
		for ($i = 0; $i < mysql_num_rows($res); $i++)
		{
			$id_city = mysql_result($res, $i, "id_city");
			$translit = mysql_result($res, $i, "translit");
			
			$res_org = mysql_query("SELECT `idorg` FROM `orgs` WHERE `idcity`='$id_city'",$db);
			
			for ($b = 0; $b < mysql_num_rows($res_org); $b++)
			{
				//echo '&nbsp;&nbsp;'.mysql_result($res_org, $b, "idorg").'<br>';
			
				$xml = simplexml_load_file('sitemaps/'.$translit.'/sitemap.xml'); // читаем xml файл
				
				$url = $xml->addChild('url'); // добавляем узел в корневой раздел <urlset> и записываем метку на добавленный узел в переменную $url

				$url->addChild('loc', 'http://'.$translit.'.nadookna.com/okonnaya-kompaniya.php?idorg='.mysql_result($res_org, $b, "idorg")); // доавляем в толькочто созданный узел ещё один дочерний узел loc
				$url->addChild('lastmod', date("Y-m-d")); // доавляем в толькочто созданный узел ещё один дочерний узел lastmod
				$url->addChild('priority', '0.8'); // доавляем в толькочто созданный узел ещё один дочерний узел priority

				// Чтобы в результирующем файле xml было нормальное форматирование переводим xml в dom и только после этого записываем в файл
				$dom = new DOMDocument('1.0','utf-8');
				$dom->preserveWhiteSpace = false; // настройки для нормального форматирования
				$dom->formatOutput = true; // настройки для нормального форматирования

				//@var $xml SimpleXMLElement
				$dom->loadXML($xml->asXML());
				$dom->save('sitemaps/'.$translit.'/sitemap.xml');
			}
		}

	
		*/	
	
	
	
	
	
	
	


?>



		
		
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
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title></title>
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
		
		
		<?
		
		
			if(isset($_POST['loc']) and isset($_POST['lastmod']) and isset($_POST['priority'])){
				
				/*************
					ДОБАВЛЕНИИЕ URL В SITEMAP.XML В ПАПКАХ ГОРОДОВ
					
					!!! Важно при создании статьи на странице aa.php запись в карты сайтов добавляется автоматически
					дополнительно добавлять её не нужно.
				************/
				
				foreach($city as $gorod){
					$xml = simplexml_load_file('sitemaps/'.$gorod.'/sitemap.xml'); // читаем xml файл
					
					$url = $xml->addChild('url'); // добавляем узел в корневой раздел <urlset> и записываем метку на добавленный узел в переменную $url

					$url->addChild('loc', 'http://'.$gorod.'.nadookna.com/'.$_POST['loc']); // доавляем в толькочто созданный узел ещё один дочерний узел loc
					$url->addChild('lastmod', $_POST['lastmod']); // доавляем в толькочто созданный узел ещё один дочерний узел lastmod
					$url->addChild('priority', $_POST['priority']); // доавляем в толькочто созданный узел ещё один дочерний узел priority

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

					$url->addChild('loc', 'http://nadookna.com/'.$_POST['loc']); // доавляем в толькочто созданный узел ещё один дочерний узел loc
					$url->addChild('lastmod', $_POST['lastmod']); // доавляем в толькочто созданный узел ещё один дочерний узел lastmod
					$url->addChild('priority', $_POST['priority']); // доавляем в толькочто созданный узел ещё один дочерний узел priority

					// Чтобы в результирующем файле xml было нормальное форматирование переводим xml в dom и только после этого записываем в файл
					$dom = new DOMDocument('1.0','utf-8');
					$dom->preserveWhiteSpace = false; // настройки для нормального форматирования
					$dom->formatOutput = true; // настройки для нормального форматирования

					//@var $xml SimpleXMLElement
					$dom->loadXML($xml->asXML());
					$dom->save('sitemaps/sitemap.xml');
				
				echo <<<HTMLDATA
					<div style="margin-top: 200px; margin-bottom: 200px;">
						<h1 class="tit_text">URL нового поста добавлен<br>в файлы sitemap.xml</h1>
					</div>
HTMLDATA;
			}
	else echo <<<HTMLDATA
		<div style="margin-top: 70px;">
			<h1 class="tit_text">Добавить URL нового поста<br>в файлы sitemap.xml</h1>
		</div>		
	
		<form action="" method="post" enctype="multipart/form-data" style="margin-top: 70px;">
			<div class="boxinput" style="max-width: 700px !important;">
				<div class="title_input" style="line-height: 1.4">
					URL добавляемый в sitemap.xml<br>
					Только сам url без http://nadookna.com/<br>
					ОБЯЗАТЕЛЬНО убрать первый символ слеш<br>
					Если есть подпапки, их надо вписать, опятьже без первого слеша
				</div>
				<input type="text" name="loc" class="input_kontakty" style="max-width: none;" required>
				
				<div class="title_input" style="line-height: 1.4">Дата создания файла<br>в формате ГГГГ-ММ-ДД</div>
				<input type="text" name="lastmod" class="input_kontakty" style="max-width: none;" required>
				
				<div class="title_input" style="line-height: 1.4">Приоритет в обходе бота<br>в формате от 0.1 до 1<br>обязательно через точку</div>
				<input type="text" name="priority" class="input_kontakty" style="max-width: none;" required>
				
				<input type="submit" value="Отправить" id="go_kontakty" class="roundBorder">
			</div>
		</form>	
HTMLDATA;
	?>
		<!--************************************               ФУТЕР               *****************************-->
		<?php include_once("pattern/footer.php");  ?>
		
	</div>
	
	<script async src="script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

</body>
</html>