<?php 
  session_start();
  $id = session_id(); 
  if($_SESSION['id'] != $id){
    session_destroy();
    header("location: login.php");
    exit();
  } 
Include('../config/connect.php');
$user_id = $_SESSION['user_id'];
$project_id = $_GET['pid'];
$query = "UPDATE users SET loggedin = NOW() WHERE id ='$user_id'";
$result = $mysqli->query($query) or die($query."<br>".$mysqli->error);

$query = "SELECT p.project_file_name, p.project_description, p.created, p.id FROM group_allot g INNER JOIN project_uploads p ON g.leader_id=p.student_id WHERE project_id ='$project_id' AND is_approved=0";
$projectData = $mysqli->query($query) or die($query."<br>".$mysqli->error);

$query1 = "SELECT c.comment, c.created, u.firstname, u.lastname FROM comments c INNER JOIN users u ON c.user_id=u.id WHERE project_id = $project_id ORDER BY c.created DESC";
$comments = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);

$query3 = "SELECT leader_id FROM group_allot WHERE project_id = $project_id";
$LeaderData = $mysqli->query($query3) or die($query3."<br>".$mysqli->error);
$LeaderResult = $LeaderData->fetch_assoc();
$leader_id = $LeaderResult['leader_id'];

$query2 = "SELECT percentage FROM project_details WHERE id=$project_id";
$approve = $mysqli->query($query2) or die($query2."<br>".$mysqli->error);
$approveData = $approve->fetch_assoc();
$approveData = $approveData['percentage'];



 ?><!DOCTYPE html><html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:21 GMT -->
