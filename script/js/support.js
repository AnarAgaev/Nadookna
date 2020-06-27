/* ************************

	Данныя функция валидирует данные введённые пользователем в форму на странице Служба поддрежки для организаций
	и посылает сообщение через AJAX запрос и функцию в файле sendcollme.php

**************************/

function f_supp_validate(){
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
		data: {orgName:$('#orgName').val(), orgCity:$('#orgCity').val(), orgMail:$('#orgMail').val(), phone1:$('#phone1').val(), phone2:$('#phone2').val(), phone3:$('#phone3').val(), phone4:$('#phone4').val(), phone5:$('#phone5').val(), kontakty:$('#kontakty').val(), text_kontakty:$('#text_kontakty').val(), from_page:'supp'},
		dataType: "text",
		async: true,
		success: function(data){
				if (data == 1) {
					$('#colMeOk,.fon_blok').css('display','block');
					$("#kontakty,#text_kontakty").val('');
					
				}
				else alert('К сожалению не удалось отправить сообщение. Повторите попытку позже.');
			}
		});
	}
}