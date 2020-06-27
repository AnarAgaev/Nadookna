function f_pasrecovery() {
	$("#war_mail,#no_mail,#err_mail").css({'display':'none'});
		
	if ($("#email").val() == ''){
		$("#err_mail").css({'display':'block'}); // ругаемся на отсутствие мэйла
		$("#email").focus();
		$('#email').keyup(function(){if ($('#email').val() != '') $("#err_mail").css({'display':'none'});});
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
					if (data == 'ok') $('#form_input').submit(); // отправляем данные
				}
			});
		}
	}
}