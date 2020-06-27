		<nav id="nav">
			<div class="content_wrap">
				<div class="sandwich" onclick="f_open_dop_nav()">
					<div class="menu_line"></div>
					<div class="menu_line line_from_top"></div>
					<div class="menu_line line_from_top"></div>
				</div>
				<div class="for_org" id="for_org_smoll_screen">Вы представитель оконной компании?<a class="for_org roundBorder" href="../okonnym-kompaniyam.php">Вам сюда</a></div>
				<a id="logoInNav" href="../">НАDООКНА</a>
				<div id="cityNav" onclick="f_selectCity('change')"><?php if (isset($_SESSION['city'])) echo $_SESSION['city']; else echo 'Выберите Ваш город'; ?></div>
				<ul id="ulInNav">
					<li><a <?php if (substr_count($result, 'urok') > 0) echo 'style="background-color: #999;"'; ?> class="main_menu" href="../urok/elementy-plastikovyh-okon.php">Оконный учебник</a>
					<li><a <?php if (substr_count($result, 'tender-plastikovye-pvh-okna.php') > 0) echo 'style="background-color: #999;"'; ?> class="main_menu" href="../tender-plastikovye-pvh-okna.php">Разместить тендер</a>
					<li><a <?php if (substr_count($result, 'okonnye-kompanii.php') > 0) echo 'style="background-color: #999;"'; ?> class="main_menu" href="../okonnye-kompanii.php">Справочник компаний</a>
					<li><a <?php if (substr_count($result, 'akcii-i-skidki-na-plastikovye-okna.php') > 0) echo 'style="background-color: #999;"'; ?> class="main_menu" href="../akcii-i-skidki-na-plastikovye-okna.php">Акции и скидки</a>
				</ul>
			</div>
		</nav>
