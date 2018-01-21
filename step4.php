<?php
if(isset($_GET['doctor']))
{

	$dateform = new Date;
	$dates_list = $dateform->generateDateForm(); 
}
else
{
	$dates_list = "Blędny parametr GET";
}
?>

<div id="box_navigation">
	<ul>
		<li class="lidone">Dane osobowe</li>
		<li class="lidone">Miasto</li>
		<li class="lidone">Klinika</li>
		<li class="lidone">Lekarz</li>
		<li class="liactive">Data</li>
	</ul>
</div>
<div id="box_form">
	<h3>Lista dostępnych dat</h3>
	<?php 
		echo $dates_list;?>
		<div id="preview">
			<span id="p_day"></span>.<span id="p_month"></span>.<span id="p_year"></span>
			o godzinie: 
			<span id="p_hour"></span>:00
		</div>
	<form method="GET" action="rejestracja.php">
		<input type="hidden" id="i_client" name="client" value="<?php echo $_GET['client']?>"></input>
		<input type="hidden" id="i_doctor" name="doctor" value="<?php echo $_GET['doctor']?>"></"></input>
		<input type="hidden" id="i_day" name="day" value=""></input>
		<input type="hidden" id="i_year" name="year" value=""></input>
		<input type="hidden" id="i_month" name="month" value=""></input>
		<input type="hidden" id="i_hour" name="hour" value=""></input>
		<input type="hidden" name="id" value="5"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>