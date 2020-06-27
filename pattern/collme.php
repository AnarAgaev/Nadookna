<? //Кнопака с телефонной трубкой ?>

<? // включается в основном скрипте в самом начале ?>
<div id="zcwMiniButton" style="display: none;" onclick="f_viewCollMe();"><div id="zcwMiniButtonMain"></div></div>


<? //Всплывающее окно с формой обртаного звонка ?>
<div class="colme" id="colme"><!--    форма для того чтобы заказать обратный звонок    -->
	<div class="top_forms">
		<img src="../img/smlfone.png" alt="Есть вопрос? Оставьте контакты, мы ответим.">
		<div class="close_popup" onclick="f_all_close()">×</div>
	</div>
	
	<div class="title_mail_back"><span class="btmb">Есть вопрос?</span><br>Оставьте контакты,<br>мы ответим.</div>
	<input type="hidden" id="cityAtForm" value="<?php if ($_SESSION['city'] == 'Выберите Ваш город') echo 'Город пользователя не определён.'; else echo $_SESSION['city']; ?>">
	<div class="err" id="err_name_colback">Как к Вам обратиться?</div>
	<input type="text" id="name" class="input200" placeholder="Ваше имя">
	<div class="err" id="err_contacts_colback" style="margin-top: 20px">Укажите Ваш емэйл</div>
	<input type="text" id="contacts" class="input200" style="margin-top: 30px" placeholder="Eмэйл">
	<div class="enter_input roundBorder" onclick="f_call_me()">Отправить</div>
</div>

<? //Всплывающее окно просьба перезвонить удачно отправлена ?>
<div class="popUpOk" id="colMeOk" style="margin-top: -128px;">
	<div class="close_popup" onclick="f_all_close()">×</div>
	<div class="tipPopUp"><img src="../img/send_ok.png" alt="Сообщение отправлено в службу поддержки"></div>
	<div class="textPopUp">
		Сообщение отправлено в службу<br>
		поддержки. Менеджер свяжется<br>
		с Вами в ближайшее время.
	</div>
</div>


<? //В этот всплывающий блок помещаем вопрос о том правильно ли определён город пользователя для маленьких экранов ?> 
<div class="regionQues" id="regionQuesAtBody">
	<div class="topTxtQues">
		Ваш город<br><span class="bigCity" id="bigCityAtBody"><?php echo $_SESSION['city'].'?'; ?></span>
	</div>
	<div class="regionQuesBody">
		<div class="btnQues btnY roundBorder" onclick="f_selectCity('yes')">Да</div>
		<div class="btnQues btnN roundBorder" onclick="f_selectCity('no')">Нет</div>
	</div>
</div>

<div class="regionQues" id="regionQuesAtBodyFalse">
	<div class="topTxtQues topTxtQues_dark">
		<div class="closeRegionQues">×</div>
		К сожалению, мы не смогли<br>определить Ваш город
	</div>
	<div class="regionQuesBody">
		<div class="btnQues btnDontCity roundBorder">Выбрать город</div>
	</div>
</div>

