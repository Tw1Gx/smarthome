
<?php
$host = "localhost";
$user = "*****";
$pwd = "*****";
$db = "*****";

$connId = mysql_connect($host, $user, $pwd) or die(mysql_error());
$dbselect = mysql_select_db("*****", $connId ) or die(mysql_error());

 $query = <<<END
UPDATE bathroom_devices
 SET bathroom_status = '{$_POST['days']}'
 WHERE id = '{$_GET['id']}'
END;
 mysql_query($query);
 header("Location:index.php");  //if match go to index.ph


?>
<!-- Query toggle the selected device with a track from the id that it was given before. AFter that it sets the variable 1 or 0 depending on what button( days ) it toggles. Then sends the user back to index.php as a reload -->