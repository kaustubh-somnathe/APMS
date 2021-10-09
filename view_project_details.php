<?php 
  session_start();
  $id = session_id(); 
  if($_SESSION['id'] != $id){
    session_destroy();
    header("location: login.php");
    exit();
  } 
Include('config/connect.php');
$user_id = $_SESSION['user_id'];
$query = "UPDATE users SET loggedin = NOW() WHERE id ='$user_id'";
$result = $mysqli->query($query) or die($query."<br>".$mysqli->error);

$query = "SELECT * FROM project_uploads WHERE student_id ='$user_id'";
$projectData = $mysqli->query($query) or die($query."<br>".$mysqli->error);

$query1 ="SELECT group_id FROM project_group WHERE user_id = $user_id";
$GroupData = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);
$groupData = $GroupData->fetch_assoc();
$group_id = $groupData['group_id'];

$query2 ="SELECT p.user_id, g.project_id FROM project_group p INNER JOIN group_allot g ON p.user_id = g.leader_id WHERE p.group_id = $group_id AND p.is_leader=1";
$LeaderQuery = $mysqli->query($query2) or die($query2."<br>".$mysqli->error);
$LeaderData = $LeaderQuery->fetch_assoc();
$project_id = $LeaderData['project_id'];
$project_leader_id = $LeaderData['user_id'];



$query = "SELECT * FROM project_uploads WHERE student_id ='$project_leader_id'";
$projectData = $mysqli->query($query) or die($query."<br>".$mysqli->error);


 ?><!DOCTYPE html><html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:21 GMT -->
<head>
<meta charset="utf-8" /> 
<title>Scale | Web Application</title>
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
          <a href="home.php" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">ASP</span></a> 
          <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>  
             <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">

             <li class="dropdown"> 
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
             <span class="thumb-sm avatar pull-left"> <img src="images/profile/<?php echo $_SESSION['profile']?>" alt="..."> 
             </span><?php echo $_SESSION['username']?><b class="caret"></b> </a>
              <ul class="dropdown-menu animated fadeInRight"> 
               
                 <li class="divider"></li> 
                 <li> <a href="logout.php">Logout</a> 
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
                   <span class="thumb avatar pull-left m-r"> <img src="images/profile/<?php echo $_SESSION['profile']?>" class="dker" alt="...">
                    <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> 
                    <strong class="font-bold text-lt"><?php echo $_SESSION['username']?></strong> <b class="caret"></b> </span>
                     <span class="text-muted text-xs block">Student</span>
                      </span> </a>
                       <ul class="dropdown-menu animated fadeInRight m-t-xs"> 
                        <li class="divider"></li> 
                          <li> <a href="logout.php">Logout</a> 
                          </li> </ul> </div> </div> <!-- nav --> <nav class="nav-primary hidden-xs"> 
                          <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div> 
                          <ul class="nav nav-main" data-ride="collapse"> 
                          <li><a href="view_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">View Project</span> </a> 
                          </li>
                          <li><a href="javascript:void(0)" class="auto" id="viewgrp"> <i class="i i-statistics icon"> </i> <span class="font-bold">View Group</span> </a> 
                          </li>
                          <li><a href="reference.php" class="auto" id="viewgrp"> <i class="i i-statistics icon"> </i> <span class="font-bold">Reference</span> </a> 
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
                               <div class="col-sm-9 col-sm-offset-1" id="displayResult"> 
                                <section class="panel panel-default"> 
                                  <header class="panel-heading font-bold">Uploaded Project</header> 
                                <div class="panel-body"> 
                                 <table class="table table-striped b-t b-light">
                                   <tr>
                                   <th>Sr. No.</th>
                                     <th>Project file Name</th>
                                     <th>Project Description</th>
                                     <th>Uploaded Time</th>
                                     <th>Action</th>
                                     <th>Status</th>
                                   </tr>

                                   <?php  $i =1; while ($ProjData = $projectData->fetch_assoc()){?>
                                   <tr>
                                     <td><?php echo $i;?></td>
                                     <td><?php echo $ProjData['project_file_name'];?></td>
                                     <td><?php echo $ProjData['project_description'];?></td>
                                     <td><?php echo $ProjData['created'];?></td>
                                     <td>
                                     <a href="projects/2016/<?php echo $ProjData['project_file_name'];?>" class="btn btn-warning btn-sm">Download</a>
                                     </td>
                                     <td>
                                       <?php if($ProjData['is_approved']){?>
                                       <p>Approved</p>
                                        <?php } else{?>
                                        <p>Pending</p>
                                          <?php }?>
                                     </td>
                                   </tr>
                                   <?php $i++;} ?>
                                 </table>
                                 </div> </section>
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
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script><script src="js/student.js"></script></body>
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:49 GMT -->
</html>