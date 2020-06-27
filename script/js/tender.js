var okno = {}; // создаем объект в котором будем хранить параметры добаляемого окна
var tender = {}; // создаем объект в котором будем хранить весь тендер, который в последскии через аякс будет добавлен в БД
var deletewin; // в этой переменной будем хранить ид удаляемого окна
var showHelp = false; // ставим в true когда будет показана подсказка про изменение типов открывания створок

$('.addActionButton, .add_tender.show_off').on('click', function() {
	
	if( $(this).data('is-city') ) {
		f_open_crttndr();
	} else {
		$('#askCityTender, .fon_blok').css('display', 'block');
	}
	
	
});


// функция открывает форму добавления окна к тендеру
function f_open_crttndr() {  
	$(".fon_blok,#block_for_create").css({'display':'block'});
	
	// Если высота высплывающего блока добавления окна больше высоты экрана, приклеиваем блок создания заявки к верху страницы
	if(($(window).height()) < $("#block_for_create").height() || ($(window).height()) < 620){
		$('#block_for_create').css({"position":"absolute", "top":"0", "marginTop":"0"});
		$("body").scrollTop(0);
	}
	else $('#block_for_create').css({"position":"fixed", "top":"50%", "marginTop":($("#block_for_create").height())/-2 + 'px'});
}


