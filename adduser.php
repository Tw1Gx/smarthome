<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include('template.php');

$server = "localhost"; // Adding database details to variables, 
$username = "*****"; // server, username, password, and the name of the db
$password = "*****";
$database = "*****";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server"); // connecting to the server and //assinging a variable to it . 
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database"); // assinging a variable to the dbname.


$tracking_page_name="addUser.php"; // adding page name to variable. 
$agent=$_SERVER['HTTP_USER_AGENT']; // Assinging variable to agent function, which stores browserdata from visitor.
$ip=$_SERVER['REMOTE_ADDR']; // Storing visitor ip in variable.
$strSQL = "INSERT INTO track(tm, agent, ip, tracking_page_name ) VALUES(curdate(),'{$agent}','{$ip}','{$tracking_page_name}')";
// inserting all variable data into a created table in our database called 'track'. This is stored into strSQL

mysql_query($strSQL); // running the query with $strSQL


//var_dump($ref, $agent, $ip, $tracking_page_name);
// Used var_dump to troubleshoot while coding this function. 


// Above made by: Johannes Grönhed ITF
// -------------------------------------------------------------------------------------------------------------------------
if(empty($_SESSION["username"])){ /* No user ís logged in */
  header("LOCATION:login.php"); /* Redirect to login page */
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grupp 17 - Smarthome</title> <!--titel for sidebar -->

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
				</span>
                <img class="img-profile rounded-circle" src="img/avatar.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add a user to the Smarthome</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
 

<?php
if (isset($_POST['username']) and isset($_POST['password'])) { // below: insertar the values from the form into database. 
 $query = <<<END
INSERT INTO grupp17_users(username,password,email,fname,lname,adminid)
 VALUES('{$_POST['username']}','{$_POST['password']}','
 {$_POST['email']}','{$_POST['fname']}','{$_POST['lname']}','{$_POST['adminid']}')
END;
 if ($mysqli->query($query) !== TRUE) {
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);   // if not possible to get to database 
 header('Location:index.php');
 }
}
$content = <<<END
<form method="post" action="adduser.php">
<input type = "text" name="username" required placeholder="Enter username here" ><br>
<input type="password" name="password" required placeholder="Enter password here"><br>
<input type="text" name="email" required placeholder="Enter email here"><br>
<input type="text" name="fname" required placeholder="Enter first name"><br>
<input type="text" name="lname" required placeholder="Enter last name"><br>
<input type="text" name="adminid" required placeholder="Admin=1 User=0"><br>
<button type="submit" onclick="alert('User Registerd!')">Register</button>
<input type="Reset" value="reset">
</form>
END;
echo $content; // Above: Form to fill in and send information to create a new user. If 1 = Admin , if 0 = normal user //
?>

        </div>
        <!-- /.container-fluid -->

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