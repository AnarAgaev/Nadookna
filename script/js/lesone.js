function f_show_ex() {	
	$("#ex_one, .fon_blok").css({'display':'block'});
}
function f_slide_rama(x) {	// функции для слайдера рама
	$(".err_rama").css('display','none');
	if ($("#slide_rama").css('top') == '-280px'){
		$("#slide_rama").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_rama").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_rama").text() == '') $("#select_rama").text('Что это?');
		// скрываем ткрытые формы если они есть
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Неподвижно зафиксированный в проеме элемент окна, который служит для закрепления на нём створок или монтажа стеклопакета');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Неподвижно зафиксированный в проеме элемент окна, который служит для закрепления на нём створок или монтажа стеклопакета');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_rama").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_rama").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_rama").text() == 'Что это?') $("#select_rama").text('');}
		else $("#select_rama").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_furnit(x) { // функции для слайдера фурнитура
	$(".err_furnit").css('display','none');
	if ($("#slide_furnit").css('top') == '-280px'){
		$("#slide_furnit").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_furnit").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_furnit").text() == '') $("#select_furnit").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Механизм, располагающаяся по периметру створки и внутри рамы, задачей которого является управление окном, его запирание, отпирание, откидывание, поворот.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Механизм, располагающаяся по периметру створки и внутри рамы, задачей которого является управление окном, его запирание, отпирание, откидывание, поворот.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_furnit").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_furnit").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_furnit").text() == 'Что это?') $("#select_furnit").text('');}
		else $("#select_furnit").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_petl(x) {// функции для слайдера петли
	$(".err_petl").css('display','none');
	if ($("#slide_petl").css('top') == '-280px'){
		$("#slide_petl").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_petl").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_petl").text() == '') $("#select_petl").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Металлическая деталь в пластмассовом корпусе. Применяется, чтобы обеспечить подвижный крепёж створки к раме.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Металлическая деталь в пластмассовом корпусе. Применяется, чтобы обеспечить подвижный крепёж створки к раме.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_petl").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_petl").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_petl").text() == 'Что это?') $("#select_petl").text('');}
		else $("#select_petl").text(x);
		
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_ruchka(x) { // функции для слайдера ручка
	$(".err_ruchka").css('display','none');
	if ($("#slide_ruchka").css('top') == '-280px'){
		$("#slide_ruchka").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_ruchka").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_ruchka").text() == '') $("#select_ruchka").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Рычажный элемент пластикового окна позволяющий передать усилие человека на открывающий механизм створки из одной точки.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Рычажный элемент пластикового окна позволяющий передать усилие человека на открывающий механизм створки из одной точки.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_ruchka").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_ruchka").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_ruchka").text() == 'Что это?') $("#select_ruchka").text('');}
		else $("#select_ruchka").text(x);
		
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_stvor(x) { // функции для слайдера створка
	$(".err_stvor").css('display','none');
	if ($("#slide_stvor").css('top') == '-280px'){
		$("#slide_stvor").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_stvor").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_stvor").text() == '') $("#select_stvor").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Пластиковый элемент оконной конструкции с вмонтированным в него стеклопакетом.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Пластиковый элемент оконной конструкции с вмонтированным в него стеклопакетом.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_stvor").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_stvor").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_stvor").text() == 'Что это?') $("#select_stvor").text('');}
		else $("#select_stvor").text(x);
		
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_impost(x) {// функции для слайдера импост
	$(".err_impost").css('display','none');
	if ($("#slide_impost").css('top') == '-280px'){
		$("#slide_impost").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_impost").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_impost").text() == '') $("#select_impost").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Элемент пластикового окна в виден горизонтальной или вертикальной балки, а иногда их комбинации, делящий окно на части.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Элемент пластикового окна в виден горизонтальной или вертикальной балки, а иногда их комбинации, делящий окно на части.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_impost").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_impost").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_impost").text() == 'Что это?') $("#select_impost").text('');}
		else $("#select_impost").text(x);
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_shtapik(x) {// функции для слайдера штапик  
	$(".err_shtapik").css('display','none');
	if ($("#slide_shtapik").css('top') == '-280px'){
		$("#slide_shtapik").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_shtapik").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_shtapik").text() == '') $("#select_shtapik").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Пластиковый брусок неправильной формы, предназначенный для крепления стеклопакета в раме.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Пластиковый брусок неправильной формы, предназначенный для крепления стеклопакета в раме.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_shtapik").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_shtapik").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_shtapik").text() == 'Что это?') $("#select_shtapik").text('');}
		else $("#select_shtapik").text(x);
	
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_steklo(x) { // функции для слайдера стекло 
	$(".err_steklo").css('display','none');
	if ($("#slide_steklo").css('top') == '-280px'){
		$("#slide_steklo").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_steklo").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_steklo").text() == '') $("#select_steklo").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Прозрачная часть пластикового окна.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Прозрачная часть пластикового окна.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_steklo").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_steklo").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_steklo").text() == 'Что это?') $("#select_steklo").text('');}
		else $("#select_steklo").text(x);
		
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_slide_uplot(x) { // функции для слайдера уплотнитель 
	$(".err_uplot").css('display','none');
	if ($("#slide_uplot").css('top') == '-280px'){
		$("#slide_uplot").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_uplot").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_uplot").text() == '') $("#select_uplot").text('Что это?');
		// скрываем открытые формы если они есть
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Резиновый или силиконовый шнур для герметизации стыков между деталями окна.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Резиновый или силиконовый шнур для герметизации стыков между деталями окна.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_uplot").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_uplot").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_uplot").text() == 'Что это?') $("#select_uplot").text('');}
		else $("#select_uplot").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}
