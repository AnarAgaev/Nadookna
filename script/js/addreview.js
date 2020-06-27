/* ********************
	Данный скрипт добавляет отзыв к оконной компании
	
********************** */

function f_add_review(idorg)
{
	$(".errEditData").css({'display':'none'});
	
	if ($("#namerev").val() == ''){
		$("#no_name_rev").css({'display':'block'}); // ругаемся на отсутствие имени
		$("#namerev").focus();
		$('#namerev').keyup(function(){if ($('#namerev').val() != '') $("#no_name_rev").css({'display':'none'});});
	}
	
	if ($("#text_rev").val() == ''){
		$("#no_txt_rev").css({'display':'block'}); // ругаемся на отсутствие отзыва
		if ($("#no_name_rev").css("display")!='block') $("#text_rev").focus();
		$('#text_rev').keyup(function(){if ($('#text_rev').val() != '') $("#no_txt_rev").css({'display':'none'});});
	}
	
	if ($('#namerev').val() != '' && $('#text_rev').val() != ''){
		$.ajax({
		type: "POST",
		cache: false ,
		url: "../script/php/addreview.php",
		data: {idorg:idorg, username:$('#namerev').val(), usertxt:$('#text_rev').val()},
		dataType: "text",
		async: true,
		success: function(data){
				if (data == 1) {
					$('#colMeOk,.fon_blok').css('display','block');
					$("#namerev,#text_rev").val('');
					
				}
				else alert('К сожалению не удалось отпарвить запрос. Повторите попытку позже.');
			}
		});
	}
}