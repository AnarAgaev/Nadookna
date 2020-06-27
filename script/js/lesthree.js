function f_show_ex() {
	$("#ex_three, .fon_blok").css({'display':'block'});
}

// функции для слайдера стеклопакет 
function f_slide_steklop(x) {
	$(".err_steklop").css('display','none');
	if ($("#slide_steklop").css('top') == '-280px'){
		$("#slide_steklop").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_steklop").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_steklop").text() == '') $("#select_steklop").text('Что это?');
		if ($("#slide_profil").css('top') == '-1px') f_slide_profil();// скрываем ткрытые формы если они есть
		if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
		if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
		if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Несколько стёкол, склеенных по периметру между собой таким образом, что между ними образются воздушные камеры.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Несколько стёкол, склеенных по периметру между собой таким образом, что между ними образются воздушные камеры.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_steklop").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_steklop").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_steklop").text() == 'Что это?') $("#select_steklop").text('');}
		else $("#select_steklop").text(x);
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера ПВХ профиль
function f_slide_profil(x) { 
	$(".err_profil").css('display','none');
	if ($("#slide_profil").css('top') == '-280px'){
		$("#slide_profil").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_profil").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_profil").text() == '') $("#select_profil").text('Что это?');
		if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();// скрываем ткрытые формы если они есть
		if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
		if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
		if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Пластиковый брусок неправильной формы из которого сделана рама и створка окна.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Пластиковый брусок неправильной формы из которого сделана рама и створка окна.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_profil").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_profil").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_profil").text() == 'Что это?') $("#select_profil").text('');}
		else $("#select_profil").text(x);
		
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера армирование 
function f_slide_armir(x) {
	$(".err_armir").css('display','none');
	if ($("#slide_armir").css('top') == '-280px'){
		$("#slide_armir").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_armir").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_armir").text() == '') $("#select_armir").text('Что это?');
		if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();// скрываем ткрытые формы если они есть
		if ($("#slide_profil").css('top') == '-1px') f_slide_profil();
		if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
		if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
		if($("#hlp_ex1_left").css('top') == '0px')$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");});//задвигаем левую подсказку и убираем тело
		if($("#hlp_ex1_right").css('top') == '0px'){  // если правая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_right").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_right").text('Усиливающий профиль стальной элемент, находящийся внутри профиля и придающий прочность всей оконной конструкции.');
				$(".hlp_ex1_right").css('height','240px');
				$("#hlp_ex1_right").animate({top:"0px"},300);
			});
		}
		else{ // елси правая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_right").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_right").text('Усиливающий профиль стальной элемент, находящийся внутри профиля и придающий прочность всей оконной конструкции.');
			$("#hlp_ex1_right").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_armir").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_armir").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_armir").text() == 'Что это?') $("#select_armir").text('');}
		else $("#select_armir").text(x);
		
		$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера колличество камер стеклопакета
function f_slide_kam_stek(x) { 
	$(".err_kam_stek").css('display','none');
	if ($("#slide_kam_stek").css('top') == '-280px'){
		$("#slide_kam_stek").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_kam_stek").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_kam_stek").text() == '') $("#select_kam_stek").text('Кол-во камер?');
		if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();// скрываем ткрытые формы если они есть
		if ($("#slide_profil").css('top') == '-1px') f_slide_profil();
		if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
		if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Герметичная полость, заключённая между стеклами и заполненная либо инертным газом, либо осушённым воздухом.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Герметичная полость, заключённая между стеклами и заполненная либо инертным газом, либо осушённым воздухом.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_kam_stek").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_kam_stek").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_kam_stek").text() == 'Кол-во камер?') $("#select_kam_stek").text('');}
		else $("#select_kam_stek").text(x);
		
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}

