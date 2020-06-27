/* ***************************** 

	Валидация данных, введённых представителем оконной компании
	при добавлении её в оконный справочник

***************************** */

function f_valid_data() 
{
	/* Сбрасываем ошибки */
	$("#no_name,#no_about,#no_adres,#no_timework,#no_phone,#no_mail,#err_mail,#have_mail,#no_pass,#err_pass,#no_passcopy,#no_profil,#no_furnitura").css({'display':'none'});
	
	/* Проверяем поля на заполнение */
	if ($("#nameorg").val() == '') $("#no_name").css({'display':'block'});
	if ($("#about").val() == '') $("#no_about").css({'display':'block'});
	if ($("#adres").val() == '') $("#no_adres").css({'display':'block'});
	if ($("#timework").val() == '') $("#no_timework").css({'display':'block'});
	if ($("#phone").val() == '') $("#no_phone").css({'display':'block'});
	if ($("#email").val() == '') $("#no_mail").css({'display':'block'});
	else{
		var tst = /^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
		if (!tst.test($('#email').val())) $("#err_mail").css({'display':'block'});	
		else $.ajax({type: "POST",cache: false,url: "../script/php/havemail.php",data: {email:$("#email").val()},dataType: "text",async: false,success: function(data){if (data=='ok') $("#have_mail").css({'display':'block'});}});
	}
	if ($("#pass").val() == '') $("#no_pass").css({'display':'block'});
	if ($("#passcopy").val() == '') $("#no_passcopy").css({'display':'block'});
	if ($("#pass").val() != $("#passcopy").val()) $("#err_pass").css({'display':'block'});
	if ($("#profil").val() == '') $("#no_profil").css({'display':'block'});
	if ($("#furnitura").val() == '') $("#no_furnitura").css({'display':'block'});
	
	/* Убираем сообщения об ошибках, если пользоаватель начал вводить текст*/
	$('#nameorg').keyup(function(){if ($('#nameorg').val() != '') $("#no_name").css({'display':'none'});});
	$('#about').keyup(function(){if ($('#about').val() != '') $("#no_about").css({'display':'none'});});
	$('#adres').keyup(function(){if ($('#adres').val() != '') $("#no_adres").css({'display':'none'});});
	$('#timework').keyup(function(){if ($('#timework').val() != '') $("#no_timework").css({'display':'none'});});
	$('#phone').keyup(function(){if ($('#phone').val() != '') $("#no_phone").css({'display':'none'});});
	$('#email').keyup(function(){if ($('#email').val() != '') $("#no_mail,#err_mail,#have_mail").css({'display':'none'});});
	$('#pass').keyup(function(){if ($('#pass').val() != '') $("#no_pass,#err_pass").css({'display':'none'});});
	$('#passcopy').keyup(function(){if ($('#passcopy').val() != '') $("#no_passcopy,#err_pass").css({'display':'none'});});
	$('#profil').keyup(function(){if ($('#profil').val() != '') $("#no_profil").css({'display':'none'});});
	$('#furnitura').keyup(function(){if ($('#furnitura').val() != '') $("#no_furnitura").css({'display':'none'});});
	
	/* Ставим фокус в самую верхнюю ошибку (проверяем снизу вверх) */
	if ($("#no_furnitura").css("display")=='block') $("#furnitura").focus();
	if ($("#no_profil").css("display")=='block') $("#profil").focus();
	if ($("#no_passcopy").css("display")=='block') $("#passcopy").focus();
	if ($("#no_pass").css("display")=='block') $("#pass").focus();
	if ($("#err_pass").css("display")=='block') $("#passcopy").focus();
	if ($("#no_mail").css("display")=='block' || $("#err_mail").css("display")=='block' || $("#have_mail").css("display")=='block') $("#email").focus();
	if ($("#no_phone").css("display")=='block') $("#phone").focus();
	if ($("#no_timework").css("display")=='block') $("#timework").focus();
	if ($("#no_adres").css("display")=='block') $("#adres").focus();
	if ($("#no_about").css("display")=='block') $("#about").focus();
	if ($("#no_name").css("display")=='block') $("#nameorg").focus();
	
	/* Если ошибок нет отправляем форму */
	if ($("#no_name").css("display")!='block' && 
		$("#no_about").css("display")!='block' && 
		$("#no_adres").css("display")!='block' && 
		$("#no_timework").css("display")!='block' && 
		$("#no_phone").css("display")!='block' && 
		$("#no_mail").css("display")!='block' && 
		$("#err_mail").css("display")!='block' && 
		$("#have_mail").css("display")!='block' && 
		$("#no_pass").css("display")!='block' && 
		$("#no_passcopy").css("display")!='block' && 
		$("#err_pass").css("display")!='block' && 
		$("#no_profil").css("display")!='block' && 
		$("#no_furnitura").css("display")!='block' ) $('#form_adorg').submit();
}


/* Обработка клика по полю выбора город в форме ввода данных при регистрации оконной компинии */
$('.boxEditData #city').on('click', function(){
	$('#selectcity').attr('data-edit-from', 'from-reg-org');
	f_selectCity('change');
});

$('#selectcity .pointCitys').on('click', function(event){
	//event.preventDefault()
	
	var goToPage = $(this).attr('href')
	
	console.log(goToPage)
})