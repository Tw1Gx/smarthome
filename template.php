<?php   //password etc. to database. Is implemeted in other files to be able to colect data
session_name('Website');
session_start();
$host = "localhost";
$user = "vikand18";
$pwd = "JgI2yYME9b";
$db = "vikand18_db";
$mysqli = new mysqli($host, $user, $pwd, $db);
?>