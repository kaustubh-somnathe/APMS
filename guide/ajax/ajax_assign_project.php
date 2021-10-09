<?php 
	include('../../config/connect.php');

$project = $_POST['project'];
$leaderid = $_POST['leaderid'];

$query1 = "SELECT * FROM group_allot WHERE project_id != 0 AND leader_id = $leaderid";
	$check = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);	
	
   if($check->num_rows>0){
   	echo "Project is aleady assigned";

   }
   else{

		$query2 = "UPDATE group_allot SET project_id = $project WHERE leader_id = $leaderid";
		$result2 = $mysqli->query($query2) or die($query2."<br>".$mysqli->error);
		if($result2){
		echo "Project alloted to group";
		}
		else{
		echo "Error occured! Please try again";
		}
   }


 ?>