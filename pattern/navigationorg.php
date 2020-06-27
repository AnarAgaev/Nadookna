		<div class="nav">
			<div class="content_wrap">
				<div class="sandwichOrg" onclick="f_open_dop_nav()">
					<div class="menu_lineOrg"></div>
					<div class="menu_lineOrg line_from_topOrg"></div>
					<div class="menu_lineOrg line_from_topOrg"></div>
				</div>
				<a id="logo" href="/tenders.php">НАDООКНА</a>
				<ul id="navorg">
					<li style="margin-left: 20px;"><a <?php if (substr_count($result, 'tenders.php') > 0) echo 'style="border-bottom: 4px solid #4285f4;"'; ?> class="main_menu" href="tenders.php">Тендеры</a>
					<li><a <?php if (substr_count($result, 'promotions.php') > 0 or substr_count($result, 'editaction.php') > 0 or substr_count($result, 'addaction.php') > 0) echo 'style="border-bottom: 4px solid #4285f4;"'; ?> class="main_menu" href="promotions.php">Акции и Скидки</a>
					<li><a <?php if (substr_count($result, 'data.php') > 0 or substr_count($result, 'editdata.php') > 0) echo 'style="border-bottom: 4px solid #4285f4;"'; ?> class="main_menu" href="data.php">Данные компании</a>
					<li><a <?php if (substr_count($result, 'support.php') > 0) echo 'style="border-bottom: 4px solid #4285f4;"'; ?> class="main_menu" href="support.php">Служба поддержки</a></li>
				</ul>
				<a class="logout roundBorder" href="../">ВЫХОД</a>
			</div>
		</div>
		
			<?php
				// Если организация не залогинена вместо Выход показываем кнопку Вход
				if (!isset($_SESSION['idorg'])){
					?>
						<script async type="text/javascript">
							$(document).ready(function () {
								$(".logout_dopnavOrg,.logout").html("Вход")
								$(".logout_dopnavOrg,.logout").attr("href", "login.php");
							});	
						</script>	
					<?php	
				}
			?>

		
		
		
