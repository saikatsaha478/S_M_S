<?php
if(isset($_POST['add_Student'])){
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$class = $_POST['class'];
	$city = $_POST['city'];
	$p_contact = $_POST['parents_Contact'];
	
	$photo = explode('.',$_FILES['photo']['name']);
	$photo = end($photo);
	$photo_name = $name.'.'.$photo;
	
	$input_error = array();
	if(empty($name)){
		$input_error['name'] = "Name field is required";
	}
	if(empty($roll)){
		$input_error['roll'] = "Roll field is required";
	}
	if($class == "select" ){
		$input_error['class'] = "Class field is required";
	}
	if(empty($city)){
		$input_error['city'] = "City field is required";
	}
	if(empty($p_contact)){
		$input_error['parents_Contact'] = "parents Contact field is required";
	}
	if(empty($name)){
		$input_error['name'] = "Name field is required";
	}
	if(count($input_error)==0){
		$roll_check = mysqli_query($link,"SELECT * FROM `student_info` WHERE `Roll`='$roll';");
		if(mysqli_num_rows($roll_check) == 0){
			if(strlen($p_contact) == 11){
				$query = "INSERT INTO `student_info`(`Name`, `Roll`, `Class`, `City`, `P_contact`, `Photo`) VALUES ('$name','$roll','$class','$city','$p_contact','$photo_name')";
				$result = mysqli_query($link,$query);
				if($result){
					$_SESSION['data_insert_success'] = "Data Inserted successfully";
					move_uploaded_file($_FILES['photo']['tmp_name'],'student_image/'.$photo_name);
					}else{
						$_SESSION['data_insert_error'] = "Data Inserted Error";
					}
			}else{
				$contact_length = "Please insert a valid contact number";
			}
		}else{
			$roll_error = "Roll already exists";
		}
	}	
}
?>

<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
</ol><hr/>
<div class="row">
  <div class="content">
  <div class="col-sm-12">
  <?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
  <?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';}?>
  
  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="row">
    <label for="name" class="control-label col-sm-1">Name</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name please" value="<?php if(isset($name)){echo $name;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
	</div></br>
  <div class="row">
    <label for="roll" class="control-label col-sm-1">Roll</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter roll address please" value="<?php if(isset($roll)){echo $roll;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['roll'])){ echo $input_error['roll'];}?></label> 
	<label class="error"><?php if(isset($roll_error)){ echo $roll_error;}?></label>
  </div></br>
  
  <div class="row">
    <label for="class" class="control-label col-sm-1">Class</label>
    <div class="col-sm-4 col-sm-offset-0">
      <select class="form-control" id="class" name="class" value="<?php if(isset($class)){echo $class;}?>">
		<option value='select'>select</option>
		<option value='one'>Class one</option>
		<option value='two'>Class Two</option>
		<option value='three'>Class Three</option>
		<option value='four'>Class Four</option>
		<option value='five'>Class Five</option>
	  </select>
    </div><label class="error"><?php if(isset($input_error['class'])){ echo $input_error['class'];}?></label>
  </div></br>
  
  <div class="row">
    <label for="city" class="control-label col-sm-1">City</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="city" class="form-control" id="city" name="city" placeholder="Enter city please" value="<?php if(isset($city)){echo $city;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['city'])){ echo $input_error['city'];}?></label>
  </div></br>
  <div class="row">
    <label for="parents_Contact" class="control-label col-sm-1">Parents Contact</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="parents_Contact" class="form-control" id="parents_Contact" name="parents_Contact" placeholder="Enter parents contact please" value="<?php if(isset($p_contact)){echo $p_contact;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['parents_Contact'])){ echo $input_error['parents_Contact'];}?></label>
	<label class="error"><?php if(isset($contact_length)){ echo $contact_length;}?></label>
  </div></br>
  <div class="row">
    <label for="photo" class="control-label col-sm-1">Photo</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input id="photo" type="file" class="form-control" name="photo"></input>
    </div>
  </div></br>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1">
      <input class="btn btn-primary form-control" type="submit" value="Add Student" name= "add_Student" class="form-control"></input>
    </div>
  </div></br>
  </form>
  <hr/>
  </form>
  </div>
  </div>
  </div>