<?php


$city = new City;
$city_list = $city->getCitiesListSelect();

?>

<div id="box_navigation">
	<ul>
		<li class="liactive">Miasto</li>
		<li>Klinika</li>
		<li>Lekarz</li>
		<li>Data</li>
		<li>Dane osobowe</li>
	</ul>
</div>
<div id="box_form">
	<form method="GET" action="rejestracja.php">
		<?php echo $city_list; ?>
		<input type="hidden" name="id" value="2"></input>
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>