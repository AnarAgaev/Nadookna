<!--
$(function(){
	$(document).ready(function() {
		$(".datepicker").datepicker();
	});

	$.datepicker.setDefaults(
		$.extend($.datepicker.regional["ru"])
	);
	
	$(".datepicker").datepicker({
		minDate: "+1d",
		maxDate: "+3m +1w +3d"
	});
});
//-->