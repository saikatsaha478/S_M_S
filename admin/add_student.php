<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
</ol><hr/>

<div class="row">
  <div class="content">
  <div class="col-sm-12">
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
      <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter roll address please" pattern="[0-9]{6}" value="<?php if(isset($email)){echo $email;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['email'])){ echo $input_error['email'];}?></label> <label class="error"><?php if(isset($email_error)){ echo $email_error;}?></label>
  </div></br>
  <div class="row">
    <label for="class" class="control-label col-sm-1">Class</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="text" class="form-control" id="class" name="class" placeholder="Enter class please" value="<?php if(isset($username)){echo $username;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['username'])){ echo $input_error['username'];}?></label><label class="error"><?php if(isset($username_error)){ echo $username_error;}?></label>
	<label class="error"><?php if(isset($username_length)){ echo $username_length;}?></label>
  </div></br>
  <div class="row">
    <label for="city" class="control-label col-sm-1">City</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="city" class="form-control" id="city" name="city" placeholder="Enter city please" value="<?php if(isset($password)){echo $password;}?>"></input>
    </div><label class="error"><?php if(isset($input_error['password'])){ echo $input_error['password'];}?></label><label class="error"><?php if(isset($password_length)){ echo $password_length;}?></label>
  </div></br>
  <div class="row">
    <label for="parents_Contact" class="control-label col-sm-1">Parents Contact</label>
    <div class="col-sm-4 col-sm-offset-0">
      <input type="parents_Contact" class="form-control" id="parents_Contact" name="parents_Contact" placeholder="Enter parents contact please" value="<?php if(isset($c_pass)){echo $c_pass;}?>"></input>
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
      <input class="btn btn-primary form-control" type="submit" value="Add Student" name= "Registration" class="form-control"></input>
    </div>
  </div></br>
  </form>
  <hr/>
  </form>
  </div>
  </div>
  </div>