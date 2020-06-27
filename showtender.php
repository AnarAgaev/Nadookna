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
	
	include_once("pattern/normalizedate.php");// приведение даты к читаемому виду
	
	$idtender = trim($_GET['idt']);
	$idtender = strip_tags($idtender); 
	$idtender = htmlspecialchars($idtender,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idtender = stripcslashes($idtender);
	
	$idorg = trim($_GET['ido']);
	$idorg = strip_tags($idorg); 
	$idorg = htmlspecialchars($idorg,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idorg = stripcslashes($idorg);
	
	$restender =  mysql_fetch_assoc(mysql_query("SELECT `idcity`,`phone`, `name`, `date` FROM `tenders` WHERE `idtender`='$idtender'",$db));
	$idcity = $restender['idcity'];
	$phone = $restender['phone'];
	$name = $restender['name'];
	$no_norm_date = $restender['date'];
	$date = f_normalizedate($restender['date']);
	
	$rowcity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcity'",$db));
	$city = $rowcity['city'];
	
	/* 	Сумма оплаты. Сейчас установлена в 30 рублей за одно окно в тендере, но не менее 100 рублей и не более 500 рублей
		за один тендер, возможно брать по 100 рублей за весь тендер, тогда нужно просто переменной $sum присваиваем заначение 
		по умолчанию в 100 рублей. $sum = 100.00;
	 */
	 
	// Получаем количество окон в тендере
 	$NumWins = 0;	
	$resNumWins = mysql_query("SELECT `idwin`, `kolvo` FROM `windate` WHERE `idtender`= '$idtender'",$db);
	
	for ($i = 0; $i < mysql_num_rows($resNumWins); $i++) {
		$NumWins += mysql_result($resNumWins, $i, "kolvo");
	}
	
	if ( $NumWins < 3 ) {
		$sum = 100.00;
	} elseif ( $NumWins > 10 )  {
		$sum = 500.00;
	} else {
		$sum = $NumWins * 50.00;
	}
	
	$sum = number_format((float)$sum, 2, '.', '');
 
	/* Смотрим оплачивала ли данная компания контакты из тендера ранее */
	$haveopen = mysql_fetch_assoc(mysql_query("SELECT `idopenconts` FROM `openconts` WHERE `idorg`='$idorg' AND `idtender`='$idtender'",$db));
	
	if( isset($_GET['ido']) and $_GET['ido'] and isset($_GET['idt']) and $_GET['idt'] ) {
		
		if( $haveopen['idopenconts'] == '' ) {
			$isPhone = false;
		} else {
			$isPhone = true;
		}
	}

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
	<title>Надоокна Тендер # <?php echo $idtender; ?></title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/showtender.css" />
	<link rel="stylesheet" type="text/css" href="style/tender.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body class="background"> 
		
	<!--******** Шапка контента ********-->
	<div class="title_vhod">
		<a class="to_start" href="/okonnym-kompaniyam.php">НАDООКНА</a>
		
		<? if (isset($_GET['idt'])): ?>
			<div>
				<img class="headimg" src="img/addorg.png">
				<h1 class="tit_text">Тендер # <?php echo $idtender; ?></h1>
				<div class="nameuser"><?php echo $name; ?></div>
				<div class="citydate"><?php echo $city; ?>, <?php echo $date; ?></div>
				<?php if ($isPhone) echo '<div class="phone">'. $phone .'</div>'; ?>
			</div>
		<? else: ?>
			<div>
				<div class="params" style="margin-top: 30px;">
					К сожалению мы не обнаружили в вашем запросе номер тендера который вы хотите посмотреть. Если Вы считаете, что это ошибка на сайте сообщите нам на странице контакты
					<a class="for_txt" href="../kontakty.php">Перейти на страницу Контакты</a> или 
					<a class="for_txt" href="/">Перейдите на главную страницу сайта.</a>
				</div>
			</div>
		<? endif;?>
	</div>
	
	<?php if( !$isPhone and isset($_GET['idt']) and $_GET['idt'] and isset($_GET['ido']) and $_GET['ido'] ): ?>
		<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" class="form__by-tender" id="by-tender" >
			<span class="form__title">Показать контакты?</span>
			<span class="form__subtitle">
				Чтобы увидеть контакты человека разместившего тендер Вам необходимо совершить оплату 
				<b>в размере 50 рублей за одно окно в тендере, но не менее 100 рублей и не более 500 рубдей за один тендер.</b>
				Оплата производится на Яндекс кошелёк одним из двух способов, посредством Яндекс денег либо банковской картой.
				<br><br>Количество окон в данном тендере: <?= $NumWins; ?>
			</span>
			<?
				// Если оконная компания залогинена, говорим что открытые контакты сохраняться в личном кабинете.
				if (isset($_SESSION['idorg'])) {
					echo '<span class="form__desc">Открытые после оплаты контакты навсегда останутся видны в личном кабинете и Вы в любой момент сможете к ним вернуться.</span>';
				}
			?>
			<span class="form__question-title">Оплатить <? echo round($sum, 0); ?> рублей</span>
			
			<input type="hidden" name="receiver" value="410011080100319">
			<input type="hidden" name="quickpay-form" value="shop">
			<input type="hidden" name="targets" value="Оплата контактов тендера #<?= $idtender; ?>">
			<input type="hidden" name="sum" value="<?=$sum; ?>" data-type="number">
			<input type="hidden" name="successURL" value="http://nadookna.com/showtender.php?idt=<?= $idtender;?>&ido=<?= $idorg;?>">
			<input type="hidden" name="formcomment" value="Надоокна: оплата контактов тендера #<?= $idtender; ?>">    
			<input type="hidden" name="short-dest" value="Надоокна: оплата контактов тендера #<?= $idtender; ?>">    
			<input type="hidden" name="label" value="<?= $idtender; ?>_<?= $idorg; ?>_<?= $no_norm_date; ?>_<?=$sum; ?>">    
			<input type="hidden" name="comment" value="">    
			<input type="hidden" name="need-fio" value="false">    
			<input type="hidden" name="need-email" value="false">    
			<input type="hidden" name="need-phone" value="false">    
			<input type="hidden" name="need-address" value="false">
			<label><input type="radio" name="paymentType" value="PC" required><span class="checker"></span>Яндекс.Деньгами</label>    
			<label><input type="radio" name="paymentType" value="AC"><span class="checker"></span>Банковской картой</label>    
			<input type="submit" value="Оплатить контакты" class="form_btn-submit">
		</form>
	<?php endif; ?>
	
	<?php
		$res = mysql_query("SELECT `num`,`shirina`,`visota_okna`,`shirina_dveri`,`visota_dveri`,`kol_steklo`,`kol_profil`,`kolvo`,`otliv`,`otkos`,`podok`,`montag`,`moscit`,`zamok` FROM `windate` WHERE `idtender`='$idtender'",$db);
		for ($i = 0; $i < mysql_num_rows($res); $i++)
			{
				$num = mysql_result($res, $i, "num");
				$shirina = mysql_result($res, $i, "shirina");
				$visota_okna = mysql_result($res, $i, "visota_okna");
				$shirina_dveri = mysql_result($res, $i, "shirina_dveri");
				$visota_dveri = mysql_result($res, $i, "visota_dveri");
				$kol_steklo = mysql_result($res, $i, "kol_steklo");
				$kol_profil = mysql_result($res, $i, "kol_profil");
				$kolvo = mysql_result($res, $i, "kolvo");
				$otliv = mysql_result($res, $i, "otliv");
				$otkos = mysql_result($res, $i, "otkos");
				$podok = mysql_result($res, $i, "podok");
				$montag = mysql_result($res, $i, "montag");
				$moscit = mysql_result($res, $i, "moscit");
				$zamok = mysql_result($res, $i, "zamok");
				
			echo '<div class="win_body" style="padding: 15px 0;">';
				echo '<div class="img_body"><img src="img/addtndr/win/'.$num.'.png"></div>';
				echo '<div class="win_txt">';
				
					$reswin = mysql_fetch_assoc(mysql_query("SELECT `about` FROM `wins` WHERE `id_wins`='$num'"));
					echo '<div class="tit_pars">'.$reswin['about'].'</div>';
					
					echo '<div class="params"><span class="tit_params">Ширина конструкции:</span>'.$shirina.'</div>';
					echo '<div class="params"><span class="tit_params">Высота окна:</span>'.$visota_okna.'</div>';
					if($visota_dveri != 0) echo '<div class="params"><span class="tit_params">Высота двери:</span>'.$visota_dveri.'</div>';
					if($shirina_dveri != 0) echo '<div class="params"><span class="tit_params">Ширина двери:</span>'.$shirina_dveri.'</div>';
					echo '<div class="params"><span class="tit_params">Количество камер ПВХ профиля:</span>'.$kol_profil.'</div>';
					echo '<div class="params"><span class="tit_params">Количество камер стеклопакета:</span>'.$kol_steklo.'</div>';
					echo '<div class="params"><span class="tit_params">Отлив:</span>'.$otliv.'</div>';
					echo '<div class="params"><span class="tit_params">Откосы:</span>'.$otkos.'</div>';
					echo '<div class="params"><span class="tit_params">Подоконник:</span>'.$podok.'</div>';
					echo '<div class="params"><span class="tit_params">Монтаж:</span>'.$montag.'</div>';
					echo '<div class="params"><span class="tit_params">Москитная сетка:</span>'.$moscit.'</div>';
					echo '<div class="params"><span class="tit_params">Защита от детей:</span>'.$zamok.'</div>';
					echo '<div class="params"><span class="tit_params">Количество таких окон:</span>'.$kolvo.'</div>';
				echo '</div>';
			echo '</div>';
			}
			
			// Если компания залогиннена показываем кнопку посмотреть все тендеры
			if (isset($_SESSION['idorg'])) {
				echo '<a class="to_tenders roundBorder" href="tenders.php">Показать все тендеры</a>';
			} else {
				if ( isset($_GET['idt']) and $_GET['idt'] ) {
				
					echo '<div class="more_tenders">Что бы посмотреть другие тендеры<br>выполните 
							<a href="/login.php">Вход</a> или
							<a href="/addorg.php">Зарегистрируйтесь</a>.
						  </div>';
				
				} 		
			}

	?>
	
	<div class="footer">&copy; Надоокна 2014-2016&nbsp;&nbsp; <a class="input" href="../">Перейти на Главную</a></div>	

	<?php
		// Подключаем счётчики метрик
		include_once("pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>