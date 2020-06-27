/* ********************
	Данный метод делает видимой пульсирующую телефонную трубку на каждой странице
	если у пользователя включён JavaScript в настрокай браузера, если нет, 
	то метод просто не сработает и кнопку видно ну будут
********************** */
//$('#zcwMiniButton').css("display","block");

$('#popup-background').on('click', function(){ f_all_close() });

//на этой функции висит закрытие и очитска всех встплывающих форм и скрытие замтемнения
function f_all_close() { 
	// убираем выезжающий слева блок дополнительного меню
	if($(".dop_nav").css("left") != "0px"){
		$(".dop_nav").animate({left:"-110%"},240);
		$("body").css("overflow","auto");
		$(".fon_blok").fadeOut("fast");
	}
	else {		
		$(".dop_nav").animate({left:"-400px"},240);
		$(".fon_blok").fadeOut("fast");
	} 
	
	
	// убираем всплывающее окно ОБРАТНЫЙ ЗВОНОК
	if($('#colme').is(':visible')){
		$(".fon_blok, #colme").css("display","none");
		$('#name,#contacts,#user,#phone').val('');
		$('#err_name_colback,#err_contacts_colback').css('display','none');
		$('#err_phone_user').css('display','none');
		$('#err_name_user').css('display','none');
		$('#contacts').css('"marginTop','30px');
	} 
	
	// убираем вопрос города для маленьких экранов
	if($('#regionQuesAtBody').is(':visible')){
		$(".fon_blok, #regionQuesAtBody").css("display","none");
		f_selectCity('close');
		location.reload();	// перезагружаем страницу, что бы показывать оконный справочник с учётом выбранного города
	}

	
	// убираем всплывающее окно ПРОСЬБА ПЕРЕЗВОНИТЬ УДАЧНО ОТПРАВЛЕНА
	if($('#colMeOk').is(':visible')){
		$(".fon_blok, #colMeOk").css("display","none");
	} 
	
	// убираем всплывающее окно ОКОННАЯ КОМПАНИЯ УДАЧНО ДОБАВЛЕНА В БАЗУ ДАННЫХ
	if($('#addorgOk').is(':visible')){
		$(".fon_blok, #addorgOk").css("display","none");
	} 
	
	
	// убираем всплывающее окно ВЫБОР ГОРОДА И ОБНУЛЯЕМ ГОРОД, т.к. город не был выбран
	if($('#selectcity').is(':visible')){
		var url = location.pathname + location.search;
		$(".fon_blok, #selectcity").css("display","none");
		$('#nameForSelectCity').val('');
		$(".citys").empty();
		$(".citys").append('<a class="pointCitys" href="http://moskva.nadookna.com'+url+'"><b>Москва</b>, Москва</a>');
		$(".citys").append('<a class="pointCitys" href="http://sankt-peterburg.nadookna.com'+url+'"><b>Санкт-Петербург</b>, Санкт-Петербург</a>');
		$(".citys").append('<a class="pointCitys" href="http://novosibirsk.nadookna.com'+url+'"><b>Новосибирск</b>, Новосибирская область</a>');
		$(".citys").append('<a class="pointCitys" href="http://ekaterinburg.nadookna.com'+url+'"><b>Екатеринбург</b>, Свердловская область</a>');
		$(".citys").append('<a class="pointCitys" href="http://nizhnij-novgorod.nadookna.com'+url+'"><b>Нижний Новгород</b>, Нижегородская область</a>');
	} 
	
	// убираем всплывающий блок с видео
	if($('#videobox').is(':visible')){
		$(".fon_blok,#videobox").css('display','none');
		$("#framevideobox").attr('src','');
	}

	// убираем всплывающее окно ПОДРОБНО ОБ АКЦИИ на страницу Акции и скидки
	if($('#popupAction').is(':visible')){
		$(".fon_blok,.popupAction").css("display","none");
	} 	
	
	// убираем всплывающее окно ПОДРОБНОЕ ОПИСАНИЕ ОКОННОЙ КАМПАНИИ на странице справочник оконнойх компаний
	if($('#popupOrg').is(':visible')){
		$(".fon_blok,#popupOrg").css("display","none");
		$("#map,#cont_popup").html('');
	} 	
	
	
	// Закрыем урок одни
	if($('#ex_one').is(':visible') || $('#ex1_ok').is(':visible')){
		$(".fon_blok,#ex_one, #ex1_ok").css("display","none");
		
		$("#select_rama,#select_uplot,#select_steklo,#select_shtapik,#select_furnit,#select_petl,#select_ruchka,#select_stvor,#select_impost").text('');
		$(".err_rama,.err_uplot,.err_steklo,.err_shtapik,.err_furnit,.err_petl,.err_ruchka,.err_stvor,.err_impost").css('display','none');
		$('.test_ex_one').css('display','block');
		$('.test_ex_one_new').css('display','none');
		$('.test_ex_one_close').css('display','none');
		if ($("#slide_rama").css('top') == '-1px') f_slide_rama();
		if ($("#slide_uplot").css('top') == '-1px') f_slide_uplot();
		if ($("#slide_furnit").css('top') == '-1px') f_slide_furnit();
		if ($("#slide_petl").css('top') == '-1px') f_slide_petl();
		if ($("#slide_ruchka").css('top') == '-1px') f_slide_ruchka();
		if ($("#slide_stvor").css('top') == '-1px') f_slide_stvor();
		if ($("#slide_impost").css('top') == '-1px') f_slide_impost();
		if ($("#slide_shtapik").css('top') == '-1px') f_slide_shtapik();
		if ($("#slide_steklo").css('top') == '-1px') f_slide_steklo();
	} 

	
	
	// Закрыем урок два
	if($('#ex_two').is(':visible') || $('#ex2_ok').is(':visible')){
		$(".fon_blok,#ex_two, #ex2_ok").css("display","none");
		
		$("#select_otk,#select_gluh,#select_dvig,#select_povor").text('');
		$(".err_otk,.err_gluh,.err_dvig,.err_povor").css('display','none');
		$('#tst_ex2').css('display','block');
		$('#tst_ex2_new').css('display','none');
		$('#txt_ex2_close').css('display','none');
		$("#fone_box_ex").css({'display':'none'});
		$("#ex_two").css({'display':'none'});
		// проверяем если есть выдвинутые слайдеры то озакрываем их
		if ($("#slide_otk").css('top') == '-1px') f_slide_otk(); 
		if ($("#slide_gluh").css('top') == '-1px') f_slide_gluh(); 
		if ($("#slide_dvig").css('top') == '-1px') f_slide_dvig(); 
		if ($("#slide_povor").css('top') == '-1px') f_slide_povor(); 
	} 

	
	// Заквыем урок три
	if($('#ex_three').is(':visible') || $('#ex3_ok').is(':visible')){
		$(".fon_blok,#ex_three, #ex3_ok").css("display","none");
		
		$("#select_steklop,#select_profil,#select_armir,#select_kam_stek,#select_kam_prof").text('');
		$(".err_steklop,.err_profil,.err_armir,.err_kam_stek,.err_kam_prof").css('display','none');
		$('#tst_ex3').css('display','block');
		$('#tst_ex3_new').css('display','none');
		$('#txt_ex3_close').css('display','none');
		$("#fone_box_ex").css({'display':'none'});
		$("#ex_three").css({'display':'none'});
		// проверяем если есть выдвинутые слайдеры то озакрываем их
		if ($("#slide_steklop").css('top') == '-1px') f_slide_steklop();
		if ($("#slide_profil").css('top') == '-1px') f_slide_profil();
		if ($("#slide_armir").css('top') == '-1px') f_slide_armir();
		if ($("#slide_kam_stek").css('top') == '-1px') f_slide_kam_stek();
		if ($("#slide_kam_prof").css('top') == '-1px') f_slide_kam_prof();
	} 
	
	
	// Заквыем урок четыре
	if($('#ex_four').is(':visible') || $('#ex4_ok').is(':visible')){
		$(".fon_blok,#ex_four, #ex4_ok").css("display","none");
		
		$("#select_otkos,#select_podok,#select_zamok,#select_moskit,#select_otliv").text('');
		$(".err_otkos,.err_podok,.err_zamok,.err_moskit,.err_otliv").css('display','none');
		$('#tst_ex4').css('display','block');
		$('#tst_ex4_new').css('display','none');
		$('#txt_ex4_close').css('display','none');
		$("#fone_box_ex").css({'display':'none'});
		$("#ex_four").css({'display':'none'});
		// проверяем если есть выдвинутые слайдеры то озакрываем их
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_zamok").css('top') == '-1px') f_slide_zamok();
		if ($("#slide_moskit").css('top') == '-1px') f_slide_moskit();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv(); 
	} 
	
	// Заквыем урок пять
	if($('#ex_five').is(':visible') || $('#ex5_ok').is(':visible')){
		$(".fon_blok,#ex_five, #ex5_ok").css("display","none");
	
		$("#select_shirina,#select_visota,#select_otkos,#select_podok,#select_otliv").text('');
		$(".err_shirina,.err_visota,.err_otkos,.err_podok,.err_otliv").css('display','none');
		$('#tst_ex5').css('display','block');
		$('#tst_ex5_new').css('display','none');
		$('#txt_ex5_close').css('display','none');
		$("#fone_box_ex").css({'display':'none'});
		$("#ex_five").css({'display':'none'});
		// проверяем если есть выдвинутые слайдеры то озакрываем их
		if ($("#slide_shirina").css('top') == '-1px') f_slide_shirina();
		if ($("#slide_visota").css('top') == '-1px') f_slide_visota();
		if ($("#slide_otkos").css('top') == '-1px') f_slide_otkos();
		if ($("#slide_podok").css('top') == '-1px') f_slide_podok();
		if ($("#slide_otliv").css('top') == '-1px') f_slide_otliv();
	} 
	
	// Заквыем вопрос контактов в конце создания тендера
	if($('#user_cont').is(':visible')){
		$(".fon_blok,#user_cont").css('display','none');
		$('#phone').val(''); // убираем телефон заказчика
		$('#user').val(''); // убираем имя заказчика
		
		delete tender['phone']; // удаляем из тендера телефон заказчика
		delete tender['name']; // удаляем из тендера имя заказчика
	}
	
	// Заквыем вопрос контактов в конце создания тендера
	if($('#tender_ok').is(':visible')){
		$(".fon_blok,#tender_ok").css('display','none');
	}
}


