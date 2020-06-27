<?php 
	/* ******************
		в данном скрипте осуществляем проверку 
		есть ли введенный при входе мэйл в БД или нет 
	****************** */

	//удаляем лишние пробелы, создаём переменные с данными
	$mail = trim($_POST['email']);

	// вырезаем теги
	$mail = strip_tags($mail); 

	//конвертируем специальные символы
	$mail = htmlspecialchars($mail,ENT_QUOTES);

	// Если директива magic_quotes_gpc включена, то удаляем защитные косые черты во всех переменных
	if (get_magic_quotes_gpc())	$mail = stripcslashes($mail);

	include_once("../../pattern/dbconnect.php");
	$res = mysql_query("SELECT idorg FROM orgs WHERE email='$mail'",$db);
    $row = mysql_fetch_assoc($res);
    if (!isset($row['idorg'])) echo 'error';
	else echo 'ok';
?>