<?php 
	include('../../config/connect.php');
$project_id = $_POST['project_id'];
$updatedPercentage = $_POST['updatedPercentage'];

$query1 = "UPDATE project_details SET percentage=$updatedPercentage WHERE id=$project_id";
echo $query1;
$check = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);	
?>