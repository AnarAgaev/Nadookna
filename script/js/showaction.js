/* ********************
	Данный скрипт показывает подробное описание акции на странце Акции и Скидки
	
********************** */

function f_show_action(id_action)
{
		$.ajax({
		type: "POST",
		cache: false ,
		url: "../script/php/showaction.php",
		data: {idaction:id_action},
		dataType: "text",
		async: true,
		success: function(data){
				// распарсиваем полученный из php скрипта json с параметрами акции
				var obj = $.parseJSON(data);
				var $phones = '';
				
				// заполняем поля попап окна
				$("#popup_titel").html(obj.title);
				$("#text_popup_act").html(obj.text);
				$("#data_start").html(obj.data_start);
				$("#data_finish").html(obj.data_finish);
				$("#popup_name").html(obj.name);
				$("#popup_name").attr("href", "okonnaya-kompaniya.php?idorg="+obj.idorg);
				$("#popup_adres").html(obj.adds);
				$("#popup_timework").html(obj.wtime);
				$("#popup_email").html(obj.email);

				if(obj.phone1 != '') $phones = obj.phone1;
				if(obj.phone2 != '') $phones += '<br>'+obj.phone2;
				if(obj.phone3 != '') $phones += '<br>'+obj.phone3;
				if(obj.phone4 != '') $phones += '<br>'+obj.phone4;
				if(obj.phone5 != '') $phones += '<br>'+obj.phone5;
				$("#popup_phone").html($phones);
				
				if($(window).width() > 503) $("#popupAction").css('marginTop', ($("#popupAction").height())/-2 + 'px'); // двигаем вспылвающий блок вверх на половину высоты и показываем его пользоваетелю
				else $("#popupAction").css('top',$(window).scrollTop()); // приклеиваем к верху страницы, смещая блок на величину фактически прокрученного

				// Если высота банереа с описание акции больше высоты экрана, приклеиваем попап баннер к верху страницы
				if($(window).height() < $("#popupAction").height()){
					$('.popupAction').css({"position":"absolute", "top":"0", "marginTop":"0"});
					$("#popupAction").css('top',$(window).scrollTop());
				} 
				
				// Показываем банер
				$("#popupAction,.fon_blok").css("display", "block");
			}
		});
}