function f_test_ex1(){
	if($("#select_rama").text()=='' || $("#select_rama").text()!='Рама') $(".err_rama").css('display','block');
	if($("#select_uplot").text()=='' || $("#select_uplot").text()!='Уплотнитель') $(".err_uplot").css('display','block');
	if($("#select_steklo").text()=='' || $("#select_steklo").text()!='Стеклопакет') $(".err_steklo").css('display','block');
	if($("#select_shtapik").text()=='' || $("#select_shtapik").text()!='Штапик') $(".err_shtapik").css('display','block');
	if($("#select_furnit").text()=='' || $("#select_furnit").text()!='Фурнитура') $(".err_furnit").css('display','block');
	if($("#select_petl").text()=='' || $("#select_petl").text()!='Петля') $(".err_petl").css('display','block');
	if($("#select_ruchka").text()=='' || $("#select_ruchka").text()!='Ручка') $(".err_ruchka").css('display','block');
	if($("#select_stvor").text()=='' || $("#select_stvor").text()!='Створка') $(".err_stvor").css('display','block');
	if($("#select_impost").text()=='' || $("#select_impost").text()!='Импост') $(".err_impost").css('display','block');
	if ($(".err_rama").css('display')=='block' || $(".err_uplot").css('display')=='block' || $(".err_steklo").css('display')=='block' || $(".err_shtapik").css('display')=='block' || $(".err_furnit").css('display')=='block' || $(".err_petl").css('display')=='block' || $(".err_ruchka").css('display')=='block' || $(".err_stvor").css('display')=='block' || $(".err_impost").css('display')=='block'){
		$('.test_ex_one').css('display','none');
		$('.test_ex_one_new').css('display','block');
		$('.test_ex_one_close').css('display','block');
	}
	else{
		$("#ex_one").css({'display':'none'});
		$("#ex1_ok").css({'display':'block'});
	}
}
function f_test_new(){
	$("#select_rama,#select_uplot,#select_steklo,#select_shtapik,#select_furnit,#select_petl,#select_ruchka,#select_stvor,#select_impost").text('');
	$(".err_rama,.err_uplot,.err_steklo,.err_shtapik,.err_furnit,.err_petl,.err_ruchka,.err_stvor,.err_impost").css('display','none');
	$('.test_ex_one').css('display','block');
	$('.test_ex_one_new').css('display','none');
	$('.test_ex_one_close').css('display','none');
	if ($("#slide_rama").css('top') == '-1px') f_slide_rama(); 
	if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot(); 
	if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo(); 
	if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik(); 
	if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit(); 
	if ($("#slide_petl").css('top') == '-1px') f_slide_petl(); 
	if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka(); 
	if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor(); 
	if ($("#slide_impost").css('top') == '-1px') f_slide_impost(); 
}