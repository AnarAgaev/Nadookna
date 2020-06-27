<!-- Всплывающая форма выбора города -->
<div class="selectcity" id="selectcity" data-edit-from="">
	<div class="top_selectcity">
		<img src="../img/map.png" alt="Выберите Ваш город">
		<div class="close_popup" onclick="f_all_close()">×</div>
	</div>
	
	<div class="title_selectcity"><span>Начните вводить Ваш город</span></div>
	<input type="text" id="nameForSelectCity" class="input230" placeholder="например Ярославль" oninput="askCity('<?php echo $_SERVER[REQUEST_URI]; ?>')">
	<!-- По умолчанию будум поткидывать самые многонаселённые города   -->
	<div class="citys">
		<a class="pointCitys" href="http://moskva.nadookna.com<?php echo $_SERVER[REQUEST_URI]; ?>"><b>Москва</b>, Москва</a>
		<a class="pointCitys" href="http://sankt-peterburg.nadookna.com<?php echo $_SERVER[REQUEST_URI]; ?>"><b>Санкт-Петербург</b>, Санкт-Петербург</a>
		<a class="pointCitys" href="http://novosibirsk.nadookna.com<?php echo $_SERVER[REQUEST_URI]; ?>"><b>Новосибирск</b>, Новосибирская область</a>
		<a class="pointCitys" href="http://ekaterinburg.nadookna.com<?php echo $_SERVER[REQUEST_URI]; ?>"><b>Екатеринбург</b>, Свердловская область</a>
		<a class="pointCitys" href="http://nizhnij-novgorod.nadookna.com<?php echo $_SERVER[REQUEST_URI]; ?>"><b>Нижний Новгород</b>, Нижегородская область</a>
	</div>
</div>