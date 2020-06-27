/* ************************

	Данныя функция валидирует данные введённые пользователем в форму на странице Контакты
	и посылает сообщение через AJAX запрос и функцию в файле sendcollme.php

**************************/

function f_kontakty_validate(){
	
	$("#no_contakt,#no_txt").css({'display':'none'});	
	
	
	if ($("#kontakty").val() == ''){
		$("#no_contakt").css({'display':'block'}); // ругаемся на отсутствие контактов
		$("#kontakty").focus();
		$('#kontakty').keyup(function(){if ($('#kontakty').val() != '') $("#no_contakt").css({'display':'none'});});
	}
	
	if ($("#text_kontakty").val() == ''){
		$("#no_txt").css({'display':'block'}); // ругаемся на отсутствие текста сообщения
		if ($("#no_contakt").css("display")!='block') $("#text_kontakty").focus();
		$('#text_kontakty').keyup(function(){if ($('#text_kontakty').val() != '') $("#no_txt").css({'display':'none'});});
	}
	
	if ($('#kontakty').val() != '' && $('#text_kontakty').val() != ''){
		$.ajax({
		type: "POST",
		cache: false ,
		url: "../script/php/sendcollme.php",
		data: {cityatform:$('#cityAtFormKont').val(),kontakty:$('#kontakty').val(), text_kontakty:$('#text_kontakty').val(), from_page:'kontakty'},
		dataType: "text",
		async: true,
		success: function(data){
				if (data == 1) {
					$('#colMeOk,.fon_blok').css('display','block'); 
					$("#kontakty,#text_kontakty").val('');
				}
				else alert('К сожалению не удалось отпарвить запрос. Повторите попытку позже.');
			}
		});
	}
}