<?php 
  session_start();
  $id = session_id(); 
  if($_SESSION['id'] != $id){
    session_destroy();
    header("location: ../login.php");
    exit();
  } 
Include('../config/connect.php');
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM project_topics";
$projectresult = $mysqli->query($query) or die($query."<br>".$mysqli->error);

$query = "SELECT * FROM users WHERE user_type = 2";
$guideresult = $mysqli->query($query) or die($query."<br>".$mysqli->error);
?>

<!DOCTYPE html><html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:21 GMT -->
<head>
<meta charset="utf-8" /> 
<title>Project Management | Web Application</title>
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
          <a href="index-2.html" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale">
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
           <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search"> <div class="form-group"> <div class="input-group"> <span class="input-group-btn">
            <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button> </span> <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects..."> </div> </div>
             </form> 
             <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">

             <li class="dropdown"> 
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
             <span class="thumb-sm avatar pull-left"> <img src="../images/profile/<?php echo $_SESSION['profile']?>" alt="..."> 
             </span><?php echo $_SESSION['username']?><b class="caret"></b> </a>
              <ul class="dropdown-menu animated fadeInRight"> 
              <li> <span class="arrow top">
              </span> 
              <a href="#">Settings</a> 
              </li> 
              <li> 
              <a href="profile.html">Profile</a>
               </li>
                <li> 
                <a href="#"> 
                <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
                 <li> <a href="docs.html">Help</a> </li> 
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
                     <span class="text-muted text-xs block">Art Director</span>
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
                          <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div> <ul class="nav nav-main" data-ride="collapse"> <li class="active"> <a href="index-2.html" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Overview</span> </a> </li> <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <b class="badge bg-danger pull-right">4</b> <i class="i i-stack icon"> 
                          </i> <span class="font-bold">Layouts</span> </a> <ul class="nav dk"> <li > <a href="layout-color.html" class="auto"> <i class="i i-dot"></i> <span>Color option</span> </a> </li>
                           <li > <a href="layout-hbox.html" class="auto"> <i class="i i-dot"></i> <span>Hbox layout</span> </a> </li> <li > <a href="layout-boxed.html" class="auto"> <i class="i i-dot"></i> <span>Boxed layout</span> </a> </li> <li > <a href="layout-fluid.html" class="auto"> <i class="i i-dot"></i> <span>Fluid layout</span> </a> </li> </ul> </li> <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">UI kit</span> </a> <ul class="nav dk"> <li > <a href="buttons.html" class="auto"> <i class="i i-dot"></i> <span>Buttons</span> </a> </li> <li > <a href="icons.html" class="auto"> <b class="badge bg-info pull-right">3</b> <i class="i i-dot"></i> <span>Icons</span> </a> </li> <li > <a href="grid.html" class="auto"> <i class="i i-dot"></i> <span>Grid</span> </a> </li> <li > <a href="widgets.html" class="auto"> <b class="badge bg-dark pull-right">8</b> <i class="i i-dot"></i> <span>Widgets</span> </a> </li> <li > <a href="components.html" class="auto"> <i class="i i-dot"></i> <span>Components</span> </a> </li> <li > <a href="list.html" class="auto"> <i class="i i-dot"></i> <span>List group</span> </a> </li> <li > <a href="#table" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-dot"></i> <span>Table</span> </a> <ul class="nav dker"> <li > <a href="table-static.html"> <i class="i i-dot"></i> <span>Table static</span> </a> </li> <li > <a href="table-datatable.html"> <b class="label bg-dark pull-right">1.10</b> <i class="i i-dot"></i> <span>Datatable</span> </a> </li> </ul> </li> <li > <a href="#form" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-dot"></i> <span>Form</span> </a> <ul class="nav dker"> <li > <a href="form-elements.html"> <i class="i i-dot"></i> <span>Form elements</span> </a> </li> <li > <a href="form-validation.html"> <i class="i i-dot"></i> <span>Form validation</span> </a> </li> <li > <a href="form-wizard.html"> <i class="i i-dot"></i>
                            <span>Form wizard</span> </a> </li> </ul> </li> <li > <a href="chart.html" class="auto"> <i class="i i-dot"></i> <span>Chart</span> </a> </li> <li > <a href="portlet.html" class="auto"> <i class="i i-dot"></i> <span>Portlet</span> </a> </li> <li > <a href="timeline.html" class="auto"> <i class="i i-dot"></i> <span>Timeline</span> </a> </li> </ul> </li> <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-docs icon"> </i> <span class="font-bold">Pages</span> </a> <ul class="nav dk"> <li > <a href="profile.html" class="auto"> <i class="i i-dot"></i> <span>Profile</span> </a> </li> <li > <a href="profile-2.html" class="auto"> <i class="i i-dot"></i> <span>Profile 2</span> </a> </li> <li > <a href="search.html" class="auto"> <i class="i i-dot"></i> <span>Search</span> </a> </li> <li > <a href="invoice.html" class="auto"> <i class="i i-dot"></i> <span>Invoice</span> </a> </li> <li > <a href="intro.html" class="auto"> <i class="i i-dot"></i> <span>Intro</span> </a> </li> <li > <a href="master.html" class="auto"> <i class="i i-dot"></i> <span>Master</span> </a> </li> <li > <a href="gmap.html" class="auto"> <i class="i i-dot"></i> <span>Google Map</span> </a> </li> <li > <a href="jvectormap.html" class="auto"> <i class="i i-dot"></i> <span>Vector Map</span> </a> </li> <li > <a href="signin.html" class="auto"> <i class="i i-dot"></i> <span>Signin</span> </a> </li> <li > <a href="signup.html" class="auto"> <i class="i i-dot"></i> <span>Signup</span> </a> </li> <li > <a href="404.html" class="auto"> <i class="i i-dot"></i> <span>404</span> </a> </li> </ul> </li> <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Apps</span> </a> <ul class="nav dk"> <li > <a href="mail.html" class="auto"> <b class="badge bg-success lt pull-right">2</b> <i class="i i-dot"></i> <span>Mailbox</span> </a> </li> <li > <a href="fullcalendar.html" class="auto"> <i class="i i-dot"></i> <span>Calendar</span> </a> </li> <li > <a href="project.html" class="auto"> <i class="i i-dot"></i> <span>Project</span> </a> </li> <li > <a href="media.html" class="auto"> <i class="i i-dot"></i> <span>Media</span> </a> </li> <li > <a href="chat.html" class="auto"> <i class="i i-dot"></i> <span>Chat</span> </a> </li> <li > <a href="contacts.html" class="auto"> <i class="i i-dot"></i> <span>Contacts</span> </a> </li> <li > <a href="note.html" class="auto"> <i class="i i-dot"></i> <span>Note</span> </a> </li> </ul> </li> </ul> 

                            <div class="line dk hidden-nav-xs"></div>  </nav> <!-- / nav --> </div> </section> 
                            <footer class="footer hidden-xs no-padder text-center-nav-xs"> 
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
                             </section> </aside> <!-- /.aside --> 
                             <section id="content"> 
                             <section class="hbox stretch"> <section> <section class="vbox"> <section class="scrollable padder"><section class="row m-b-md"> <div class="col-sm-6"> <h3 class="m-b-xs text-white">Dashboard</h3> <small>Welcome back, <?php echo $_SESSION['username']?>, <?php
                                if($_SESSION['login_time']!=0){?>
                                <p>Last logged in: <?php echo $_SESSION['login_time']?></p>
                                <?php }?></small> 
                             </div>
                             </section>
                             <section class="row m-b-md">
                           <div class="row">
                              <div class="col-md-6">
                              <div class="col-md-4">
                                <label>Select Guide</label>
                                  <select id="guidename" class="form-control">
                                    <?php while ($guides = $guideresult->fetch_assoc()){?>
                                     <option value="<?php echo $guides['id'];?>"><?php echo $guides['firstname']." ".$guides['lastname']?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                              <div class="col-md-5">
                                  <label>Select Project</label>
                                <select id="projectname" class="form-control">
                                  <?php while ($projects = $projectresult->fetch_assoc()){?>
                                    <option value="<?php echo $projects['id'];?>"><?php echo $projects['project_name']?></option>
                                  <?php } ?>
                                </select>
                              </div>
                                <button id="addguide" class="btn btn-sm btn-warning">Add</button>         
                              </div>
                              <div class="col-md-6">
                                <p id="result" class="bg-primary"></p>
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
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script><script src="js/admin.js"></script></body>
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:49 GMT -->
</html>