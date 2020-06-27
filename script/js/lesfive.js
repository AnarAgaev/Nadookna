function f_show_ex() {	
	$("#ex_five, .fon_blok").css({'display':'block'});
}

// функции для слайдера ширина окна
function f_slide_shirina(x) {
	$(".err_shirina").css('display','none');
	if ($("#slide_shirina").css('top') == '-280px'){
		$("#slide_shirina").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_shirina").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_shirina").text() == '') $("#select_shirina").text('Размер?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Расстояние между левым и правым откосами.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Расстояние между левым и правым откосами.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_shirina").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_shirina").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'color':'#666666',
			'-webkit-border-radius':'2px',
			'-moz-border-radius':'2px',
			'-ms-border-radius':'2px',
			'-o-border-radius':'2px',
			'border-radius':'2px',
			'background-color':'#fff',
			'-webkit-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'-moz-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)'
		});
		if (x == undefined){if ($("#select_shirina").text() == 'Размер?') $("#select_shirina").text('');}
		else $("#select_shirina").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера высота окна
function f_slide_visota(x) {
	$(".err_visota").css('display','none');
	if ($("#slide_visota").css('top') == '-280px'){
		$("#slide_visota").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_visota").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_visota").text() == '') $("#select_visota").text('Размер?');
		// скрываем открытые формы если они есть
		if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Расстояние от подоконника до верхнего откоса.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Расстояние от подоконника до верхнего откоса.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_visota").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_visota").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'color':'#666666',
			'-webkit-border-radius':'2px',
			'-moz-border-radius':'2px',
			'-ms-border-radius':'2px',
			'-o-border-radius':'2px',
			'border-radius':'2px',
			'background-color':'#fff',
			'-webkit-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'-moz-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)'
		});
		if (x == undefined){if ($("#select_visota").text() == 'Размер?') $("#select_visota").text('');}
		else $("#select_visota").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера ширина откосов
function f_slide_otkos(x) {
	$(".err_otkos").css('display','none');
	if ($("#slide_otkos").css('top') == '-280px'){
		$("#slide_otkos").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_otkos").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_otkos").text() == '') $("#select_otkos").text('Размер?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
		if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Глубина внутренней стены от рамы до края стены слева, справа или сверху от окна.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Глубина внутренней стены от рамы до края стены слева, справа или сверху от окна.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_otkos").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_otkos").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'color':'#666666',
			'-webkit-border-radius':'2px',
			'-moz-border-radius':'2px',
			'-ms-border-radius':'2px',
			'-o-border-radius':'2px',
			'border-radius':'2px',
			'background-color':'#fff',
			'-webkit-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'-moz-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)'
		});
		if (x == undefined){if ($("#select_otkos").text() == 'Размер?') $("#select_otkos").text('');}
		else $("#select_otkos").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера глубина подоконника
function f_slide_podok(x) {
	$(".err_podok").css('display','none');
	if ($("#slide_podok").css('top') == '-280px'){
		$("#slide_podok").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_podok").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_podok").text() == '') $("#select_podok").text('Размер?');
		// скрываем открытые формы если они есть
		if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
		if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Глубина внутренней стены, от края стены до нижней части рамы, плюс величина выступа.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Глубина внутренней стены, от края стены до нижней части рамы, плюс величина выступа.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_podok").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_podok").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'color':'#666666',
			'-webkit-border-radius':'2px',
			'-moz-border-radius':'2px',
			'-ms-border-radius':'2px',
			'-o-border-radius':'2px',
			'border-radius':'2px',
			'background-color':'#fff',
			'-webkit-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'-moz-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)'
		});
		if (x == undefined){if ($("#select_podok").text() == 'Размер?') $("#select_podok").text('');}
		else $("#select_podok").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера глубина отлива
function f_slide_otliv(x) {
	$(".err_otliv").css('display','none');
	if ($("#slide_otliv").css('top') == '-280px'){
		$("#slide_otliv").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_otliv").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_otliv").text() == '') $("#select_otliv").text('Размер?');
		// скрываем открытые формы если они есть
		if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
		if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Глубина внешней стены, от нижней части рамы до края стены, плюс выступ от края стены.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Глубина внешней стены, от нижней части рамы до края стены, плюс выступ от края стены.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_otliv").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_otliv").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'color':'#666666',
			'-webkit-border-radius':'2px',
			'-moz-border-radius':'2px',
			'-ms-border-radius':'2px',
			'-o-border-radius':'2px',
			'border-radius':'2px',
			'background-color':'#fff',
			'-webkit-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'-moz-box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)',
			'box-shadow':'0 1px 0 #fff,inset 0 1px 4px rgba(136,136,136,0.47)'
		});
		if (x == undefined){if ($("#select_otliv").text() == 'Размер?') $("#select_otliv").text('');}
		else $("#select_otliv").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}


function f_test_ex5(){
	if($("#select_shirina").text()=='' || $("#select_shirina").text()!='1600 мм') $(".err_shirina").css('display','block');
	if($("#select_visota").text()=='' || $("#select_visota").text()!='1400 мм') $(".err_visota").css('display','block');
	if($("#select_otkos").text()=='' || $("#select_otkos").text()!='300 мм') $(".err_otkos").css('display','block');
	if($("#select_podok").text()=='' || $("#select_podok").text()!='400 мм') $(".err_podok").css('display','block');
	if($("#select_otliv").text()=='' || $("#select_otliv").text()!='200 мм') $(".err_otliv").css('display','block');
	if ($(".err_shirina").css('display')=='block' || $(".err_visota").css('display')=='block' || $(".err_otkos").css('display')=='block' || $(".err_podok").css('display')=='block' || $(".err_otliv").css('display')=='block'){
		$('#tst_ex5').css('display','none');
		$('#tst_ex5_new').css('display','block');
		$('#txt_ex5_close').css('display','block');
	}
	else{
		$("#ex_five").css({'display':'none'});
		$("#ex5_ok").css({'display':'block'});
	}
}


function f_tst5_new(){
	$("#select_shirina,#select_visota,#select_otkos,#select_podok,#select_otliv").text('');
	$(".err_shirina,.err_visota,.err_otkos,.err_podok,.err_otliv").css('display','none');
	$('#tst_ex5').css('display','block');
	$('#tst_ex5_new').css('display','none');
	$('#txt_ex5_close').css('display','none');
	// проверяем если есть выдвинутые слайдеры то озакрываем их
	if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
	if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
	if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
	if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
	if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
}