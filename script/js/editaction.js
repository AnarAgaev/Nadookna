/* ***************************** 

	В этом скрипте происходит проверка полей при редактировании акции оконной компанией
	Окончательная валидациия происходит на странице принимающей данные (promotions.php)

***************************** */

function f_edit_action() 
{
	$("#no_titel,#long_titel,#no_txt,#long_txt,#err_finish_data,#err_data,#no_start,#no_finish").css({'display':'none'});

	if ($("#name").val() == '')
	{
		$("#no_titel").css({'display':'block'}); // ругаемся на отсутствие заголовка акции
		$("#name").focus();
		$('#name').keyup(function(){if ($('#name').val() != '') $("#no_titel").css({'display':'none'});});
	}
	else {
		if ($("#name").val().length > 100){
			$("#long_titel").css({'display':'block'}); // ругаемся на слишком длинный заголовок
			$("#name").focus();
			$('#name').keyup(function(){if ($('#name').val() != '') $("#long_titel").css({'display':'none'});});
		}
	}
	
	if ($("#about").val() == '')
	{
		$("#no_txt").css({'display':'block'}); // ругаемся на отсутствие текста акции
		if ($("#no_titel").css("display") != "block" && $("#long_titel").css("display") != "block"){
			$("#about").focus();
			$('#about').keyup(function(){if ($('#about').val() != '') $("#no_txt").css({'display':'none'});});
		}
	}
	else {
		if ($("#about").val().length > 500){
			$("#long_txt").css({'display':'block'}); // ругаемся на слишком длинный текст акции
		if ($("#no_titel").css("display") != "block" && $("#long_titel").css("display") != "block"){
				$("#about").focus();
				$('#about').keyup(function(){if ($('#about').val() != '') $("#long_txt").css({'display':'none'});});
		}
		}
	}
	
	
	var dsa  = $('#data_start_action').val().split('.');
	var ds = new Date(dsa[2]+'-'+dsa[1]+'-'+dsa[0]);
	var dfa  = $('#data_finish_action').val().split('.');
	var df = new Date(dfa[2]+'-'+dfa[1]+'-'+dfa[0]);
	
	if (df < ds) $("#err_finish_data").css({'display':'block'}); // ругаемся на неправилные даты проведения акции
	
	if($("#data_start_action").val() != '' && $("#data_finish_action").val() != ''){
		if ((dsa[0]+dsa[1]+dsa[2]) == (dfa[0]+dfa[1]+dfa[2])) $("#err_data").css({'display':'block'}); // ругаемся на неправилные даты проведения акции
	}

	if ($("#data_start_action").val() == '') $("#no_start").css({'display':'block'}); // ругаемся на отсутствие даты начала акции
	if ($("#data_finish_action").val() == '') $("#no_finish").css({'display':'block'}); // ругаемся на отсутствие даты окончания акции
	
	if(	$("#no_titel").css("display") != "block" && 
		$("#long_titel").css("display") != "block" && 
		$("#no_txt").css("display") != "block" && 
		$("#long_txt").css("display") != "block" && 
		$("#err_finish_data").css("display") != "block" &&
		$("#err_data").css("display") != "block" &&
		$("#no_start").css("display") != "block" &&
		$("#no_finish").css("display") != "block") $('#form_editAction').submit(); // отправляем данные
	
}