<html>
<head>
<link rel="Stylesheet" type="text/css" href="css/style.css" />

</head>
   <body style="background: none">
<?php

include('settings/settings.php');
include("class/class.dbmanager.php");
include("class/class.install.php");
   

$install = new Install();
if($install->createTables())
{
	echo "<div class='positive_comments'>Tabele w bazie danych zostały zainstalowane pomyślnie</div>";
}
if($install->makeData())
{
	echo "<div class='positive_comments'>Dane w bazie danych zostały zainstalowane pomyślnie</div>";
}
?>
</body>
</html>
