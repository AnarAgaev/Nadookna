<?php
	
    /************************
	
		Данный скрипт уастанавливает перменную сессии, 
		содержающую город пользвателя.
		Если город не определён, то переменной
		присваивается занчение "Выберите Ваш город"
		

	****************************/
	
	// Валидирум полученную переменную содержащую город пользователя
	$city = trim($_POST['city']);
	$city = strip_tags($city); 
	$city = htmlspecialchars($city,ENT_QUOTES);
	if (get_magic_quotes_gpc()) $city = stripcslashes($city);
	
	// Стартуем сессию
	session_start();
	
	// Создаём перемнную сессии, содержащую город пользователя
	$_SESSION['city'] = $city;
		
?>