// перехват клика по родителю .(bodyOrder) при клике по дочке (.showPhone )
$( ".showPhone" ).click(function( event ) {
    event.stopPropagation();
});

// Показываем окно с тендереом и двумя кнопками
function f_showtender(idorg,idtender,name,city,date,phone){
	$(".win_body,.body_button").remove();
	$("#phone_bodyOrder").html('');
	$("#button_atTop").css('display','none');
	$("#id_bodyOrder").html('Тендер # '+idtender);
	$("#txt_bodyOrder").html(name+' - '+city+' - '+date);
	if(phone != '') $("#phone_bodyOrder").html(phone);
	else {
		$("#button_atTop").css('display','block');
		$("#button_atTop").attr("href", "showtender.php?idt="+idtender+"&ido="+idorg);
	}
	
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
				// настраниваем положение размеров окна
				if(tender[key]['num'] > 9 && tender[key]['num'] < 16) {
					place_shel = 'style="top: -30px; margin-left: -18px;"';
					place_vel = 'style="top: 70px; margin-left: -136px;"';
				}
				if(tender[key]['num'] > 19 && tender[key]['num'] < 29) {
					place_shel = 'style="top: -30px; margin-left: -17px;"';
					place_vel = 'style="top: 70px; margin-left: -176px;"';
				}
				if(tender[key]['num'] > 29 && tender[key]['num'] < 40 || tender[key]['num'] == 310 || tender[key]['num'] == 311 || tender[key]['num'] == 312 || tender[key]['num'] == 313) {
					place_shel = 'style="top: -30px; margin-left: -21px;"';
					place_vel = 'style="top: 70px; margin-left: -212px;"';
				}
				if(tender[key]['num'] > 39 && tender[key]['num'] < 46) {
					place_shel = 'style="top: -30px; margin-left: -30px;"';
					place_vel = 'style="top: 75px; margin-left: -199px;"';
					place_vd = 'style="top: 119px; right: 50%; margin-right: -326px;"';
					place_shd = 'style="bottom: -28px; margin-left: 22px;"';
				}
				if(tender[key]['num'] > 49 && tender[key]['num'] < 60) {
					place_shel = 'style="top: -30px; margin-left: -30px;"';
					place_vel = 'style="top: 75px; margin-left: -221px;"';
					place_vd = 'style="top: 115px; right: 50%; margin-right: -374px;"';
					place_shd = 'style="bottom: -28px; margin-left: 47px;"';
				}
				if(tender[key]['num'] > 59 && tender[key]['num'] < 70 || tender[key]['num'] == 610 || tender[key]['num'] == 611) {
					place_shel = 'style="top: -30px; margin-left: -30px;"';
					place_vel = 'style="top: 75px; margin-left: -222px;"';
					place_vd = 'style="top: 115px; right: 50%; margin-right: -374px;"';
					place_shd = 'style="bottom: -28px; margin-left: -27px;"';
				}
				
				
				htmlstr += '<div class="win_body">';
				htmlstr += '<div class="img_body">';
				
				htmlstr += '<div class="txt_param" '+place_shel+'>'+tender[key]['shirina']+' мм.</div>';
				htmlstr += '<div class="txt_param" '+place_vel+'>'+tender[key]['visota_okna']+' мм.</div>';
				if(tender[key]['num'] > 39 && tender[key]['num'] < 310 || tender[key]['num'] == 610 || tender[key]['num'] == 611){
					htmlstr += '<div class="txt_param" '+place_vd+'>'+tender[key]['visota_dveri']+' мм.</div><div class="txt_param" '+place_shd+'>'+tender[key]['shirina_dveri']+' мм.</div>';
				}
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
				
				
				htmlstr += '<div class="params on_params"><span class="tit_params">Ширина конструкции:</span>'+tender[key]["shirina"]+'</div>';
				htmlstr += '<div class="params on_params"><span class="tit_params">Высота окна:</span>'+tender[key]["visota_okna"]+'</div>';
				if(tender[key]["visota_dveri"] != 0) htmlstr += '<div class="params on_params"><span class="tit_params">Высота двери:</span>'+tender[key]["visota_dveri"]+'</div>';
				if(tender[key]["shirina_dveri"] != 0) htmlstr += '<div class="params on_params"><span class="tit_params">Ширина двери:</span>'+tender[key]["shirina_dveri"]+'</div>';
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
			
			var btnstr = '<div class="body_button">';
			
			if(phone != '') btnstr += '<div class="phoneAtTender">'+phone+'</div>';
			else btnstr += '<a class="showPhoneAtTender roundBorder" href="showtender.php?idt='+idtender+'&ido='+idorg+'">Показать телефон</a>';

			btnstr += '</div>';
			$(".win_content").append(btnstr);
			
		}
	});		
}
