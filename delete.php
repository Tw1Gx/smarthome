<?php

$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "vikand18_db";
$conn = mysqli_connect("localhost", "vikand18", "JgI2yYME9b", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM grupp17_users WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: displayusers.php'); 
    exit;
} else {
    echo "Error deleting record";
}