	<div class="dop_nav">
		<img class="close_dop_nav" src="../img/close_dop_blok.png" onclick="f_all_close()" alt="Закрыть меню">
		<a id="logo_blok" href="../">НАDООКНА</a>
		<div class="left_blok">
			<a class="adaptiv_nav" href="../urok/elementy-plastikovyh-okon.php">Оконный учебник</a>
			<a class="adaptiv_nav" href="../tender-plastikovye-pvh-okna.php">Разместить тендер</a>
			<a class="adaptiv_nav" href="../okonnye-kompanii.php">Справочник компаний</a>
			<a class="adaptiv_nav" href="../akcii-i-skidki-na-plastikovye-okna.php">Акции и скидки</a>
			
			<a class="left_blok" href="../okonnye-sistemy/okonnye-sistemy.php">Оконные системы</a>
			<a class="left_blok" href="../blog/">Блог</a>
			<a class="left_blok" href="../okonnyj-slovar/okonnyj-slovar.php">Оконный словарь</a>
			<a class="left_blok" href="../kontakty.php">Контакты</a>
			<?php
				if (!isset($_SESSION['idorg'])) echo '<a class="left_blok" href="http://nadookna.com/login.php">Вход для организаций</a>';
				else echo '<a class="left_blok" href="../tenders.php">Перейти в личный кабинет</a>';
			?>			
			
		</div>
		<div class="seti">Следите за нами<br>в социальных сетях</div>
		<div class="seti_position">
			<a class="seti" href="http://vk.com/" target="blank"><img src="../img/vk.png" alt="Перейти на нашу страницу В Контакте"></a>
			<a class="seti" href="https://twitter.com/" target="blank"><img src="../img/tw.png" alt="Перейти на нашу страницу в твитере"></a>
			<a class="seti" href="https://www.facebook.com/" target="blank"><img src="../img/fb.png" alt="Перейти на нашу страницу на фэйсбук"></a>
		</div>	
	</div>