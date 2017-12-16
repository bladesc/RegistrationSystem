$(document).ready(function() {
	
$( "#box_city_b" ).click(function() {
    $('#box_city').toggleClass("active");
});

$( "#box_clinic_b" ).click(function() {
    $('#box_clinic').toggleClass("active");
});

$( "#box_doctor_b" ).click(function() {
    $('#box_doctor').toggleClass("active");
});
	
	
$('.houractive').click(function(){
	
	$('.houractive').removeClass("tick");
	$('.houractive').parent('.box_hours').parent('.date_window').removeClass("tickw");
	$(this).addClass("tick");
	$(this).parent('.box_hours').parent('.date_window').addClass("tickw");
	
	var hour = $(this).html();
	var day = $(this).parent('.box_hours').siblings('.box_day').html();
	var month = $(this).parent('.box_hours').siblings('.box_month').html();
	var year = $(this).parent('.box_hours').siblings('.box_year').html();
	$('#p_hour').html(hour);
	$('#p_day').html(day);
	$('#p_month').html(month);
	$('#p_year').html(year);
	$('#i_hour').val(hour);
	$('#i_day').val(day);
	$('#i_month').val(month);
	$('#i_year').val(year);
	
});
	
	
})