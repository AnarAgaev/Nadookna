/* ********************
	Данный скрипт показывает подробное описание оконной компании на странце Оконный справочник
	
********************** */

function f_show_org(id_org)
{
		$.ajax({
		type: "POST",
		cache: false ,
		url: "../script/php/showorg.php",
		data: {idorg:id_org},
		dataType: "text",
		async: true,
		success: function(data){
			
				// распарсиваем полученный из php скрипта json с параметрами акции
				var obj = $.parseJSON(data);
				
				// заполняем поля попап
				$("#popup_titel_org").html(obj.name);
				$("#adrs_org").html(obj.adds);
				$("#text_popup").html(obj.info);
				
				// собираем номера телеофнов
				var phones;
				if (obj.phone1 != '') phones = obj.phone1+'<br>';
				if (obj.phone2 != '') phones += obj.phone2+'<br>';
				if (obj.phone3 != '') phones += obj.phone3+'<br>';
				if (obj.phone4 != '') phones += obj.phone4+'<br>';
				if (obj.phone5 != '') if (obj.phone5 != '') phones += obj.phone5+'<br>';
				if (phones != '') $("#phones").html(phones);
				
				if (obj.wtime != '') $('#cont_popup').append('<span class="akcent_popup">Режим работы: </span><span id="wtime">'+obj.wtime+'</span><br>');
				if (obj.email != '') $('#cont_popup').append('<span class="akcent_popup">Емэйл: </span><span id="wtime">'+obj.email+'</span><br>');
				if (obj.profil != '') $('#cont_popup').append('<span class="akcent_popup">Используемый профиль: </span><span id="wtime">'+obj.profil+'</span><br>');
				if (obj.furnitura != '') $('#cont_popup').append('<span class="akcent_popup">Используемая фурнитура: </span><span id="wtime">'+obj.furnitura+'</span><br>');
				
				if (obj.url != '') $('#cont_popup').append('<a class="akcent_popup" href="http://'+obj.url+'" target="blank" rel="nofollow">'+obj.url+'</a><br>');
				
				// блок с Отзывами
				$.ajax({
				type: "POST",
				cache: false ,
				url: "../script/php/showrevs.php",
				data: {idorg:id_org},
				dataType: "text",
				async: true,
				success: function(datarev){
						$("#revcont,#adrev").html('');
						$("#adrev").attr("href", "");
						if (datarev == 'null'){
							$("#revcont").html('У компании пока нет отзывов...');
							$("#adrev").html('Написать отзыв первым');
							$("#adrev").attr("href", "okonnaya-kompaniya.php?idorg="+id_org+"&#review");
						}
						else{
							$("#adrev").html('Написать свой отзыв');
							$("#adrev").attr("href", "okonnaya-kompaniya.php?idorg="+id_org+"&#review");
							var obj = $.parseJSON(datarev);
							obj.forEach(function(item) {
								$("#revcont").append('<div class="headrev">');
									$("#revcont").append('<img class="imgrev" src="img/revicon.png">');
									$("#revcont").append('<div class="namerev">'+item.user+'</div>');
									$("#revcont").append('<div class="daterev">'+item.date+'</div>');
								$("#revcont").append('</div>');
								$("#revcont").append('<div class="reviewrev">'+item.review+'</div>');
								if(item.fromsite != '') $("#revcont").append('<a class="urlrev" href="'+item.url+'" target="blank" rel="nofollow">Читать полностью на '+item.fromsite+'</a>'); 
							});
						}
					}
				});
				
				
				// Если высота банереа с описание компании больше высоты экрана, приклеиваем попап баннер к верху страницы
				if(($(window).height()-100) < $("#popupOrg").height()){
					$('.popupOrg').css({"position":"absolute", "top":"0", "marginTop":"0"});
					$("#popupOrg").css('top',$(window).scrollTop());
				}
				else $('.popupOrg').css({"position":"fixed", "top":"50%", "marginTop":($("#popupOrg").height())/-2 + 'px'});
				
				// Показываем банер
				$("#popupOrg,.fon_blok").css("display", "block");
				
				
				/* Подгружаем Яндекс карту */
				ymaps.ready(function () {
					// Создание экземпляра карты
					var map = new ymaps.Map('map', {
						center: [0,0],
						zoom: 17
					});
					window.myMap = map;
					// Загрузка YMapsML-файла
					ymaps.geoXml.load('http://geocode-maps.yandex.ru/1.x/?geocode='+'Россия,'+obj.adds+'&results=1')
						 .then(function (res) {
							 res.geoObjects.each(function (item) {
								 var bounds = item.properties.get("boundedBy");
								 // Добавление геообъекта на карту
								 myMap.geoObjects.add(item);
								 // Изменение области показа карты
								 myMap.setBounds(bounds);
								 myMap.setType('yandex#map');
								 // если у организации нет адреса занчит на карте не нужет такой большой масштаб - делаем его меньше
								 myMap.setZoom(17, {duration: 0});
								 //myMap.behaviors.enable('scrollZoom'); // зум карты с помощью колёсика мыши
								 myMap.controls.add('smallZoomControl', { left: 20, top: 170 }) // маленькая (только плюс и минус) линейка изменения масштаба
								 // myMap.controls.add('zoomControl', { left: 10, top: 50 });  // показывает линейку изменения мосштаба
								 // myMap.controls.add('mapTools', { left: 10});     // страндартные кнопки рука, увеличить, измерение расстояния (линейка)
							
							});
						 },
						 function (error) {   // Вызывается в случае неудачной загрузки YMapsML-файла
							 alert("При загрузке YMapsML-файла произошла ошибка: " + error);
						 });
				});
				
			}
		});
}