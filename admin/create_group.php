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

$query = "SELECT * FROM users WHERE user_type = 3";
$userresult = $mysqli->query($query) or die($query."<br>".$mysqli->error);
$student_details = $userresult->fetch_assoc();
$total_studen = $userresult->num_rows;
$total_student = $total_studen-1;
$query1 = "SELECT * FROM project_details";
$projectdata = $mysqli->query($query1) or die($query1."<br>".$mysqli->error);

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
 <body class=""  >
  <section class="vbox"> <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow"> 
    <div class="navbar-header aside-md dk">
      <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
        <i class="fa fa-bars"></i> </a> 
          <a href="dashboard.php" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">ASP</span></a> 
          <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div> <ul class="nav navbar-nav hidden-xs"> <li class="dropdown"> 
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <i class="i i-grid"></i> </a> <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft"> <div class="row m-l-none m-r-none m-t m-b text-center"> <div class="col-xs-4"> <div class="padder-v"> 
       <a href="#"> 
       <span class="m-b-xs block">
        <i class="i i-mail i-2x text-primary-lt">
       </i> </span> <small class="text-muted">Mailbox</small> </a> </div> </div> <div class="col-xs-4">
        <div class="padder-v"> 
        <a href="#"> 
        <span class="m-b-xs block"> 
        <i class="i i-calendar i-2x text-danger-lt"></i> 
        </span> 
        <small class="text-muted">Calendar</small> </a> </div> </div> <div class="col-xs-4"> <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a> </div> </div> <div class="col-xs-4"> 
        <div class="padder-v"> <a href="#"> 
        <span class="m-b-xs block"> 
        <i class="i i-paperplane i-2x text-info-lt"></i> </span> 
        <small class="text-muted">Trainning</small> </a> 
        </div> 
        </div>
         <div class="col-xs-4">
          <div class="padder-v"> 
            <a href="#"> <span class="m-b-xs block">
            <i class="i i-images i-2x text-muted"></i> </span> 
            <small class="text-muted">Photos</small> 
            </a>
          </div> 
           </div> 
           <div class="col-xs-4"> 
           <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i>
            </span>
             <small class="text-muted">Timeline</small> 
             </a> 
           </div>
           </div> 
           </div> 
           </section> 
           </li>
            </ul> 
            
             <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">

             <li class="dropdown"> 
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
             <span class="thumb-sm avatar pull-left"> <img src="../images/profile/<?php echo $_SESSION['profile']?>" alt="..."> 
             </span><?php echo $_SESSION['username']?><b class="caret"></b> </a>
              <ul class="dropdown-menu animated fadeInRight"> 
              
                 <li class="divider"></li> 
                 <li> <a href="../logout.php" >Logout</a> 
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
                     </span> </a>
                       <ul class="dropdown-menu animated fadeInRight m-t-xs"> 
                        <li class="divider"></li> 
                          <li> <a href="../logout.php" >Logout</a> 
                          </li> </ul> </div> </div> <!-- nav --> <nav class="nav-primary hidden-xs"> 
                          <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div> 
                          <ul class="nav nav-main" data-ride="collapse"> 
                          <li><a href="verifyusers.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Verify Users</span> </a> 
                          </li>
                          <li><a href="createproject.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Create Project</span> </a> 
                          </li>
                          <li><a href="assign_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Assign Project</span> </a> 
                          </li>
                          <li><a href="create_group.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Create Group</span> </a> 
                          </li>
                           <li><a href="view_group.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">View Group</span> </a> 
                          </li>
                          <li><a href="allot_guide.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Allot Guide</span> </a> 
                          </li>
                          <li><a href="allot_student.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Allot Student</span> </a> 
                          </li>
                          </li>
                          <li><a href="leader.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Leader</span> </a> 
                          </li>
                            <li><a href="student.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Students</span> </a> 
                          </li>
                          <li><a href="reference.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Reference</span> </a> 
                          </li>
                          </ul>  


                            <div class="line dk hidden-nav-xs"></div>  </nav> <!-- / nav --> </div> </section> 
                            <footer class="footer hidden-xs no-padder text-center-nav-xs"> 
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
                             </section> </aside> <!-- /.aside --> 
                             <section id="content"> 
                             <section class="hbox stretch"> <section> <section class="vbox"> <section class="scrollable padder"><section class="row m-b-md"> <div class="col-sm-6"> <h3 class="m-b-xs text-white">Add Students to Group</h3> <small>Welcome back, <?php echo $_SESSION['username']?>, <?php
                                if($_SESSION['login_time']!=0){?>
                                <p>Last logged in: <?php echo $_SESSION['login_time']?></p>
                                <?php }?></small> 
                             </div>
                             </section>
                             <section class="row m-b-md">
                             <div class="col-md-3 col-md-offset-1">
                                <label>Total Student <?php echo $total_student?></label>
                                <select class="form-control no-border"> 
                                <?php while ($student_details = $userresult->fetch_assoc()){
                                     
                                     echo "<option>".$student_details['firstname']." ".$student_details['lastname']." ".$student_details['avgmarks']."%</option>";
                                    } ?>                              
                                </select>
                                </div>
                                <div class="col-md-3">
                                <label>Students per groups</label>
                                  <input type="number" value="5" class="form-control" max="10" min="4" id="users_per_group">

                                </div>
                                <div class="col-md-3">
                                <label></label>
                                <button class="btn btn-warning form-control" id="createGroup">Create Group</button>
                                </div>
                                <div class="col-md-6">
                                  <h5 id="result" class="bg-primary"></h5>
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
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script><script src="js/admin.js"></script>
                               <script src="js/jquery.multiselect.js"></script>
  </body>
</html>