<!DOCTYPE html><html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:13:51 GMT -->
<head> <meta charset="utf-8" /> <title>PROJECT MANAGEMENT | Web Application</title> 
	<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
	 <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> 
	 <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
	 	 <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="" >
	 <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
	  <div class="container aside-xl"> <a class="navbar-brand block" href="register.html">Project Management System</a>
	   <section class="m-b-lg"> <form action="register_add.php" method="POST" enctype="multipart/form-data">
<div class="list-group"> 
<div class="list-group-item"><input placeholder="Firstname" class="form-control no-border" name="firstname" required>
</div> 
<div class="list-group-item">
	<input type="text" placeholder="Lastname" class="form-control no-border" name="lastname" required>
</div><div class="list-group-item"> <input type="email" placeholder="Email" class="form-control no-border" name="email" required></div>
<div class="list-group-item"> <input type="password" placeholder="Password" class="form-control no-border" name="password" required></div>

<div class="list-group-item">
		<select name="user_type" class="form-control no-border" id="roles" required>
			<option value="1">Admin</option>
			<option value="2">Guide</option>
			<option value="3">Student</option>
		</select>
</div>
<div class="list-group-item" id="avg">
		<input type="number" placeholder="Average Percentage" class="form-control no-border" name="avgmark">
</div>
	<div class="list-group-item"> <input class="form-control no-border" type="file" name="file" required="required" id="image">
	</div>
 </div>

 <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button> <div class="line line-dashed"></div> <p class="text-muted text-center">
<a href="reference.php" class="btn btn-lg btn-default btn-block">Reference User</a>
<small>Already have an account?</small></p> <a href="login.php" class="btn btn-lg btn-default btn-block">Sign in</a> </form> </section> </div> </section> <!-- footer --> <footer id="footer"> <div class="text-center padder clearfix"> <p> <small>ASP &copy; 2013</small> </p> </div> </footer> <!-- / footer --> <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/app.plugin.js"></script>
<script type="text/javascript">
	$('#avg').hide();
	$('#avg').val('');
	$( "#roles" ).change(function() {
  	  value = $(this).val();
  	  if(value == 3){
  	  	$('#avg').show();
  	  }
  	  else{
  	  	$('#avg').hide();
		$('#avg').val('');
  	  }
});
</script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:13:51 GMT -->
</html>