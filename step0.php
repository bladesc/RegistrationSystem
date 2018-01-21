<div id="box_navigation">
	<ul>
		<li class="liactive2">Dane osobowe</li>
		<li class="lidone">Miasto</li>
		<li class="lidone">Klinika</li>
		<li class="lidone">Lekarz</li>
		<li class="lidone">Data</li>
	</ul>
</div>
<div id="box_form">
	<h3>Podaj swoje dane</h3>
	<form method="GET" action="rejestracja.php">
		<label for="client_name">Imię</label>
		<input class="inp_all" type="text" name="client_name" value=""></input>
		<label for="client_surname">Nazwisko</label>
		<input class="inp_all" type="text" name="client_surname" value=""></input>
		<label for="client_email">Adres e-mail</label>
		<input class="inp_all" type="text" name="client_email" value=""></input>
		<label for="client_number">Numer telefonu</label>
		<input class="inp_all" type="text" name="client_number" value=""></input>
		
		<input type="hidden" name="id" value="6"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>

<?php

if(isset($GET['send']))
{
	$client = new Client;
	$client->checkClient($_GET['client_name']);
	$client->checkClient($_GET['client_surname']);
	$client->checkClient($_GET['client_email']);
	$client->checkClient($_GET['client_number']);
}
else
{
	echo "Nie podałeś wszystkich danych";
}

?>