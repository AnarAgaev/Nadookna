function f_show_ex() {	
	$("#ex_two, .fon_blok").css({'display':'block'});
}

// функции для слайдера откидная створка
function f_slide_otk(x) {
	$(".err_otk").css('display','none');
	if ($("#slide_otk").css('top') == '-280px'){
		$("#slide_otk").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_otk").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_otk").text() == '') $("#select_otk").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_gluh").css('top') == '-1px') f_slide_gluh();
		if ($("#slide_dvig").css('top') == '-1px') f_slide_dvig();
		if ($("#slide_povor").css('top') == '-1px') f_slide_povor();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Cтворка которая откидывается внутрь помещения на петлях, установленных на нижней горизонтальной её оси.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Cтворка которая откидывается внутрь помещения на петлях, установленных на нижней горизонтальной её оси.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_otk").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_otk").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_otk").text() == 'Что это?') $("#select_otk").text('');}
		else $("#select_otk").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
// функции для слайдера глухое окно 
function f_slide_gluh(x) { 
	$(".err_gluh").css('display','none');
	if ($("#slide_gluh").css('top') == '-280px'){
		$("#slide_gluh").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_gluh").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_gluh").text() == '') $("#select_gluh").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_otk").css('top') == '-1px') f_slide_otk();
		if ($("#slide_dvig").css('top') == '-1px') f_slide_dvig();
		if ($("#slide_povor").css('top') == '-1px') f_slide_povor();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Створка жестко зафиксированная в оконной конструкции и не имеющая открывающего механизма.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Створка жестко зафиксированная в оконной конструкции и не имеющая открывающего механизма.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_gluh").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_gluh").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_gluh").text() == 'Что это?') $("#select_gluh").text('');}
		else $("#select_gluh").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
// функции для слайдера раздижная створка
function f_slide_dvig(x) { 
	$(".err_dvig").css('display','none');
	if ($("#slide_dvig").css('top') == '-280px'){
		$("#slide_dvig").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_dvig").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_dvig").text() == '') $("#select_dvig").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_otk").css('top') == '-1px') f_slide_otk();
		if ($("#slide_gluh").css('top') == '-1px') f_slide_gluh();
		if ($("#slide_povor").css('top') == '-1px') f_slide_povor();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Створка, которая в процессе открывания сдвигается параллельно плоскости всего окна.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Створка, которая в процессе открывания сдвигается параллельно плоскости всего окна.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_dvig").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_dvig").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_dvig").text() == 'Что это?') $("#select_dvig").text('');}
		else $("#select_dvig").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
// функции для слайдера поворотная створка
function f_slide_povor(x) {
	$(".err_povor").css('display','none');
	if ($("#slide_povor").css('top') == '-280px'){
		$("#slide_povor").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_povor").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_povor").text() == '') $("#select_povor").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_otk").css('top') == '-1px') f_slide_otk();
		if ($("#slide_gluh").css('top') == '-1px') f_slide_gluh();
		if ($("#slide_dvig").css('top') == '-1px') f_slide_dvig();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Створка, которая поворачиваются на вертикальной оси вокруг одной из своих сторон.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Створка, которая поворачиваются на вертикальной оси вокруг одной из своих сторон.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_povor").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_povor").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_povor").text() == 'Что это?') $("#select_povor").text('');}
		else $("#select_povor").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_test_ex2(){
	if($("#select_otk").text()=='' || $("#select_otk").text()!='Откидная') $(".err_otk").css('display','block');
	if($("#select_gluh").text()=='' || $("#select_gluh").text()!='Глухая') $(".err_gluh").css('display','block');
	if($("#select_dvig").text()=='' || $("#select_dvig").text()!='Раздвижная') $(".err_dvig").css('display','block');
	if($("#select_povor").text()=='' || $("#select_povor").text()!='Поворотная') $(".err_povor").css('display','block');
	if ($(".err_otk").css('display')=='block' || $(".err_gluh").css('display')=='block' || $(".err_dvig").css('display')=='block' || $(".err_povor").css('display')=='block'){
		$('#tst_ex2').css('display','none');
		$('#tst_ex2_new').css('display','block');
		$('#txt_ex2_close').css('display','block');
	}
	else{
		$("#ex_two").css({'display':'none'});
		$("#ex2_ok").css({'display':'block'});
	}
}
function f_tst2_new(){
	$("#select_otk,#select_gluh,#select_dvig,#select_povor").text('');
	$(".err_otk,.err_gluh,.err_dvig,.err_povor").css('display','none');
	$('#tst_ex2').css('display','block');
	$('#tst_ex2_new').css('display','none');
	$('#txt_ex2_close').css('display','none');
	// проверяем если есть выдвинутые слайдеры то закрываем их
	if ($("#slide_otk").css('top') == '-1px') f_slide_otk(); 
	if ($("#slide_gluh").css('top') == '-1px') f_slide_gluh(); 
	if ($("#slide_dvig").css('top') == '-1px') f_slide_dvig(); 
	if ($("#slide_povor").css('top') == '-1px') f_slide_povor(); 
}