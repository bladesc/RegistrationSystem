<div id="box_navigation">
	<ul>
		<li>Miasto</li>
		<li>Klinika</li>
		<li>Lekarz</li>
		<li>Data</li>
		<li class="liactive">Dane osobowe</li>
	</ul>
</div>
<div id="box_form">
	<h3>Lista dostępnych dat</h3>
	<form method="GET" action="rejestracja.php">
		<label for="client_name">Imię</label>
		<input type="text" name="client_name" value=""></input>
		<label for="client_surname">Nazwisko</label>
		<input type="text" name="client_surname" value=""></input>
		<label for="client_email">Adres e-mail</label>
		<input type="text" name="client_email" value=""></input>
		<label for="client_number">Numer telefonu</label>
		<input type="text" name="client_number" value=""></input>
		
		<input type="hidden" name="id" value="6"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>