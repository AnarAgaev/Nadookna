<?

	/*************

		Данная страница производит манипуляциии в Яндекс вэбмастер через API Янекса
		Реализовано: 
			массовое получения списка всех сайтов пользователя;
			массовое добавление новых сайтов в аккаунт пользователя в соответствии с бочим массивом (массив городов);
			массовое подтверждение прав на добавленные сайты;
			массовое добавление файлов sitemap.xml

	*************/


$client_id = "9cfeaa25e48640eeb459c3101a1b3f1f";
$client_secret = "35f5009afe10453f81093afcc80eb171";


// Если мы еще не получили разрешения от пользователя, отправляем его на страницу для его получения
// В урл мы также можем вставить переменную state, которую можем использовать для собственных нужд, я не стал
if (!isset($_GET["code"])) {
	Header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=".$client_id);
	die();
}

// Если пользователь нажимает "Разрешить" на странице подтверждения, он приходит обратно к нам
// $_Get["code"] будет содержать код для получения токена. Код действителен в течении часа.
// Теперь у нас есть разрешение и его код, можем отправлять запрос на токен.

$result=postKeys("https://oauth.yandex.ru/token",
	array(
		'grant_type'=> 'authorization_code', // тип авторизации
		'code'=> $_GET["code"], // наш полученный код
		'client_id'=>$client_id,
		'client_secret'=>$client_secret
		),
	array('Content-type: application/x-www-form-urlencoded')
	);

// отправляем запрос курлом

function postKeys($url,$peremen,$headers) {
	$post_arr=array();
	foreach ($peremen as $key=>$value) {
		$post_arr[]=$key."=".$value;
		}
	$data=implode('&',$post_arr);
	
	$handle=curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
	$response=curl_exec($handle);
	$code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
	return array("code"=>$code,"response"=>$response);
	}

// после получения ответа, проверяем на код 200, и если все хорошо, то у нас есть токен

if ($result["code"]==200) {
	$result["response"]=json_decode($result["response"],true);
	$token=$result["response"]["access_token"];
	echo $token;   // !!!!!!!!!!!!!!!!!  выводим на экран token
	}else{
	echo "Какая-то фигня! Код: ".$result["code"];
	}

// Токен можно кинуть в базу, связав с пользователем, например, а за пару дней до конца токена напомнить, чтобы обновил



// функция, для курления

function get_stat($url,$headers) {
	$handle=curl_init();
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$response=curl_exec($handle);
	$code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
	return array("code"=>$code,"response"=>$response);
	}
	
	
	
	
	

// при получении результатов, вы можете отслеживать код ответа по $result["code"]

// первый запрос - получение id пользователя по Яндексу.
// В ответ нам придет ссылка типа https://webmaster.yandex.ru/api/123456789, 123456789 - id пользователя
// Можете сохранить себе как сразу ссылку, так и id юзера отдельно


 
$result=get_stat('https://api.webmaster.yandex.net/v3/user/',array('Authorization: OAuth '.$token));

$user_id=str_replace('https://api.webmaster.yandex.net/v3/user/','',$result["response"]);
$obj = json_decode($user_id);
$user_id = $obj->{'user_id'};

echo '<br>';
echo $user_id;   // !!!!!!!!!!!!!!!!!!!!!!! выводим ид пользователя
echo '<br><br>';








/*

// Информация обо всех сайтах пользователя
echo 'Все сайты пользователя в Вэбмастере<br><br><br>';
 
$result=get_stat('https://api.webmaster.yandex.net/v3/user/'.$user_id.'/hosts',array('Authorization: OAuth '.$token));
print_r($result['response']);

*/



// Массив добавляемых в Вэбмастер сайтов  
// !!! МАССИВ НЕ ПОЛНЫЙ (т.к. часть гордов уже есть в вэбмастере) 
// ЛУЧШЕ ЗАНОВО ВЫБРАТЬ ГОРОДА ИЗ БД

