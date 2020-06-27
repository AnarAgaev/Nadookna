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
	
	/**********************************
	
		создаем переменные куки с метками, что ползователю показан popup баннер
		в дальнейшем при загрузки страницы будем проверять этот маркер
		и если он существует, показвать рекламу не надо, т.к. она уже была показана
		
		Дополнительно устанавливаем переменную в сессию на случай если куки отключены
	
	***********************************/
	
	// popup баннер лежит в pattern/popup.php
	if (!isset($_COOKIE['popupSetTender']) and !isset($_SESSION['popupSetTender'])){
		SetCookie("popupSetTender","true",time()+31536000,"/",".nadookna.com");	
	}
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Блок Надоокна <?php echo $_SESSION['morph']['ime']; ?> - это много полезной и нужной информации про пластиковые ПВХ окна и всё, что с ними связано.">
    <meta name="keywords" content="пластиковые окна статьи, как выбрать пластиковые окна статьи, статьи о пластиковых окнах, статьи про пластиковые окна, статьи, пластиковые окна, пвх окн, блог про пластиковые окна, оконный блог">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Блог Надоокна. Пластиковые окна и всё, что с ними связано.</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body> 
	
	<?php 
		include_once("../pattern/videobox.php"); // поключаем блок в котором будем показывать всплывающее видео
		include_once("../pattern/popup.php"); // подключаем popup уведомления
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
		
		<!-- Хлебные крошкни -->
		<div class="content_wrap">	
			<div class="breadCrumbs">
				<div class="trigBredCrumbs"></div>
				<a class="breadCrumbs" href="../">Главная</a>/
				Блог про пластиковые окна
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		<div class="title_col">
			<div class="img_tit _blog"></div>
			<div>
				<h1 class="tit_text">Оконный Блог</h1>
				<p class="cont_tit_text">
					При изучении чего-то нового все мы испытываем недостаток информации, 
					один из наиболее удобных способов получения которой, 
					<a class="for_txt" href="../">тематические тексты и материалы о пластиковых стеклопакетах</a>. 
					Изучение которых позволяет получить новые знания о пластиковых окнах и расширить понимание 
					тематики. В нашем оконном блоге вы найдете ссылки на статьи, от ухода за окнами до обзоров 
					производителей пластиковых конструкций - это поможет Вам выбрать и купить ПВХ стеклопакеты 
					<?php echo $_SESSION['morph']['gde']; ?> и расширить свои знания об окнах вообще.				
				</p>							
			</div>
		</div>
	
		
		<!-- Рекламный баннер на Урок о ПВХ окнах -->
		<div class="action_to_course">
			<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
			Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
			Узнайте как сэкономить до 10%.
			<a href="../urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder roundBorder roundBorder">Как выбрать пластиковые окна</a>
		</div>
                                    			
		 
		<!-- Постраничный вывод превью постов блога -->
		<div class="content_wrap">	
			<div class="posti">
			
				<?php 
					include_once("../pattern/dbconnect.php");
					include_once("../pattern/normalizedate.php"); // скрипт для преобразования даты в нормальный вид
					
					
					$result = mysql_query("SELECT `name`,`subtitle`, `blogtitel`, `preview`, `image`, `date` FROM `posts` ORDER BY `date` DESC",$db);
				
					for ($i = 0; $i < mysql_num_rows($result); $i++)
					{
						$name = mysql_result($result, $i, "name"); // имя ссылки на страницу с постом
						$blogtitel = mysql_result($result, $i, "blogtitel"); // заголовок
						$subtitle = mysql_result($result, $i, "subtitle"); // подзаголовок
						$preview = mysql_result($result, $i, "preview"); // превью текста поста
						$image = mysql_result($result, $i, "image"); // имя картинки к посту
						$date = mysql_result($result, $i, "date"); // дата публикации поста
						
						$date = f_normalizedate($date); // приводим дату в нормальный вид
						
						$blogtitel = f_search_replace($blogtitel);
						$subtitle = f_search_replace($subtitle);
						$preview = f_search_replace($preview);
						
						echo '<div class="post">';
							echo '<div class="post_image"><img src="../img/blog/'.$image.'" alt="'.$blogtitel.'"></div>';
							echo '<div class="post_content">';
								echo '<a class="post_titel" href="'.$name.'.html"><h2 class="post_titel">'.$blogtitel.'</h2></a>';
								echo '<h3 class="post_subtitel">'.$subtitle.'</h3>';
								echo '<p class="post_preview">'.$preview.'</p>';
								echo '<div><a class="post_ancor" href="'.$name.'.html">Читать полностью</a><div class="post_date">';
									if(isset($_SESSION['morph'])) echo $_SESSION['morph']['ime'].', ';
									echo $date.' года</div></div>';
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>
		</div> 
			
		<!-- ФУТЕР -->
		<?php include_once("../pattern/footer.php");  ?>
	
		
	</div>
	
	<script async src="../script/js/showvideo.js" type="text/javascript"></script><!-- подключаем скрипт который показывает видео на странице -->  
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>