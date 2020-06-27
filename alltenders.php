<?php 
	
	/**********************
		
	НА ДАННОЙ СТРАНИЦЕ ПОКАЗЫВАЕМ ВСЕ ТЕНДЕРЫ КОТОРЫЕ ЕСТЬ В БД
	
	***********************/
	
	session_start();
	
	/**********************
	
	Подключаем файл в котором указываем домен под которым будем создавать куки, 
	что бы при переходе между поддоменами при выборе города куки сохранялись
	
	***********************/
	include_once("pattern/iniset.php");
	

	/**********************
	
	Поключаем морфер для автоматического изменения города пользователя в нужный падеж
	В нутри морфера определяем город пользователя манипулируя поддоменом в url
	
	***********************/
	include_once("pattern/morpher.php");
	
	if(isset($_GET['logout'])) unset($_SESSION['admin']);
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Anar.N.Agaev - anar.n.agaev@gmail.com">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Все тендеры</title>
	<link rel="stylesheet" type="text/css" href="../style/main.css" />
	<link rel="stylesheet" type="text/css" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="style/tender.css" />
	<link rel="stylesheet" type="text/css" href="style/verification.css" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
	<!--[if lt IE 9]>
	 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
	
	<div class="fon_blok" style="overflow:auto; cursor:default;">
		<div class="win_content" style="position: absolute; left: calc(50% - 400px); z-index: 1000; background-color: #fff;  display: none; margin-bottom: 70px;">
			<div class="del_win" onclick="$('.fon_blok,.win_content').css('display','none');">×</div>
			<div class="bodyOrderPopUp">
				<div class="id_bodyOrder" id="id_bodyOrder"></div>
				<div class="txt_bodyOrder" id="txt_bodyOrder"></div>
				<div class="phone_bodyOrder" id="phone_bodyOrder"></div>
			</div>
		</div>	
	</div>
	
	<?php
		include_once("pattern/dbconnect.php");
		if(isset($_SESSION['admin']) and $_SESSION['admin'] == true){
	?>
		
	<div class="wrapper">
		<div class="nav">
			<div class="content_wrap">
				<a id="logo" href="../" >НАDООКНА</a>
				<a class="logout roundBorder" href="../alltenders.php?logout">ВЫХОД</a>
				<a class="exit" href="../alltenders.php?logout"><img src="img/exit.png"></a>
			</div>
		</div>
		
		<div class="content" style="min-height: calc(100vh - 70px); background: none;">
			<div class="content_wrap" style="width: 100%; max-width: 650px; margin: 70px auto 120px;">	
				
					<?php 
						include_once("pattern/normalizedate.php"); // скрипт для преобразования даты в нормальный вид
						$result = mysql_query("SELECT `idtender`, `idcity`, `phone`, `name`, `date`, `verifi`, `atwork` FROM `tenders` ORDER BY `date` DESC",$db);
						
						for ($i = 0; $i < mysql_num_rows($result); $i++)
						{
							$idtender = mysql_result($result, $i, "idtender");
							$phone = mysql_result($result, $i, "phone");
							$name = mysql_result($result, $i, "name");
							$date = f_normalizedate(mysql_result($result, $i, "date"));
							$verifi = mysql_result($result, $i, "verifi");
							$atwork = mysql_result($result, $i, "atwork");

							$idcity = mysql_result($result, $i, "idcity");
							$rowcity = mysql_fetch_assoc(mysql_query("SELECT `city` FROM `city` WHERE `id_city`='$idcity'",$db));
						
							echo '<div class="bodyOrder" id="'.$idtender.'" onclick="f_showtender('.$idtender.',\''.$name.'\',\''.$rowcity['city'].'\',\''.$date.'\',\''.$phone.'\')">';
								echo '<div class="id_bodyOrder"># '.$idtender.'</div>';
								echo '<div class="txt_bodyOrder">'.$name.' - '.$rowcity['city'].' - '.$date.'</div>';
								echo '<div class="phone_bodyOrder">'.$phone.'</div>';
								echo '<div class="inform_block">';
								if ($verifi) echo '<span>Верфицирован</span>'; else echo '<span style="color: red;">Не верфицирован</span>'; 
								if ($atwork) echo '<span>Разослан по компаниям</span>'; else echo '<span style="color: red;">Не разослан по компаниям</span>';
								echo '</div>';
							echo '</div>';
						}
					?>
			</div> 
			<div class="footer" style="position: absolute; bottom: 0;">
				&copy; Надоокна 2014-2019
			</div>		
		</div>
	</div>
		
	<?php	
		
		}
		else echo <<<HERE
		
			<div class="title_vhod">
				<a class="to_start" href="../">НАDООКНА</a>
				<div>
					<img class="vhod" src="../img/men.png">
					<h1 class="tit_text">Вход для менеджера</h1>
				</div>
			</div>
		
			<div class="boxinput" style="left(50% - 175px);">
				<div class="err" id="err_log" style="text-align: center;">Неверный логин</div>
				<div class="err" id="err_pas" style="text-align: center;">Неверный пароль</div>
				<input type="text" id="log" class="inputVhod" placeholder="Логин">
				<input type="password" id="pas" class="inputVhod"  placeholder="Пароль">
				<input type="button" id="go_vhod" class="roundBorder" onclick="f_input()" value="Войти" style="margin-bottom: 40px;">
			</div>		
