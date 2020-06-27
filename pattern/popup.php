<?php   

	
	/**********************************
	
		В этом файле скрипты выводящие POPUP 
		окна для захвата пользователя и перенаправления
		
		Куки и сессии создаются на странице вывода popup бынера в самом начале
		страницы, т.к. куди должны создаваться перед выводом <head> и <html>
	
	***********************************/
	
	if (!isset($_COOKIE['popupSetTender']) and !isset($_SESSION['popupSetTender'])){ 
	
		// созданим переменну сесии с маркером на случай если куки у пользователя отключены
		$_SESSION['popupSetTender'] = TRUE;
?>
		
		<div id="leadBox">
			<div id="help_box_for_lead">
				<div class="tit_lead">
					<div class="close_popup" onclick="$('#leadBox').animate({bottom:'-350px'},300);">×</div>
					Разместите Тендер на покупку окон
					<div class="txt_lead">Купите окна со скидкой до 20%</div>
				</div>
				<a href="../" class="btn_from_lead roundBorder">Узнать подробнее</a>
			</div>
		</div>
		
		<script async type="text/javascript">
			setTimeout(function() {
				$("#leadBox").animate({bottom:"0px"},300);
				setTimeout(function() {
					  $("#leadBox").animate({bottom:"-350px"},300);
				}, 10000);
			}, 1800);
		</script>
	
<?php		
	}
?>