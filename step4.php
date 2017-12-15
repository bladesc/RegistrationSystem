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
	<form method="GET" action="rejestracja.php">
		<?php 
		$dateform = new Date;
		$dateform->generateDateForm(); ?>
		<?php echo $dates_list; ?>
		<input type="hidden" name="id" value="5"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>