HERE;
	?>
	<script>
		!function(){"use strict";function t(t){if(t)c[0]=c[16]=c[1]=c[2]=c[3]=c[4]=c[5]=c[6]=c[7]=c[8]=c[9]=c[10]=c[11]=c[12]=c[13]=c[14]=c[15]=0,this.blocks=c,this.buffer8=i;else if(n){var r=new ArrayBuffer(68);this.buffer8=new Uint8Array(r),this.blocks=new Uint32Array(r)}else this.blocks=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];this.h0=this.h1=this.h2=this.h3=this.start=this.bytes=0,this.finalized=this.hashed=!1,this.first=!0}var r="object"==typeof window?window:{},e=!r.JS_MD5_NO_NODE_JS&&"object"==typeof process&&process.versions&&process.versions.node;e&&(r=global);var i,h=!r.JS_MD5_NO_COMMON_JS&&"object"==typeof module&&module.exports,s="function"==typeof define&&define.amd,n=!r.JS_MD5_NO_ARRAY_BUFFER&&"undefined"!=typeof ArrayBuffer,f="0123456789abcdef".split(""),o=[128,32768,8388608,-2147483648],a=[0,8,16,24],u=["hex","array","digest","buffer","arrayBuffer"],c=[];if(n){var p=new ArrayBuffer(68);i=new Uint8Array(p),c=new Uint32Array(p)}var d=function(r){return function(e){return new t(!0).update(e)[r]()}},y=function(){var r=d("hex");e&&(r=l(r)),r.create=function(){return new t},r.update=function(t){return r.create().update(t)};for(var i=0;i<u.length;++i){var h=u[i];r[h]=d(h)}return r},l=function(t){var r=require("crypto"),e=require("buffer").Buffer,i=function(i){if("string"==typeof i)return r.createHash("md5").update(i,"utf8").digest("hex");if(i.constructor===ArrayBuffer)i=new Uint8Array(i);else if(void 0===i.length)return t(i);return r.createHash("md5").update(new e(i)).digest("hex")};return i};t.prototype.update=function(t){if(!this.finalized){var e="string"!=typeof t;e&&t.constructor==r.ArrayBuffer&&(t=new Uint8Array(t));for(var i,h,s=0,f=t.length||0,o=this.blocks,u=this.buffer8;f>s;){if(this.hashed&&(this.hashed=!1,o[0]=o[16],o[16]=o[1]=o[2]=o[3]=o[4]=o[5]=o[6]=o[7]=o[8]=o[9]=o[10]=o[11]=o[12]=o[13]=o[14]=o[15]=0),e)if(n)for(h=this.start;f>s&&64>h;++s)u[h++]=t[s];else for(h=this.start;f>s&&64>h;++s)o[h>>2]|=t[s]<<a[3&h++];else if(n)for(h=this.start;f>s&&64>h;++s)i=t.charCodeAt(s),128>i?u[h++]=i:2048>i?(u[h++]=192|i>>6,u[h++]=128|63&i):55296>i||i>=57344?(u[h++]=224|i>>12,u[h++]=128|i>>6&63,u[h++]=128|63&i):(i=65536+((1023&i)<<10|1023&t.charCodeAt(++s)),u[h++]=240|i>>18,u[h++]=128|i>>12&63,u[h++]=128|i>>6&63,u[h++]=128|63&i);else for(h=this.start;f>s&&64>h;++s)i=t.charCodeAt(s),128>i?o[h>>2]|=i<<a[3&h++]:2048>i?(o[h>>2]|=(192|i>>6)<<a[3&h++],o[h>>2]|=(128|63&i)<<a[3&h++]):55296>i||i>=57344?(o[h>>2]|=(224|i>>12)<<a[3&h++],o[h>>2]|=(128|i>>6&63)<<a[3&h++],o[h>>2]|=(128|63&i)<<a[3&h++]):(i=65536+((1023&i)<<10|1023&t.charCodeAt(++s)),o[h>>2]|=(240|i>>18)<<a[3&h++],o[h>>2]|=(128|i>>12&63)<<a[3&h++],o[h>>2]|=(128|i>>6&63)<<a[3&h++],o[h>>2]|=(128|63&i)<<a[3&h++]);this.lastByteIndex=h,this.bytes+=h-this.start,h>=64?(this.start=h-64,this.hash(),this.hashed=!0):this.start=h}return this}},t.prototype.finalize=function(){if(!this.finalized){this.finalized=!0;var t=this.blocks,r=this.lastByteIndex;t[r>>2]|=o[3&r],r>=56&&(this.hashed||this.hash(),t[0]=t[16],t[16]=t[1]=t[2]=t[3]=t[4]=t[5]=t[6]=t[7]=t[8]=t[9]=t[10]=t[11]=t[12]=t[13]=t[14]=t[15]=0),t[14]=this.bytes<<3,this.hash()}},t.prototype.hash=function(){var t,r,e,i,h,s,n=this.blocks;this.first?(t=n[0]-680876937,t=(t<<7|t>>>25)-271733879<<0,i=(-1732584194^2004318071&t)+n[1]-117830708,i=(i<<12|i>>>20)+t<<0,e=(-271733879^i&(-271733879^t))+n[2]-1126478375,e=(e<<17|e>>>15)+i<<0,r=(t^e&(i^t))+n[3]-1316259209,r=(r<<22|r>>>10)+e<<0):(t=this.h0,r=this.h1,e=this.h2,i=this.h3,t+=(i^r&(e^i))+n[0]-680876936,t=(t<<7|t>>>25)+r<<0,i+=(e^t&(r^e))+n[1]-389564586,i=(i<<12|i>>>20)+t<<0,e+=(r^i&(t^r))+n[2]+606105819,e=(e<<17|e>>>15)+i<<0,r+=(t^e&(i^t))+n[3]-1044525330,r=(r<<22|r>>>10)+e<<0),t+=(i^r&(e^i))+n[4]-176418897,t=(t<<7|t>>>25)+r<<0,i+=(e^t&(r^e))+n[5]+1200080426,i=(i<<12|i>>>20)+t<<0,e+=(r^i&(t^r))+n[6]-1473231341,e=(e<<17|e>>>15)+i<<0,r+=(t^e&(i^t))+n[7]-45705983,r=(r<<22|r>>>10)+e<<0,t+=(i^r&(e^i))+n[8]+1770035416,t=(t<<7|t>>>25)+r<<0,i+=(e^t&(r^e))+n[9]-1958414417,i=(i<<12|i>>>20)+t<<0,e+=(r^i&(t^r))+n[10]-42063,e=(e<<17|e>>>15)+i<<0,r+=(t^e&(i^t))+n[11]-1990404162,r=(r<<22|r>>>10)+e<<0,t+=(i^r&(e^i))+n[12]+1804603682,t=(t<<7|t>>>25)+r<<0,i+=(e^t&(r^e))+n[13]-40341101,i=(i<<12|i>>>20)+t<<0,e+=(r^i&(t^r))+n[14]-1502002290,e=(e<<17|e>>>15)+i<<0,r+=(t^e&(i^t))+n[15]+1236535329,r=(r<<22|r>>>10)+e<<0,t+=(e^i&(r^e))+n[1]-165796510,t=(t<<5|t>>>27)+r<<0,i+=(r^e&(t^r))+n[6]-1069501632,i=(i<<9|i>>>23)+t<<0,e+=(t^r&(i^t))+n[11]+643717713,e=(e<<14|e>>>18)+i<<0,r+=(i^t&(e^i))+n[0]-373897302,r=(r<<20|r>>>12)+e<<0,t+=(e^i&(r^e))+n[5]-701558691,t=(t<<5|t>>>27)+r<<0,i+=(r^e&(t^r))+n[10]+38016083,i=(i<<9|i>>>23)+t<<0,e+=(t^r&(i^t))+n[15]-660478335,e=(e<<14|e>>>18)+i<<0,r+=(i^t&(e^i))+n[4]-405537848,r=(r<<20|r>>>12)+e<<0,t+=(e^i&(r^e))+n[9]+568446438,t=(t<<5|t>>>27)+r<<0,i+=(r^e&(t^r))+n[14]-1019803690,i=(i<<9|i>>>23)+t<<0,e+=(t^r&(i^t))+n[3]-187363961,e=(e<<14|e>>>18)+i<<0,r+=(i^t&(e^i))+n[8]+1163531501,r=(r<<20|r>>>12)+e<<0,t+=(e^i&(r^e))+n[13]-1444681467,t=(t<<5|t>>>27)+r<<0,i+=(r^e&(t^r))+n[2]-51403784,i=(i<<9|i>>>23)+t<<0,e+=(t^r&(i^t))+n[7]+1735328473,e=(e<<14|e>>>18)+i<<0,r+=(i^t&(e^i))+n[12]-1926607734,r=(r<<20|r>>>12)+e<<0,h=r^e,t+=(h^i)+n[5]-378558,t=(t<<4|t>>>28)+r<<0,i+=(h^t)+n[8]-2022574463,i=(i<<11|i>>>21)+t<<0,s=i^t,e+=(s^r)+n[11]+1839030562,e=(e<<16|e>>>16)+i<<0,r+=(s^e)+n[14]-35309556,r=(r<<23|r>>>9)+e<<0,h=r^e,t+=(h^i)+n[1]-1530992060,t=(t<<4|t>>>28)+r<<0,i+=(h^t)+n[4]+1272893353,i=(i<<11|i>>>21)+t<<0,s=i^t,e+=(s^r)+n[7]-155497632,e=(e<<16|e>>>16)+i<<0,r+=(s^e)+n[10]-1094730640,r=(r<<23|r>>>9)+e<<0,h=r^e,t+=(h^i)+n[13]+681279174,t=(t<<4|t>>>28)+r<<0,i+=(h^t)+n[0]-358537222,i=(i<<11|i>>>21)+t<<0,s=i^t,e+=(s^r)+n[3]-722521979,e=(e<<16|e>>>16)+i<<0,r+=(s^e)+n[6]+76029189,r=(r<<23|r>>>9)+e<<0,h=r^e,t+=(h^i)+n[9]-640364487,t=(t<<4|t>>>28)+r<<0,i+=(h^t)+n[12]-421815835,i=(i<<11|i>>>21)+t<<0,s=i^t,e+=(s^r)+n[15]+530742520,e=(e<<16|e>>>16)+i<<0,r+=(s^e)+n[2]-995338651,r=(r<<23|r>>>9)+e<<0,t+=(e^(r|~i))+n[0]-198630844,t=(t<<6|t>>>26)+r<<0,i+=(r^(t|~e))+n[7]+1126891415,i=(i<<10|i>>>22)+t<<0,e+=(t^(i|~r))+n[14]-1416354905,e=(e<<15|e>>>17)+i<<0,r+=(i^(e|~t))+n[5]-57434055,r=(r<<21|r>>>11)+e<<0,t+=(e^(r|~i))+n[12]+1700485571,t=(t<<6|t>>>26)+r<<0,i+=(r^(t|~e))+n[3]-1894986606,i=(i<<10|i>>>22)+t<<0,e+=(t^(i|~r))+n[10]-1051523,e=(e<<15|e>>>17)+i<<0,r+=(i^(e|~t))+n[1]-2054922799,r=(r<<21|r>>>11)+e<<0,t+=(e^(r|~i))+n[8]+1873313359,t=(t<<6|t>>>26)+r<<0,i+=(r^(t|~e))+n[15]-30611744,i=(i<<10|i>>>22)+t<<0,e+=(t^(i|~r))+n[6]-1560198380,e=(e<<15|e>>>17)+i<<0,r+=(i^(e|~t))+n[13]+1309151649,r=(r<<21|r>>>11)+e<<0,t+=(e^(r|~i))+n[4]-145523070,t=(t<<6|t>>>26)+r<<0,i+=(r^(t|~e))+n[11]-1120210379,i=(i<<10|i>>>22)+t<<0,e+=(t^(i|~r))+n[2]+718787259,e=(e<<15|e>>>17)+i<<0,r+=(i^(e|~t))+n[9]-343485551,r=(r<<21|r>>>11)+e<<0,this.first?(this.h0=t+1732584193<<0,this.h1=r-271733879<<0,this.h2=e-1732584194<<0,this.h3=i+271733878<<0,this.first=!1):(this.h0=this.h0+t<<0,this.h1=this.h1+r<<0,this.h2=this.h2+e<<0,this.h3=this.h3+i<<0)},t.prototype.hex=function(){this.finalize();var t=this.h0,r=this.h1,e=this.h2,i=this.h3;return f[t>>4&15]+f[15&t]+f[t>>12&15]+f[t>>8&15]+f[t>>20&15]+f[t>>16&15]+f[t>>28&15]+f[t>>24&15]+f[r>>4&15]+f[15&r]+f[r>>12&15]+f[r>>8&15]+f[r>>20&15]+f[r>>16&15]+f[r>>28&15]+f[r>>24&15]+f[e>>4&15]+f[15&e]+f[e>>12&15]+f[e>>8&15]+f[e>>20&15]+f[e>>16&15]+f[e>>28&15]+f[e>>24&15]+f[i>>4&15]+f[15&i]+f[i>>12&15]+f[i>>8&15]+f[i>>20&15]+f[i>>16&15]+f[i>>28&15]+f[i>>24&15]},t.prototype.toString=t.prototype.hex,t.prototype.digest=function(){this.finalize();var t=this.h0,r=this.h1,e=this.h2,i=this.h3;return[255&t,t>>8&255,t>>16&255,t>>24&255,255&r,r>>8&255,r>>16&255,r>>24&255,255&e,e>>8&255,e>>16&255,e>>24&255,255&i,i>>8&255,i>>16&255,i>>24&255]},t.prototype.array=t.prototype.digest,t.prototype.arrayBuffer=function(){this.finalize();var t=new ArrayBuffer(16),r=new Uint32Array(t);return r[0]=this.h0,r[1]=this.h1,r[2]=this.h2,r[3]=this.h3,t},t.prototype.buffer=t.prototype.arrayBuffer;var b=y();h?module.exports=b:(r.md5=b,s&&define(function(){return b}))}();

		// Вход в аккаунт
		function f_input(){
			 $('#err_log, #err_pas').css('display','none');
			 if(md5($('#log').val()) != '21232f297a57a5a743894a0e4a801fc3') $('#err_log').css('display','block');
			 if(md5($('#pas').val()) != 'bb3e18eeff9bc7a0d85c23b088881764') $('#err_pas').css('display','block');
			 if($('#err_log').css('display') == 'none' && $('#err_pas').css('display') == 'none') $.ajax({url: "script/php/logadmin.php", success: function(){document.location.href = "/alltenders.php";}});
		 }
		 
		 
