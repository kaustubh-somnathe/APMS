<?php 
 include('config/connect.php');
$fname =  $_POST['firstname'];
$lname =  $_POST['lastname'];
$email =  $_POST['email'];
$pass  =  $_POST['password'];
$user_type  =  $_POST['user_type'];
$avgmark  =  $_POST['avgmark'];
$status = 0;

$filename  = $_FILES['file']['name'];
$tmp_name  = $_FILES['file']['tmp_name'];
$imageFileType = $_FILES['file']['type'];

if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<a href='login.php'>Login</a>";
   exit();
}
move_uploaded_file($_FILES['file']['tmp_name'], 'images/profile/'.$filename);

$pass = md5($pass);

$check = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($check) or die($check.'<br />'.$mysqli->error);
$row = $result->fetch_row();

if($row > 0){
  echo "<h2>User already exists<a href='register.php'>Register</a></h2>";
  exit();
}
$query = "INSERT INTO users VALUES(NULL, '$fname', '$lname','$email', '$pass','$filename', $user_type, '$avgmark', $status,NOW(), NOW(), NULL)";
$mysqli->query($query) or die($query.'<br />'.$mysqli->error);
$msg = "You have successfully Registerd..Please <a href='register.php'>Login</a> to continue";
 ?>
 <h2><?php  echo $msg?></h2>