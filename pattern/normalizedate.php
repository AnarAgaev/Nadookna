<?php 
/* 
	данные функции выполняет преобразование даты из MySQL (2013-03-18) в дату которая
	буде номально смотреться на страницу , например - 26 март 2013.
	В функцию необходимо передать один параметр: sql дату.
	Фунция возвращает один параметр: нормализованую дату.
	
*/
function f_normalizedate ($sql_date){
	
	$month = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$sql_date = date_create($sql_date);
	$date = (int)date_format($sql_date, 'd ').' ';
	$date .= $month[date_format($sql_date, 'n')];
	$date .= date_format($sql_date, ' Y');
	return $date;
}

function f_normdatewithoutyear ($sql_date){
	
	$month = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$sql_date = date_create($sql_date);
	$date = (int)date_format($sql_date, 'd ').' ';
	$date .= $month[date_format($sql_date, 'n')];
	return $date;
}

?>