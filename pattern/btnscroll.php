<!--   Кнопка "Наверх" прокурчивает страницу в начала и появляется когда пользователь скролит станицу    -->
<div class="scrollToTop">
	<div id="scroller" class="scroller" style="display: block;">
		<div class="trig_scrol"></div>
		Наверх
	</div>
</div> 
<script type="text/javascript">
	$(window).scroll(function () {
		if ($(this).scrollTop() > 95) $('.scrollToTop').fadeIn(200);
		else $('.scrollToTop').fadeOut(200);
	});
	
	$('.scrollToTop').click(function(){
		var curPos=$(document).scrollTop();
		var scrollTime=curPos/0; // поменяв делитель, например на 1.73, мы поменяем скорость скролинга в зависимости от обёма проскроленного контента
		$("body,html").animate({"scrollTop":0},scrollTime);
	})
</script>