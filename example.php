<?php
// EXAMPLE FILE FOR IP TRACKING AND SUCH. NO IMPLEMENTED ON EVERY PAGE.

$server = "localhost";
$username = "vikand18";
$password = "JgI2yYME9b";
$database = "vikand18_db";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database");


$tracking_page_name="Example.php";
$agent=$_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
$strSQL = "INSERT INTO track(tm, agent, ip, tracking_page_name ) VALUES(curdate(),'{$agent}','{$ip}','{$tracking_page_name}')";
mysql_query($strSQL);

//var_dump($ref, $agent, $ip, $tracking_page_name);


?> 