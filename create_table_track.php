<?php

$server = "localhost";// Adding database details to variables, 
$username = "*****"; // server, username, password, and the name of the db
$password = "*****";
$database = "*****";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server"); // connecting to the server and //assinging a variable to it. 
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database"); // assinging a variable to the dbname.

// Creating a table named track, file to be used when table didn't exist. Smooth way to create table with all criteras.
$result = "CREATE TABLE track( 
`id` int(6) NOT NULL auto_increment,
`tm` varchar(20) NOT NULL default '',
`agent` varchar(250) NOT NULL default '',
`ip` varchar(20) NOT NULL default '',
`tracking_page_name` varchar(10) NOT NULL default '',
 UNIQUE KEY `id` (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 "; 

if (mysql_query($result)) // If table creation is successful we echo it out.
{
 print "Success in TABLE creation!......";
} 
else {
	die('MSSQL error: ' . mssql_get_last_message()); // if not, we get an error.
}
// Above created by: Johannes Grönhed
// -----------------------------------------------------------------------------------------------------------------------
?>