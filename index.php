<!DOCTYPE html>
<html lang="en">
<?php

include('template.php');
$server = "localhost"; // Keep connecting to the db through all files with ip tracking and such. see displayusers.php
$username = "*****"; // for detailed comments. 
$password = "*****";
$database = "*****";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database");


$tracking_page_name="index.php";
$agent=$_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
$strSQL = "INSERT INTO track(tm, agent, ip, tracking_page_name ) VALUES(curdate(),'{$agent}','{$ip}','{$tracking_page_name}')";
mysql_query($strSQL);
//var_dump($ref, $agent, $ip, $tracking_page_name);

// Above created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------
if(empty($_SESSION["username"])){ /* No user ís logged in */
  header("LOCATION:login.php"); /* Redirect to login page */
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grupp 17 - Smarthome</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery.js">
        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
//function called when drag starts
function dragIt(theEvent) {
//tell the browser what to drag
theEvent.dataTransfer.setData("Text", theEvent.target.id);
}
//function called when element drops
function dropIt(theEvent) {
//get a reference to the element being dragged
var theData = theEvent.dataTransfer.getData("Text");
//get the element
var theDraggedElement = document.getElementById(theData);
//add it to the drop element
theEvent.target.appendChild(theDraggedElement);
//instruct the browser to allow the drop
theEvent.preventDefault();
} 

$(document).ready(function() {
    $("#checkbox_ID").click(function() {
         $.post("kitchenstatus.php", {"checkboxName":$(this).is("checked")})
})
</script>
<style type="text/css">
/*styling here*/
div[id^="place"]
{float:left; width:35px; height:35px; margin:3px;}

table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">SmartHome <sup> <p><p> By group 17</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Room overview</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
<?php


$navigation = <<<END


END;

$navigation2 = <<<END

      <div class="sidebar-heading">
        Admin pages
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Display Screens:</h6>
		   <a class="collapse-item" href="displayusers.php">Display all users</a>
		    <a class="collapse-item" href="show_track.php"> Analytics </a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Add options:</h6>
            <a class="collapse-item" href="adduser.php">Add users</a>


          </div>
        </div>
      </li>






END;


if ($_SESSION['adminid'] == 1) {
	echo $navigation2;
} else{
	echo $navigation;
}

?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> 
				<?php
$navigation = <<<END
				Logged in as {$_SESSION['username']}

END;

$navigation2 = <<<END
				Logged in as {$_SESSION['username']}
				</span>
END;


if ($_SESSION['adminid'] == 1) {
	echo $navigation2;
} else{
	echo $navigation;
}

?>
				
                <img class="img-profile rounded-circle" src="img/avatar.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row" >

            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Room Overview</h6>

                </div>
                <!-- Column Card Body https://www.w3schools.com/howto/howto_css_column_cards.asp -->
				
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h3>Kitchen</h3> 
<a id="edit" href="index.php">Update Roomtable</a>
<div class="table-responsive">
<table class="table">

<?php
$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$database = "vikand18_db";
$password = "JgI2yYME9b";
$con = mysql_connect($server,$username,$password); // Connecting to db 
mysql_select_db($database, $con) or die( "Unable to select database");
$query="SELECT * FROM kitchen_devices"; // Displaying all the data from track into a table.
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();
?> <br> <br> 
<table border="1" cellspacing="2" cellpadding="2">
<tr>
  <br>
<th>Name</th>
<th>Status</th>
<th>On/Off</th>
<th></th>


</tr>

<?php
$i=0; // Displaying the data with a while loop into table data. 
while ($i < $num) {

$f1=mysql_result($result,$i,"kitchen_name");
$f2=mysql_result($result,$i,"kitchen_status");
$f3=mysql_result($result,$i,"id");
?>
<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td>
<form method="post" action="kitchen_toggle.php?id=<?php echo $f3; ?>">
<input type="checkbox" name="days" value="1">ON
<input type="checkbox" name="days" value="0">OFF
<input type="submit" name="submit" value="Toggle"">
</form>

<td>
<form method="post" action="kitchen_edit.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Edit"">
</form>

<form method="post" action="kitchen_delete.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Delete"">
</form>
</td>

</td>
</tr>

<?php
$i++;
}

// Above PHP created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------

?>

</table>
</div>

    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <h3>Livingroom</h3>
<a id="edit" href="index.php">Update Roomtable</a>
	  <div class="table-responsive">
<table class="table">
	  
	  <?php
$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$database = "vikand18_db";
$password = "JgI2yYME9b";
$con = mysql_connect($server,$username,$password); // Connecting to db 
mysql_select_db($database, $con) or die( "Unable to select database");
$query="SELECT * FROM livingroom_devices"; // Displaying all the data from track into a table.
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();
?> <br> <br> 
<table border="1" cellspacing="2" cellpadding="2">
<tr>
  <br>
<th>Name</th>
<th>Status</th>
<th>On/Off</th>
<th></th>


</tr>

<?php
$i=0; // Displaying the data with a while loop into table data. 
while ($i < $num) {

$f1=mysql_result($result,$i,"livingroom_name");
$f2=mysql_result($result,$i,"livingroom_status");
$f3=mysql_result($result,$i,"id");
?>
<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td>
<form method="post" action="livingroom_toggle.php?id=<?php echo $f3; ?>?name=<?php echo $f1; ?>">
<input type="checkbox" name="days" value="1">ON
<input type="checkbox" name="days" value="0">OFF
<input type="submit" name="submit" value="Toggle"">
</form>

<td>
<form method="post" action="livingroom_edit.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Edit"">
</form>

<form method="post" action="livingroom_delete.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Delete"">
</form>
</td>

</td>
</tr>

<?php
$i++;
}

// Above PHP created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------

?>
	  
	  </table>
</div>
	  
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="card">
      <h3>Bathroom</h3>
<a id="edit" href="index.php">Update Roomtable</a>
<div class="table-responsive">
<table class="table">
<?php
$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$database = "vikand18_db";
$password = "JgI2yYME9b";
$con = mysql_connect($server,$username,$password); // Connecting to db 
mysql_select_db($database, $con) or die( "Unable to select database");
$query="SELECT * FROM bathroom_devices"; // Displaying all the data from track into a table.
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();
?> <br> <br> 
<table border="1" cellspacing="1" cellpadding="1">
<tr>
  <br>
<th>Name</th>
<th>Status</th>
<th>On/Off</th>
<th></th>


</tr>

<?php
$i=0; // Displaying the data with a while loop into table data. 
while ($i < $num) {

$f1=mysql_result($result,$i,"bathroom_name");
$f2=mysql_result($result,$i,"bathroom_status");
$f3=mysql_result($result,$i,"id");
?>
<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td>
<form method="post" action="bathroom_toggle.php?id=<?php echo $f3; ?>?name=<?php echo $f1; ?>">
<input type="checkbox" name="days" value="1">ON
<input type="checkbox" name="days" value="0">OFF
<input type="submit" name="submit" value="Toggle"">
</form>

<td>
<form method="post" action="bathroom_edit.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Edit"">
</form>

<form method="post" action="bathroom_delete.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Delete"">
</form>
</td>

</td>
</tr>

<?php
$i++;
}

// Above PHP created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------

?>

</table>
</div>
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="card">
      <h3>Hallway</h3>
<a id="edit" href="index.php">Update Roomtable</a>
<div class="table-responsive">
<table class="table">

<?php
$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$database = "vikand18_db";
$password = "JgI2yYME9b";
$con = mysql_connect($server,$username,$password); // Connecting to db 
mysql_select_db($database, $con) or die( "Unable to select database");
$query="SELECT * FROM hallway_devices"; // Displaying all the data from track into a table.
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();
?> <br> <br> 
<table border="1" cellspacing="2" cellpadding="2">
<tr>
  <br>
<th>Name</th>
<th>Status</th>
<th>On/Off</th>
<th></th>


</tr>

<?php
$i=0; // Displaying the data with a while loop into table data. 
while ($i < $num) {

$f1=mysql_result($result,$i,"hallway_name");
$f2=mysql_result($result,$i,"hallway_status");
$f3=mysql_result($result,$i,"id");
?>
<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td>
<form method="post" action="hallway_toggle.php?id=<?php echo $f3; ?>">
<input type="checkbox" name="days" value="1">ON
<input type="checkbox" name="days" value="0">OFF
<input type="submit" name="submit" value="Toggle"">
</form>

<td>
<form method="post" action="hallway_edit.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Edit"">
</form>

<form method="post" action="hallway_delete.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Delete"">
</form>
</td>

</td>
</tr>
<?php
$i++;
}

// Above PHP created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------

?>

</table>
</div>

    </div>
  </div>
  
    <div class="col-md-6">
    <div class="card">
      <h3>Bedroom</h3>
<a id="edit" href="index.php">Update Roomtable</a>
<div class="table-responsive">
<table class="table">

<?php
$server = "localhost";// Adding database details to variables, 
$username = "vikand18"; // server, username, password, and the name of the db
$database = "vikand18_db";
$password = "JgI2yYME9b";
$con = mysql_connect($server,$username,$password); // Connecting to db 
mysql_select_db($database, $con) or die( "Unable to select database");
$query="SELECT * FROM bedroom_devices"; // Displaying all the data from track into a table.
$result=mysql_query($query);
$num=mysql_numrows($result); 
mysql_close();
?> <br> <br> 
<table border="1" cellspacing="2" cellpadding="2">
<tr>
  <br>
<th>Name</th>
<th>Status</th>
<th>On/Off</th>
<th></th>

</tr>

<?php
$i=0; // Displaying the data with a while loop into table data. 
while ($i < $num) {

$f1=mysql_result($result,$i,"bedroom_name");
$f2=mysql_result($result,$i,"bedroom_status");
$f3=mysql_result($result,$i,"id");
?>
<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td>
<form method="post" action="bedroom_toggle.php?id=<?php echo $f3; ?>">
<input type="checkbox" name="days" value="1">ON
<input type="checkbox" name="days" value="0">OFF
<input type="submit" name="submit" value="Toggle"">
</form>

<td>
<form method="post" action="bedroom_edit.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Edit"">
</form>

<form method="post" action="bedroom_delete.php?id=<?php echo $f3; ?>">
<input type="submit" name="submit" value="Delete"">
</form>
</td>

</td>
</tr>
<?php
$i++;
}

// Above PHP created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------

?>

</table>
</div>
    </div>
  </div>
</div>
              </div>
            </div>

<?php
$navigation = <<<END
<div class="col-xl-3 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Login as admin to add devices.</h6>   
				  <form method="POST" action="login.php">
				  <input type="submit" class="btn-primary" value="Login"> </input>
				  </form> 
                </div>

END;

$navigation2 = <<<END

            <!-- Add device Chart -->
            <div class="col-md-3 col-md-3">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add a device to a specific room</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
				
	<div class="container">
  <!-- Button to Open the Modal kitchen -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
    Kitchen
  </button>
    <!-- Button to Open the Modal livingroom -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
    Livingroom
  </button>
          <!-- Button to Open the Modal bathroom -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
    Bathroom
  </button>
  
       <!-- Button to Open the Modal hallway -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
    Hallway
  </button>
      <!-- Button to Open the Modal bedroom -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">
    Bedroom
  </button>
END;


if ($_SESSION['adminid'] == 1) {
	echo $navigation2;
} else{
	echo $navigation;
}

?>

  <!-- The Modal kitchen -->
  <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a device to the kitchen</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body  -->
        <div class="modal-body">
   <!-- Kitchen -->    
<?php
if (isset($_POST['kitchen_name']) and isset($_POST['kitchen_status'])) {
 $query = <<<END
INSERT INTO kitchen_devices(kitchen_name,kitchen_status)
 VALUES('{$_POST['kitchen_name']}','{$_POST['kitchen_status']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
 header('Location:index.php');
 }
}

$content1 = <<<END
<form method="post" action="index.php">
<input type = "text" name="kitchen_name" required placeholder="Device type here" ><br>
<input type="text" name="kitchen_status" required placeholder="enter status 0 here "><br>
<button type="submit" onclick="alert('Device added!')">Add device</button>
<input type="Reset" value="reset">
</form>
END;

echo $content1;
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    <!-- The Modal livingroom -->
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a device to the livingroom</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  <!-- Livingroom -->
  <?php
if (isset($_POST['livingroom_name']) and isset($_POST['livingroom_status'])) {
 $query = <<<END
INSERT INTO livingroom_devices(livingroom_name,livingroom_status)
 VALUES('{$_POST['livingroom_name']}','{$_POST['livingroom_status']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
 header('Location:index.php');
 }
}
$content2 = <<<END
<form method="post" action="index.php">
<input type="text" name="livingroom_name" required placeholder="Enter device name here"><br>
<input type="text" name="livingroom_status" required placeholder="enter status 0 here "><br>
<button type="submit" onclick="alert('Device added!')">Add device</button>
<input type="Reset" value="reset">
</form>
END;
echo $content2;
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    <!-- The Modal Bedroom -->
  <div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a device to the bedroom</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
<!-- Bedroom -->
<?php
if (isset($_POST['bedroom_name']) and isset($_POST['bedroom_status'])) {
 $query = <<<END
INSERT INTO bedroom_devices(bedroom_name,bedroom_status)
 VALUES('{$_POST['bedroom_name']}','{$_POST['bedroom_status']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
 header('Location:index.php');
 }
}
$content3 = <<<END
<form method="post" action="index.php">
<input type = "text" name="bedroom_name" required placeholder="Device type here" ><br>
<input type="text" name="bedroom_status" required placeholder="enter status 0 here "><br>
<button type="submit" onclick="alert('Device added!')">Add device</button>
<input type="Reset" value="reset">
</form>
END;
echo $content3;
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    <!-- The Modal bathroom -->
  <div class="modal" id="myModal5">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a device to the bathroom</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
<!-- bathroom -->
<?php
if (isset($_POST['bathroom_name']) and isset($_POST['bathroom_status'])) {
 $query = <<<END
INSERT INTO bathroom_devices(bathroom_name,bathroom_status)
 VALUES('{$_POST['bathroom_name']}','{$_POST['bathroom_status']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
 header('Location:index.php');
 }
}
$content4 = <<<END
<form method="post" action="index.php">
<input type = "text" name="bathroom_name" required placeholder="Device type here" ><br>
<input type="text" name="bathroom_status" required placeholder="enter status 0 here "><br>
<button type="submit" onclick="alert('Device added!')">Add device</button>
<input type="Reset" value="reset">
</form>
END;
echo $content4;
?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
    <!-- The Modal hallway -->
  <div class="modal" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a device to the hallway</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
<!-- hallway -->
<?php
if (isset($_POST['hallway_name']) and isset($_POST['hallway_status'])) {
 $query = <<<END
INSERT INTO hallway_devices(hallway_name,hallway_status)
 VALUES('{$_POST['hallway_name']}','{$_POST['hallway_status']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);
 header('Location:index.php');
 }
}
$content5 = <<<END
<form method="post" action="index.php">
<input type = "text" name="hallway_name" required placeholder="Device type here" ><br>
<input type="text" name="hallway_status" required placeholder="enter status 0 here "><br>
<button type="submit" onclick="alert('Device added!')">Add device</button>
<input type="Reset" value="reset">
</form>
END;
echo $content5;
?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


        </div>
        
      </div>
    </div>
  </div>


                </div>
              </div>
            </div>
          </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
