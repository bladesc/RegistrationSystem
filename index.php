<?php
include('settings/settings.php');
include("class/class.dbmanager.php");

?>
<!DOCTYPE html>
<html>
   <head>
   
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,800|Open+Sans:300,400,700" rel="stylesheet"> 
   <style>
		html {  height: 100%; width: 100%; margin: 0; padding: 0;}
		body { background: url('images/bg.png') bottom center no-repeat; height: 100%; width: 100%; position: relative; margin: 0; padding: 0;}
		body p  { margin: 20px 0 20px 0; padding: 0; }
		#haslo { position: absolute; top: 50%; margin-top: -185px;}
		#haslo h1 { font-size: 100px; color: #1bace8; font-family: 'Alegreya Sans', sans-serif; font-weight: 800; margin: 0; padding: 0;}
		#box_page { height: 100%; position: relative; width: 1200px; margin: 0 auto;}
		#i_register { transition: 0.4s; background: #0460a9; color: #fff; padding: 10px 30px; display: block; margin-top: 20px; border: none; border-radius: 5px; font-size: 21px; cursor: pointer;}
		#i_register:hover { border-radius: 40px; background: #097edb;}
		#copyright p { color: #6e7e99; opacity: 0.8; font-family: 'Open Sans', sans-serif; font-size: 17px;}
		#copyright { position: absolute; bottom: 50px; left: 0;}
		#box_form { background: rgba(31,173,231,0.8); position: absolute; top: 0; right: 0; width: 50%; height: 100%; z-index: 1;}
		#box_main_form {padding: 60px 0 60px 90px; width: 600px; color: #fff; font-family: 'Open Sans', sans-serif; font-size: 17px;}
		#box_main_form div { margin-bottom: 30px;}
		#box_main_form div input { width: 100%; height: 40px; line-height: 40px; margin-top: 5px;}
		label { font-weight: 700;}
		#logo { width: 130px; height: 130px; background: #1cace8; color: #fff; text-align: center; line-height: 130px; font-family: 'Alegreya Sans', sans-serif; font-weight: 800; font-size: 40px;}
		
   </style>
   
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
			</div>
			<?php
   $connect = new DbManager();
   $connect->dbConnect();   
   ?>
			<div id="copyright">
				<p>Projekt: <b>Damian Szczęsny & Adrian Głąbik</b></p>
			</div>
		</div>
		
		<div id="box_form">
			<div id="box_main_form">
				<h2>W celu rejestracji wypełnij poniższy formularz</h2>
				<form>
					<div>
						<label for="i_city">Wybierz miasto</label>
						<input id="i_city" type="text" name="i_city"></input>
					</div>
					<div>
						<label for="i_clinic">Wybierz klinikę</label>
						<input id="i_clinic" type="text" name="i_city"></input>
					</div>
					<div>
						<label for="i_doctor">Wybierz lekarza</label>
						<input id="i_doctor" type="text" name="i_city"></input>
					</div>
					<div>
						<label for="i_day">Wybierz dzień</label>
						<input id="i_day" type="text" name="i_city"></input>
					</div>
					<input type="submit" name="i_register" id="i_register" value="Zarejestruj"></input>
				</form>
			</div>
		</div>
   
   </body>
</html>
