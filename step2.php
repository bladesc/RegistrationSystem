<?php
if(isset($_GET['city']))
{
	$clinic = new Clinic;
	$clinic_list = $clinic->getClinicsListSelect($_GET['city']);
}
else
{
	$clinic_list = "Blędny parametr GET";
}
?>

<div id="box_navigation">
	<ul>
		<li class="lidone">Dane osobowe</li>
		<li class="lidone">Miasto</li>
		<li class="liactive">Klinika</li>
		<li>Lekarz</li>
		<li>Data</li>
	</ul>
</div>
<div id="box_form">
	<form method="GET" action="rejestracja.php">
		<?php echo $clinic_list; ?>
		<input type="hidden" name="id" value="3"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>