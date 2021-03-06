<?php 
	session_start();
	
	/**********************
	
	Подключаем файл в котором указываем домен под которым будем создавать куки, 
	что бы при переходе между поддоменами при выборе города куки сохранялись
	
	***********************/
	include_once("../pattern/iniset.php");
	

	/**********************
	
	Поключаем морфер для автоматического изменения города пользователя в нужный падеж
	В нутри морфера определяем город пользователя манипулируя поддоменом в url
	
	***********************/
	include_once("../pattern/morpher.php");
	
	/**********************************
	
		создаем переменные куки с метками, что ползователю показан popup баннер
		в дальнейшем при загрузки страницы будем проверять этот маркер
		и если он существует, показвать рекламу не надо, т.к. она уже была показана
		
		Дополнительно устанавливаем переменную в сессию на случай если куки отключены
	
	***********************************/
	
	// popup баннер лежит в pattern/popup.php
	if (!isset($_COOKIE['popupSetTender']) and !isset($_SESSION['popupSetTender'])){
		SetCookie("popupSetTender","true",time()+31536000,"/",".nadookna.com");	
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="Самый полный оконный словарь Пластиковых ПВХ окон <?php echo $_SESSION['morph']['gde']; ?>. Слова на букву 'С'">
    <meta name="keywords" content="стеклопакет, стекло, створочный профиль, створка, ставни, спейсер, сопротивление теплопередаче, солнцезащитные стекла, соединитель импоста, соединительный профиль, силовое эксплуатационное воздействие на монтажный шов, сдвиг по четверти, светопрозрачность, светопрозрачное заполнение, сварной шов, самовентиляция">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Оконный словарь - буква "С".</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="../style/content.css" />
	<link rel="stylesheet" type="text/css" href="../style/aboutbrend.css" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 	<?php if ($_SESSION['city'] == 'Ваш город' and !isset($_COOKIE['askCity'])) include_once("../pattern/editcity.php"); // поключаем определение города пользователя по ip если город пользователя не определён из url ?>

</head>
<body>
	<?php
		include_once("../pattern/btnscroll.php"); // поключаем кнопку скрола страницы наверх
		include_once("../pattern/videobox.php"); // поключаем блок в котором будем показывать всплывающее видео
		include_once("../pattern/popup.php"); // подключаем popup уведомления
		include_once("../pattern/collme.php"); // поключаем кнопку показать форму обратного звонка 
		include_once("../pattern/selectcity.php"); // подключаем форму выбора города
		include_once("../pattern/dopnav.php"); // подключаем выезжащдий слева блок с дополнительной навигацией
	?>

	<!-- полупрозрачный блок, расятнутый на всю область экрана - положка подс всплывающие формы и popup окна -->
	<div class="fon_blok"  onclick="f_all_close()"></div>


	<div id="wrapper">
		<?php 
			include_once("../pattern/header.php"); // подключаем шапку сайта
			include_once("../pattern/navigation.php"); // подключаем навигацию в шапке сайта
		?>
		
		<!-- Пустрой блок над контентом высотой с полоску главного меню, который делается видимым в момент прилипания главного меню, чтобы не прыгал контент -->
		<div id="vacuumBlock"></div>
		
		
		<!-- Хлебные крошки -->
		<div class="content_wrap">
			<div class="breadCrumbs">
				<div class="trigBredCrumbs"></div>
				<a class="breadCrumbs" href="../">Главная</a>/
				<a class="breadCrumbs" href="okonnyj-slovar.php">Оконный словарь</a>/
				Слова на букву "С"
			</div>
		</div>
		
		
		<!-- Шапка контента -->
		
		<div class="title_col">
			<div class="img_tit _dic"></div>
			<div>
				<h1 class="tit_text">Оконный словарь<br>Слова на букву "С"</h1>
				<p class="cont_tit_dictionary">
					Знание оконной терминологии поможет<br>Вам правильно выбрать и
					<a class="for_txt" href="../">купить пластиковые окна</a>.
				</p>							
			</div>
		</div>
	
		
		<!-- Анкоры на внутренние страницы с описанием марок терминов оконного словаря -->
		
		<div class="text_for_brands">
			<p class="hand_text_for_brends">
				<a class="bukva" href="okonnyj-slovar-bukva-a.php" >А</a>
				<a class="bukva" href="okonnyj-slovar-bukva-b.php" >Б</a>
				<a class="bukva" href="okonnyj-slovar-bukva-v.php" >В</a>
				<a class="bukva" href="okonnyj-slovar-bukva-g.php" >Г</a>
				<a class="bukva" href="okonnyj-slovar-bukva-d.php" >Д</a>
				<a class="bukva" href="okonnyj-slovar-bukva-j.php" >Ж</a>
				<a class="bukva" href="okonnyj-slovar-bukva-z.php" >З</a>
				<a class="bukva" href="okonnyj-slovar-bukva-i.php" >И</a>
				<a class="bukva" href="okonnyj-slovar-bukva-k.php" >К</a>
				<a class="bukva" href="okonnyj-slovar-bukva-l.php" >Л</a>
				<a class="bukva" href="okonnyj-slovar-bukva-m.php" >М</a>
				<a class="bukva" href="okonnyj-slovar-bukva-n.php" >Н</a>
				<a class="bukva" href="okonnyj-slovar-bukva-o.php" >О</a>
				<a class="bukva" href="okonnyj-slovar-bukva-p.php" >П</a>
				<a class="bukva" href="okonnyj-slovar-bukva-r.php" >Р</a>
				<a class="bukva" href="okonnyj-slovar-bukva-s.php" >С</a>
				<a class="bukva" href="okonnyj-slovar-bukva-u.php" >У</a>
				<a class="bukva" href="okonnyj-slovar-bukva-f.php" >Ф</a>
				<a class="bukva" href="okonnyj-slovar-bukva-sh.php" >Ш</a>
			</p>
		</div>
		
		
		<!-- Рекламный баннер на Урок о ПВХ окнах -->
		
		<div class="action_to_course">
			<div class="titel_act_to_cours">Ничего не понимаешь в<br>пластиковых окнах?</div>
			Пройди <span class="c_blue">БЕСПЛАТНЫЙ</span> урок.
			Узнайте как сэкономить до 10%.
			<a href="../urok/elementy-plastikovyh-okon.php" class="btnCrtTenderBig roundBorder">Как выбрать пластиковые окна</a>
		</div>
		
		
		
		
		<!-- Описание терминов пластиковых окон -->
		
		<div class="dictionary">
			<p>
				<h2 class="word_dict">Самовентиляция </h2>
				- это система, при котором процесс циркуляции воздуха через оконные конструкции обеспечивается 
				без применения дополнительный механизмов (нагнетающих либо вентилирующих). Для обеспечения 
				самовентиляции используют вентиляционные каналы оконного профиля или климатические клапаны 
				оконной конструкции или и то и другое вместе. Лимитированное проникновение воздуха с помощью 
				самовентиляции служит для того чтобы сбалансировать влажность внутри помещения и предотвратить 
				появление конденсата на <a class="for_txt" href="../">пластиковых окнах</a>.
			</p>
			<p>
				<h2 class="word_dict">Сварной шов </h2>
				- это стыки в углах оконного профиля. При соединении отдельных элементов оконной конструкции 
				используется технология термосварки, при которой свариваемые торцы отдельных элементов оконного 
				профиля сначала нагреваются, а потом плотно соединяются до полного остывания и затвердения пластика. 
				Далее с помощью специализированного инструмента методом абразива и шлифовки с места сварки удаляются 
				наплывы и остатки пластика.
			</p>
			<p>
				<h2 class="word_dict">Светопрозрачное заполнение </h2>
				- этот термин описывает процесс, при котором в оконную раму вставляется стеклопакет или прозрачное 
				листовое стекло, если мы говорим об окнах вообще.
			</p>
			<p>
				<h2 class="word_dict">Светопрозрачность </h2>
				- это свойство различных конструкций и их отдельных элементов пропускать свет. Не все ПВХ конструкции 
				относятся к категории светопрозрачных конструкции. Например, в офисных перегородка и дверях вместо 
				стеклопакетов могут быть вмонтированы листы непрозрачного пластика, что делает невозможным проникновение 
				через них света и возможности видимости сквозь них.
			</p>
			<p>
				<h2 class="word_dict">Сдвиг от (по) четверти </h2>
				- этот термин описывает технологию монтажа пластиковых окон, при которой окно монтируется в проёме 
				глубже в помещение, что обеспечивает его нахождение в более тёплой зоне и не допускает промерзания 
				окна и образование конденсата даже в самые сильные морозы.
			</p>
			<p>
				<h2 class="word_dict">Силовое эксплуатационное воздействие на монтажный шов </h2>
				- это воздействие, которое возникает в процессе эксплуатации оконной конструкции. 
				В связи с тем, что геометрия оконного проёма может изменяться под воздействием 
				колебаний температуры и влажности, а так же при усадке новых зданий, давление, 
				оказываемое на окно, в общем, и монтажный шов в частности, может увеличиваться. 
				Качественные окна ПВХ  и оконные конструкции в целом выдерживают значительные 
				силовые нагрузки, сохраняя при этом свои эксплуатационные характеристики.
			</p>
			<p>
				<h2 class="word_dict">Соединительный профиль </h2>
				- часто этот элемент оконной конструкции называют просто соединитель. Соединительный профиль 
				это разновидность ПВХ профиля <a class="for_txt" href="../">пластиковых окон</a>, 
				имеющая особую геометрию, отличающуюся от 
				профиля створок и рам. Основной причиной использования соединительного профиля служит 
				необходимость сращивания (соединения) между собой отдельных оконных или дверных коробок 
				для того чтобы закрыть большие площади либо при изготовлении зимних садов или других 
				объемных светопрозрачных конструкций.
			</p>
			<p>
				<h2 class="word_dict">Соединитель импоста </h2>
				- деталь обеспечивающая крепление импоста к коробке или створке пластикового окна.
			</p>
			<p>
				<h2 class="word_dict">Солнцезащитные стекла </h2>
				- это разновидность стёкол используемых в наиболее освещенных помещениях при необходимости 
				уменьшить проникновения световой и тепловой солнечной энергии внутрь (например, в высотных 
				зданиях с солнечной стороны на верхних этажах, где окна не прикрывают кроны деревьев, 
				солнце в жаркие летние дни способно значительно нагреть комнату). Светопреграждающие 
				способности солнцезащитным стёклам можно придать путём их окрашивания по всей поверхности 
				либо нанесение специализированных плёнок.
			</p>
			<p>
				<h2 class="word_dict">Сопротивление теплопередаче </h2>
				- это числовая характеристика пластиковых окон, характеризующая способность пластикового 
				окна к сохранению тепла или прохлады внутри помещения и чем выше этот показатель, 
				тем выше способность удерживать тепло или прохладу. Сопротивление теплопередаче 
				обратно теплопроводности.
			</p>
			<p>
				<h2 class="word_dict">Спейсер </h2>
				- это полая рамка небольших размеров, которая находится между стёклами внутри стеклопакета 
				по его периметру. За счёт толщины спейсера можно регулировать толщину стеклопакета и 
				ширину воздушной камеры. Спейсеры как правило наполняют специальным абсорбентом 
				(поглотителем влаги) для того чтобы уменьшить вероятность появления конденсата 
				внутри стеклопакета.
			</p>
			<p>
				<h2 class="word_dict">Ставни </h2>
				- этот термин обозначает две створки прикрывающие окна с наружной стороны, которые 
				крепятся на фасад здания. Использование ставень удовлетворяет различные задачи: 
				защита от солнечных лучей, защитная функция окон и всего помещения, ограждение 
				от посторонних взглядов.
			</p>
			<p>
				<h2 class="word_dict">Створка </h2>
				- это, как правило, светопрозрачный элемент оконной конструкции подвижно соединённый с рамой 
				(коробкой) при помощи элементов фурнитуры посредством шарнирной или скользящей связи. 
				Отдельно выделяют створку узкую, ширина которой, как правило, менее 450 мм и которая 
				используется для проветривания. Существуют различные виды открывания створок. 
				Подробно об этом написано в пункте "Варианты открывания створок" и в 
				пункте "Окна" выше в этом словаре. Типы открывания створок окна смотри разделе Окно, выше в словаре.
			</p>
			<p>
				<h2 class="word_dict">Створочный профиль </h2>
				- это разновидность оконного профиля, который используется при изготовлении 
				створок и обрамляет стеклопакет в створке по периметру.
			</p>
			<p>
				<h2 class="word_dict">Стекло </h2>
				- это одновременно и химическое вещество и элемент окон вообще и пластиковых окон в частности. 
				Стекло обладает очень важными качествами, определяющими его характеристики, в производстве ПВХ окон: 
				</br>- прозрачность - позволяет пропускать солнечный свет и дает возможность видеть находящиеся за ним объекты; 
				</br>- прочность - хотя стекло является довольно прочным элементом оконной конструкции само по себе, 
				его прочностные характеристики могут быть дополнительно увеличены за счёт армирования; 
				</br>- сопротивление теплопередаче - обеспечивает сохранность тепла в помещении. 
				</br></br>В контексте 
				<a class="for_txt" href="../">пластиковых окон</a> 
				важно рассмотреть различные типы стёкол:
				</br>- армированное стекло - это стекло с впаянной внутрь него металлической сеткой, 
				что обеспечивает во первых, как было сказано выше, увеличение его прочности, а во 
				вторых улучшение его пожаростойкости, т.к. при пожаре данное стекло более склонно 
				треснуть, нежели рассыпаться полностью;
				</br>- витринное стекло - это значительные по размерам, крупногабаритные стёкла 
				основным предназначение которых является остекление витрин различного рода;
				</br>- закалённое стекло - это стекло, которому с помощью термической либо 
				химической обработки придали дополнительную ударопрочность и стойкость к перепадам 
				температур. Ещё одной важной характеристикой закалённых стёкол является то, что 
				при ударе это стекло не колется на осколки, а распадается на множество мелких частиц, 
				относительно безопасных для человека. Это свойство закалённых стёкол обширно используется 
				при производстве автомобильных стёкол;
				</br>- зеркальное стекло - как понятно из названия это стекло обладает схожими с обыкновенным 
				зеркалом характеристиками. Зеркальное стекло отражает только с одной стороны, пропуская свет 
				и являясь видимым с другой. Зеркальность стёклам придают с помощью покрытия на основе металлов 
				либо используя плёнки различных цветовых гамм;
				</br>- матированное стекло (матовое стекло) - это стекло которому с помощью различных методик 
				уменьшили светопроницаемость и видимость. Стекла матируют с помощью обработки поверхности кислотой 
				либо механически - абразивом (пескоструйный процесс);
				</br>- молированное стекло - это вид стекла, который имеет гнутую поверхность, что позволяет 
				использовать его для придания дополнительной эстетики в фасадах зданий, а также внутри 
				интерьеров в душевых кабинах и мебели. Молированные стекла закаливают для придания им 
				дополнительной прочности;
				</br>- противопожарное стекло - это многослойное стекло (наподобие сэндвича). При его изготовлении 
				наружные стёкла - это листы силикатного стекла, промежутки между которыми заполнены прозрачным 
				огнестойким гелем, который при нагревании преобразуется в термостойкую плёнку и препятствует 
				разрушению стекла;
				</br>- селективное стекло - эти стёкла отличает улучшенная по сравнению с обычными стёклами 
				теплоизолирующая способность. Для достижения этих характеристик на стекло наносят особое 
				низкоэмиссионное покрытие;
				</br>- тонированное стекло - тонирование стёкол достигается с помощью наклеивание на одну из 
				их поверхностей специализированной тонирующей плёнки либо тонирование в массе, когда в процессе 
				производства стекла в его состав вводят определённые красители. Основной функцией тонированных 
				стёкол является ограничение видимости сквозь них с оной стороны. Так же тонированные стёкла 
				обеспечивают дополнительный барьер световой и тепловой энергии солнца;
				</br>- декоративные стёкла - это большой пласт стёкол, в процессе изготовления которых используется 
				множество способов изменения внешнего вида стекла. Основой задачей декоративных стёкол является 
				улучшение эстетических характеристик окон.
			</p>
			<p>
				<h2 class="word_dict">Стеклопакет </h2>
				- это прозрачная часть пластикового окна.
				Стеклопакет представляет собой несколько стёкол, склеенных по 
				периметру между собой через алюминиевую или пластиковую рамку 
				таким образом, что между стёклами образуется воздушная камера.
			</p>
		</div>
		
		
		<!-- Видео с YOUTUBE на страницах с контентом -->
		 
		<div class="video_at_txt">
			<h2 class="medium_blu">Видео: как делают пластиковые окна</h2>
			В данном видео, помимо подробного описания процесса сборки 
			пластикового окна, описаны основные элементы, технология 
			производства оконного профиля, стеклопакета, других деталей.<br><br>
			<img class="block_f_moove" src="../img/img_f_video/v2.jpg" alt="Видео как делаются пластиковые окна" title="Видео как делаются пластиковые окна" onclick="f_showvideo('//www.youtube.com/embed/VaXaKmgLhuo?rel=0&autoplay=1&showinfo=0')">
		</div>
			
		
		<?php 
			/******************       ФУТЕР         *******************/
			include_once("../pattern/footer.php");  
		?>
		
	</div>
	
	<script async src="../script/js/showvideo.js" type="text/javascript"></script><!-- подключаем скрипт который показывает видео на странице -->  
	<script async src="../script/js/script.js" type="text/javascript"></script><!-- основной скрип в котором лежат функции использоуемые на каждой странице -->  

	<?php
		// Подключаем счётчики метрик
		include_once("../pattern/yandex_metrika.php"); // Счетчик Yandex Metrika
		include_once("../pattern/analytics_tracking.php"); // Счетчик Google Analitics
	?>
</body>
</html>