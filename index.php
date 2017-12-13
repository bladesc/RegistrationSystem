<?php
include('settings/settings.php');
include("class/class.dbmanager.php");

?>
<!DOCTYPE html>
<html>
   <head>
   
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,800|Open+Sans:300,400,700" rel="stylesheet"> 
	<link rel="Stylesheet" type="text/css" href="css/style.css" />
   
   </head>
   <body>
		<div id="box_page">
			<div id="logo">
				D&A
			</div>
			<div id="haslo">
				<h1>
				Rejestracja <br/>pacjentów <br/>online
				</h1>
				<form method="GET" action="rejestracja.php">
					<input type="hidden" name="id" value="1"></input>
					<input type="submit" name="send" value="Dokonaj rejestracji >>" id="i_register"></input>
				</form>
			</div>
			
		
			<div id="copyright">
				<p>Projekt: <b>Damian Szczęsny & Adrian Głąbik</b></p>
			</div>
		</div>
   </body>
</html>