// функция закрывает форму добавления окна к тендеру и чистит все данные в случае если добавление окна не завершено
function f_close_crttndr() {  
	$(".fon_blok,#block_for_create").css('display','none');
	
	// ОБНУЛЯЕМ ВСЕ ПАРАМЕТРЫ ДОБАВЛЯЕМОГО ОКНА, Т.К. ПРОЦЕСС ДОБАВЛЕНИЯ НЕ ЗАВЕРШЁН
	$(".win").css({'border-color':'#f3f3f3'}); // убираем рамку у всех окон (снимаем выделение)
	$('#shirina,#visota_okna,#visota_dveri,#shirina_dveri').val(''); // сбрасывем размеры окна на втором шаге
	$('#kol_steklo').val('2'); // сбрасываем количество камер стеклопакета
	$('#kol_profil').val('3'); // сбрасываем количество камер профиля
	$('#kolvo').val('1'); // сбрасываем количество окон такого типа
	$('#otliv,#podok,#montag,#zamok').val('не нужен'); // сбрасываем отлив, подоконник, монтаж, детский замок
	$('#otkos').val('не нужны'); // сбрасываем откосы
	$('#moscit').val('не нужна'); // сбрасываем москитную сетку
	$("#otliv,#otkos,#podok,#montag,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта полей ввода на шаге 3
	$("#slide_otliv").animate({top:'-290px'},200);
	$("#slide_otkos").animate({top:'-210px'},200);
	$("#slide_podok").animate({top:'-250px'},200);
	$("#slide_montage").animate({top:'-130px'},200);
	$("#slide_moscit").animate({top:'-90px'},200);
	$("#slide_zamok").animate({top:"-170px"},200);
	$('#step2,#step3').css('display','none');
	$('#step1').css('display','block');
	
	// чистим объект в котором храним параметры добавляемого окна
	delete okno['idokna'];
	delete okno['shirina'];
	delete okno['visota_okna'];
	delete okno['shirina_dveri'];
	delete okno['visota_dveri'];
	delete okno['kol_steklo'];
	delete okno['kol_profil'];
	delete okno['kolvo'];
	delete okno['otliv'];
	delete okno['otkos'];
	delete okno['podok'];
	delete okno['montag'];
	delete okno['moscit'];
	delete okno['zamok'];
	
	$('#step2,#step3,#back').css('display','none'); 
	$('#step1').css('display','block'); 
	// меняем активный пункт в линейке хода добавления окна в шапке блока
	$("#il2,#il3").attr("src","img/addtndr/passiveline.png");
	$("#il1").attr("src","img/addtndr/activline.png");
	$("#tl2,#tl3").attr("class","linetxtpassive");
	$("#tl1").attr("class","linetxtactiv");
	// настраиваем заголовки шагов
	$('#lb1').addClass('lba').removeClass("lbp");
	$('#lb2,#lb3').addClass('lbp').removeClass("lba");
	$("#btnaddwin").text("Выбрать тип створок и указать размеры");
	// сбрасываем ошибки ввода размеров окна
	$("#shirina,#visota_okna,#visota_dveri,#shirina_dveri").css('border-bottom','1px solid #ddd');
}

// функция показывает предыдущий шаг в процессе добавления окна
function f_back_step(){
	if($('#step2').css('display') == 'block') { 
		$('#step2,#back').css('display','none'); 
		$('#step1').css('display','block'); 
		// меняем активный пункт в линейке хода добавления окна в шапке блока
		$("#il2").attr("src","img/addtndr/passiveline.png");
		$("#il1").attr("src","img/addtndr/activline.png");
		$("#tl2").attr("class","linetxtpassive");
		$("#tl1").attr("class","linetxtactiv");
		// настраиваем заголовки шагов
		$('#lb1').addClass('lba').removeClass("lbp");
		$('#lb2').addClass('lbp').removeClass("lba");
		$("#btnaddwin").text("Выбрать тип створок и указать размеры");
	}
	if($('#step3').css('display') == 'block') { 
		$('#step3').css('display','none'); 
		$('#step2').css('display','block'); 
		// меняем активный пункт в линейке хода добавления окна в шапке блока
		$("#il3").attr("src","img/addtndr/passiveline.png");
		$("#il2").attr("src","img/addtndr/activline.png");
		$("#tl3").attr("class","linetxtpassive");
		$("#tl2").attr("class","linetxtactiv");
		// двигаем кнопку вверх если было выбран балконный блок
		if(okno['idokna'] > 39 && okno['idokna'] < 310) $('#step2').css('margin','25px auto 1px');
		else $('#step2').css('margin','25px auto');
		// настраиваем заголовки шагов
		$('#lb2').addClass('lba').removeClass("lbp");
		$('#lb3').addClass('lbp').removeClass("lba");
		$("#btnaddwin").text("Выбрать дополнительные параметры");
		
		// закрываем открытые окна выбора доп. парметров
		$("#otliv,#otkos,#podok,#montag,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта полей ввода на шаге 3
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
		$("#slide_zamok").animate({top:"-170px"},200);

	}
}


// функция добавляет тип окна в массив данных окна и двигает окно и поля ввода данных на шаге два
function f_add_window(num) {
		$(".win").css({'border-color':'#f3f3f3'}); // убираем рамку у всех окон (снимаем выделение)
		$('#win'+num).css({'border-color':'rgb(66, 133, 244)'}); // делаем рамку окна по которому кликнул пользователь синим (выделяем)
		$('#shirina,#visota_okna,#visota_dveri,#shirina_dveri').val(''); // сбрасывем размеры окна на втором шаге (у каждого типа окон свои размеры)
		$('#kol_steklo').val('2'); // сбрасываем количество камер стеклопакета
		$('#kol_profil').val('3'); // сбрасываем количество камер профиля
		$('#kolvo').val('1'); // сбрасываем количество окон такого типа
		$('#otliv,#podok,#montag,#zamok').val('не нужен'); // сбрасываем отлив, подоконник, монтаж, детский замок
		$('#otkos').val('не нужны'); // сбрасываем откосы
		$('#moscit').val('не нужна'); // сбрасываем москитную сетку
		
		// добавляем в объект тип окна или балконного блока
 		if (num == 1) {
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','none');
			$(".tip_open").css({'margin':'85px auto 0','left':'0'}); 
			$('#shirina').css({'left':'119px','top':'50px'});
			$('#visota_okna').css({'left':'-3px','top':'170px'});
			$('#txt_shirina').html('Ширина окна<br>(в миллиметрах)');
		}
 		if (num == 2){
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','none');
			$(".tip_open").css({'margin':'85px auto 0','left':'-8px'}); 
			$('#shirina').css({'left':'112px','top':'50px'});
			$('#visota_okna').css({'left':'-50px','top':'170px'});
			$('#txt_shirina').html('Ширина окна<br>(в миллиметрах)');
		} 
		if (num == 3) {
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','none');
			$(".tip_open").css({'margin':'85px auto 0','left':'0'}); 
			$('#shirina').css({'left':'120px','top':'50px'});
			$('#visota_okna').css({'left':'-75px','top':'170px'});
			$('#txt_shirina').html('Ширина окна<br>(в миллиметрах)');
		}
		if (num == 4) {
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','block');
			$(".tip_open").css({'margin':'51px auto 0','left':'0'}); 
			$('#shirina').css({'left':'110px','top':'30px'});
			$('#visota_okna').css({'left':'-58px','top':'140px'});
			$('#shirina_dveri').css({'left':'165px','bottom':'0','margin-bottom':'-40px'});
			$('#visota_dveri').css({'right':'-58px','top':'180px'});
			$('#txt_shirina').html('Ширина балконного блока<br>(в миллиметрах)');
		}
		if (num == 5) {
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','block');
			$(".tip_open").css({'margin':'51px auto 0','left':'0'}); 
			$('#shirina').css({'left':'110px','top':'30px'});
			$('#visota_okna').css({'left':'-75px','top':'140px'});
			$('#shirina_dveri').css({'left':'187px','bottom':'0','margin-bottom':'-40px'});
			$('#visota_dveri').css({'right':'-74px','top':'180px'});
			$('#txt_shirina').html('Ширина балконного блока<br>(в миллиметрах)');
		}
		if (num == 6) {
			$('#visota_dveri,#shirina_dveri,#tit_vd,#tit_shd').css('display','block');
			$(".tip_open").css({'margin':'51px auto 0','left':'0'}); 
			$('#shirina').css({'left':'109px','top':'30px'});
			$('#visota_okna').css({'left':'-75px','top':'140px'});
			$('#shirina_dveri').css({'left':'111px','bottom':'0','margin-bottom':'-40px'});
			$('#visota_dveri').css({'right':'-74px','top':'180px'});
			$('#txt_shirina').html('Ширина балконного блока<br>(в миллиметрах)');
		}

		okno['idokna'] = num*10; // в индексе первая цифра - номер группы, далле цифры - номер окна. Ставим первое окно в группе
		$('.tip_open').attr({'src':'img/addtndr/win/'+okno['idokna']+'.png'});
 }

function f_change_open(){
	
	if(okno['idokna'] == 15) okno['idokna'] = 10; 
	else if(okno['idokna'] == 28) okno['idokna'] = 20;
	else if(okno['idokna'] == 39) okno['idokna'] = 310; // т.к. в индексе первая цифра - номер группы, далле цифры - номер окна, перепрыгиваем на слдующее окно в третьей группу
	else if(okno['idokna'] == 313) okno['idokna'] = 30;
	else if(okno['idokna'] == 45) okno['idokna'] = 40;
	else if(okno['idokna'] == 59) okno['idokna'] = 50;
	else if(okno['idokna'] == 69) okno['idokna'] = 610;
	else if(okno['idokna'] == 611) okno['idokna'] = 60;
	else okno['idokna']++;	
	
	$('.tip_open').attr({'src':'img/addtndr/win/'+okno['idokna']+'.png'});
}

// перефходим к следующему шагу добавления она в тендер
function f_next_step(){
	
	// если находимся на первом шаге - ВЫБОР ТИПА ОКНА
	if ($("#step1").css('display') == 'block'){ 
		if ($("#win1").css('border-color') == 'rgb(66, 133, 244)' || 
			$("#win2").css('border-color') == 'rgb(66, 133, 244)' || 
			$("#win3").css('border-color') == 'rgb(66, 133, 244)' || 
			$("#win4").css('border-color') == 'rgb(66, 133, 244)' || 
			$("#win5").css('border-color') == 'rgb(66, 133, 244)' || 
			$("#win6").css('border-color') == 'rgb(66, 133, 244)') 
		{
			
			// если не показывали, показываем подсказку к выбору типов открывания створок
			if(showHelp == false){
				showHelp = true;
				if($("div").is("#help_click")) {
					$(".fon_blok").css('z-index','1000');
					$("#help_click").css('display','block');
					
					// Если высота экнана меньше высоты блока подсказки выбора типов стоврок, приклеиваем блок к верху страницы
					if($(window).height() < 500){
						$("#help_click").css({"position":"absolute","marginTop":"0"});
						$(".addorgOk").css("top","0");
						$('body').scrollTop(0);
					}
				}
				
				// устанавлием переменные в куки и сессию, что была показана подсказка
				$.ajax({
					type: "POST",
					cache: false ,
					url: "../script/php/showhelp.php",
				});
			}
			
			// меняем активный пункт в линейке хода добавления окна в шапке блока
			$("#il1").attr("src","img/addtndr/passiveline.png");
			$("#il2").attr("src","img/addtndr/activline.png");
			$("#tl1").attr("class","linetxtpassive");
			$("#tl2").attr("class","linetxtactiv");

			$("#step1").css({'display':'none'}); // скрываем первое окно
			$("#step2, #back").css({'display':'block'}); // показываем второе окно и кнопку назад
			$("#btnaddwin").text("Выбрать дополнительные параметры");
				
			// двигаем кнопку вверх если было выбран балконный блок
			if(okno['idokna'] < 40) $('#step2').css('margin','25px auto');
			else $('#step2').css('margin','25px auto 1px');
			
			
			// настраиваем заголовки шагов
			$('#lb1').addClass('lbp').removeClass("lba");
			$('#lb2').addClass('lba').removeClass("lbp");
			
			// проскролим вверх следующее окно
			$("body").scrollTop(0);
		}
		else{
			$('#nohave_win').css('display','block');
			$(".fon_blok").css('z-index','1000');
		} 
	}
	else{
		// если находимся на втором шаге - ВЫБОР ТИПА СТВОРОК И РАЗМЕРОВ
		if ($("#step2").css('display') == 'block'){
			
			// перед проверкой сбрасываем ошибки ввода размеров окна
			$("#shirina,#visota_okna,#visota_dveri,#shirina_dveri").css('border-bottom','1px solid #ddd');
			
			var tst = /^\d+$/; // регулярка только цифры
			if (!tst.test($('#shirina').val()) || $('#shirina').val() =='') $("#shirina").css('borderBottom','2px solid red');			
			if (!tst.test($('#visota_okna').val()) || $('#visota_okna').val() =='') $("#visota_okna").css('borderBottom','2px solid red');
			
			
			if(okno['idokna'] > 39 && okno['idokna'] < 310 || okno['idokna'] == 610 || okno['idokna'] == 611){
				if (!tst.test($('#visota_dveri').val()) || $('#visota_dveri').val() =='') $("#visota_dveri").css('borderBottom','2px solid red');			
				if (!tst.test($('#shirina_dveri').val()) || $('#shirina_dveri').val() =='') $("#shirina_dveri").css('borderBottom','2px solid red');
			}
			
			// пре редактировании поля ввода сбрасываем ошибку			
			$('#shirina').keyup(function(){$("#shirina").css('borderBottom','1px solid #ddd');});
			$('#visota_okna').keyup(function(){$("#visota_okna").css('borderBottom','1px solid #ddd');});
			$('#visota_dveri').keyup(function(){$("#visota_dveri").css('borderBottom','1px solid #ddd');});
			$('#shirina_dveri').keyup(function(){$("#shirina_dveri").css('borderBottom','1px solid #ddd');});
			
			// если хотябы у одного поля ввода красный бордер (ошибка), говорим об этом, иначе на следующий шаг
			if ($("#shirina").css('borderBottom') == '2px solid rgb(255, 0, 0)' || 
			    $("#visota_okna").css('borderBottom') == '2px solid rgb(255, 0, 0)' || 
			    $("#visota_dveri").css('borderBottom') == '2px solid rgb(255, 0, 0)' || 
			    $("#shirina_dveri").css('borderBottom') == '2px solid rgb(255, 0, 0)')
			{
				$('#err_size').css('display','block'); 
				$('.fon_blok').css('z-index','1000');
			}
			else{
				// меняем активный пункт в линейке хода добавления окна в шапке блока
				$("#il2").attr("src","img/addtndr/passiveline.png");
				$("#il3").attr("src","img/addtndr/activline.png");
				$("#tl2").attr("class","linetxtpassive");
				$("#tl3").attr("class","linetxtactiv");

				$("#step2").css({'display':'none'}); // скрываем первое окно
				$("#step3").css({'display':'block'}); // показываем второе окно и кнопку назад
				$("#btnaddwin").text("Добавить окно в тендер");
				
				// настраиваем заголовки шагов
				$('#lb2').addClass('lbp').removeClass("lba");
				$('#lb3').addClass('lba').removeClass("lbp");
				
				// проскролим вверх следующее окно
				$("body").scrollTop(0);
			}
		} // если находимся на третьем шаге - ВЫБОР ДОП ПАРАМЕТРОВ
		else{
			// собираем объект с параметрами добавляемого окна
			okno['shirina'] = $('#shirina').val(); // ширина окна или балконного блока
			okno['visota_okna'] = $('#visota_okna').val(); // высота окна
			okno['shirina_dveri'] = $('#shirina_dveri').val(); // ширина двери
			okno['visota_dveri'] = $('#visota_dveri').val(); // высота двери
			okno['kol_steklo'] = $('#kol_steklo').val(); // количество камер стеклопакета
			okno['kol_profil'] = $('#kol_profil').val(); // количество камер профиля
			okno['kolvo'] = $('#kolvo').val(); // количество окон такого типа
			okno['otliv'] = $('#otliv').val(); // размеры отлива
			okno['otkos'] = $('#otkos').val(); // размеры откосов
			okno['podok'] = $('#podok').val(); // размеры подоконника
			okno['montag'] = $('#montag').val(); // монтаж 
			okno['moscit'] = $('#moscit').val(); // москитная сетка
			okno['zamok'] = $('#zamok').val(); // десткий замок
			
			num = $(".win_body").size(); // количество окон на странице как видимых так и нет станет ключом добавляемого окна
			tender[num] = {}; // создаем пустой объект в объекте tender в который будем хранить параметры добавляемого окна
			for(var key in okno){tender[num][key] = okno[key];} // заполняем объект параметрами окна (добавляем окно в тендер)
			f_close_crttndr(); // убираем блок добавления окна
			
			// получаем описание окна из БД
			$.ajax({
				type: "POST",
				cache: false ,
				url: "../script/php/takenamewin.php",
				data: {idokna:tender[num]['idokna']},
				dataType: "text",
				async: false,
				success: function(data){tender[num]['about'] = data;}
			});
			
			if($('.no_action').css('display') == 'block'){
				$('.show_off').css('display','none'); // скрываем стартовый контент
				$('#make_tender').css('display','block'); // показываем кнопку Разместить тендер
			}
			
			
			// скрываем кнопку назад в окне добавления окна в тендер
			$('#back').css('display','none'); 
			// меняем активный пункт в линейке хода добавления окна в шапке блока
			$("#il3").attr("src","img/addtndr/passiveline.png");
			$("#il1").attr("src","img/addtndr/activline.png");
			$("#tl3").attr("class","linetxtpassive");
			$("#tl1").attr("class","linetxtactiv");
			// настраиваем заголовки шагов
			$('#lb1').addClass('lba').removeClass("lbp");
			$('#lb3').addClass('lbp').removeClass("lba");
			$("#btnaddwin").text("Выбрать тип створок и указать размеры");

			
			// настраниваем положение размеров окна
			if(tender[num]['idokna'] > 9 && tender[num]['idokna'] < 16) {
				place_shel = 'style="top: -30px; margin-left: -18px;"';
				place_vel = 'style="top: 70px; margin-left: -136px;"';
			}
			if(tender[num]['idokna'] > 19 && tender[num]['idokna'] < 29) {
				place_shel = 'style="top: -30px; margin-left: -17px;"';
				place_vel = 'style="top: 70px; margin-left: -176px;"';
			}
			if(tender[num]['idokna'] > 29 && tender[num]['idokna'] < 40 || tender[num]['idokna'] == 310 || tender[num]['idokna'] == 311 || tender[num]['idokna'] == 312 || tender[num]['idokna'] == 313) {
				place_shel = 'style="top: -30px; margin-left: -21px;"';
				place_vel = 'style="top: 70px; margin-left: -212px;"';
			}
			if(tender[num]['idokna'] > 39 && tender[num]['idokna'] < 46) {
				place_shel = 'style="top: -30px; margin-left: -30px;"';
				place_vel = 'style="top: 75px; margin-left: -199px;"';
				place_vd = 'style="top: 119px; right: 50%; margin-right: -326px;"';
				place_shd = 'style="bottom: -28px; margin-left: 22px;"';
			}
			if(tender[num]['idokna'] > 49 && tender[num]['idokna'] < 60) {
				place_shel = 'style="top: -30px; margin-left: -30px;"';
				place_vel = 'style="top: 75px; margin-left: -221px;"';
				place_vd = 'style="top: 115px; right: 50%; margin-right: -374px;"';
				place_shd = 'style="bottom: -28px; margin-left: 47px;"';
			}
			if(tender[num]['idokna'] > 59 && tender[num]['idokna'] < 70 || tender[num]['idokna'] == 610 || tender[num]['idokna'] == 611) {
				place_shel = 'style="top: -30px; margin-left: -30px;"';
				place_vel = 'style="top: 75px; margin-left: -222px;"';
				place_vd = 'style="top: 115px; right: 50%; margin-right: -374px;"';
				place_shd = 'style="bottom: -28px; margin-left: -27px;"';
			}

			
			
			// добавлем окно на страницу
			$(".win_content").append( function(){
				var html_str = '<div class="win_body" id="'+num+'">'+
							'<div class="del_win" onclick="f_del_win(\''+num+'\')">×</div>'+
							'<div class="img_body">'+
								'<div class="txt_param" '+place_shel+'>'+tender[num]['shirina']+' мм.</div>'+
								'<div class="txt_param" '+place_vel+'>'+tender[num]['visota_okna']+' мм.</div>';
						if(tender[num]['idokna'] > 39 && tender[num]['idokna'] < 310 || tender[num]['idokna'] == 610 || tender[num]['idokna'] == 611){
							html_str += '<div class="txt_param" '+place_vd+'>'+tender[num]['visota_dveri']+' мм.</div><div class="txt_param" '+place_shd+'>'+tender[num]['shirina_dveri']+' мм.</div>';
						}
							html_str +=	'<img src="img/addtndr/win/'+tender[num]['idokna']+'.png">'+
							'</div>'+
							'<div class="win_txt">'+
								'<div class="tit_pars">'+tender[num]['about']+'</div>';
								
							if(tender[num]['idokna'] > 39 && tender[num]['idokna'] < 310 || tender[num]['idokna'] == 610 || tender[num]['idokna'] == 611){
								html_str += '<div class="params on_params"><span class="tit_params">Ширина балконного блока:</span>'+tender[num]['shirina']+' мм.</div>';
							}
							else{
								html_str += '<div class="params on_params"><span class="tit_params">Ширина окна:</span>'+tender[num]['shirina']+' мм.</div>';
							}
							html_str +=	'<div class="params on_params"><span class="tit_params">Высота окна:</span>'+tender[num]['visota_okna']+' мм.</div>';
							
							if(tender[num]['idokna'] > 39 && tender[num]['idokna'] < 310 || tender[num]['idokna'] == 610 || tender[num]['idokna'] == 611){
								html_str += '<div class="params on_params"><span class="tit_params">Высота двери:</span>'+tender[num]['visota_dveri']+' мм.</div>';
								html_str += '<div class="params on_params"><span class="tit_params">Ширина двери:</span>'+tender[num]['shirina_dveri']+' мм.</div>';
							}
							html_str +=	'<div class="params"><span class="tit_params">Количество камер ПВХ профиля:</span>'+tender[num]['kol_profil']+'</div>'+
								'<div class="params"><span class="tit_params">Количество камер стеклопакета:</span>'+tender[num]['kol_steklo']+'</div>'+
								'<div class="params"><span class="tit_params">Отлив:</span>'+tender[num]['otliv']+'</div>'+
								'<div class="params"><span class="tit_params">Откосы:</span>'+tender[num]['otkos']+'</div>'+
								'<div class="params"><span class="tit_params">Подоконник:</span>'+tender[num]['podok']+'</div>'+
								'<div class="params"><span class="tit_params">Монтаж:</span>'+tender[num]['montag']+'</div>'+
								'<div class="params"><span class="tit_params">Москитная сетка:</span>'+tender[num]['moscit']+'</div>'+
								'<div class="params"><span class="tit_params">Защита от детей:</span>'+tender[num]['zamok']+'</div>'+
								'<div class="params"><span class="tit_params">Количество таких окон:</span>'+tender[num]['kolvo']+'</div>'+
							'</div>'+
						'</div>';
				return html_str;
			 });
		}
	}
}




// ВСЕ ФУНКЦИИ ВЫБОР ДОП. ПАРАМЕТРОВ СО СЛАЙДИНГОМ ПОЛЕЙ ВЫБОРА В НИХ
function f_otliv_sel(vals){
	if($('#slide_otliv').css('top') == '-290px'){
		$("#slide_otliv").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#otliv").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otkos,#podok,#montag,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
		$("#slide_zamok").animate({top:'-170px'},200);
	}
	else{
		$("#slide_otliv").animate({top:"-290px"},200); // задвигаем тело слайдера с пунктами меню
		$("#otliv").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_otliv").animate({top:"-290px"},200); // задвигаем тело слайдера с пунктами меню
		$("#otliv").val(vals); // меняем занчение поля выбора
	}
} 

function f_otkos_sel(vals){
	if($('#slide_otkos').css('top') == '-210px'){
		$("#slide_otkos").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#otkos").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otliv,#podok,#montag,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
		$("#slide_zamok").animate({top:'-170px'},200);
	}
	else{
		$("#slide_otkos").animate({top:"-210px"},200); // задвигаем тело слайдера с пунктами меню
		$("#otkos").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_otkos").animate({top:"-210px"},200); // задвигаем тело слайдера с пунктами меню
		$("#otkos").val(vals); // меняем занчение поля выбора
	}
} 

function f_podok_sel(vals){
	if($('#slide_podok').css('top') == '-250px'){
		$("#slide_podok").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#podok").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otliv,#otkos,#montag,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
		$("#slide_zamok").animate({top:'-170px'},200);
	}
	else{
		$("#slide_podok").animate({top:"-250px"},200); // задвигаем тело слайдера с пунктами меню
		$("#podok").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_podok").animate({top:"-250px"},200); // задвигаем тело слайдера с пунктами меню
		$("#podok").val(vals); // меняем занчение поля выбора
	}
} 

function f_montage_sel(vals){
	if($('#slide_montage').css('top') == '-130px'){
		$("#slide_montage").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#montag").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otliv,#otkos,#podok,#moscit,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
		$("#slide_zamok").animate({top:'-170px'},200);
	}
	else{
		$("#slide_montage").animate({top:"-130px"},200); // задвигаем тело слайдера с пунктами меню
		$("#montag").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_montage").animate({top:"-130px"},200); // задвигаем тело слайдера с пунктами меню
		$("#montag").val(vals); // меняем занчение поля выбора
	}
} 


function f_moscit_sel(vals){
	if($('#slide_moscit').css('top') == '-90px'){
		$("#slide_moscit").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#moscit").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otliv,#otkos,#podok,#montag,#zamok").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_zamok").animate({top:'-170px'},200);
	}
	else{
		$("#slide_moscit").animate({top:"-90px"},200); // задвигаем тело слайдера с пунктами меню
		$("#moscit").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_moscit").animate({top:"-90px"},200); // задвигаем тело слайдера с пунктами меню
		$("#moscit").val(vals); // меняем занчение поля выбора
	}
} 

function f_zamok_sel(vals){
	if($('#slide_zamok').css('top') == '-170px'){
		$("#slide_zamok").animate({top:"0px"},200); // выдвигаем тело слайдера с пунктами меню
		$("#zamok").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
		$("#otliv,#otkos,#podok,#montag,#moscit").removeClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта других полей
		$("#slide_otliv").animate({top:'-290px'},200);
		$("#slide_otkos").animate({top:'-210px'},200);
		$("#slide_podok").animate({top:'-250px'},200);
		$("#slide_montage").animate({top:'-130px'},200);
		$("#slide_moscit").animate({top:'-90px'},200);
	}
	else{
		$("#slide_zamok").animate({top:"-170px"},200); // задвигаем тело слайдера с пунктами меню
		$("#zamok").toggleClass("open_input roundBorder");// меняем цвет, бордер и цвет шрифта поля выбора
	}
	
	if(vals != undefined){
		$("#slide_zamok").animate({top:"-170px"},200); // задвигаем тело слайдера с пунктами меню
		$("#zamok").val(vals); // меняем занчение поля выбора
	}
}


function f_make_tender(){
	
	// проверяем только заполненость полей
	if($("#phone").val() == '') $('#err_phone_user').css('display','block');
	if($("#user").val() == '') $('#err_name_user').css('display','block');
	
	// при редактировании убираем ошибки
	$('#phone').keyup(function(){$('#err_phone_user').css('display','none');});
	$('#user').keyup(function(){$('#err_name_user').css('display','none');});
	
	// если ошибок нет, добавляем окно в тендер
	if ($("#phone").val() != '' && $("#user").val() != ''){
		num = Object.keys(tender).length; // количество окон в тендере как видимых на странице так и нет
		for (var i = 0; i < num; i++) {
		   if($('#'+i).css('display') == 'none') delete tender[i]; // удаляем из тендера удалённые пользователем окна
		}

		for(var key in tender){delete tender[key]['about'];} // удалем описание окна (усть в БД, таблица wings) что бы избежать избыточности данных 
		
		tender['phone'] = $('#phone').val(); // сохраняем в тендер телефон заказчика
		tender['name'] = $('#user').val(); // сохраняем в тендер имя заказчика
		
		var str = JSON.stringify(tender);
		// добавляем тендер в БД
		$.ajax({
			type: "POST",
			cache: false ,
			url: "../script/php/maketender.php",
			data: {json_str:str},
			dataType: "text",
			success: function(data){
				
				console.log(data);
				
				$('.fon_blok, #tender_ok').css('display','block');
				$('#idmaketender').html('№ '+data);
			}
		});
		
		// ЧИСТИМ ОБЪЕКТ И ВСЕ ПОСЛЕ СОЗДАНИЯ ТЕНДЕРА
		$(".fon_blok,#user_cont,#make_tender").css('display','none');
		$('#phone').val(''); // убираем телефон заказчика
		$('#user').val(''); // убираем имя заказчика
		
		for(var delkey in tender){delete tender[delkey];};
		delete tender['phone']; // удаляем из тендера телефон заказчика
		delete tender['name']; // удаляем из тендера имя заказчика
		
		$('.win_content').empty();
		$('.show_off').css('display','block');
		
		// Событие для Яндекс метрики, которое позволяет отслеживать количество созданных тендеров
		yaCounter27438587.reachGoal('ADD_TENDER_TRUE'); 
		return true;
	}
}


// Покзываем подсказки к категориям
function f_show_help(helpimg){
	$(".fon_blok").css('z-index','1000');
	$("#help_tender,.adorgTitBlock").css('display','block');
	$("#help_img").attr("src","img/addtndr/help/"+helpimg);
	
	if(helpimg == 'kam_steklo.png'){
		$("#tit_help_txt").html('Камеры стеклопакета');
		$("#help_txt").html('Герметичная полость, заключённая между двумя стеклами. Воздушные камеры заполненнают либо инертным газом, либо осушённым воздухом. Камеры могут быть различной ширины, что напрямую влияет на тепло и шумоизоляционные характеристики стеклопакета а заначит и пластикового окна.');
	}
	if(helpimg == 'kam_prof.png'){
		$("#tit_help_txt").html('Камеры ПВХ профиля');
		$("#help_txt").html('Замкнутые полости внутри пластикового профиля. Камеры разделены между собой перегородками которые формируют изолированные отсеки профиля. Современные профильные системы пластиковых окон имеют, как правило, от 3-х и более камер. От количества камер в профиле зависят тепло и шумоизоляционные характеристики окна');
	}
	if(helpimg == 'otliv.png'){
		$("#tit_help_txt").html('Отлив');
		$("#help_txt").html('Элемент окна представляющий собой подоконник со стороны улицы, закрывающий нижнюю плоскость оконного проёма и монтажные швы. Отлив изготавливается из алюминия или пластика. Основной его функцией является отведение влаги от фасада здания и от окна, но он также защищает нижнюю часть рамы от попадания туда загрязнений, пыли и влаги, прикрывая нижний монтажный шов.');
	}
	if(helpimg == 'otkos.png'){
		$("#tit_help_txt").html('Откосы');
		$("#help_txt").html('Плоская часть оконного проема, расположенная внутри (внутренние откосы) или снаружи (наружние откосы) помещения, создавая как бы торец стены справа, слева и сверху пластикового окна и обрамляя его. Отделка внутренних откосов сделает вид окон более красивым и аккуратным. Отделка внешних откосов поможет защитить стены от пыли и влаги.');
	}
	if(helpimg == 'podok.png'){
		$("#tit_help_txt").html('Подоконник');
		$("#help_txt").html('Элемент пластикового окна, который монтируется к нижней части рамы со стороны помещения и закрывает нижнюю плоскость оконного проёма. Использование подоконника обусловлено, прежде всего, эстетическими потребностями, чтобы закрыть монтажный шов окна, а также нижнюю плоскость оконного проёма внутри помещения и сделать внешний вид окна более красивым и аккуратным.');
	}
	if(helpimg == 'zamok.png'){
		$("#tit_help_txt").html('Детский замок');
		$("#help_txt").html('Механизм, который полностью или частично блокирует возможность открывания окна, оставляя функцию откидывания рамы в режим проветривания. В целях безопасности бывает необходимо ограничить возможность манипуляций с окном. Для этого используется детский замок. Он обезопасит ваших детей от случайного открытия окна в отсутсуии взрослых.');
	}
	if(helpimg == 'moskit.png'){
		$("#tit_help_txt").html('Москитная сетка');
		$("#help_txt").html('Полиуретановая сетка, которая крепится на пластиковую рамку и размещается со внешней стороны окна напроитв открывающейся створки. Предназначена для того чтобы предотвратить попадание в помещение насекомых, пыли и пуха в тот момент когда окно открыто или находится в состоянии проветривания. Специальные держатели, позволяют удобно снимать её на зимний период или для удаления загрязнения.');
	}
	if(helpimg == 'montage'){
		$(".adorgTitBlock").css('display','none');
		$("#tit_help_txt").html('Монтаж и демонтаж');
		$("#help_txt").html('<span class="akcent_help">Демонтаж</span> - это процесс во время которого удаляется старое окно с коробкой из оконного проёма. Проведение демонтажа лучше доверить профессионалам т.к. в процессе самостоятельного удаления, старого окна без необходимых на то инструментов и навыков возможно повреждение проема и откосов, что в дальнейшем усложнит процесс монтажа нового окна.<br><br><span class="akcent_help">Монтаж</span> - это процесс, во время которого специалисты оконной компании устанавливают оконные конструкции в помещении. Как правило в оконной компании вам предложать монтаж ро ГОСТу и просто монтаж. Мы советуем выбирать монтаж по ГОСТу.');
	}

	if(($(window).height()) < $("#help_tender").height()){
		$('#help_tender').css({"position":"absolute", "top":"0", "marginTop":"0"});
		$("body").scrollTop(0);
	}
	else $('#help_tender').css({"position":"fixed", "top":"50%", "marginTop":($("#help_tender").height()/-2)+'px'});
}

// Скрываем всплываеющее окно подсказки при создании тендера
function f_close_help(){
	$("#help_tender").css('display','none');
	$(".fon_blok").css('z-index','900');
}

// Скрываем всплываеющее окно подсказки выбора типа открывания окна
function f_close_help_click(){
	$("#help_click").css('display','none');
	$(".fon_blok").css('z-index','900');
}



// показываем вопрос надо ли удалять окно и присваиваем глобальной переменной deletewin идентификатор удаляемого окна
function f_del_win(windw){
	deletewin = windw;
	$(".adorgTitBlock").css('display','block');
	$('#delwin,.fon_blok').css('display','block');
}

// Удаляем окно (переключаем display в none, далее при добавлении в БД тендера будем проверять эти окна и удалять их из объекта перед отправкой его на сервер)
function f_ques_del(onoff){
	if(onoff == false) $("#delwin,.fon_blok").css('display','none');
	if(onoff == true) {
		$('#'+deletewin+",#delwin,.fon_blok").css('display','none'); // скрываем окно
		
		var mark = false;
		// в цикле пробегаем все окна и смотрим есть ли показываемые
		for(var id_windw in tender) {
			if($('#'+id_windw).css('display') == 'block') mark = true;
		}
		
		// елси нет хотябы одного окна с display=block скрываем кнопку Разместить тендер и показываем стартовый контент
		if(mark == false){
			$('#make_tender').css('display','none');
			$('.show_off').css('display','block');
		}
	}
}





// показывавем форму сбора контактов заказчика на последнем шаге
function f_open_make_tender(){
	$('.fon_blok,#user_cont').css('display','block');
	
	// Если высота экнана меньше высоты блока сбора контактов, приклеиваем блок к верху страницы
	if($(window).height() < 530){
		$("#user_cont").css({"position":"absolute","top":"0","marginTop":"0"});
		$('body').scrollTop(0);
	}
}
// закрываем форму сбора контактов заказчика на последнем шаге
function f_close_make_tender(){
	$(".fon_blok, #user_cont").css("display","none");
	$('#user,#phone').val('');
	$('#err_phone_user').css('display','none');
	$('#err_name_user').css('display','none');
}