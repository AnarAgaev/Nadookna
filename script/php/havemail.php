<?php 
	/* ******************
		� ������ ������� ������������ �������� 
		���� �� ��������� ��� ����� ���� � �� ��� ��� 
	****************** */

	//������� ������ �������, ������ ���������� � �������
	$mail = trim($_POST['email']);

	// �������� ����
	$mail = strip_tags($mail); 

	//������������ ����������� �������
	$mail = htmlspecialchars($mail,ENT_QUOTES);

	// ���� ��������� magic_quotes_gpc ��������, �� ������� �������� ����� ����� �� ���� ����������
	if (get_magic_quotes_gpc())	$mail = stripcslashes($mail);

	include_once("../../pattern/dbconnect.php");
	$res = mysql_query("SELECT idorg FROM orgs WHERE email='$mail'",$db);
    $row = mysql_fetch_assoc($res);
    if (!isset($row['idorg'])) echo 'error';
	else echo 'ok';
?>