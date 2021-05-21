<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-user"></i> Profile</li>
</ol><hr/>
<?php
$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `Username`='$session_user'");
$user_row = mysqli_fetch_assoc($user_data); 
?>
<div class = "row">
<div class ="col-sm-6">
<table class="table table-bordered">
<tr>
<td><b>User Id</b></td>
<td><?php echo $user_row['Id'];?></td>
</tr>
<tr>
<td><b>Name</b></td>
<td><?php echo ucwords($user_row['Name']);?></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><?php echo $user_row['Email'];?></td>
</tr>
<tr>
<td><b>Username</b></td>
<td><?php echo ucwords($user_row['Username']);?></td>
</tr>
<tr>
<td><b>Status</b></td>
<td><?php echo $user_row['status'];?></td>
</tr>
<tr>
<td><b>sign in</b></td>
<td><?php echo $user_row['Sign_in']?></td>
</tr>
</table>
<a href="" class="btn btn-sm btn-info pull-right">Edit Profile</a>
</div>
<div class = "col-sm-6">
<a href="">
<img style="width:110px" class="img-thumbnail" src="image/<?php echo $user_row['Photo']; ?>" alt=""></img>
</a>
<?php
if(isset($_POST['upload'])){
	$photo = explode('.',$_FILES['photo']['name']);
	$photo = end($photo);
	$photo_name = $session_user.'.'.$photo;
	
	$upload = mysqli_query($link,"UPDATE `users` SET `Photo`='$photo_name' WHERE `Username` = '$session_user'");
	if($upload){
		move_uploaded_file($_FILES['photo']['tmp_name'],'image/'.$photo_name);
	}
} 
?>
<form action="" enctype="multipart/form-data" method="POST">
<label for="photo">Profile picture</label>
<input type="file" name="photo" id="photo"></input>
<input class="btn btn-sm btn btn-info" type="submit" name="upload" value="Upload"></input>
</form>
</div>
</div>