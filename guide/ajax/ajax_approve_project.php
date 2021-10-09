<?php 
	include('../../config/connect.php');
$id = $_POST['id'];

$query1 = "UPDATE project_uploads set is_approved = 1 WHERE id= $id";
	$check = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);	
	
   if($check){
   	echo "Project is Approved";
   }
 ?>