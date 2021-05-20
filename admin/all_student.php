<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-user-plus"></i> All Student</li>
</ol><hr/>
<div class="table-responsive">
<table id="data" class="table table-hover table-bordered">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Roll</th>
<th>Class</th>
<th>City</th>
<th>Contact</th>
<th>Photo</th>
<th>Action</th>
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
<td><?php echo $row['Class'] ?></td>
<td><?php echo ucwords($row['City']) ?></td>
<td><?php echo $row['P_contact'] ?></td>
<td><img style="width:30px" src="student_image/<?php echo $row['Photo']; ?>" alt=""></img></td>
<td>
<a href="admin_homepage.php?page=update_student&id=<?php echo base64_encode($row['Id'])?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil">Edit</i></a>
&nbsp
<a href="delete_student.php?id=<?php echo base64_encode($row['Id'])?>" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
</td>
</tr>
<?php 
}
?>
</tbody>
</table>
</div>