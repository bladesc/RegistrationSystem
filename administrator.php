<?php ini_set('error_reporting', E_ALL);
include('settings/settings.php');
include("class/class.functions.php");
include("class/class.dbmanager.php");
include("class/class.city.php");
include("class/class.clinic.php");
include("class/class.date.php");
include("class/class.doctor.php");

if(isset($_POST['addcity']))
{
		$city = new City;
		$city->addCity($_POST['addcityname']);
}	

if(isset($_POST['addclinic']))
{	
		$clinic = new Clinic;
		$clinic->addClinic($_POST['addclinicname'], $_POST['inp_city'], $_POST['addclinicadress']);	
}	

if(isset($_POST['adddoctor']))
{	
		$doctor = new Doctor;
		$doctor->addDoctor($_POST['adddoctorname'], $_POST['inp_clinic'], $_POST['adddoctronumber']);	
		echo "ssdsd";
}	
?>
<!DOCTYPE html>
<html>
   <head>
   
		<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,800|Open+Sans:300,400,700" rel="stylesheet"> 
		<link rel="Stylesheet" type="text/css" href="css/style.css" />
		<script src="js/jquery.3.2.1.js"></script>
		<script src="js/functions.js"></script>
   
   </head>
  <body style="background: none">
		<div id="box_page">
			<div id="logo">
				D&A
			</div>
			<div id="content">
				<div class="incontent">
					<h2>Panel administracyjny</h2>
					<?php 
					if(isset($_SESSION['communicate']['status']))
					{
						if($_SESSION['communicate']['status'])
						{
							echo $_SESSION['communicate']['text'];
						}
						
					}
					?>
			
					<div class="row33">
						<div class="row100"><div class="inrow">
							<h3>Lista miast</h3>
							<div class="list">
								<button id="box_city_b">Dodaj miasto</button>
								<div id="box_city">
									<form action="administrator.php" method="POST">
										<label for="addclinicname">Miasto</label>
										<input type="text" name="addcityname"></input>
										<input type="submit" name="addcity" value="Dodaj miasto"></input>
									</form>
								</div>
								<?php
								$city = new City;
								echo $city->getCitiesListSelect(false);
								?>
							</div>
						</div></div>
						
						<div class="row100"><div class="inrow">
							<h3>Lista klinik</h3>
							<div class="list">
								<button id="box_clinic_b">Dodaj klinikę</button>
								<div id="box_clinic">
									<form action="administrator.php" method="POST">
										<label for="addclinicname">Nazwa kliniki</label>
										<input type="text" name="addclinicname"></input>
										<label for="adddoctorname">Adres</label>
										<input type="text" name="addclinicadress"></input>
										<?php
											$city = new City;
											echo $city->getCitiesListSelect(true);
										?>
										<input type="submit" name="addclinic" value="Dodaj klinikę"></input>
									</form>
								</div>
								<?php
								$clinic = new Clinic;
								echo $clinic->getClinicsList();
								?>
							</div>
						</div></div>
						
						<div class="row100"><div class="inrow">
							<h3>Lista lekarzy</h3>
							<div class="list">
								<button id="box_doctor_b">Dodaj lekarza</button>
								<div id="box_doctor">
									<form action="administrator.php" method="POST">
										<label for="adddoctorname">Nazwa doktora</label>
										<input type="text" name="adddoctorname"></input>
										<label for="adddoctorname">Numer telefonu</label>
										<input type="text" name="adddoctornumber"></input>
										<?php
										$clinic = new Clinic;
										echo $clinic->getClinicsListSelectAll();
										?>
										
										<input type="submit" name="adddoctor" value="Dodaj lekarza"></input>
									</form></div>
								<?php
								$doctor = new Doctor;
								echo $doctor->getDoctorsList();
								?>
							</div>
						</div></div>
					</div>
					<div class="row66"><div class="inrow">
						<h3>Lista rejestracji</h3>
						<div class="list">
							<!--<form action="administrator.php" method="POST">
								<input type="submit" name="adddate" value="Dodaj rejestrację"></input>
							</form>-->
							<?php
								$date = new Date;
								echo $date->getDatesList();
								?>
						</div>
					</div></div>
				
				</div>
			</div>	
			
		
			
		</div>
   </body>
</html>
