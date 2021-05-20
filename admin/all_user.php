<h1 class="text-primary"><i class= "fa fa-industry"></i> Overview</h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-user-plus"></i> All Student</li>
</ol><hr/>
<div class="table-responsive">
<table id="data" class="table table-hover table-bordered">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Status</th>
<th>Photo</th>
</tr>
</thead>
<tbody>
<?php 
$db_sinfo = mysqli_query($link,"SELECT * FROM `users`");
while($row = mysqli_fetch_assoc($db_sinfo)){?>

<tr>
<td><?php echo ucwords($row['Name']) ?></td>
<td><?php echo $row['Email'] ?></td>
<td><?php echo $row['Username'] ?></td>
<td><?php echo ucwords($row['status']) ?></td>
<td><img style="width:30px" src="student_image/<?php echo $row['Photo']; ?>" alt=""></img></td>
</tr>
<?php 
}
?>
</tbody>
</table>
</div>