$urlarr = array(
	'0'=>'balahna',
	'1'=>'livny',
	'2'=>'doneck',
	'3'=>'severomorsk',
	'4'=>'sayanogorsk',
	'5'=>'kimry',
	'6'=>'megion',
	'7'=>'kizlyar',
	'8'=>'urus-martan',
	'9'=>'snezhinsk',
	'10'=>'kingisepp',
	'11'=>'zarinsk',
	'12'=>'kurganinsk',
	'13'=>'shelehov',
	'14'=>'mozhga',
	'15'=>'sertolovo',
	'16'=>'yarcevo',
	'17'=>'shali',
	'18'=>'otradnyj',
	'19'=>'torzhok',
	'20'=>'ruzaevka',
	'21'=>'volhov',
	'23'=>'kujbyshev',
	'24'=>'dzerzhinskij',
	'25'=>'gryazi',
	'26'=>'chusovoj',
	'27'=>'nadym',
	'28'=>'verhnyaya-salda',
	'29'=>'safonovo',
	'30'=>'osinniki',
	'31'=>'kolchugino',
	'32'=>'gudermes',
	'33'=>'kanash',
	'34'=>'rasskazovo',
	'35'=>'satka',
	'36'=>'monchegorsk',
	'37'=>'ust-kut',
	'38'=>'tulun',
	'39'=>'krasnoe-selo',
	'40'=>'shebekino',
	'41'=>'spassk-dalnij',
	'42'=>'kamen-na-obi',
	'43'=>'belaya-kalitva',
	'44'=>'pechora',
	'45'=>'chebarkul',
	'46'=>'raduzhnyj',
	'47'=>'ust-labinsk',
	'48'=>'mcensk',
	'49'=>'myski',
	'50'=>'lomonosov',
	'51'=>'kronshtadt',
	'52'=>'amursk',
	'53'=>'kurchatov',
	'54'=>'kachkanar',
	'55'=>'salehard',
	'56'=>'efremov',
	'57'=>'strezhevoj',
	'58'=>'aksaj',
	'59'=>'pereslavl-zalesskij',
	'60'=>'ahtubinsk',
	'61'=>'kashira',
	'62'=>'zainsk',
	'63'=>'sovetsk',
	'64'=>'pugachyov',
	'65'=>'langepas',
	'66'=>'birsk',
	'67'=>'uryupinsk',
	'68'=>'morshansk',
	'69'=>'pyt-yah',
	'70'=>'konakovo',
	'71'=>'rtishchevo',
	'72'=>'vyazniki',
	'73'=>'korenovsk',
	'74'=>'usinsk',
	'75'=>'tutaev',
	'76'=>'krasnyj-sulin',
	'77'=>'sayansk',
	'78'=>'bolshoj-kamen',
	'79'=>'novodvinsk',
	'80'=>'novozybkov',
	'81'=>'lyudinovo',
	'82'=>'izobilnyj',
	'83'=>'mariinsk',
	'84'=>'chernyahovsk',
	'85'=>'zavolzhe',
	'86'=>'apsheronsk',
	'88'=>'koryazhma',
	'89'=>'kamenka',
	'90'=>'elizovo',
	'91'=>'frolovo',
	'92'=>'uraj',
	'93'=>'tosno',
	'94'=>'alekseevka',
	'95'=>'korkino',
	'96'=>'kyshtym',
	'97'=>'lyantor',
	'98'=>'mozdok',
	'99'=>'rezh',
	'100'=>'partizansk',
	'101'=>'sharypovo',
	'102'=>'svetlograd',
	'103'=>'sokol',
	'104'=>'irbit',
	'105'=>'gaj',
	'106'=>'alatyr',
	'107'=>'alapaevsk',
	'108'=>'temryuk',
	'109'=>'yuzhnouralsk',
	'110'=>'uchaly',
	'111'=>'vichuga',
	'112'=>'dalnegorsk',
	'113'=>'protvino',
	'114'=>'mirnyj',
	'115'=>'nizhneudinsk',
	'116'=>'lesozavodsk',
	'117'=>'baksan',
	'118'=>'beslan',
	'119'=>'sestroreck',
	'120'=>'yalutorovsk',
	'121'=>'millerovo',
	'122'=>'luga',
	'123'=>'kizilyurt',
	'124'=>'furmanov',
	'125'=>'krasnoznamensk',
	'126'=>'zelenokumsk',
	'127'=>'kulebaki',
	'128'=>'dobryanka',
	'129'=>'kandalaksha',
	'130'=>'tynda',
	'131'=>'tajshet',
	'132'=>'tavda',
	'133'=>'serdobsk',
	'134'=>'valujki',
	'135'=>'gulkevichi',
	'136'=>'vyatskie-polyany',
	'137'=>'istra',
	'138'=>'tejkovo',
	'139'=>'abinsk',
	'140'=>'aznakaevo',
	'141'=>'novokubansk',
	'142'=>'suhoj-log',
	'143'=>'uglich',
	'144'=>'kinel',
	'146'=>'yugorsk',
	'147'=>'slobodskoj',
	'148'=>'ostrogozhsk',
	'149'=>'tryohgornyj',
	'150'=>'slancy',
	'151'=>'korsakov',
	'152'=>'kasimov',
	'153'=>'shumerlya',
	'154'=>'muravlenko',
	'155'=>'chernushka',
	'156'=>'yubilejnyj',
	'157'=>'sosnovoborsk',
	'158'=>'kushva',
	'159'=>'kondopoga',
	'160'=>'artyomovskij',
	'161'=>'shatura',
	'162'=>'shcherbinka',
	'163'=>'blagodarnyj',
	'164'=>'baltijsk',
	'165'=>'novovoronezh',
	'166'=>'nurlat',
	'167'=>'zima',
	'168'=>'slavgorod',
	'169'=>'kotelniki',
	'170'=>'primorsko-ahtarsk',
	'171'=>'staraya-russa',
	'172'=>'inta',
	'173'=>'asha',
	'174'=>'bogorodick',
	'176'=>'kotovsk',
	'177'=>'rostov',
	'178'=>'bogdanovich',
	'179'=>'gagarin',
	'180'=>'nartkala',
	'181'=>'velikij-ustyug',
	'182'=>'marks',
	'183'=>'mozhajsk',
	'184'=>'borzya',
	'185'=>'likino-dulyovo',
	'186'=>'dyurtyuli',
	'187'=>'petrovsk',
	'188'=>'karabulak',
	'189'=>'malgobek',
	'190'=>'udomlya',
	'191'=>'holmsk',
	'192'=>'kudymkar',
	'193'=>'gorodec',
	'194'=>'dagestanskie-ogni',
	'195'=>'ust-dzheguta',
	'196'=>'verhnij-ufalej',
	'197'=>'maloyaroslavec',
	'198'=>'skopin',
	'199'=>'mirnyj',
	'200'=>'barabinsk',
	'201'=>'emanzhelinsk',
	'202'=>'sorochinsk',
	'203'=>'goryachij-klyuch',
	'204'=>'kirzhach',
	'205'=>'luhovicy',
	'206'=>'desnogorsk',
	'207'=>'segezha',
	'208'=>'argun',
	'209'=>'alejsk',
	'210'=>'dyatkovo',
	'211'=>'kohma',
	'212'=>'znamensk',
	'213'=>'dedovsk',
	'214'=>'severouralsk',
	'215'=>'kartaly',
	'216'=>'karpinsk',
	'217'=>'karasuk',
	'218'=>'kirovsk',
	'219'=>'topki',
	'220'=>'kimovsk',
	'221'=>'kostomuksha',
	'222'=>'divnogorsk',
	'223'=>'gusev',
	'224'=>'pohvistnevo',
	'225'=>'sasovo',
	'226'=>'sosnogorsk',
	'227'=>'sovetskaya-gavan',
	'228'=>'neftekumsk',
	'229'=>'morozovsk',
	'230'=>'polysaevo',
	'231'=>'dalnerechensk',
	'232'=>'gubaha',
	'233'=>'mednogorsk',
	'234'=>'oktyabrsk',
	'235'=>'buturlinovka',
	'236'=>'yanaul',
	'237'=>'labytnangi',
	'238'=>'kalach-na-donu',
	'239'=>'kamyshlov',
	'240'=>'zernograd',
	'241'=>'uvarovo',
	'243'=>'novoaleksandrovsk',
	'244'=>'majskij',
	'245'=>'tara',
	'246'=>'novopavlovsk',
	'247'=>'sovetskij',
	'248'=>'balabanovo',
	'249'=>'rodniki',
	'250'=>'sol-ileck',
	'251'=>'krasnoarmejsk',
	'252'=>'unecha',
	'253'=>'kuvandyk',
	'254'=>'ob',
	'255'=>'zheleznogorsk-ilimskij',
	'256'=>'tatarsk',
	'257'=>'ipatovo',
	'258'=>'semiluki',
	'259'=>'isilkul',
	'260'=>'ozyory',
	'261'=>'buj',
	'262'=>'zavodoukovsk',
	'263'=>'kirovsk',
	'264'=>'atkarsk',
	'265'=>'asino',
	'266'=>'kireevsk',
	'267'=>'bogorodsk',
	'268'=>'tajga',
	'269'=>'nevyansk',
	'270'=>'pavlovsk',
	'271'=>'zeya',
	'272'=>'kotelnich',
	'273'=>'krasnouralsk',
	'274'=>'lensk',
	'275'=>'severobajkalsk',
	'276'=>'gurevsk',
	'277'=>'zarajsk',
	'278'=>'gusinoozyorsk',
	'279'=>'bezheck',
	'280'=>'zheleznovodsk',
	'281'=>'semyonov',
	'282'=>'krasnoarmejsk',
	'283'=>'kolpashevo',
	'284'=>'kotovo',
	'285'=>'davlekanovo',
	'286'=>'kalachinsk',
	'287'=>'stroitel',
	'288'=>'velsk',
	'289'=>'semikarakorsk',
	'290'=>'otradnoe',
	'291'=>'karachaevsk',
	'292'=>'fokino',
	'293'=>'sharya',
	'294'=>'omutninsk',
	'295'=>'ust-katav',
	'296'=>'bologoe',
	'297'=>'volokolamsk',
	'298'=>'gubkinskij',
	'299'=>'tashtagol',
	'300'=>'olenegorsk',
	'301'=>'oha',
	'302'=>'kubinka',
	'303'=>'vilyuchinsk',
	'304'=>'nelidovo',
	'305'=>'nerehta',
	'306'=>'nikolaevsk-na-amure',
	'307'=>'vereshchagino',
	'308'=>'nizhnij-lomov',
	'309'=>'losino-petrovskij',
	'310'=>'lermontov',
	'311'=>'vihorevka',
	'312'=>'nikolsk',
	'313'=>'osa',
	'314'=>'zverevo',
	'315'=>'nyandoma',
	'316'=>'dudinka',
	'317'=>'elektrogorsk',
	'318'=>'bavly',
	'319'=>'mendeleevsk',
	'320'=>'kirovgrad',
	'321'=>'kaltan',
	'322'=>'lyskovo',
	'323'=>'staraya-kupavna',
	'324'=>'kurovskoe',
	'325'=>'ryazhsk',
	'326'=>'ostrov',
	'327'=>'hotkovo',
	'328'=>'nizhnyaya-tura',
	'329'=>'hadyzhensk',
	'330'=>'pikalyovo',
	'331'=>'toguchin',
	'332'=>'lgov',
	'333'=>'ershov',
	'334'=>'sergach',
	'335'=>'svetlyj',
	'336'=>'onega',
	'337'=>'shahunya',
	'338'=>'kovylkino',
	'339'=>'naryan-mar',
	'340'=>'aldan',
	'341'=>'roshal',
	'342'=>'kozmodemyansk',
	'343'=>'bronnicy',
	'344'=>'dankov',
	'345'=>'lodejnoe-pole',
	'346'=>'bogotol',
	'347'=>'tyrnyauz',
	'348'=>'lebedyan',
	'349'=>'chernogolovka',
	'350'=>'bakal',
	'351'=>'alagir',
	'352'=>'abdulino',
	'353'=>'sysert',
	'354'=>'surovikino',
	'355'=>'rajchihinsk',
	'356'=>'kotelnikovo',
	'357'=>'tarko-sale',
	'358'=>'sredneuralsk',
	'359'=>'buinsk',
	'360'=>'beloyarskij',
	'361'=>'kizel',
	'362'=>'proletarsk',
	'363'=>'kommunar',
	'364'=>'pushchino',
	'365'=>'elektrougli',
	'366'=>'kalach',
	'367'=>'kyahta',
	'368'=>'shimanovsk',
	'369'=>'bobrov',
	'370'=>'karachev',
	'371'=>'yurev-polskij',
	'372'=>'novyj-oskol',
	'373'=>'sobinka',
	'374'=>'cherepanovo',
	'375'=>'nikolskoe',
	'376'=>'novomichurinsk',
	'377'=>'agryz',
	'378'=>'sortavala',
	'379'=>'terek',
	'380'=>'nytva',
	'381'=>'starodub',
	'382'=>'suvorov',
	'383'=>'priozersk',
	'384'=>'kovdor',
	'385'=>'kusa',
	'386'=>'ardon',
	'387'=>'enisejsk',
	'388'=>'usman',
	'389'=>'neftegorsk',
	'390'=>'podporozhe',
	'391'=>'yarovoe',
	'392'=>'petrovsk-zabajkalskij',
	'393'=>'inza',
	'394'=>'slyudyanka',
	'395'=>'aprelevka',
	'396'=>'rybnoe',
	'397'=>'talica',
	'398'=>'zhukovka',
	'399'=>'raduzhnyj',
	'400'=>'harabali',
	'401'=>'kozelsk',
	'402'=>'arsk',
	'403'=>'ostashkov',
	'404'=>'turinsk',
	'405'=>'chegem',
	'406'=>'nizhnyaya-salda',
	'407'=>'pochep',
	'408'=>'selco',
	'409'=>'konstantinovsk',
	'410'=>'novoanninskij',
	'411'=>'shumiha',
	'412'=>'gavrilov-yam',
	'413'=>'ivdel',
	'414'=>'pokrov',
	'415'=>'bajmak',
	'416'=>'povorino',
	'417'=>'katav-ivanovsk',
	'418'=>'manturovo',
	'419'=>'golicyno',
	'420'=>'borodino',
	'421'=>'moskovskij',
	'422'=>'mezhgore',
	'423'=>'galich',
	'424'=>'plast',
	'425'=>'polyarnyj',
	'426'=>'yaransk',
	'427'=>'kirsanov',
	'428'=>'bikin',
	'429'=>'barysh',
	'430'=>'krasnovishersk',
	'431'=>'abaza',
	'432'=>'volgorechensk',
	'433'=>'kurtamysh',
	'434'=>'pokachi',
	'435'=>'shchigry',
	'436'=>'novouzensk',
	'437'=>'kasli',
	'438'=>'bolotnoe',
	'439'=>'zhirnovsk',
	'440'=>'yasnogorsk',
	'441'=>'privolzhsk',
	'442'=>'kondrovo',
	'443'=>'boksitogorsk',
	'444'=>'sovetsk',
	'445'=>'menzelinsk',
	'446'=>'poronajsk',
	'447'=>'kalininsk',
	'448'=>'navashino',
	'449'=>'zvenigorod',
	'450'=>'agidel',
	'451'=>'nevel',
	'452'=>'suhinichi',
	'453'=>'kamyzyak',
	'454'=>'plavsk',
	'455'=>'kashin',
	'456'=>'chudovo',
	'457'=>'ilanskij',
	'458'=>'valdaj',
	'459'=>'yasnyj',
	'460'=>'uzhur',
	'461'=>'pavlovsk',
	'462'=>'novoulyanovsk',
	'463'=>'krasnoslobodsk',
	'464'=>'pallasovka',
	'465'=>'svetogorsk',
	'466'=>'pestovo',
	'467'=>'danilov',
	'468'=>'zapolyarnyj',
	'469'=>'lakinsk',
	'470'=>'rylsk',
	'471'=>'medvezhegorsk',
	'472'=>'gryazovec',
	'473'=>'leninsk',
	'474'=>'degtyarsk',
	'475'=>'kupino',
	'476'=>'bodajbo',
	'477'=>'venyov',
	'478'=>'zherdevka',
	'479'=>'melenki',
	'480'=>'petushki',
	'481'=>'polyarnye-zori',
	'482'=>'nikolaevsk',
	'483'=>'cimlyansk',
	'484'=>'aleksandrovsk',
	'485'=>'trubchevsk',
	'486'=>'ochyor',
	'487'=>'nerchinsk',
	'488'=>'lukoyanov',
	'489'=>'karabanovo',
	'490'=>'kodinsk',
	'491'=>'belokuriha',
	'492'=>'emva',
	'493'=>'pervomajsk',
	'494'=>'vyazemskij',
	'495'=>'sim',
	'496'=>'mamadysh',
	'497'=>'krasnyj-kut',
	'498'=>'strunino',
	'499'=>'dubovka',
	'500'=>'lagan',
	'501'=>'aramil',
	'502'=>'yuzha',
	'503'=>'peresvet',
	'504'=>'katajsk',
	'505'=>'gorohovec',
	'506'=>'shilka',
	'507'=>'gornyak',
	'508'=>'belyov',
	'509'=>'dalmatovo',
	'510'=>'gvardejsk',
	'511'=>'fokino',
	'512'=>'kalyazin',
	'513'=>'taldom',
	'514'=>'syasstroj',
	'515'=>'svirsk',
	'516'=>'bajkalsk',
	'517'=>'oboyan',
	'518'=>'ruza',
	'519'=>'civilsk',
	'520'=>'ak-dovurak',
	'521'=>'krasnozavodsk',
	'522'=>'shlisselburg',
	'523'=>'petrov-val',
	'524'=>'yahroma',
	'525'=>'mogocha',
	'526'=>'hvalynsk',
	'527'=>'karabash',
	'528'=>'kameshkovo',
	'529'=>'kem',
	'530'=>'anadyr',
	'531'=>'toropec',
	'532'=>'zelenogradsk',
	'534'=>'arkadak',
	'535'=>'snezhnogorsk',
	'536'=>'uyar',
	'537'=>'korablino',
	'538'=>'chaplygin',
	'539'=>'kirensk',
	'540'=>'udachnyj',
	'541'=>'yuryuzan',
	'542'=>'balej',
	'543'=>'okulovka',
	'544'=>'malaya-vishera',
	'545'=>'nyazepetrovsk',
	'546'=>'gurevsk',
	'547'=>'novaya-lyalya',
	'548'=>'sosenskij',
	'549'=>'chkalovsk',
	'550'=>'vuktyl',
	'551'=>'gornozavodsk',
	'552'=>'uren',
	'553'=>'pechory',
	'554'=>'borovsk',
	'555'=>'lihoslavl',
	'556'=>'adygejsk',
	'557'=>'dolinsk',
	'558'=>'volosovo',
	'559'=>'zhukov',
	'560'=>'sorsk',
	'561'=>'nazyvaevsk',
	'562'=>'babaevo',
	'563'=>'tyukalinsk',
	'564'=>'zavolzhsk',
	'565'=>'chulym',
	'566'=>'sosnovka',
	'567'=>'zvenigovo',
	'568'=>'uglegorsk',
	'569'=>'sudogda',
	'570'=>'verhnij-tagil',
	'571'=>'drezna',
	'572'=>'boguchar',
	'573'=>'neman',
	'574'=>'mihajlov',
	'575'=>'nevelsk',
	'576'=>'surazh',
	'577'=>'vorsma',
	'578'=>'kremyonki',
	'579'=>'opochka',
	'580'=>'tetyushi',
	'581'=>'zakamensk',
	'582'=>'hilok',
	'583'=>'pitkyaranta',
	'584'=>'zavitinsk',
	'585'=>'bolhov',
	'586'=>'ertil',
	'587'=>'narimanov',
	'588'=>'petuhovo',
	'589'=>'luza',
	'590'=>'belaya-holunica',
	'591'=>'belomorsk',
	'592'=>'nizhnie-sergi',
	'593'=>'zaozyorsk',
	'594'=>'zuevka',
	'595'=>'gadzhievo',
	'596'=>'kambarka',
	'597'=>'pionerskij',
	'598'=>'gremyachinsk',
	'599'=>'shchuche',
	'600'=>'shagonar',
	'601'=>'zmeinogorsk',
	'602'=>'digora',
	'603'=>'svetlogorsk',
	'604'=>'mikun',
	'605'=>'dorogobuzh',
	'606'=>'zaozyornyj',
	'607'=>'vysokovsk',
	'608'=>'kargat',
	'609'=>'aleksandrovsk-sahalinskij',
	'610'=>'porhov',
	'611'=>'suzdal',
	'612'=>'vytegra',
	'613'=>'kola',
	'614'=>'ozherele',
	'615'=>'kirs',
	'616'=>'ermolino',
	'617'=>'kozlovka',
	'618'=>'solcy',
	'619'=>'vilyujsk',
	'620'=>'urzhum',
	'621'=>'navoloki',
	'622'=>'yurevec',
	'623'=>'minyar',
	'624'=>'mariinskij-posad',
	'625'=>'nyurba',
	'626'=>'krasnoslobodsk',
	'627'=>'kargopol',
	'628'=>'elnya',
	'629'=>'harovsk',
	'630'=>'yuzhno-suhokumsk',
	'631'=>'rudnya',
	'632'=>'volchansk',
	'633'=>'kuvshinovo',
	'634'=>'volodarsk',
	'635'=>'neya',
	'636'=>'ivangorod',
	'637'=>'totma',
	'638'=>'suoyarvi',
	'639'=>'pudozh',
	'640'=>'zadonsk',
	'641'=>'tarusa',
	'642'=>'bolohovo',
	'643'=>'belozersk',
	'644'=>'yadrin',
	'645'=>'gorodovikovsk',
	'646'=>'skovorodino',
	'647'=>'nolinsk',
	'648'=>'pokrovsk',
	'649'=>'olyokminsk',
	'650'=>'ustyuzhna',
	'651'=>'verhnyaya-tura',
	'652'=>'verhneuralsk',
	'653'=>'ardatov',
	'654'=>'obluche',
	'655'=>'zapadnaya-dvina',
	'656'=>'serafimovich',
	'658'=>'perevoz',
	'659'=>'kosteryovo',
	'660'=>'teberda',
	'661'=>'dno',
	'662'=>'olonec',
	'663'=>'chadan',
	'664'=>'biryusinsk',
	'665'=>'vetluga',
	'666'=>'novaya-ladoga',
	'667'=>'verhoture',
	'668'=>'pochinok',
	'669'=>'lipki',
	'670'=>'komsomolsk',
	'671'=>'insar',
	'672'=>'bolgar',
	'673'=>'starica',
	'674'=>'puchezh',
	'675'=>'belinskij',
	'676'=>'nikolsk',
	'677'=>'aniva',
	'678'=>'belousovo',
	'679'=>'shahtyorsk',
	'680'=>'makushino',
	'681'=>'medyn',
	'682'=>'malmyzh',
	'683'=>'andreapol',
	'684'=>'salair',
	'685'=>'novosokolniki',
	'686'=>'sychyovka',
	'687'=>'gorodishche',
	'688'=>'tommot',
	'689'=>'mglin',
	'690'=>'biryuch',
	'691'=>'lahdenpohya',
	'692'=>'mamonovo',
	'693'=>'spassk-ryazanskij',
	'694'=>'kirillov',
	'695'=>'laishevo',
	'696'=>'dmitriev',
	'697'=>'velizh',
	'698'=>'ohansk',
	'699'=>'polessk',
	'700'=>'sovetsk',
	'701'=>'spassk',
	'702'=>'demidov',
	'703'=>'vesegonsk',
	'704'=>'sevsk',
	'705'=>'temnikov',
	'706'=>'makarev',
	'707'=>'yuhnov',
	'708'=>'sursk',
	'709'=>'krasavino',
	'710'=>'orlov',
	'711'=>'sengilej',
	'712'=>'zubcov',
	'713'=>'sretensk',
	'714'=>'novohopyorsk',
	'715'=>'kurlovo',
	'716'=>'makarov',
	'717'=>'kamennogorsk',
	'718'=>'murashi',
	'719'=>'alzamaj',
	'720'=>'knyaginino',
	'721'=>'shack',
	'722'=>'soligalich',
	'723'=>'gavrilov-posad',
	'724'=>'bagrationovsk',
	'725'=>'sebezh',
	'726'=>'grajvoron',
	'727'=>'igarka',
	'728'=>'primorsk',
	'729'=>'poshehone',
	'730'=>'shihany',
	'731'=>'sudzha',
	'732'=>'dmitrovsk',
	'733'=>'myshkin',
	'734'=>'spas-klepiki',
	'735'=>'korocha',
	'736'=>'susuman',
	'737'=>'pytalovo',
	'738'=>'shenkursk',
	'739'=>'usole',
	'740'=>'krasnyj-holm',
	'741'=>'zhizdra',
	'742'=>'lyubim',
	'743'=>'zlynka',
	'744'=>'bilibino',
	'745'=>'fatezh',
	'746'=>'vereya',
	'747'=>'chuhloma',
	'748'=>'turan',
	'749'=>'cherdyn',
	'750'=>'spas-demensk',
	'751'=>'babushkin',
	'752'=>'kadnikov',
	'754'=>'pustoshka',
	'755'=>'slavsk',
	'756'=>'nesterov',
	'757'=>'tomari',
	'758'=>'gdov',
	'759'=>'duhovshchina',
	'760'=>'pravdinsk',
	'761'=>'mosalsk',
	'762'=>'lyuban',
	'763'=>'pevek',
	'764'=>'meshchovsk',
	'765'=>'chyormoz',
	'766'=>'maloarhangelsk',
	'767'=>'holm',
	'768'=>'novosil',
	'769'=>'ladushkin',
	'770'=>'belyj',
	'771'=>'novorzhev',
	'772'=>'mezen',
	'773'=>'srednekolymsk',
	'774'=>'krasnoznamensk',
	'775'=>'kologriv',
	'776'=>'magas',
	'777'=>'solvychegodsk',
	'778'=>'kedrovyj',
	'779'=>'severo-kurilsk',
	'780'=>'plyos',
	'781'=>'gorbatov',
	'782'=>'artyomovsk',
	'783'=>'ostrovnoj',
	'784'=>'kurilsk',
	'785'=>'primorsk',
	'786'=>'verhoyansk',
	'787'=>'vysock',
	'788'=>'chekalin',
	'789'=>'alupka',
	'790'=>'alushta',
	'791'=>'armyansk',
	'792'=>'bahchisaraj',
	'793'=>'dzhankoj',
	'794'=>'evpatoriya',
	'795'=>'kerch',
	'796'=>'krasnoperekopsk',
	'797'=>'saki',
	'798'=>'simferopol',
	'799'=>'staryj-krym',
	'800'=>'sudak',
	'801'=>'feodosiya',
	'802'=>'shchyolkino',
	'803'=>'yalta',
	'804'=>'sevastopol'
);

 
 
