<?php
//require_once './dbcon.php';
//session_start();
if(isset($_POST['Registration'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_pass = $_POST['confrim_pass'];
	$photo = explode('.',$_FILES['photo']['name']);
	$photo = end($photo);
	$photo_name = $name.'.'.$photo;
	
	$input_error = array();
	if(empty($name)){
		$input_error['name'] = "Name field is required";
	}
	if(empty($email)){
		$input_error['email'] = "Email field is required";
	}
	if(empty($username)){
		$input_error['username'] = "Username field is required";
	}
	if(empty($password)){
		$input_error['password'] = "Password field is required";
	}
	if(empty($c_pass)){
		$input_error['confrim_pass'] = "Confirm Password field is required";
	}	
	if(count($input_error)== 0){
		$email_check = mysqli_query($link,"SELECT * FROM `users` WHERE `Email`='$email';");
		if(mysqli_num_rows($email_check) == 0){
			$username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `Username`='$username';");
			if(mysqli_num_rows($username_check) == 0){
				if(strlen($username) >= 4){
					if(strlen($password) > 6){
						if($password == $c_pass){
							$password = md5($password);
							$query = "INSERT INTO `users`(`Name`, `Email`, `Username`, `Password`, `Photo`,`status`) VALUES ('$name','$email','$username','$password','$photo_name','Inactive')";
							$result = mysqli_query($link,$query);
							if($result){
								$_SESSION['data_insert_success'] = "Data Inserted successfully";
								move_uploaded_file($_FILES['photo']['tmp_name'],'image/'.$photo_name);
								header('location:Registration.php');
							}
							else{
								$_SESSION['data_insert_error'] = "Data Inserted Error";
							}
						}
						else{
							$pass_error = "Password not match";
						}
					}
					else{
						$password_length = "Password length must be more than 6 digit/character";
					}
				}
				else{
					$username_length = "Username must be equal or greater than 4 character";
				}
			}
			else{
				$username_error = "This username already exists";
			}
		}else{
			$email_error = "Email already exists";
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
    <title>Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
  </head>
  <body style="background:#bdc9c5">
  <div class="container animate__animated animate__shakeX">
  <div class="row">
  <div class="content">
  <h1><b>User Registration</b></h1>
  <hr />
  <div class="col-sm-12">
  <?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>'; unset($_SESSION['data_insert_success']); }?>
  <?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>'; unset($_SESSION['data_insert_error']);}?>
  
  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="row">
    <label for="name" class="control-label col-sm-1">Name</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name please" value="<?php if(isset($name)){echo $name;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
	</div></br>
  <div class="row">
    <label for="email" class="control-label col-sm-1">Email</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address please" value="<?php if(isset($email)){echo $email;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['email'])){ echo $input_error['email'];}?></label> <label class="error"><?php if(isset($email_error)){ echo $email_error;}?></label>
  </div></br>
  <div class="row">
    <label for="username" class="control-label col-sm-1">Username</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username please" value="<?php if(isset($username)){echo $username;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['username'])){ echo $input_error['username'];}?></label><label class="error"><?php if(isset($username_error)){ echo $username_error;}?></label>
	<label class="error"><?php if(isset($username_length)){ echo $username_length;}?></label>
  </div></br>
  <div class="row">
    <label for="password" class="control-label col-sm-1">Password</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password please" value="<?php if(isset($password)){echo $password;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['password'])){ echo $input_error['password'];}?></label><label class="error"><?php if(isset($password_length)){ echo $password_length;}?></label>
  </div></br>
  <div class="row">
    <label for="confrim_pass" class="control-label col-sm-1">Confirm Password</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="password" class="form-control" id="confrim_pass" name="confrim_pass" placeholder="Re-enter password please" value="<?php if(isset($c_pass)){echo $c_pass;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['confrim_pass'])){ echo $input_error['confrim_pass'];}?></label><label class="error"><?php if(isset($pass_error)){ echo $pass_error;}?></label>
  </div></br>
  <div class="row">
    <label for="photo" class="control-label col-sm-1">Photo</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input id="photo" type="file" class="form-control" name="photo"></input>
    </div>
  </div></br>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1">
      <input class="btn btn-primary form-control" type="submit" value="Registration" name= "Registration" class="form-control"></input>
    </div>
  </div></br>
  </form>
  </div>
  </div>
  </div>
  </div>
  </body>
</html>