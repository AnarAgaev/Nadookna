<?php 
	session_start(); //стартуем сессию

	/* ******************
		в данном скрипте осуществляем 
		верификацию пользователя
	****************** */
	
	//удаляем лишние пробелы, создаём переменные с данными
	$mail = trim($_POST['email']);
	$pas = trim($_POST['pas']);
	$check = trim($_POST['check']);

	// вырезаем теги
	$mail = strip_tags($mail); 
	$pas = strip_tags($pas); 
	$check = strip_tags($check); 

	//конвертируем специальные символы
	$mail = htmlspecialchars($mail,ENT_QUOTES);
	$pas = htmlspecialchars($pas,ENT_QUOTES);
	$check = htmlspecialchars($check,ENT_QUOTES);

	// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
	if (get_magic_quotes_gpc()){
		$mail = stripcslashes($mail);
		$pas = stripcslashes($pas);
		$check = stripcslashes($check);
	}
	
	include_once("../../pattern/dbconnect.php");
	
	$row = mysql_fetch_assoc(mysql_query("SELECT `idorg`, `pass`, `idcity` FROM `orgs` WHERE `email`='$mail'",$db)); 
	
	if ($row['pass'] == md5($pas)){
		
		$_SESSION['idorg'] = $row['idorg'];
		
		$idsity = $row['idcity'];
		$ressity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idsity'",$db));
		$sity = $ressity['city'];
		$_SESSION['city'] = $sity;
		
		$rowmouph = mysql_fetch_assoc(mysql_query("SELECT * FROM `morpher` WHERE `ime`='$sity'",$db));

		$_SESSION['morph'] = array('ime'=>$rowmouph['ime'], 
					   'rod'=>$rowmouph['rod'],
					   'dat'=>$rowmouph['dat'],
					   'vin'=>$rowmouph['vin'],
					   'tvo'=>$rowmouph['tvo'],
					   'pre'=>$rowmouph['pre'],
					   'gde'=>$rowmouph['gde'],
					   'kud'=>$rowmouph['kud'],
					   'otk'=>$rowmouph['otk'],
					   );
		
		
		// сохраняем или удаляем пользователя в куках
		if ($check == 'true'){
			setcookie("login", $mail, time()+9999999, "/");
			setcookie("password", $pas, time()+9999999, "/");
		}
		else {
			setcookie ("login", "", 1, "/");
			setcookie ("password", "", 1, "/");
		}
		
		echo 'log_true';	
	} 
	else echo 'log_error';
?>