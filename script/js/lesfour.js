function f_show_ex() {	
	$("#ex_four, .fon_blok").css({'display':'block'});
}

// функции для слайдера откосы
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
		if ($("#select_otkos").text() == '') $("#select_otkos").text('Что это?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
		if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Плоская часть оконного проема, торец стены справа, слева и сверху пластикового окна.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Плоская часть оконного проема, торец стены справа, слева и сверху пластикового окна.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
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
		if (x == undefined){if ($("#select_otkos").text() == 'Что это?') $("#select_otkos").text('');}
		else $("#select_otkos").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера подоконник
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
		if ($("#select_podok").text() == '') $("#select_podok").text('Что это?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
		if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Элемент пластикового окна, который монтируется к нижней части рамы со стороны помещения и закрывает нижнюю плоскость оконного проёма.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Элемент пластикового окна, который монтируется к нижней части рамы со стороны помещения и закрывает нижнюю плоскость оконного проёма.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
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
		if (x == undefined){if ($("#select_podok").text() == 'Что это?') $("#select_podok").text('');}
		else $("#select_podok").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера детский замок
function f_slide_zamok(x) {
	$(".err_zamok").css('display','none');
	if ($("#slide_zamok").css('top') == '-280px'){
		$("#slide_zamok").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_zamok").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_zamok").text() == '') $("#select_zamok").text('Что это?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Механизм, который полностью или частично блокирует возможность открывания окна, оставляя функцию откидывания рамы в режим проветривания.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Механизм, который полностью или частично блокирует возможность открывания окна, оставляя функцию откидывания рамы в режим проветривания.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_zamok").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_zamok").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_zamok").text() == 'Что это?') $("#select_zamok").text('');}
		else $("#select_zamok").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера москитная сетка
function f_slide_moskit(x) {
	$(".err_moskit").css('display','none');
	if ($("#slide_moskit").css('top') == '-280px'){
		$("#slide_moskit").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_moskit").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_moskit").text() == '') $("#select_moskit").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Полиуретановая сетка, которая крепится на пластиковую рамку и размещается со внешней стороны окна напроитв открывающейся створки.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Полиуретановая сетка, которая крепится на пластиковую рамку и размещается со внешней стороны окна напроитв открывающейся створки.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_moskit").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_moskit").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_moskit").text() == 'Что это?') $("#select_moskit").text('');}
		else $("#select_moskit").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера отлив
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
		if ($("#select_otliv").text() == '') $("#select_otliv").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
		if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Элемент окна, монтирующийся к нижней части рамы со стороны улицы, закрывающий нижнюю плоскость оконного проёма и монтажные швы.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Элемент окна, монтирующийся к нижней части рамы со стороны улицы, закрывающий нижнюю плоскость оконного проёма и монтажные швы.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
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
		if (x == undefined){if ($("#select_otliv").text() == 'Что это?') $("#select_otliv").text('');}
		else $("#select_otliv").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}


function f_test_ex4(){
	if($("#select_otkos").text()=='' || $("#select_otkos").text()!='Откосы') $(".err_otkos").css('display','block');
	if($("#select_podok").text()=='' || $("#select_podok").text()!='Подоконник') $(".err_podok").css('display','block');
	if($("#select_zamok").text()=='' || $("#select_zamok").text()!='Замок от детей') $(".err_zamok").css('display','block');
	if($("#select_moskit").text()=='' || $("#select_moskit").text()!='Москитная сетка') $(".err_moskit").css('display','block');
	if($("#select_otliv").text()=='' || $("#select_otliv").text()!='Отлив') $(".err_otliv").css('display','block');
	if ($(".err_otkos").css('display')=='block' || $(".err_podok").css('display')=='block' || $(".err_zamok").css('display')=='block' || $(".err_moskit").css('display')=='block' || $(".err_otliv").css('display')=='block'){
		$('#tst_ex4').css('display','none');
		$('#tst_ex4_new').css('display','block');
		$('#txt_ex4_close').css('display','block');
	}
	else{
		$("#ex_four").css({'display':'none'});
		$("#ex4_ok").css({'display':'block'});
	}
}
function f_tst4_new(){
	$("#select_otkos,#select_podok,#select_zamok,#select_moskit,#select_otliv").text('');
	$(".err_otkos,.err_podok,.err_zamok,.err_moskit,.err_otliv").css('display','none');
	$('#tst_ex4').css('display','block');
	$('#tst_ex4_new').css('display','none');
	$('#txt_ex4_close').css('display','none');
	// проверяем если есть выдвинутые слайдеры то озакрываем их
	if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
	if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
	if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
	if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
	if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv(); 
}