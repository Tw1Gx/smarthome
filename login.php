<link rel="stylesheet" property="stylesheet" type="text/css" href="css/main.css">


<?php
include('template.php');
$server = "localhost"; // Keep connecting to the db through all files with ip tracking and such. see displayusers.php
$username = "vikand18"; // for detailed comments. 
$password = "JgI2yYME9b";
$database = "vikand18_db";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database");


$tracking_page_name="Login.php";
$agent=$_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
$strSQL = "INSERT INTO track(tm, agent, ip, tracking_page_name ) VALUES(curdate(),'{$agent}','{$ip}','{$tracking_page_name}')";
mysql_query($strSQL);

//var_dump($ref, $agent, $ip, $tracking_page_name);

// Above created by Johannes Grönhed ITF
// ---------------------------------------------------------------------------------------------------------------------


if (isset($_POST['username']) and isset($_POST['password'])) {
 $name = $mysqli->real_escape_string($_POST['username']);
 $pwd = $mysqli->real_escape_string($_POST['password']);
 $query = <<<END
SELECT username, password, id, adminid FROM grupp17_users
 WHERE username = '{$name}'
 AND password = '{$pwd}'
END;
 $result = $mysqli->query($query);
 if ($result->num_rows > 0) {
 $row = $result->fetch_object();
 $_SESSION["username"] = $row->username;
 $_SESSION["userId"] = $row->id;
 $_SESSION["adminid"] = $row->adminid;
 header("Location:index.php");
 } else {
 echo "Wrong username or password. Try again";
 }

 
}
$content = <<<END

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/smarthome.png" alt="smarthome.png" class="picture">
    </div>

    <!-- Login Form -->
    <form id=loginform action="login.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Login">
    </form>
END;
echo $content;
?>
<div class="forgotacc" >
<a href="forgot-password.html">Forgot your account/password?</a>
</div>
