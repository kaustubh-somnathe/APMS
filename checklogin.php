<?php 
  include("config/connect.php");
$pass = $_POST['pass'];
$email = $_POST['email'];
$pass = md5($pass);

$query = "SELECT * FROM users WHERE email = '$email' AND password='$pass' AND status=1";
$result = $mysqli->query($query) or die($query."<br>".$mysqli->error);
  if($result->num_rows != 1){ 
       
       header("location: notverified.php");
       exit();
  }
  else{
  	session_start();
  	setcookie('id', session_id());
  	  $row =$result->fetch_assoc();
      $_SESSION['id'] = session_id();
      $_SESSION['username'] = $row['firstname'].' '.$row['lastname'];
      $_SESSION['login_time'] = $row['loggedin'];
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['profile'] = $row['profile_img'];
      $_SESSION['user_type'] = $row['user_type'];
      if($row['user_type'] == 1){
        header("location: admin/dashboard.php");
      }
      elseif($row['user_type'] == 2){
        header("location: guide/dashboard.php");
      }
      else{
         header("location: home.php");
      }
  }
?>