// показываем выезжающий слева блок дополнительного меню
function f_open_dop_nav() {
	$(".fon_blok").fadeIn("fast");
	
	if ($(".dop_nav").css("marginLeft") != "0px"){
		$(".dop_nav").animate({left:"110%"},240);
		$("body").css("overflow","hidden");
	} 
	else $(".dop_nav").animate({left:"0px"},240);
}




/* *******************

	ОБАРБОТКА РАЗЛИЧНЫХ ДЕЙСТВИЙ ПОЛЬЗОВАТЕЛЯ ПРИ ВЫБОРЕ ГОРОДА:

	Передаваемые в функцию переменные:
	change - пользлователь кликнул на "Выберите Ваш город" или по городу в навигации на каждой странице сайта. Показываем форму выбора города.
	close - пользователь кликнул по "крестику" закрывающему выплывающий баннер "Ваш город определен правильно?"
	no - пользлователь кликнул "Нет" в выплывающем баннере "Ваш город определен правильно?"
	yes - пользлователь кликнул "Да" в выплывающем баннере "Ваш город определен правильно?"
 
 ******************** */
 
 $('.btnDontCity').on( 'click', function(){ 
 	f_selectCity('no');
	$('#regionQuesFalse, #regionQuesAtBodyFalse').hide();
 }); 
 
 $('.closeRegionQues').on( 'click', function(){ f_selectCity('close') });
 
 $('#btnSelectCityOrg').on( 'click', function(){
	 f_selectCity('change');
 });
 
 $('.btnAskCity').on( 'click', function(){
	 $('#askCityTender').hide();
 	f_selectCity('no');
 }); 
 
