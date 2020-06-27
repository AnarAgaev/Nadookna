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
	
	if(isset($_GET['logout'])) unset($_SESSION['admin']);
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
	<title>Верификация тендера</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="style/tender.css" />
	<link rel="stylesheet" type="text/css" href="style/verification.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

	<div class="fon_blok" onclick="$('.fon_blok,.win_content,#go_to_work_ok').css('display','none');"></div>
	
	<div class="popUpOk" id="go_to_work_ok" style="margin-top: -128px;">
		<div class="close_popup" onclick="$('.fon_blok,#go_to_work_ok').css('display','none');" style="color: #fff;" onmouseover="this.style.color='#999';" onmouseout="this.style.color='#fff';">×</div>
		<div class="tipPopUp"><img src="../img/send_ok.png"></div>
		<div class="textPopUp" id="textPopUp_go"></div>
	</div>
	
	<div class="popUpOk" id="del_tender_ok" style="margin-top: -128px;">
		<div class="close_popup" onclick="$('.fon_blok,#del_tender_ok').css('display','none');" style="color: #fff;" onmouseover="this.style.color='#999';" onmouseout="this.style.color='#fff';">×</div>
		<div class="tipPopUp"><img src="../img/send_ok.png"></div>
		<div class="textPopUp" id="textPopUp_del"></div>
	</div>

	
	<div class="win_content" style="position: absolute; left: calc(50% - 400px); z-index: 1000; background-color: #fff;  display: none;">
		<div class="del_win" onclick="$('.fon_blok,.win_content').css('display','none');">×</div>
		<div class="bodyOrderPopUp">
			<div class="id_bodyOrder" id="id_bodyOrder"></div>
			<div class="txt_bodyOrder" id="txt_bodyOrder"></div>
			<div class="phone_bodyOrder" id="phone_bodyOrder"></div>
		</div>
	</div>	
	
	

	<?php
		include_once("pattern/dbconnect.php");
		if(isset($_SESSION['admin']) and $_SESSION['admin'] == true){
	?>
		
	<div class="wrapper">
		<div class="nav">
			<div class="content_wrap">
				<a id="logo" href="../" >НАDООКНА</a>
				<a class="logout roundBorder" href="../verification.php?logout">ВЫХОД</a>
				<a class="exit" href="../verification.php?logout"><img src="img/exit.png"></a>
				
			</div>
		</div>
		
		<div class="content" style="min-height: calc(100vh - 70px); background: none;">
			<div class="content_wrap" style="width: 100%; max-width: 650px; margin: 70px auto 120px;">	
				
					<?php 
						include_once("pattern/normalizedate.php"); // скрипт для преобразования даты в нормальный вид
						$result = mysql_query("SELECT `idtender`, `idcity`, `phone`, `name`, `date` FROM `tenders` WHERE `verifi`= 0 ORDER BY `idtender` DESC",$db);
						
						for ($i = 0; $i < mysql_num_rows($result); $i++)
						{
							$idtender = mysql_result($result, $i, "idtender");
							$phone = mysql_result($result, $i, "phone");
							$name = mysql_result($result, $i, "name");
							$date = f_normalizedate(mysql_result($result, $i, "date"));
							
							$idcity = mysql_result($result, $i, "idcity");
							$rowcity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcity'",$db));
						
							echo '<div class="bodyOrder" id="'.$idtender.'" onclick="f_showtender('.$idtender.',\''.$name.'\',\''.$rowcity['city'].'\',\''.$date.'\',\''.$phone.'\')">';
								echo '<div class="id_bodyOrder"># '.$idtender.'</div>';
								echo '<div class="txt_bodyOrder">'.$name.' - '.$rowcity['city'].' - '.$date.'</div>';
								echo '<div class="phone_bodyOrder">'.$phone.'</div>';
							echo '</div>';
						}
					?>
			</div> 
			<div class="footer" style="position: absolute; bottom: 0;">
				&copy; Надоокна 2014-2017
			</div>		
		</div>
	</div>
		
	<?php	
		
		}
		else echo <<<HERE
		
			<div class="title_vhod">
				<a class="to_start" href="../">НАDООКНА</a>
				<div>
					<img class="vhod" src="../img/men.png">
					<h1 class="tit_text">Вход для менеджера</h1>
				</div>
			</div>
		
			<div class="boxinput" style="left(50% - 175px);">
				<div class="err" id="err_log" style="text-align: center;">Неверный логин</div>
				<div class="err" id="err_pas" style="text-align: center;">Неверный пароль</div>
				<input type="text" id="log" class="inputVhod" placeholder="Логин">
				<input type="password" id="pas" class="inputVhod"  placeholder="Пароль">
				<input type="button" id="go_vhod" class="roundBorder" onclick="f_input()" value="Войти" style="margin-bottom: 40px;">
			</div>		
HERE;
	?>
	<script async src="script/js/verification.js" type="text/javascript"></script>
</body>
</html>