/* *******************

	// Добавляем сайты в Вэбмастер
	echo 'Добавление сайта в Вэбмастер<br><br><br>';

	foreach($urlarr as $key=>$val){
		// Post запрос, который отправляем джейсоном в теле курла на сервер API Вэмбастера
		$json = json_encode(array('host_url' => 'http://'.$val.'.nadookna.com/'));
		
		$res=addURl("https://api.webmaster.yandex.net/v3/user/".$user_id."/hosts/",
			$json,
			array('Authorization: OAuth '.$token, 'Content-type: application/json')
		);
		
		// Выводим результат запроса к API Вэмбастера
		print_r($res);
		echo '<br><br>';
	}

 	function addURl($url,$json,$headers) {
		$handle=curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $json);
		$response=curl_exec($handle);
		$code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
		return array("code"=>$code,"response"=>$response);
	}

******************* */ 
 
 
 
/* *******************
 
	// Подтверждение прав на вэбсайт
	echo 'Подтверждение прав<br><br><br>';

	foreach($urlarr as $key=>$val){
		// Формируем url запроса который отправляем в теле курла на сервер API Вэмбастера
		$htmlreq = 'https://api.webmaster.yandex.net/v3/user/'.$user_id.'/hosts/http:'.$val.'.nadookna.com:80/verification/?verification_type=META_TAG';
		
		$res=trueRights($htmlreq,array('Authorization: OAuth '.$token));
		
		// Выводим результат запроса к API Вэмбастера
		print_r($res);
		echo '<br><br>';
	}

	function trueRights($url,$headers) {
		$handle=curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		$response=curl_exec($handle);
		$code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
		return array("code"=>$code,"response"=>$response);
	}

******************* */ 



	
 
/* *******************

	// Добавление sitemap на Вэбмастер
	echo 'Добавление sitemap на Вэбмастер<br><br><br>';
	 
	foreach($urlarr as $key=>$val){
		// Post запрос, который отправляем джейсоном в теле курла на сервер API Вэмбастера
		$json = json_encode(array('url'=>'http://'.$val.'.nadookna.com/sitemaps/'.$val.'/sitemap.xml'));
		
		$res=addSitemap('https://api.webmaster.yandex.net/v3/user/'.$user_id.'/hosts/http:'.$val.'.nadookna.com:80/user-added-sitemaps/',
			$json,
			array('Authorization: OAuth '.$token, 'Content-type: application/json')
		);
		
		print_r($res); 
		echo '<br><br>';
	}

	function addSitemap($url,$json,$headers) {
		$handle=curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $json);
		$response=curl_exec($handle);
		$code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
		return array("code"=>$code,"response"=>$response);
	}

******************* */  

 
 
?>