function f_selectCity(whatdo){
	// в переменной usercity храним годрод, определенный с помощью Яндекс скрипта в файле pattern/editcity.php 
	// если переменная не существует, а она может не существовать т.к скрипт автоматического определения города 
	// появляется только один раз именно он и создаёт перменную с городом записываем в перменную значение по 
	// умолчанию "Выберите ваш город"
	
	var hostfromurl = location.hostname; // домен в url
	
	// пользователь кликнул по городу в шапке, показываем окно выбора города
	if (whatdo == 'change'){
		if($('#regionQues').is(':visible')) $('#regionQues').css('display','none');
		$(".fon_blok,#selectcity").css("display", "block");
		if($(window).height() < 450) $('#selectcity').css({"position":"absolute", "top":$(window).scrollTop(), "marginTop":"0"});
		else $('#selectcity').css({"position":"fixed", "top":"50%", "marginTop":"-225px"});
		
		// если пользователь находится на основном сайте (nadookna.ru), то записываем в сессии автоматически определенный город
		if (hostfromurl == 'nadookna.com'){
			$.ajax({
				type: "POST",
				cache: false,
				url: "../script/php/editcity.php",
				data: {city:usercity},
				async: true,
			});
		}
	} 
	
	// пользователь кликнул "закрыть" в всплыввющем окне выбора о том что город не определён, поэтому просто закрываем попап с сообщением
	if (whatdo == 'close'){
		$('#regionQuesFalse, .fon_blok, #regionQuesAtBody, #regionQuesAtBodyFalse').css('display','none');
		
		if (hostfromurl == 'nadookna.com'){
			$.ajax({
				type: "POST",
				cache: false,
				url: "../script/php/editcity.php",
				data: {city:usercity},
				async: true,
				// success: function(){location.reload();}	// перезагружаем страницу, что бы показывать контент с учётом города
			});	
		}
	}
	
	// пользователь кликнул "нет" в всплыввющем окне выбора города, поэтому показывам форму выбора города и устанавливаем горд в сесии и в переменных как "Выберите ваш город"
	if (whatdo == 'no'){
		$('#regionQues,.fon_blok,#regionQuesAtBody').css('display','none');
		$(".fon_blok,#selectcity").css("display", "block");
		
		// если пользователь находится на основном сайте (nadookna.ru), то записываем в сессию город по умолчанию - "Ваш город"
		if (hostfromurl == 'nadookna.com'){
			$('.cityName,#cityNav').html('Выберите Ваш город');
			$('#cityAtForm,#cityAtFormKont').val('Город пользователя не определён.');
			$.ajax({
				type: "POST",
				cache: false,
				url: "../script/php/editcity.php",
				data: {city:'Выберите Ваш город'},
				async: true,
			});
		}
	}
	
	// пользователь кликнул "да" в всплыввющем окне выбора города, с помощью AJAX запроса устанавливаем город в сессиию посылая глобальную переменную usercity
	if (whatdo == 'yes'){
		$('#regionQues,.fon_blok,#regionQuesAtBody').css('display','none');
		
		// если пользователь находится на основном сайте (nadookna.ru), то записываем в сессии автоматически определенный город и перезагружаем страницу
		if (hostfromurl == 'nadookna.com'){
			$.ajax({
				type: "POST",
				cache: false,
				url: "../script/php/editcity.php",
				data: {city:usercity},
				async: true,
				success: function(){location.reload();}	// перезагружаем страницу, что бы показывать контент с учётом города
			});
		}
	}
}


