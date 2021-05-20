<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1> 
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-industry"></i> Dashboard</li>
</ol>
<div class="row">
<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-users fa-5x"></i>
</div>
<div class="col-xs-9">
<div class="pull-right"style="font-size: 45px">10</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">All student</span>
<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-users fa-5x"></i>
</div>
<div class="col-xs-9">
<div class="pull-right"style="font-size: 45px">10</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">All student</span>
<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>
<hr/>
<h3>New Students</h3>
<div class="table-responsive">
<table id="data" class="table table-hover table-bordered">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Roll</th>
<th>City</th>
<th>Contact</th>
<th>Photo</th>
</tr>
</thead>
<tbody>
<?php 
$db_sinfo = mysqli_query($link,"SELECT * FROM `student_info`");
while($row = mysqli_fetch_assoc($db_sinfo)){?>

<tr>
<td><?php echo $row['Id'] ?></td>
<td><?php echo ucwords($row['Name']) ?></td>
<td><?php echo $row['Roll'] ?></td>
<td><?php echo ucwords($row['City']) ?></td>
<td><?php echo $row['P_contact'] ?></td>
<td><img style="width:30px" src="student_image/<?php echo $row['Photo']; ?>" alt=""></img></td>
</tr>
<?php 
}
?>
</tbody>
</table>
</div>
