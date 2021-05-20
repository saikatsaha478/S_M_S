<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
</ol><hr/>
<?php  
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `student_info` WHERE `Id` = '$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update_Student'])){
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$class = $_POST['class'];
	$city = $_POST['city'];
	$p_contact = $_POST['parents_Contact'];
	
	$query = "UPDATE `student_info` SET `Name`='$name',`Roll`='$roll',`Class`='$class',`City`='$city',`P_contact`='$p_contact' WHERE `Id`= '$id'"; 
	$result = mysqli_query($link,$query);
	if($result){
		header ('location:admin_homepage.php?page=all_student');
	}
}
?>

<div class="row">
  <div class="content">
  <div class="col-sm-12">
  <?php if(isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>'; unset($_SESSION['data_insert_success']); }?>
  <?php if(isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>'; unset($_SESSION['data_insert_error']);}?>
  
  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="row">
    <label for="name" class="control-label col-sm-1">Name</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name please" value="<?php echo $db_row['Name'];?>"></input>
    </div><label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
	</div></br>
  <div class="row">
    <label for="roll" class="control-label col-sm-1">Roll</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter roll address please" value="<?php echo $db_row['Roll']; ?>"></input>
    </div><label class="error"><?php if(isset($input_error['roll'])){ echo $input_error['roll'];}?></label> 
	<label class="error"><?php if(isset($roll_error)){ echo $roll_error;}?></label>
  </div></br>
  
  <div class="row">
    <label for="class" class="control-label col-sm-1">Class</label>
    <div class="col-sm-4 col-sm-offset-0">
      <select class="form-control" id="class" name="class" value="<?php if(isset($class)){echo $class;}?>">
		<option value='select'>select</option>
		<option <?php echo $db_row['Class']=='one'?'selected=""':''; ?> value='one'>Class one</option>
		<option <?php echo $db_row['Class']=='two'?'selected=""':''; ?> value='two'>Class Two</option>
		<option <?php echo $db_row['Class']=='three'?'selected=""':''; ?> value='three'>Class Three</option>
		<option <?php echo $db_row['Class']=='four'?'selected=""':''; ?> value='four'>Class Four</option>
		<option <?php echo $db_row['Class']=='five'?'selected=""':''; ?> value='five'>Class Five</option>
	  </select>
    </div><label class="error"><?php if(isset($input_error['class'])){ echo $input_error['class'];}?></label>
  </div></br>
  
  <div class="row">
    <label for="city" class="control-label col-sm-1">City</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="city" class="form-control" id="city" name="city" placeholder="Enter city please" value="<?php echo $db_row['City'];?>"></input>
    </div><label class="error"><?php if(isset($input_error['city'])){ echo $input_error['city'];}?></label>
  </div></br>
  <div class="row">
    <label for="parents_Contact" class="control-label col-sm-1">Parents Contact</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="parents_Contact" class="form-control" id="parents_Contact" name="parents_Contact" placeholder="Enter parents contact please" value="<?php echo $db_row['P_contact'];?>"></input>
    </div><label class="error"><?php if(isset($input_error['parents_Contact'])){ echo $input_error['parents_Contact'];}?></label>
	<label class="error"><?php if(isset($contact_length)){ echo $contact_length;}?></label>
  </div></br>
  
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1">
      <input class="btn btn-primary form-control" type="submit" value="Update Student" name= "update_Student" class="form-control"></input>
    </div>
  </div></br>
  </form>
  <hr/>
  </form>
  </div>
  </div>
  </div>