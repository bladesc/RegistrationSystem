<?php

include('settings/settings.php');
include("class/class.dbmanager.php");
include("class/class.install.php");
   

$install = new Install();
$install->createTables();

?>