// Показываем окно с тендереом и двумя кнопками
function f_showtender(idtender,name,city,date,phone){
	$(".win_body,.body_button").remove();
	$("#id_bodyOrder").html('# '+idtender);
	$("#txt_bodyOrder").html(name+' - '+city+' - '+date);
	$("#phone_bodyOrder").html(phone);
	
	$.ajax({
		type: "POST",
		cache: false,
		url: "../script/php/showtender.php",
		data: {idtender:idtender},
		async: true,
		success: function(date){
			
			$('.fon_blok,.win_content').css('display','block');
			$('.win_content').css('top',$("body").scrollTop());
			
			tender = JSON.parse(date);
			
			var htmlstr = '';
			
			for (var key in tender) {
				htmlstr += '<div class="win_body" style="padding: 10px 0;">';
				htmlstr += '<div class="img_body">';
				htmlstr += '<img src="img/addtndr/win/'+tender[key]["num"]+'.png">';
				htmlstr += '</div>';
				htmlstr += '<div class="win_txt">';
				
				$.ajax({
					type: "POST",
					cache: false,
					url: "../script/php/takenamewin.php",
					data: {idokna:tender[key]["num"]},
					async: false,
					success: function(date){htmlstr += '<div class="tit_pars">'+date+'</div>';}
				});		
				
				htmlstr += '<div class="params"><span class="tit_params">Ширина конструкции:</span>'+tender[key]["shirina"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Высота окна:</span>'+tender[key]["visota_okna"]+'</div>';
				if(tender[key]["visota_dveri"] != 0) htmlstr += '<div class="params"><span class="tit_params">Высота двери:</span>'+tender[key]["visota_dveri"]+'</div>';
				if(tender[key]["shirina_dveri"] != 0) htmlstr += '<div class="params"><span class="tit_params">Ширина двери:</span>'+tender[key]["shirina_dveri"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Количество камер ПВХ профиля:</span>'+tender[key]["kol_profil"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Количество камер стеклопакета:</span>'+tender[key]["kol_steklo"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Отлив:</span>'+tender[key]["otliv"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Откосы:</span>'+tender[key]["otkos"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Подоконник:</span>'+tender[key]["podok"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Монтаж:</span>'+tender[key]["montag"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Москитная сетка:</span>'+tender[key]["moscit"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Защита от детей:</span>'+tender[key]["zamok"]+'</div>';
				htmlstr += '<div class="params"><span class="tit_params">Количество таких окон:</span>'+tender[key]["kolvo"]+'</div>';
				htmlstr += '</div></div>';
			}
			
			$(".win_content").append(htmlstr);
		}
	});		
}
		 
		 
		 
		 
		 
	</script>
</body>
</html>