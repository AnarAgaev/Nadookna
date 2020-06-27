// увеличиваем высоту контента для мобильных устройств
$(document).ready(function () {
	
	if($(".content").height() < $(window).height()){
		$(".content").css("height", $(window).height() - 70);
		$(".footer").css({"position":"absolute", "bottom":"0"})
		
		
	} 
	
	
	
	//alert($(".content").height());
	//$(".content").css("height", $(window).height() - 70);
	//alert($(window).height());
	
});