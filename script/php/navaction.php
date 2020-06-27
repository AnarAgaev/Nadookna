<?php 

/* *******
	данная функция создает строку навигации 
	по страницам с акциями
	если количество акций больше 7-и - это переменная
	$num_elements на странице вывода акций
******* */

function GetNav($p, $num_pages){
	//Проверяем нужна ли ссылка "На первую"
	if($p > 3){
		$first_page = '<a class="pagewords" href="'.$_SERVER['SCRIPT_NAME'].'?page=1">Первая</a><div class="withoutpages"> ... </div>';
	}
	else{
		$first_page = '';
	}
	//Проверяем нужна ли ссылка "На последнюю"
	if($p < ($num_pages - 2)){
		$last_page = '<div class="withoutpages"> ... </div><a class="pagewords" href="'.$_SERVER['SCRIPT_NAME'].'?page='.$num_pages.'">Последняя</a>';
	}
	else{
		$last_page = '';
	}
	//Формируем по 2 страницы до и после текущей (при наличии таковых, конечно):
	if($p - 2 > 0){
		$prev_2_page = '<a class="pagenums" href="'.$_SERVER['SCRIPT_NAME'].'?page='.($p - 2).'">'.($p - 2).'</a>';
	}
	else{
		$prev_2_page = '';
	}
	
	if($p - 1 > 0){
		$prev_1_page = '<a class="pagenums" href="'.$_SERVER['SCRIPT_NAME'].'?page='.($p - 1).'"> '.($p - 1).'</a>';
	}
	else{
		$prev_1_page = '';
	}
	
	if($p + 2 <= $num_pages){
		$next_2_page = '<a class="pagenums" href="'.$_SERVER['SCRIPT_NAME'].'?page='.($p + 2).'"> '.($p + 2).'</a>';
	}
	else{
		$next_2_page = '';
	}
	if($p + 1 <= $num_pages){
		$next_1_page = '<a class="pagenums" href="'.$_SERVER['SCRIPT_NAME'].'?page='.($p + 1).'">'.($p + 1).'</a>';
	}
	else{
		$next_1_page = '';
	}
	//формируем сторку переходов-страниц из ссылок
	$nav = $first_page.' '.$prev_2_page.' '.$prev_1_page.'<div class="activepage">'.$p.'</div>'.$next_1_page.' '.$next_2_page.' '.$last_page;
  return $nav;
}
?>