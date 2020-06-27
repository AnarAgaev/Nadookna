/* ********************
	Выход из аккаунта
********************** */

$(".logout").click(function(){
	$.ajax({
		url: "../script/php/logout.php",
		async: false,
	});
});


$(".logout_dopnavOrg").click(function(){
	$.ajax({
		url: "../script/php/logout.php",
		async: false,
	});
});

