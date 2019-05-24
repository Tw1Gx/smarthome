
<!DOCTYPE html>
<html>
<head>
<script>
    function deleteRow(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {                     

        if (xhttp.readyState == 4 && xhttp.status == 200) {
                  alert("Deleted!");
            }
        };
        document.getElementById("table").deleteRow(x);
        xhttp.open("GET", "delete.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
        }       
</script>
<style>    <!--style for the table -->
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php // function collected from https://www.w3schools.com and https://stackoverflow.com/questions/43286387/adding-a-delete-button-in-php-on-each-row-of-a-mysql-table
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','vikand18','JgI2yYME9b','vikand18_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM grupp17_users WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
//below : table with columns that take input from database with data and put it in columns
echo "<table>   
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>username</th>
<th>User created at:</th>
<th>Admin=1 User= 0</th>
<th>Remove</th>
<th>Edit</th> 
</tr>";
       while($row = mysqli_fetch_array($result)) {

       echo "<tr>";
       echo "<td>".$row['fname']."</td>";
       echo "<td>".$row['lname']."</td>";
       echo "<td>".$row['email']."</td>";
       echo "<td>".$row['username']."</td>";
       echo "<td>".$row['created_at']."</td>";
       echo "<td>".$row['adminid']."</td>";      
       echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>"; //button to delete your user
	   echo "<td><a href='edit_user.php?id=".$row['id']."'>Edit</a></td>";  //button to edit your user
       echo "</tr>";
       }// end while loop
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 