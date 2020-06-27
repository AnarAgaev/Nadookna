function f_enter_input() {
	$("#war_mail,#no_mail,#err_pass,#war_pass,#err_mail_input").css({'display':'none'});
		
	if ($("#email").val() == ''){
		$("#err_mail_input").css({'display':'block'}); // ругаемся на отсутствие мэйла
		$("#email").focus();
		$('#email').keyup(function(){if ($('#email').val() != '') $("#err_mail_input").css({'display':'none'});});
	} 
	else{
		var tst = /^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
		if (!tst.test($('#email').val())) {
			$("#war_mail").css({'display':'block'}); // ругаемся на некорректный мэйл			
			$("#email").focus();
			$('#email').keyup(function(){if ($('#email').val() != '') $("#war_mail").css({'display':'none'});});
		}
		else {
			$.ajax({
				type: "POST",
				cache: false ,
				url: "../script/php/havemail.php",
				data: {email:$("#email").val()},
				dataType: "text",
				async: false,
				success: function(data){
					if (data == 'error') { 
						$("#no_mail").css({'display':'block'}); // ругаемся на отстутствующий мэйла в бд			
						$("#email").focus();
						$('#email').keyup(function(){if ($('#email').val() != '') $("#no_mail").css({'display':'none'});});
					}
				}
			});
		}
	}
	
	if ($("#pas").val() == ''){
		$("#err_pass").css({'display':'block'}); // ругаемся на отсутствие пароля
		if ($("#war_mail").css("display")=='block' || $("#no_mail").css("display")=='block' || $("#err_mail_input").css("display")=='block') $("#email").focus(); else $("#pas").focus();
		$('#pas').keyup(function(){if ($('#pas').val() != '') $("#err_pass").css({'display':'none'});});
	}
	else {
		
		if ($("#war_mail").css("display")!='block' && $("#no_mail").css("display")!='block' && $("#err_mail_input").css("display")!='block')
		{
			$.ajax({
				type: "POST",
				cache: false ,
				url: "../script/php/verifyuser.php",
				data: {email:$("#email").val(), pas:$('#pas').val(), check:$("#check").prop("checked")},
				dataType: "text",
				async: false,
				success: function(data){
					if (data == 'log_error'){
						$("#war_pass").css({'display':'block'}); // ругаемся на неправильный пароль
						$('#pas').focus();
						$('#pas').keyup(function(){
							if ($('#pas').val() != '') $("#war_pass").css({'display':'none'});
						});
					}
					if (data == 'log_true') $('#form_input').submit(); // отправляем данные
				}
			});
		}
	}
}