<?php
require_once './dbcon.php';
$id = base64_decode($_GET['id']);
mysqli_query($link,"DELETE FROM `student_info` WHERE `Id`='$id'");
header("location:admin_homepage.php?page=all_student");
?>