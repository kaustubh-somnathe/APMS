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

$query3 = "SELECT c.comment, c.created, u.firstname, u.lastname FROM comments c INNER JOIN users u ON c.user_id=u.id WHERE project_id = $project_id ORDER BY c.created DESC";
$comments = $mysqli->query($query3) or die($query3."<br>".$mysqli->error);


$query4 = "SELECT p.*, u.firstname, u.lastname from project_details p inner join users u on p.guide_id = u.id WHERE p.id=$project_id";
$projectquery = $mysqli->query($query4) or die($query4."<br>".$mysqli->error);
$projectDetails = $projectquery->fetch_assoc();
// echo "<pre>";
// print_r($projectquery->fetch_assoc());
// exit();

$query = "SELECT * FROM project_group WHERE user_id = $user_id";
$GroupInfo = $mysqli->query($query) or die($query."<br>".$mysqli->error);
$Groupdata = $GroupInfo->fetch_assoc();


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
                         <?php if($Groupdata['is_leader'] == 1){?>
                          <li class="active"><a href="home.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Upload Project</span> </a> 
                          </li>
                          <?php }?> 
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
                             <section class="hbox stretch"> <section> <section class="vbox"> <section class="scrollable padder"><section class="row m-b-md"> <div class="col-sm-6"> <h3 class="m-b-xs text-black">Dashboard</h3> <small>Welcome back, <?php echo $_SESSION['username']?>, <?php
                                if($_SESSION['login_time']!=0){?>
                                <p>Last logged in: <?php echo $_SESSION['login_time']?></p>
                                <?php }?></small> 
                             </div>
                             </section>
                             <section class="row m-b-md">
                             <div class="row">
                               <div class="col-sm-6 col-sm-offset-2">
                               <section class="panel panel-default"> <header class="panel-heading"><h4>Project Information</h4></header>

                                 <table class="table table-striped m-b-none">
                                 <tr>
                                 <td>Project Name: </td>
                                 <td><?php echo $projectDetails['project_name']?></td>
                                 </tr>
                                 <tr>
                                 <td>Project Description: </td>
                                 <td><?php echo $projectDetails['project_description']?></td>
                                 </tr>
                                 <tr>
                                 <td>Project Domain: </td>
                                 <td><?php echo $projectDetails['project_domain']?></td>
                                 </tr>
                                 <tr>
                                 <td>Start Date: </td>
                                 <td><?php echo $projectDetails['start_date']?></td>
                                 </tr>
                                 <tr>
                                 <td>End Date: </td>
                                 <td><?php echo $projectDetails['end_date']?></td>
                                 </tr>
                                 <tr>
                                 <td>Guide Name: </td>
                                 <td><?php echo $projectDetails['firstname']." ".$projectDetails['lastname']?></td>
                                 </tr>
                                 <tr>
                                 <td>End Date: </td>
                                 <td><?php echo $projectDetails['end_date']?></td>
                                 </tr>
                                 <tr>
                                   <td><a href="view_project_details.php" class="btn btn-info">View Project</a></td>
                                 </tr>
                                 </table>
                                 </section>
                               </div>
                             </div>
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
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script><script src="js/student.js"></script></body>
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:49 GMT -->
</html>