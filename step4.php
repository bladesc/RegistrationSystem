<?php
if(isset($_GET['doctor']))
{

	$date = new Date;
	$dates_list = $date->getDatesListSelect($_GET['doctor']);
}
else
{
	$dates_list = "Blędny parametr GET";
}
?>

<div id="box_navigation">
	<ul>
		<li class="lidone">Miasto</li>
		<li class="lidone">Klinika</li>
		<li class="lidone">Lekarz</li>
		<li class="liactive">Data</li>
		<li>Dane osobowe</li>
	</ul>
</div>
<div id="box_form">
	<h3>Lista dostępnych dat</h3>
	<?php 
		$dateform = new Date;
		$dateform->generateDateForm(); ?>
		<div id="preview">
			<span id="p_day"></span>.<span id="p_month"></span>.<span id="p_year"></span>
			o godzinie: 
			<span id="p_hour"></span>:00
		</div>
	<form method="GET" action="rejestracja.php">
		<input type="hidden" id="i_day" name="day" value=""></input>
		<input type="hidden" id="i_year" name="year" value=""></input>
		<input type="hidden" id="i_month" name="month" value=""></input>
		<input type="hidden" id="i_hour" name="hour" value=""></input>
		<input type="hidden" name="id" value="5"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>