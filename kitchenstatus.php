<?php

$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$password = "JgI2yYME9b";
$database = "vikand18_db";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server"); // connecting to the server and //assinging a variable to it. 
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database"); // assinging a variable to the dbname.
$checkbox = $_POST["checkboxName"]; 



 $query = "UPDATE kitchen_devices (kitchen_status) VALUES ('$checkboxName')";
 
 mysql_query($query) or die(mysql_error());
 ?>