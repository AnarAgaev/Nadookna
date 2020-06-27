<?php

    /************************
	
	В этом файле храним js функции
	определения города пользователя по ip
	
	Автоматическое определение ГОРОДА ПОЛЬЗОВАТЕЛЯ
	Координаты пользователя лежат в
	geolocation.country  - страна
	geolocation.region - облсть
	geolocation.city - город
	
	src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU"
	
	После действий пользователя страница перезагружается, 
	что бы показывать контент с учётом выобора города пользователем	
		
	****************************/
?>
		<!--script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script-->
		<script src="https://api-maps.yandex.ru/2.0/?apikey=4c74d479-972b-4c76-81e7-b1bc63268173&load=package.full&lang=ru_RU" type="text/javascript"></script>
		
		
		<script type="text/javascript">
			ymaps.ready(init);
			var usercity;
			function init() {
				
				usercity = ymaps.geolocation.city; // устанавливаем глобальную переменную, содержащую город пользователея
				
				if( usercity != undefined ) {
					
					/* Смотрим размер экрана.
					Для экранов шириной меньше 750px (плантшеты, мобильные устройства)
					показываем вопрос о городе в центре экрана
					
					!!!!! БЛОК В КОТОРОМ ВЫВОДИМ ВОПРОС ЛЕЖИТ КОРЕНЬ/PATTERN/COLLME.PHP */
					
					if(window.innerWidth <= 750) {
						$(".fon_blok,#regionQuesAtBody").css("display","block"); // показываем вопрос города в центре страницы
					}
					else {
						$('#regionQues').css('display','block');
					}
					
					$('.cityName,#cityNav').html(usercity); // устанавливаем город в блоках навигации
					$('#cityAtForm,#cityAtFormKont').val(usercity); // устанавливаем город в блоках навигации
					$('#bigCity,#bigCityAtBody').html(usercity + '?'); // устанавливаем город в всплывающий баннер "Правльно ли определён город"
				}
				else {
					usercity = 'Ваш город';
					
					if(window.innerWidth <= 750) {
						$(".fon_blok,#regionQuesAtBodyFalse").css("display","block"); 
					}
					else {
						$('#regionQuesFalse').css('display','block');
					}
				}
			}
		</script>