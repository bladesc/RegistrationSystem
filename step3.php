<div id="box_navigation">
	<ul>
		<li>Miasto</li>
		<li>Klinika</li>
		<li class="liactive">Lekarz</li>
		<li>Data</li>
		<li>Dane osobowe</li>
	</ul>
</div>
<div id="box_form">
	<form method="GET" action="rejestracja.php">
		<label for="doctor">Wybierz lekarza</label>
			<select name="doctor" id="inp_city">
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="opel">Opel</option>
				<option value="audi">Audi</option>
			</select>
		<input type="hidden" name="id" value="4"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send"></input>
	</form>			
</div>