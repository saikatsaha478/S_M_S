<?php
require_once './dbcon.php';
session_start();
$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($link,"SELECT `Name` FROM `users` WHERE `Username` ='$session_user'");
$user_row = mysqli_fetch_assoc($user_data); 

if(!isset($_SESSION['user_login'])){
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
				<script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body style="background:#bdc9c5">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin_homepage.php">Student Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="#"><i class="fa fa-user"></i> Welcome:<?php echo $user_row['Name'] ?></a></li>
		<li><a href="admin_homepage.php?page=Registration"><i class="fa fa-user-plus"></i> Add user</a></li>
		<li><a href="admin_homepage.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-sm-3">
<div class="list-group">
  <a href="admin_homepage.php?page=dashboard" class="list-group-item active "><i class="fa fa-dashboard"></i> Dashboard</a>
  <a href="admin_homepage.php?page=add_student" class="list-group-item"><i class="fa fa-user"></i> Add Student</a>
  <a href="admin_homepage.php?page=all_student" class="list-group-item"><i class="fa fa-user-plus"></i> All Student</a>
  <a href="admin_homepage.php?page=all_user" class="list-group-item"><i class="fa fa-user"></i> All Users</a>
</div>
</div>
<div class="col-sm-9">
<div class="content">
<?php
if(isset($_GET['page'])){
	$page = $_GET['page'].'.php';
}else{
	$page = "dashboard.php";
}
if(file_exists($page)){
	require_once $page;
} else{
	require_once '404_not_found.php';
}
?>
</div>
</div>
</div>
</div>
<footer class="footer-area">
<p>Copyright &copy 2021 All right reservered</p>
</footer>
  </body>
</html>