// функции для слайдера колличество камер профиля
function f_slide_kam_prof(x) { 
	$(".err_kam_prof").css('display','none');
	if ($("#slide_kam_prof").css('top') == '-280px'){
		$("#slide_kam_prof").animate({top:"-1px"},300); // выдвигаем тело слайдера с пунктами меню
		$("#select_kam_prof").css({ // меняем цвет, бордер и цвет шрифта поля выбора
			'border':'none',
			'backgroundColor':'#4d90fe',
			'color':'#fff',
			'box-shadow':'none',
			'-webkit-box-shadow':'none',
			'-moz-box-shadow':'none'
		});
		if ($("#select_kam_prof").text() == '') $("#select_kam_prof").text('Кол-во камер?');
		if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();// скрываем ткрытые формы если они есть
		if ($("#slide_profil").css('top') == '-1px') f_slide_profil();
		if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
		if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
		if($("#hlp_ex1_right").css('top') == '0px')$("#hlp_ex1_right").animate({top:"-250px"},300,function(){$(".hlp_ex1_right").css('height',"0px");});//задвигаем правую подсказку и убираем тело
		if($("#hlp_ex1_left").css('top') == '0px'){  // если левая подсказка отктыта задвигае, меняем текст, выдвигаем
			$("#hlp_ex1_left").animate({top:"-250px"},300, function(){
				$("#bd_hlp_ex1_left").text('Замкнутые отсеки внутри пластикового профиля, которые разделены между собой перегородками и образуют изолированные полости.');
				$(".hlp_ex1_left").css('height','240px');
				$("#hlp_ex1_left").animate({top:"0px"},300);
			});
		}
		else{ // елси левая зактыра то меняем текст и выдвигаем
			$(".hlp_ex1_left").css('height',"240px"); //разжимаем тело подсказки, для того чтобы было видно её наполнение
			$("#bd_hlp_ex1_left").text('Замкнутые отсеки внутри пластикового профиля, которые разделены между собой перегородками и образуют изолированные полости.');
			$("#hlp_ex1_left").animate({top:"0px"},300);
		}
	}
	else {
		$("#slide_kam_prof").animate({top:'-280px'},300); // задвигаем тело слайдера с пунктами меню
		$("#select_kam_prof").css({ // меняем цвет, бордер и цвет шрифта поля выбора
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
		if (x == undefined){if ($("#select_kam_prof").text() == 'Кол-во камер?') $("#select_kam_prof").text('');}
		else $("#select_kam_prof").text(x);
		
		$("#hlp_ex1_left").animate({top:"-250px"},300,function(){$(".hlp_ex1_left").css('height',"0px");}); //задвигаем тело подсказки и сжимаем тело
	}
}


function f_test_ex3(){
	if($("#select_steklop").text()=='' || $("#select_steklop").text()!='Стеклопакет') $(".err_steklop").css('display','block');
	if($("#select_profil").text()=='' || $("#select_profil").text()!='ПВХ профиль') $(".err_profil").css('display','block');
	if($("#select_armir").text()=='' || $("#select_armir").text()!='Армирование') $(".err_armir").css('display','block');
	if($("#select_kam_stek").text()=='' || $("#select_kam_stek").text()!='2') $(".err_kam_stek").css('display','block');
	if($("#select_kam_prof").text()=='' || $("#select_kam_prof").text()!='3') $(".err_kam_prof").css('display','block');

	if ($(".err_steklop").css('display')=='block' || $(".err_profil").css('display')=='block' || $(".err_dvig").css('display')=='block' || $(".err_kam_stek").css('display')=='block' || $(".err_kam_prof").css('display')=='block'){
		$('#tst_ex3').css('display','none');
		$('#tst_ex3_new').css('display','block');
		$('#txt_ex3_close').css('display','block');
	}
	else{
		$("#ex_three").css({'display':'none'});
		$("#ex3_ok").css({'display':'block'});
	}
}
function f_tst3_new(){
	$("#select_steklop,#select_profil,#select_armir,#select_kam_stek,#select_kam_prof").text('');
	$(".err_steklop,.err_profil,.err_armir,.err_kam_stek,.err_kam_prof").css('display','none');
	$('#tst_ex3').css('display','block');
	$('#tst_ex3_new').css('display','none');
	$('#txt_ex3_close').css('display','none');
	// проверяем если есть выдвинутые слайдеры то озакрываем их
	if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();
	if ($("#slide_profil").css('top') == '-1px') f_slide_profil();
	if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
	if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
	if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
}