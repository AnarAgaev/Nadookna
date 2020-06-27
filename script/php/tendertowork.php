<?php 

    /************************
	
		Данный скрипт получает переменную 
		идентификатор тендера и запускает 
		соответствующий тендер в работу,
		что бы потом cron проходя по тендерам
		разослал его по оконным компаниям
		
	****************************/
	
	include_once("../../pattern/dbconnect.php");

	$idtender = trim($_POST['idtender']);
	$idtender = strip_tags($idtender); 
	$idtender = htmlspecialchars($idtender,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $idtender = stripcslashes($idtender);
	
	echo mysql_query("UPDATE `tenders` SET `verifi`=1 WHERE `idtender`='$idtender'",$db);
	
?>