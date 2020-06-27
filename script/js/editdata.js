/* ***************************** 

	В этом скрипте происходит проверка поля Название оконной компании (заполнено или нет)
	и поля Емэйл (заполнено или нет, корректно ли введено)
	Окончательная валидациия происходит на странице принимающей данные (data.php)

***************************** */

function f_edit_data() 
{
	$("#no_name,#no_mail,#err_mail").css({'display':'none'});

	if ($("#name").val() == '')
	{
		$("#no_name").css({'display':'block'}); // ругаемся на отсутствие имени организации
		$("#name").focus();
		$('#name').keyup(function(){if ($('#name').val() != '') $("#no_name").css({'display':'none'});});
	}

	if ($("#email").val() == '')
	{
		$("#no_mail").css({'display':'block'}); // ругаемся на отсутствие мэйла
		if ($("#no_name").css("display")!='block') $("#email").focus();
		$('#email').keyup(function(){if ($('#email').val() != '') $("#no_mail").css({'display':'none'});});
	}

	if ($("#name").val() != '' && $("#email").val() != '')
	{
		var tst = /^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
		if (!tst.test($('#email').val())) 
		{
			$("#err_mail").css({'display':'block'}); // ругаемся на некорректный мэйл			
			if ($("#no_name").css("display")!='block') $("#email").focus();
			$('#email').keyup(function(){if ($('#email').val() != '') $("#err_mail").css({'display':'none'});});
		}
		else $('#form_editData').submit(); // отправляем данные
	}
}