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

	include_once("pattern/dbconnect.php"); // Подключаемся к БД
	
	include_once("script/php/geturl.php"); // Подключаем скрип определения урла
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Помогаем найти клиентов <?php echo $_SESSION['morph']['gde']; ?>. Надоокна это быстрый и удобный способ получить больше заказов пластиковых окон.">
    <meta name="keywords" content="заказы пластиковые окна, заказы пвх окна, тендер окна пвх, реклама окон, покупатели пластиковых окон <?php echo $_SESSION['morph']['gde']; ?>, покупатели пвх окон <?php echo $_SESSION['morph']['gde']; ?>, окна <?php echo $_SESSION['morph']['ime']; ?>, пластиковые окна, пластиковые окна <?php echo $_SESSION['morph']['ime']; ?>, пвх окна, пвх окна <?php echo $_SESSION['morph']['ime']; ?>, тендер окна пвх, пластиковые окна тендер">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Надоокна - помогаем найти клиентов <?php echo $_SESSION['morph']['gde']; ?>.</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/index.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body> 

	<?php 
		include_once("pattern/collme.php"); // поключаем кнопку показать форму обратного звонка
		include_once("pattern/selectcity.php"); // подключаем форму выбора города
		include_once("pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
		
		// ***************   Добавляем оконную компанию в БД
		if (isset($_POST['addorg'])){
			
			// Валидация и защита пришедших данных
			$nameorg = trim($_POST['nameorg']);
			$about = trim($_POST['about']);
			$adres = trim($_POST['adres']);
			$timework = trim($_POST['timework']);
			$phone = trim($_POST['phone']);
			$phone2 = trim($_POST['phone2']);
			$phone3 = trim($_POST['phone3']);
			$phone4 = trim($_POST['phone4']);
			$phone5 = trim($_POST['phone5']);
			$email = trim($_POST['email']);
			$pass = trim($_POST['pass']);
			$site = trim($_POST['site']);
			$profil = trim($_POST['profil']);
			$furnitura = trim($_POST['furnitura']);

			$nameorg = strip_tags($nameorg); 
			$about = strip_tags($about); 
			$adres = strip_tags($adres); 
			$timework = strip_tags($timework); 
			$phone = strip_tags($phone); 
			$phone2 = strip_tags($phone2); 
			$phone3 = strip_tags($phone3); 
			$phone4 = strip_tags($phone4); 
			$phone5 = strip_tags($phone5); 
			$email = strip_tags($email); 
			$pass = strip_tags($pass); 
			$site = strip_tags($site); 
			$profil = strip_tags($profil); 
			$furnitura = strip_tags($furnitura); 

			$nameorg = htmlspecialchars($nameorg,ENT_QUOTES);
			$about = htmlspecialchars($about,ENT_QUOTES);
			$adres = htmlspecialchars($adres,ENT_QUOTES);
			$timework = htmlspecialchars($timework,ENT_QUOTES);
			$phone = htmlspecialchars($phone,ENT_QUOTES);
			$phone2 = htmlspecialchars($phone2,ENT_QUOTES);
			$phone3 = htmlspecialchars($phone3,ENT_QUOTES);
			$phone4 = htmlspecialchars($phone4,ENT_QUOTES);
			$phone5 = htmlspecialchars($phone5,ENT_QUOTES);
			$email = htmlspecialchars($email,ENT_QUOTES);
			$pass = htmlspecialchars($pass,ENT_QUOTES);
			$site = htmlspecialchars($site,ENT_QUOTES);
			$profil = htmlspecialchars($profil,ENT_QUOTES);
			$furnitura = htmlspecialchars($furnitura,ENT_QUOTES);

			if (get_magic_quotes_gpc()){
				$nameorg = stripcslashes($nameorg);
				$about = stripcslashes($about);
				$adres = stripcslashes($adres);
				$timework = stripcslashes($timework);
				$phone = stripcslashes($phone);
				$phone2 = stripcslashes($phone2);
				$phone3 = stripcslashes($phone3);
				$phone4 = stripcslashes($phone4);
				$phone5 = stripcslashes($phone5);
				$email = stripcslashes($email);
				$pass = stripcslashes($pass);
				$site = stripcslashes($site);
				$profil = stripcslashes($profil);
				$furnitura = stripcslashes($furnitura);
			}	
			
			$md5pas = md5($pass); // шифруем пароль
			
			$city = $_SESSION['city'];
			$idCityRow = mysql_fetch_assoc(mysql_query("SELECT `id_city` FROM `city` WHERE `city`='$city'",$db));
			$idcity = $idCityRow['id_city'];
			
			// Добавляем организацию в БД
			$rslt = mysql_query("INSERT INTO `orgs`(`idorg`, `name`, `email`, `pass`, `idcity`, `url`, `adds`, `info`, `wtime`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`, `profil`, `furnitura`, `datereg`) VALUES (NULL, '$nameorg', '$email', '$md5pas', '$idcity', '$site', '$adres', '$about', '$timework', '$phone', '$phone2', '$phone3', '$phone4', '$phone5', '$profil', '$furnitura', CURDATE())",$db);
			
			if ($rslt != false){
				
				$res = mysql_fetch_assoc(mysql_query("SELECT `idorg` FROM `orgs` WHERE `email`='$email'", $db));
				$id_org = $res['idorg'];
				
				// Посылаем письма
				$message ="Здравствуйте! Вы получили это письмо, так как зарегистрировались на сервисе покупки пластиковых окон Надоокна.\r\n\n";
				$message .= "Регистрационные данные:\r\n";
				$message .="Уникальный номер Вашей компании: ".$id_org."\r\n";
				$message .="Ваш логин для входа в личный кабинет: ".$email."\r\n";
				$message .="Ваш пароль для входа в личный кабинет: ".$pass."\r\n\n";
				$message .="В личном кабинете Вы сможете создать акцию, отредактировать, указанные ранее, данные компании, просмотреть актуальные тендеры и отправить сообщение в службу поддержки.\r\n\n";
				$message .="Напоминаем, информация о вашей оконной компании появится в оконном справочнике ".$_SESSION['morph']['rod']." после проверки модератором, в течении 24 часов.\r\n\n";
				$message .="Если вы получили это письмо по ошибке, то просто проигнорируйте или удалите его. Не отвечайте на данное сообщение.\r\n\n";
				$message .="Благодарим Вас за регистрацию на нашем ресурсе. Мы надеемся, что сможем помочь вам в поиске новых клиентов.\r\n\n\n";
				$message .="С уважением, Администрация сервиса Надоокна";	
				$subject = "Регистрация на сервисе Надоокна.";
				$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
				$from = "Надоокна";
				$from = "=?utf-8?b?". base64_encode($from) ."?=";	
				$header = "Content-type: text/plain; charset=utf-8\r\n";
				$header .= "From: ".$from."<support@nadookna.com>\r\n";
				$header .= "MIME-Version: 1.0\r\n"; 
				$header .= "Date: ".date('D, d M Y h:i:s O'); 
				mail($email, $subject, $message, $header); //отправляем письмо зарегистрировашейся оконной компании

				$message ="Необходима модерация оконной компании ".$nameorg."\r\n";
				$message .= "ИД организации: ".$id_org."\r\n";
				$message .= "Города регистрации: ".$_SESSION['morph']['ime']."\r\n";
				$message .= "ИД города регистрации - ".$idcity."\r\n";
				$message .= "Страница компании: http://nadookna.com/okonnaya-kompaniya.php?idorg=".$id_org." \r\n\n";
				$message .="С уважением, Администрация сервиса Надоокна";	
				$subject = "Модерация оконной компании.";
				$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   
				$from = "Вэбсайт Надоокна";
				$from = "=?utf-8?b?". base64_encode($from) ."?=";	
				$header = "Content-type: text/plain; charset=utf-8\r\n";
				$header .= "From: ".$from."<support@nadookna.com>\r\n";
				$header .= "MIME-Version: 1.0\r\n"; 
				$header .= "Date: ".date('D, d M Y h:i:s O'); 
				mail("anar.n.agaev@gmail.com", $subject, $message, $header); //отправляем письмо модератору оконный компаний
				
				?>
					<!-- полупрозрачный блок, расятнутый на всю область экрана - положка под всплывающие формы и popup окна -->
					<div class="fon_blok"  onclick="f_all_close()" style="display: block"></div>
					<!-- Показываем сообщение об удачной регистрации -->
					<div class="addorgOk" id="addorgOk">
						<div class="close_popup" onclick="f_all_close()">×</div>
						<div class="adorgTitBlock">
							<img src="../img/ok.png" alt="Да">
							<div class="adorgTit">Ваша организация удачно добавлена в Базу Данных</div>
						</div>
						<div class="adorgTxt">
							Она появится в справочнике оконных компаний <?php echo $_SESSION['morph']['rod']; ?> после проверки модератором, в течение 24 часов.<br><br>
							Спасибо за регистрацию на сервисе покупки пластиковых окон Надоокна <?php echo $_SESSION['morph']['ime']; ?>.
						</div>
					</div>
				<?php
			}
		}
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<!--header class="org">
				<a class="logo" id="logoOrg" href="../">НАDООКНА</a>
		</header-->
		
		
		
				<?php 
			include_once("pattern/header.php"); // подключаем шапку сайта
			//include_once("pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?> 

		
		<!-- Слайдер -->
	
		<div id="slider_org">
			<img id="img_slide" src="img/2.jpg" alt="Помогаем найти клиентов <?php echo $_SESSION['morph']['gde']; ?>" title="Помогаем найти клиентов  <?php echo $_SESSION['morph']['gde']; ?>">
			<h1>
				<span class="slide_titel">Помогаем найти <?php if($_SESSION['morph']['ime'] == 'Ваш город') echo 'больше'; else echo 'Ваших'; ?></span>
				<span class="slide_titel_bottom org">клиентов <?php echo $_SESSION['morph']['gde']; ?></span>
			</h1>
			<img class="adorg" src="img/top_f_org.png" alt="Контакты людей, которые хотят купить пластиковые окна.">
			<div class="action_adorg">
				<h4 class="tit_org_slider">С помощью Надоокна</h4>
				<div class="txt_org_slider">
					Оконные компании получают контакты 
					людей, которые хотят купить пластиковые
					окна. Попробуйте прямо сейчас!
				</div>
				<a href="addorg.php" class="reg_org roundBorder">Добавить компанию</a>
				<div class="un_btn_org">Это бесплатно и займёт не более 7 минут</div>			
			</div>
		</div>
		
		
		
		
		<!-- Как работает этот сервис -->
		
		<div id="howWork">
			<div class="topTitleText">
				<h2 id="hw">Как это работает</h2>
			</div>
			<div class="iconBlockOrg">
				<img class="textIcon" src="img/win.png" alt="Создание тендера">
				<div class="textIndexBigText">Создание<br>тендера</div>
				<div class="textIndexSmall">Заказчик размещает тендер<br>с подробным описанием<br>необходимых ему окон.</div>
			</div>
			<div class="iconBlockOrg">
				<img class="textIcon" src="img/menicon.png" alt="Контакты заказчика">
				<div class="textIndexBigText">Контакты<br>заказчика</div>
				<div class="textIndexSmall">Вы получаете<br>контакты<br>заказчика.</div>
			</div>
			<div class="iconBlockOrg">
				<img class="textIcon" src="img/phone.png" alt="Ваше предложение">
				<div class="textIndexBigText">Ваше<br>предложение</div>
				<div class="textIndexSmall">Звонок заказчику. Цена<br>и преимущества вашего<br>предложения.</div>
			</div>
			<div class="iconBlockOrg">
				<img class="textIcon" src="img/text.png" alt="Заключение договора">
				<div class="textIndexBigText">Заключение<br>договора</div>
				<div class="textIndexSmall">Выбор Вашего предложения<br>заказчиком и заключение<br>договора.</div>
			</div>
			<p class="text_offer">
				Бесплатная регистрация позволит Вам получать актуальные тендеры на изготовление окон 
				<?php echo $_SESSION['morph']['gde']; ?>. После создания тендера, подробная информация 
				о нем приходит Вам на адрес электронной почты. Если Вас заинтересовал тендер, то Вам 
				необходимо перейти по ссылке в письме на страницу сайта, где Вы сможете произвести 
				оплату и получить контактный телефон заказчика. Также все тендеры доступны в личном кабинете.
			</p>
			<h3 class="tit_offer">Сколько это стоит</h3>
			<p class="text_offer">
				Стоимость контактных данных заказчика по одному тендеру рассчитывается как
				<br><b>50 рублей за одно окно в тендере, но не менее 100 рублей и не более 500 рубдей за один тендер</b>
				вне зависимости от необходимости монтажа и дополнительный услуг. Оплата производится на Яндекс кошелёк одним 
				из двух способов, посредством Яндекс денег либо банковской картой.
				Например если заказчик хочет приобрести одно двустворчатое окно плюс 
				балконный блок, то стоимость контактов заказчика по данному тендеру будет 
				составлять 100 рублей.
			</p>
			<h3 class="tit_offer">Только первые 10 компаний</h3>
			<p class="text_offer">
					Для того, чтобы заказчик не запутался в потоке предложений на установку окон, доступ 
					к контактам заказчика получают только десять первых компаний, откликнувшихся на тендер.
			</p>
			<h3 class="tit_offer">Возврат денег</h3>
			<p class="text_offer">
				Мы продаём контактные данные реальных покупателей пластиковых окон 
				<?php echo $_SESSION['morph']['gde']; ?>. Перед рассылкой все тендеры обязательно 
				проходят модерацию. Мы исключаем тендеры, в которых указаны некорректные контакты, 
				либо неверные размеры окон. Если Вы, всё же, не можете связаться с заказчиком 
				по указанному номеру телефона, либо заказчик сообщит Вам, что не размещал 
				тендер - мы вернем Вам оплату.
			</p>
			<div class="btnCrtTender">
				<a href="addorg.php" class="btnCrtTenderBig roundBorder">Добавить компанию бесплатно</a>
				<div class="txt_fo_btn">Это займёт не более 7 минут</div>
			</div>
		</div>
		
		
		
		<!--  Нам доверяют -->
		
		<div id="all">
			<div class="content_wrap">
				<div class="topTitleText">
					<h2 id="allTitel">Исползуйте все возможности</h2>
				</div>
				<div class="iconBlock" id="icbo1">
					<img class="iconOrg" src="img/book.png" alt="Расскажите о себе">
					<div class="textIndexBigText">Расскажите<br>о себе</div>
					<div class="txtOrgSmall">При регистрации Вы автоматически попадаете в справочник оконных компаний, благодаря чему ваши потенциальные клиенты быстрее и легче нахонят Вас.</div>
				</div>
				<div class="iconBlock" id="icbo2">
					<img class="iconOrg" src="img/messbig.png" alt="Получайте обратную связь">
					<div class="textIndexBigText">Получайте<br>обратную связь</div>
					<div class="txtOrgSmall">Вы сможете видеть отзывы клиентов о вашей работе, это дает возможность не только своевременно реагировать на их высказывания, но и понимать, что о Вас думают заказчики.</div>
				</div>
				<div class="iconBlock" id="icbo3">
					<img class="iconOrg" src="img/percent.png"alt="Публикуйте акции и скидки">
					<div class="textIndexBigText">Публикуйте<br>акции и скидки</div>
					<div class="txtOrgSmall">На ресурсе Надоокна Вы можете сообщить о проходящих <?php echo $_SESSION['morph']['gde']; ?> акциях и скидках, увеличивая эффективность вашей рекламы.</div>
				</div>
				<p class="text_foot_org">
					C помощью сервиса Надоокна Вы привлечёте новых клиентов и получите дополнительные заказы для вашего оконнго бизнеса <?php echo $_SESSION['morph']['gde']; ?>.
				</p>
				<div class="btnCrtTender" style="margin-bottom: 80px; z-index: 1;">
					<a href="addorg.php" class="btnCrtTenderBig roundBorder">Добавить компанию бесплатно</a>
					<div class="txt_fo_btn">Это займёт не более 7 минут</div>
				</div>
				
				<!-- ФУТЕР -->
				<?php include_once("pattern/footer.php");  ?>
			</div>
		</div>
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