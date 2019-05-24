
<?php
include('template.php');

$server = "localhost"; // Keep connecting to the db through all files with ip tracking and such. see displayusers.php
$username = "vikand18"; // for detailed comments. 
$password = "JgI2yYME9b";
$database = "vikand18_db";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database");


$tracking_page_name="editUsers.php";
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
<!DOCTYPE html>
<html lang="en">
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
<script>
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
</script>
<style>
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
$navigation =<<<END


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


if ($_SESSION['adminid'] == 1) {    // if user is admin (1) this runs £navigation2 
	echo $navigation2;    
} else{ //else, (if user is not admin(0)) this runs £navigation and the admin pages do not run. 
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
		
		
<?php
include_once('template.php');  //include template, to be able to conect to database 
$content = 'Edit User';       //variable for edit user, named £content
if (isset($_POST['submit'])) {      //update database grupp17_users, collect data from database, fname,lname and email, where id, collect id from database
 $query = <<<END
UPDATE grupp17_users
SET fname = '{$_POST['fname']}',lname = '{$_POST['lname']}', email = '{$_POST['email']}'   
WHERE id = '{$_GET['id']}'
END;
 if ($mysqli->query($query) !== TRUE) {     // if possible to reach database
 die("Could not query database" . $mysqli->errno . " : " . $mysqli->error);   //if not, it dies and tell user not possible to reach database
 }
} //below: select data from database
 $query = <<<END
SELECT * FROM grupp17_users
 WHERE id = '{$_GET['id']}'
END;
 $res = $mysqli->query($query);
 if ($res->num_rows > 0) {
 $row = $res->fetch_object();  // get object from database
 $content = <<<END
<form method="post" action="edit_user.php?id={$row->id}" style="padding-left:40%;"> 
	<p> Please update your Firstname </p> 
 <input type="text" name="fname" value="{$row->fname}"><br>
 <p> Please update your Lastname </p> 
 <input type="text" name="lname" value="{$row->lname}"><br>
 <p> Please update your Email </p> 
 <input type="text" name="email" value="{$row->email}"><br>
 <input type="submit" name="submit" value="save">
 </form>
 
END;
 }


echo $content; // shows content varible, with from to fill in to change user data and when submit is pressed database uppdates. 
?>
		
		
	
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