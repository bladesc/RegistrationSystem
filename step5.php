<?php
if(isset($_GET['day']) && isset($_GET['year']) && isset($_GET['month']) && isset($_GET['hour']) && isset($_GET['id']))
{

	
	$date = new Date;
	$date->addDates($_GET);
	
}
else
{
	$dates_list = "Blędny parametr GET"; 
}
?>

