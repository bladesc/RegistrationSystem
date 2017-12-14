<?php
if(isset($_GET['doctor']))
{
	$date = new Date;
	$dates_list = $date->getDoctorsListSelect($_GET['doctor']);
}
else
{
	$dates_list = "Blędny parametr GET";
}
?>

<div id="box_navigation">
	<ul>
		<li>Miasto</li>
		<li>Klinika</li>
		<li>Lekarz</li>
		<li class="liactive">Data</li>
		<li>Dane osobowe</li>
	</ul>
</div>
<div id="box_form">
	<form method="GET" action="rejestracja.php">
		<?php echo $dates_list; ?>
		<input type="hidden" name="id" value="5"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>