<?php
require_once('./dbcon.php');
session_start();
if(isset($_SESSION['user_login'])){
	header('location:admin_homepage.php');
}
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$input_error = array();
	if(empty($username)){
		$input_error['username']="Please enter your username";
	}
	if(empty($password)){
		$input_error['password']="Please enter your password";
	}
	if(count($input_error)==0){
		$query1= "SELECT * FROM `users` WHERE `Username` = '$username'";
		$username_check = mysqli_query($link,$query1);
		if(mysqli_num_rows($username_check)>0){
			$row = mysqli_fetch_assoc($username_check);
			if($row['Password']== md5($password)){
				if($row['status'] == 'Active'){
					$_SESSION['user_login'] = $username;
					header('location:admin_homepage.php');
				}else{
					$status = "Your status is not active yet";
				}
			}
			else{
				$wrong_password = "Password not match";
			}
		}
		else{
			$username_not_found = "This Username not found";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
  </head>
  <body style="background:#bdc9c5">
  <div class="container animate__animated animate__shakeX">
  <div class="container">
  <h1><b>Admin Login</b></h1>
  <hr />
  <?php if(isset($username_not_found)){ echo '<div class="alert alert-danger">'.$username_not_found.'</div>';}?>
  <?php if(isset($wrong_password)){ echo '<div class="alert alert-danger">'.$wrong_password.'</div>';}?>
   <?php if(isset($status)){ echo '<div class="alert alert-danger">'.$status.'</div>';}?>
  <div class="col-md-12">
  <form name="form1" action="" method="post">
  <div class="row">
    <label for="username" class="control-label col-sm-1">Username</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" name="username" placeholder="Enter username please" value="<?php if(isset($username)){echo $username;}?>"></input>
  </div><label class="error"><?php if(isset($input_error['username'])){ echo $input_error['username'];}?></label>
  </div></br>
  <div class="row">
    <label for="password" class="control-label col-sm-1">Password</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="password" class="form-control" name="password" placeholder="Enter password please" value = "<?php if(isset($password)){echo $password;}?>"></input>
  </div><label class="error"><?php if(isset($input_error['password'])){ echo $input_error['password'];}?></label>
  </div></br>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1">
      <input class="btn btn-default btn-primary" type="submit" value="Please Login" name= "login" ></input>
    </div>
  </div></br>
  <hr/>
  </form>
  <footer>
  <p>Copyright &copy;2021 All right reservered</p>
  </footer>
  </div>
  </div>
  </div>
  </body>
</html>