<?php   //password etc. to database. Is implemeted in other files to be able to colect data
session_name('Website');
session_start();
$host = "localhost";
$user = "*****";
$pwd = "*******";
$db = "***";
$mysqli = new mysqli($host, $user, $pwd, $db);
?>
