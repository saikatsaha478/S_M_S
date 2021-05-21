<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Management System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/animate.css" rel="stylesheet">
  </head>
  <body style="background:#bdc9c5">
  <div class="container animate__animated animate__shakeX">
  </br>
  <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
  <h1 class="text-center"><b>Welcome to Our Student Management System</b></h1></br>
  <b><hr/></b>
	<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
	<form action="" method="post">
	<table class="table table-bordered">
	<tr>
	<td colspan="2" class="text-center"><label>Student Info</label></td>
	</tr>
	<tr>
	<td><label>Choose Class</label></td>
	<td>
	<select class="form-control" id="choose" name="choose">
	<option value="">select</option>
	<option value="one">1st</option>
	<option value="two">2nd</option>
	<option value="three">3rd</option>
	<option value="fourth">4th</option>
	<option value="fifth">5th</option>
	</select>
	</td>
	</tr>
	<tr>
	<td><label>Roll No</label></td>
	<td><input class="form-control" type="text" name="roll_no" placeholder="Enter roll no" "></input></td>
	</tr>
	<tr>
	<td colspan="2" class="text-center"><input class="btn btn-info" type="submit" value="show Info" name="show_info"></input></td>
	</tr>
	</table>
	</form>
	</div>
	</div>
	<hr/>
	<?php
	require_once './admin/dbcon.php';
		if(isset($_POST['show_info'])){
			$choose = $_POST['choose'];
			$roll = $_POST['roll_no'];
			$query = "SELECT * FROM `student_info` WHERE `Class` = '$choose' and `Roll` = '$roll'";
			$result = mysqli_query($link, "$query");
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				?>
				<div class = "row">
	<div class="col-sm-6 col-sm-offset-3">
	<table class="table table-bordered">
	<tr>
	<td rowspan = "4">
	<img style="width:150px" src="admin/student_image/<?php echo $row['Photo']; ?>" class="img-thumbnail"></img>
	</td>
	<td>Name</td>
	<td><?php echo $row['Name']; ?></td>
	</tr>
	
	<tr>
	<td>Roll</td>
	<td><?php echo $row['Roll']; ?></td>
	</tr>
	
	<tr>
	<td>Class</td>
	<td><?php echo $row['Class']; ?></td>
	</tr>
	
	<tr>
	<td>City</td>
	<td><?php echo $row['City']; ?></td>
	</tr>

	</table>
	</div>
	</div>	
		<?php
			}else{?>
				<script type = "text/javascript">
				alert('Data not found');
				</script>
			<?php }}?>
	</div>
  </body>
</html>