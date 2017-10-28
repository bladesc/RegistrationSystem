<?php

include('./settings/setting.php');
include("class/class.dbmanager.php");
include("class/class.install.php");
   

$install = new Install();
$install->createTables();

?>