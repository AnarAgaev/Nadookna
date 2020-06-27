<?php 

    /************************
	
		Данный скрипт получает переменную 
		идентификатор окна и понуме заправшивает
		описание окна из БД
		
	****************************/
	
	include_once("../../pattern/dbconnect.php");

	$idokna = trim($_POST['idokna']);
	$idokna = strip_tags($idokna); 
	$idokna = htmlspecialchars($idokna,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idokna = stripcslashes($idokna);
	
	$date = mysql_fetch_assoc(mysql_query("SELECT `about` FROM `wins` WHERE `id_wins`='$idokna'"));

	echo $date['about'];
?>