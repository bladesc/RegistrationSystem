<?php ini_set('error_reporting', E_ALL);
include('settings/settings.php');
include("class/class.functions.php");
include("class/class.dbmanager.php");
include("class/class.city.php");
include("class/class.clinic.php");
include("class/class.date.php");
include("class/class.doctor.php");
include("class/class.client.php");
?>
<!DOCTYPE html>
<html>
   <head>
		<meta charset="UTF-8">
		<meta name="description" content="Projekt - rejesracja pacjentów">
		<meta name="keywords" content="rejestracja online, rejestracja pacjentów">
		<meta name="author" content="Damian Szczęsny, Adrian Głąbik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Projekt - rejesracja pacjentów</title>
		
		<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,800|Open+Sans:300,400,700" rel="stylesheet"> 
		<link rel="Stylesheet" type="text/css" href="css/style.css" />
		<script src="js/jquery.3.2.1.js"></script>
		<script src="js/functions.js"></script>
   </head>
   <body style="background: none">
		<div id="box_page" >
			<div id="logo">
				D&A
			</div>
			
			<div id="content">
				<div class="incontent">
					<h2>Rejestracja</h2>
					<?php
					if(isset($_GET['id']))
					{
						switch($_GET['id']) 
						{
							case 0: include_once('step0.php');
							break;
							case 1: include_once('step1.php');
							break;
							case 2: include_once('step2.php');
							break;
							case 3: include_once('step3.php');
							break;
							case 4: include_once('step4.php');
							break;
							case 5: include_once('step5.php');
							break;
							case 6: include_once('step6.php');
							break;
							default: echo "Błąd - nieprawidłowy numer id";
						}
					}
					else
					{
						echo "Błąd - brak paremtru get";
					}
					?>
				</div>
			</div>
			
			<div id="copyright2">
				<p>Projekt: <b>Damian Szczęsny & Adrian Głąbik</b></p>
			</div>
		</div>
   </body>
</html>