<head>
<meta charset="utf-8" /> 
<title>ASP | Web Application</title>
 <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
 <link rel="stylesheet" href="css/app.v1.css" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="css/style.css" />
 <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" /> 
 <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js">
 </script> <script src="js/ie/excanvas.js"></script> <![endif]--></head>
 <body class="" >
  <section class="vbox"> <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow"> 
    <div class="navbar-header aside-md dk">
      <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
        <i class="fa fa-bars"></i> </a> 
          <a href="dashboard.php" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">ASP</span></a> 
          <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div> 
             
             <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user"><li class="dropdown"> 
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
             <span class="thumb-sm avatar pull-left"> <img src="../images/profile/<?php echo $_SESSION['profile']?>" alt="..."> 
             </span><?php echo $_SESSION['username']?><b class="caret"></b> </a>
              <ul class="dropdown-menu animated fadeInRight"> 
                               <li class="divider"></li> 
                 <li> <a href="../logout.php">Logout</a> 
                 </li>
                  </ul> 
                  </li>
                  </ul>
                  </header> 
                  <section> 
                  <section class="hbox stretch"> 
                  <!-- .aside --> <aside class="bg-black aside-md hidden-print hidden-xs" id="nav"> 
                  <section class="vbox">
                   <section class="w-f scrollable"> 
                   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> <div class="clearfix wrapper dk nav-user hidden-xs"> 
                   <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                   <span class="thumb avatar pull-left m-r"> <img src="../images/profile/<?php echo $_SESSION['profile']?>" class="dker" alt="...">
                    <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> 
                    <strong class="font-bold text-lt"><?php echo $_SESSION['username']?></strong> <b class="caret"></b> </span>
                     <span class="text-muted text-xs block">Lecturer</span>
                      </span> </a>
                       <ul class="dropdown-menu animated fadeInRight m-t-xs"> 
                       <li> <span class="arrow top hidden-nav-xs"></span> 
                       <a href="#">Settings</a> </li>
                        <li> 
                        <a href="profile.html">Profile</a>
                         </li>
                          <li> 
                          <a href="#"> 
                          <span class="badge bg-danger pull-right">3</span> Notifications </a> </li> 
                          <li> <a href="docs.html">Help</a> </li> <li class="divider"></li> 
                          <li> <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a> 
                          </li> </ul> </div> </div> <!-- nav --> <nav class="nav-primary hidden-xs"> 
                          <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div> 
                          <ul class="nav nav-main" data-ride="collapse"> 
                          <li class="active"><a href="createproject.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Create Project</span> </a> 
                          </li>
                          <li><a href="assign_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Assign Project</span> </a> 
                          </li>
                          <li><a href="view_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">View Project</span> </a> 
                          </li>
                          <li><a href="reference.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Reference</span> </a> 
                          </li>
                          </ul> 
                            <div class="line dk hidden-nav-xs"></div>  </nav> <!-- / nav --> </div> </section> 
                            <footer class="footer hidden-xs no-padder text-center-nav-xs"> 
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
                             </section> </aside> <!-- /.aside --> 
                             <section id="content"> 
                             <input type="hidden" value="<?php echo $user_id?>" name="user_id" id="user_id">
                             <section class="hbox stretch"> <section> <section class="vbox"> <section class="scrollable padder"><section class="row m-b-md"> <div class="col-sm-6"> <h3 class="m-b-xs text-white">Dashboard</h3> <small>Welcome back, <?php echo $_SESSION['username']?>, <?php
                                if($_SESSION['login_time']!=0){?>
                                <p>Last logged in: <?php echo $_SESSION['login_time']?></p>
                                <?php }?></small> 
                             </div>
                             </section>
                             <section class="row m-b-md">
                              <div class="row"> 
                              <div class="col-md-6 col-md-offset-3">
                                
                              <div class="form-group">
                                <h2>Project Status</h2>
                                <div class="inline text-center"> <div class="easypiechart" data-percent="<?php echo $approveData?>" data-bar-color="#fcc633" data-line-width="4" data-loop="false" data-scale-color="#fff" data-rotate="0" data-size="100"> <div> <span class="step"><?php echo $approveData?></span>% </div> </div> <p class="text-warning font-bold">data</p> </div> 
                                <!-- <div class="inline text-center"> <div class="easypiechart" data-percent="35" data-bar-color="#177bbb" data-line-width="4" data-loop="false" data-scale-color="#fff" data-rotate="0" data-size="100"> <div> <span class="step">35</span>% </div> </div> <p class="text-primary font-bold">info</p> </div>  -->
                              </div>
                              <div class="form-group col-md-6">
                              <input type="text" class="form-control col-sm-4" placeholder="Update Percentage" id="updatedPercentage">
                              </div>
                              <div class="col-md-6">
                              <p><button class="btn btn-primary" onclick="updatePercentage(<?php echo $project_id?>)">Update</button></p>
                              </div>
                              </div>
                              </div>
                               <?php while($data=$projectData->fetch_assoc()){?>
                                 <div class="row" id="row<?php echo $data['id']?>">
                             <div class="col-sm-6 col-sm-offset-2" id="inside<?php echo $data['id']?>"> 
                                <p><b>Project File Name: <?php echo $data['project_file_name'];?></b></p>
                                <p>Project Description: <?php echo $data['project_description'];?></p>
                                <small>Uploaded at: <?php echo $data['created'];?></small>
                                
                               <p><button onclick="approve(<?php echo $data['id']?>);" class="btn btn-sm btn-success">Approve</button>
                               <a href="../projects/2016/<?php echo $data['project_file_name'];?>" class="btn btn-warning btn-sm">Download</a>
                               </p>
                              </div>
                             </div>
                             <br/>
                             <hr/>
                              <?php }?>
                              <div class="row">
                            <div class="col-sm-6 col-sm-offset-2" >
                              <article class="comment-item media" id="comment-form"> <p> </p><section class="media-body"> <div class="m-b-none"> <div class="input-group"> <input id="comment" type="text" class="form-control" placeholder="Input your comment here"> <span class="input-group-btn"> <button class="btn btn-primary" onclick="comment(<?php echo $project_id?>)">POST</button> </span></div></div> </section> </article>
                              <br/>
                            <?php while($data1=$comments->fetch_assoc()){?>
                           <div class="tab-content"> <div class="panel tab-pane active " id="activities"> <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border" > <li class="list-group-item"> <a href="#" class="thumb-sm pull-left m-r-sm"> <img src="../images/profile/<?php echo $_SESSION['profile']?>" class="img-circle"> </a> <a href="#" class="clear"> <small class="pull-right"><?php echo $data1['created'];?></small> <strong class="block"><?php echo $data1['firstname']." ".$data1['lastname']?></strong> <small><?php echo $data1['comment'];?> </small> </a> </li>
                              </ul>
                              </div>
                              </div>
                              <?php }?>
                            </div>
                           </div>
                             
                           </section> 
                             </section>
                             </section>
                             </section>
                             </section>
                             </section>
                             </section>
                             </section>
                             </section>
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script><script src="js/guide.js"></script></body>

</html>