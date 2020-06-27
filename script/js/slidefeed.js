var showfeed = 1; // начначаем перменной КАКОЙ СЕЙЧАС ПОКАЗЫВАЕТСЯ ОТЗЫВ 1, т.к. при загрузке сразу показывается первый отзыв
stop_slide = setInterval(function() {
	if(showfeed == 1){
		$("#point1").removeClass().addClass("passivePoint");
		$("#point2").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/3.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Евгений</span><br>г. Краснодар');
		$("#feed_contetnt").html("Понравилось, что не нужно никуда звонить и  предложения компаний приходят прямо на сайте, нужно только выбрать. Очень удобно и достаточно быстро! Куил пластиковое окно со скидкой 20%. Знакомым советуем заказать пластиковые окна здесь. Дешевые пластиковые окна.");
	}
	else if(showfeed == 2){
		$("#point2").removeClass().addClass("passivePoint");
		$("#point3").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/2.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Светлана</span><br>г. Ярославль');
		$("#feed_contetnt").html('Очень быстро купили ПВХ окна благодаря вашему сайту. И даже поучили скидку на установку. Спасибо! Будем советовать знакомым покупать окна здесь. Нашла сайт благодаря зарпосу "Окна Ярославль цены". Пластиковые окна в Ярославле фирмы.');
	}
	else if(showfeed == 3){
		$("#point3").removeClass().addClass("passivePoint");
		$("#point4").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/4.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Максим</span><br>г. Екатеринбург');
		$("#feed_contetnt").html('Удобно создавать заявку. Помогают подсказки. На многих сайтах сложно понятно что нажимать и куда что писать, а у вас всё просто. Уже на следующий день стали приходить предложения. Удобный сервис.');
	}
	else if(showfeed == 4){
		$("#point4").removeClass().addClass("passivePoint");
		$("#point5").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/1.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Александра</span><br>г. Пермь');
		$("#feed_contetnt").html('Интересовала только цена, но когда попробовала сама позвонить в фирмы, которые делали предложения на сайте, менеджеры называли цену выше. Купила окна через сайт дешевле где-то на 15%. Спасибо, что помогли окна пластиковые заказать со скидкой.');
	}
	else if(showfeed == 5){
		$("#point5").removeClass().addClass("passivePoint");
		$("#point1").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/5.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Андрей</span><br>г. Ярославль');
		$("#feed_contetnt").html('Отличный урок про ПВХ окно, всё доступно и понятно. Сайт удобный, помог быстро преобрести стеклопаеты в Ярославле. Нашел по запросу "Пластиковые окна в Ярославле цены" или "Окна ПВХ в Ярославле", точно не помню.');
	}
	if (showfeed == 5) showfeed = 1;
	else showfeed++;
}, 7000);

function f_clickFeed(point){
	clearInterval(stop_slide);
	$("#point1,#point2,#point3,#point4,#point5").removeClass().addClass("passivePoint");
	if (point == 1){
		$("#point1").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/5.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Андрей</span><br>г. Ярославль');
		$("#feed_contetnt").html('Отличный урок про ПВХ окно, всё доступно и понятно. Сайт удобный, помог быстро преобрести стеклопаеты в Ярославле. Нашел по запросу "Пластиковые окна в Ярославле цены" или "Окна ПВХ в Ярославле", точно не помню.');
	}
	else if (point == 2){
		$("#point2").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/3.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Евгений</span><br>г. Краснодар');
		$("#feed_contetnt").html("Понравилось, что не нужно никуда звонить и  предложения компаний приходят прямо на сайте, нужно только выбрать. Очень удобно и достаточно быстро! Куил пластиковое окно со скидкой 20%. Знакомым советуем заказать пластиковые окна здесь. Дешевые пластиковые окна.");
	}
	else if (point == 3){
		$("#point3").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/2.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Светлана</span><br>г. Ярославль');
		$("#feed_contetnt").html('Очень быстро купили ПВХ окна благодаря вашему сайту. И даже поучили скидку на установку. Спасибо! Будем советовать знакомым покупать окна здесь. Нашла сайт благодаря зарпосу "Окна Ярославль цены". Пластиковые окна в Ярославле фирмы.');
	}
	else if (point == 4){
		$("#point4").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/4.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Максим</span><br>г. Екатеринбург');
		$("#feed_contetnt").html('Удобно создавать заявку. Помогают подсказки. На многих сайтах сложно понятно что нажимать и куда что писать, а у вас всё просто. Уже на следующий день стали приходить предложения. Удобный сервис.');
	}
	else if (point == 5){
		$("#point5").removeClass().addClass("activePoint");
		$("#pipl").attr("src","img/feed/1.png");
		$("#piplatribut").html('<span style="font-weight: bold;">Александра</span><br>г. Пермь');
		$("#feed_contetnt").html('Интересовала только цена, но когда попробовала сама позвонить в фирмы, которые делали предложения на сайте, менеджеры называли цену выше. Купила окна через сайт дешевле где-то на 15%. Спасибо, что помогли окна пластиковые заказать со скидкой.');
	}
}