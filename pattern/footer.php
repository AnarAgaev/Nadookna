<div class="footer">
	&copy; Надоокна 2014-2018&nbsp;
		<?php
			if (!isset($_SESSION['idorg'])) echo '<a class="input" href="http://nadookna.com/login.php">Вход для организаций</a>';
			else echo '<a class="input" href="../tenders.php">Перейти в личный кабинет</a>';
		?>
</div>