/* ******************

	Данный скрипт получает url видо на youtube и запускает его
	на станице в открывшемся блоке

*********************/

function f_showvideo(urlvideo) {
	$(".fon_blok,#videobox").css('display','block');
	$("#framevideobox").attr('src',urlvideo);
}
