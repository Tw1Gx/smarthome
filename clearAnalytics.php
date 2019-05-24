<?php

$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$password = "JgI2yYME9b";
$database = "vikand18_db";

$dbc = mysqli_connect($server, $username, $password, $database) // connecting to the server and //assinging a variable to it. 
or die('Error connecting to MySQL server');


if(isset($_POST['delete'])){ // If button assigned to 'delete' is pressed. The query goes through. 
$query = "TRUNCATE TABLE `track` "; // Truncate acts like a cleaner. Emptys the entire table. 
$result = mysqli_query($dbc,$query) // Selecting db and table and cleans it. 
or die('Error deleting table.'); 

header("Location: show_track.php"); // Redirects to the Analytics page after query.
}
else {
echo "Sorry";
}
// Above made by: Johannes Grönhed ITF
// ------------------------------------------------------------------------------------
?>




