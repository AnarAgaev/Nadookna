		<header>
			<div class="content_wrap">
				<a id="logo" href="../">НАDООКНА</a>
				<div id="cityHead">
					<?php
						if (!isset($_COOKIE['askCity'])) {
							?>
								<div class="regionQues" id="regionQuesFalse">
									<div class="trigTop"></div>
									<div class="topTxtQues topTxtQues_dark">
										<div class="closeRegionQues">×</div>
										К сожалению, мы не смогли<br>определить Ваш город
									</div>
									<div class="regionQuesBody">
										<div class="btnQues btnDontCity roundBorder">Выбрать город</div>
									</div>
								</div>
								
								<div class="regionQues" id="regionQues">
									<div class="trigTop"></div>
									<div class="topTxtQues">
										Ваш город<br><span class="bigCity" id="bigCity"><?php echo $_SESSION['city'].'?'; ?></span>
									</div>
									<div class="regionQuesBody">
										<div class="btnQues btnY roundBorder" onclick="f_selectCity('yes')">Да</div>
										<div class="btnQues btnN roundBorder" onclick="f_selectCity('no')">Нет</div>
									</div>
								</div>
								
								<?
									/* Устанвалием куки о том что пользователю показан вопрос о его городе.
									Через параметк-маску domain=.nadookna.com делаем этот куки доступным как
									на основном домене так и на поддоменах, благодаря этому при переходе с домена
									на домен вопрос о городе будет задан только один раз */
								 
								 ?>
								<script type="text/javascript">
									document.cookie = "askCity=true; domain=.nadookna.com; path=/";
								</script>
							<?php
						}
					
						if ($_SESSION['city'] <> 'Ваш город') echo '<div class="cityName" onclick="f_selectCity(\'change\')">'.$_SESSION['city'].'</div>'; else echo '<div class="cityName" onclick="f_selectCity(\'change\')">Выберите Ваш город</div>'; 
					?>
					<div id="triangleDownHead"></div>
					
				</div>
				<?php 
					if (substr_count($result, 'okonnym-kompaniyam.php') > 0) echo '<div id="for_org">Вы хотите купить пластиковые окна?<a class="for_org roundBorder" href=".">Вам сюда</a></div>';
					else echo '<div id="for_org">Вы представитель оконной компании?<a class="for_org roundBorder" href="../okonnym-kompaniyam.php">Вам сюда</a></div>';
				?>
				
			</div>
		</header>