/* *************

	ПОДСОВЫВАЕМ ПОЛЬЗОВАТЕЛЮ ГОРОДА НА ВЫБОР ПРИ ВЫБОРЕ ГОРОДА В ВСПЛЫВАЮЩЕМ ОКНЕ
	
	После каждого ввода нового символа запускается функция, которая
	через AJAX запрос осущетвляет поиск в БД городов 
	и полученные результаты выводятся внизу поля ввода

***************/
var input = document.getElementById('nameForSelectCity');
var citytranslit; // переменная для хранения города в транслите
function askCity(url) {
	$.ajax({
	type: "POST",
	cache: false ,
	url: "../script/php/askcity.php",
	data: {inputval:$('#nameForSelectCity').val()},
	dataType: "text",
	async: true,
	success: function(data){
			if (data == 'null'){
				$(".citys").empty(); // чистим блок для вывода городов
				$(".citys").append('<a class="pointCitys" href="http://moskva.nadookna.com'+url+'"><b>Москва</b>, Москва</a>');
				$(".citys").append('<a class="pointCitys" href="http://sankt-peterburg.nadookna.com'+url+'"><b>Санкт-Петербург</b>, Санкт-Петербург</a>');
				$(".citys").append('<a class="pointCitys" href="http://novosibirsk.nadookna.com'+url+'"><b>Новосибирск</b>, Новосибирская область</a>');
				$(".citys").append('<a class="pointCitys" href="http://ekaterinburg.nadookna.com'+url+'"><b>Екатеринбург</b>, Свердловская область</a>');
				$(".citys").append('<a class="pointCitys" href="http://nizhnij-novgorod.nadookna.com'+url+'"><b>Нижний Новгород</b>, Нижегородская область</a>');
			}
			else {
				var items = [];
				var obj = $.parseJSON(data);
				if (obj == ''){
					$(".citys").empty(); // чистим блок для вывода городов
					$(".citys").append('<div class="errcity">Видемо допущена ошибка!</div>'); // если полученный массив пустой говорим об ошбике
				}
				else{
					$.each(obj, function(key, val){
						// получаем транслит имени города для формирования урла	
						$.ajax({
							type: "POST",
							cache: false ,
							url: "../script/php/getcitytranslit.php",
							data: {city:val,region:key},
							dataType: "text",
							async: false,
							success: function(date){citytranslit = date;}
						});
						
						items.push('<a class="pointCitys" href="http://'+citytranslit+'.nadookna.com'+url+'"><b>'+val+'</b>, '+key+'</a>');
					});
					$(".citys").empty(); // чистим div для вывода городов
					$(".citys").append(items); // добавляем города в div под полем ввода
				}
			}
		}
	});
}

