<?php 

    /************************
	
		Данный скрипт получает переменную 
		идентификатор тендера и удаляет 
		соответствующий тендер из БД.
		Тендер удаляется елси в нём недоступен номер
		телефона или он указан заведомо неверно
		
	****************************/
	
	include_once("../../pattern/dbconnect.php");

	$idtender = trim($_POST['idtender']);
	$idtender = strip_tags($idtender); 
	$idtender = htmlspecialchars($idtender,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idtender = stripcslashes($idtender);
	
	if (mysql_query("DELETE FROM `tenders` WHERE `idtender`='$idtender'",$db)) echo $idtender;
	else echo 'error';
	
?>