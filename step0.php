<?php

if(isset($_GET['send2']))
{
	if(!empty($_GET['client_name']) && !empty($_GET['client_surname']) && !empty($_GET['client_email']) && !empty($_GET['client_number']))
	{
		$client = new Client;
		$addToBase = $client->addClient($_GET['client_name'], $_GET['client_surname'], $_GET['client_email'], $_GET['client_number']);
		if(!$addToBase)
		{
			
		}
		else
		{
			header("Location: rejestracja.php?id=1&client=$addToBase");
		}
	}
	
	else
	{
		$err_client = "Nie podałeś wszystkich danych";
	}
	
}
else
{
	
}



?>


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
	
	<?php if(isset($err_client))
	{
		echo '<div class="form_errors">'.$err_client.'</div>';
		
	}
	?>
	
	
	<form method="GET" action="rejestracja.php">
		<label for="client_name">Imię</label>
		<input class="inp_all" type="text" name="client_name" value=""></input>
		<label for="client_surname">Nazwisko</label>
		<input class="inp_all" type="text" name="client_surname" value=""></input>
		<label for="client_email">Adres e-mail</label>
		<input class="inp_all" type="text" name="client_email" value=""></input>
		<label for="client_number">Numer telefonu</label>
		<input class="inp_all" type="text" name="client_number" value=""></input>
		
		<input type="hidden" name="id" value="0"></input>	
		<input class="i_allforms" type="submit" value="Dalej" name="send2"></input>
	</form>			
</div>

