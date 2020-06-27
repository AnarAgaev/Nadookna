<?php 
		/* *********************

		В данном скрипте добавляем отзыв к компании

		********************* */	


	// подключаем БД
	include_once("../../pattern/dbconnect.php");
		
 
	$idorg = trim($_POST['idorg']);
	$username = trim($_POST['username']);
	$usertxt = trim($_POST['usertxt']);

	// вырезаем теги
	$username = strip_tags($username); 
	$usertxt = strip_tags($usertxt); 

	//конвертируем специальные символы
	$username = htmlspecialchars($username,ENT_QUOTES);
	$usertxt = htmlspecialchars($usertxt,ENT_QUOTES);

	// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
	if (get_magic_quotes_gpc()) {
		$username = stripcslashes($username);
		$usertxt = stripcslashes($usertxt);
	}

	// Добавляем отзыв в БД
	$rslt = mysql_query("INSERT INTO `reviews`(`id`, `idorg`, `user`, `date`, `review`) VALUES (NULL,'$idorg','$username',NOW(),'$usertxt')",$db);
	if ($rslt != FALSE) echo $rslt;
	else echo 'error';


?>