<?php

	session_start();
	include_once("../../pattern/dbconnect.php"); // Подключаемся к БД

	$tender = trim($_POST['json_str']);
	$tender = strip_tags($tender); 
	if (get_magic_quotes_gpc()) {$tender = stripcslashes($tender);}
	
	$tender = json_decode($tender, true); // распарсиваем json строку в массив
	
	$city = $_SESSION['city'];
	$idCityRow = mysql_fetch_assoc(mysql_query("SELECT `id_city` FROM `city` WHERE `city`='$city'",$db));
	$idcity = $idCityRow['id_city'];

	mysql_query("INSERT INTO `tenders`(`idtender`, `idcity`, `phone`, `name`, `date`) VALUES (NULL,'$idcity','$tender[phone]','$tender[name]',NOW())"); 
	$idtender = mysql_insert_id(); // ИД только что добавленного тендера
	
	// Удаляем доп поля из массива, что бы потом в foreach пройти по нему и добавить все окна а БД
	unset($tender[phone]); 
	unset($tender[name]);
	
	foreach ($tender as $key => $val) {
		mysql_query("INSERT INTO `windate`(`idwin`, `idtender`, `num`, `shirina`, `visota_okna`, `shirina_dveri`, `visota_dveri`, `kol_steklo`, `kol_profil`, `kolvo`, `otliv`, `otkos`, `podok`, `montag`, `moscit`, `zamok`) VALUES (NULL,'$idtender','$val[idokna]','$val[shirina]','$val[visota_okna]','$val[shirina_dveri]','$val[visota_dveri]','$val[kol_steklo]','$val[kol_profil]','$val[kolvo]','$val[otliv]','$val[otkos]','$val[podok]','$val[montag]','$val[moscit]','$val[zamok]')"); 
	}
	
	echo $idtender;
	
	
	// Посылаем письмо администратору для верификации созданног тендера:
	$email = 'anar.n.agaev@gmail.com,roman@nadookna.com';
	
	$message = "Здравструйте! Новый тендер на сайте NADOOKNA нуждается в верификации.\r\n\n";
	$message .= "Данные тедера:\r\n";
	$message .= "Город размещения: ".$idcity." - ".$city."\r\n";
	$message .= "Идентификатор тендера: ".$idtender."\r\n\n";
	$message .= "Переход на страницу верификации: ";
	$message .= "http://nadookna.com/verification.php";
	
	$subject = "Модерация нового тендера на сайте Надоокна.";
	$subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   

	$from = "Надоокна";
	$from = "=?utf-8?b?". base64_encode($from) ."?=";	
	$header = "Content-type: text/plain; charset=utf-8\r\n";
	$header .= "From: ".$from."<info@nadookna.com>\r\n";
	$header .= "MIME-Version: 1.0\r\n"; 
	$header .= "Date: ".date('D, d M Y h:i:s O'); 
	
	mail($email, $subject, $message, $header);
?>