// Вызываем обработчик введенных пользователем данных в форме выбора города при каждом изменении поля ввода
//input.oninput = askCity;

	
// Показать форму обратный звонок
function f_viewCollMe(){
	$(".fon_blok, #colme").css("display", "block");
	if($(window).height() < 460) $('#colme').css({"position":"absolute", "top":$(window).scrollTop(), "marginTop":"0"});
	else $('#colme').css({"position":"fixed", "top":"50%", "marginTop":"-225px"});
}

// Данныя функция валидирует данные введённые пользователем в форму обратного звонка и посылает сообщение через AJAX запрос и функцию в sendcollme.php
function f_call_me(){
	$('#err_name_colback,#err_contacts_colback').css('display','none');
	if ($('#name').val() == '') $('#err_name_colback').css('display','block');
	if ($('#contacts').val() == ''){$('#err_contacts_colback').css('display','block'); $('#contacts').css('marginTop','20px');} 
	
	// при редактировании убираем ошибки
	$('#name').keyup(function(){$('#err_name_colback').css('display','none');});
	$('#contacts').keyup(function(){$('#err_contacts_colback').css('display','none'); $('#contacts').css('marginTop','30px');});

	if ($('#name').val() != '' && $('#contacts').val() != ''){
		$.ajax({
		type: "POST",
		cache: false ,
		url: "../script/php/sendcollme.php",
		data: {cityatform:$('#cityAtForm').val(), name:$('#name').val(), contacts:$('#contacts').val(), from_page:'callme'},
		dataType: "text",
		async: true,
		success: function(data){
				if (data == 1) {
					$('#colMeOk').css('display','block'); 
					$('#colme').css('display','none');
					$('#contacts').css('marginTop','30px');
					$('#err_name_colback,#err_contacts_colback').css('display','none');
					$('#name,#contacts').val('');
				}
				else alert('К сожалению не удалось отпарвить запрос. Повторите попытку позже.');
			}
		});
	}
}
	


// скрипт который приклеивает меню к верху страницы
$(document).ready(function () {
	var objToStick = $("#nav"); //Получаем нужный объект
	var topOfObjToStick = $(objToStick).offset().top; //Получаем начальное расположение нашего блока

	$(window).scroll(function () {
		var windowScroll = $(window).scrollTop(); //Получаем величину, показывающую на сколько прокручено окно

		// Если прокрутили больше, чем расстояние до блока, то приклеиваем его иначе отклеиваем
		if ($("#nav").css('top') != '0px' && windowScroll > topOfObjToStick){ 
			$("#logoInNav,#vacuumBlock").css('display','block');
			$("#vacuumBlock").css('display','block');
			$(objToStick).addClass("stikToTop");
			$("#ulInNav").animate({left: "240px"}, 300);
			if ($(window).width() < 460) $("#cityNav").css('display','none');
		}
		
		if ($("#nav").css('top') == '0px' && windowScroll < topOfObjToStick) {
			$(objToStick).removeClass("stikToTop");
			$("#ulInNav").animate({left: "70px"}, 300);
			$("#vacuumBlock").css('display','none');
			if ($(window).width() < 1000) $("#logoInNav").css('display','none');
			if ($(window).width() < 460) $("#cityNav").css('display','block');
		}
	});
});