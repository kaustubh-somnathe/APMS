<?php 

//--file for reference user

  session_start();
  $id = session_id(); 
  if($_SESSION['id'] != $id){
    session_destroy();
    header("location: login.php");
    exit();
  } 
Include('../config/connect.php');
$user_id = $_SESSION['user_id'];
$query = "UPDATE users SET loggedin = NOW() WHERE id ='$user_id'";
$result = $mysqli->query($query) or die($query."<br>".$mysqli->error);

//create directory
$year = date('Y'); //fetch current year 
$year = $year-1;
// echo $year;
$pathname = "../projects/2013-14";
$filename = scandir($pathname);
// echo "<pre>";
// print_r($filename);
// //number of files
// EXIT();
$numoffiles1 = count($filename);
//Code for 
$pathname2 = "../projects/2014-15";
$filename2 = scandir($pathname2);
$numoffiles2 = count($filename2);

///code for 2015-15

$pathname3 = "../projects/2015-16";
$filename3 = scandir($pathname3);
$numoffiles3 = count($filename3);



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
          <a href="dashboard.php" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">ASP</span></a> 
          <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
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
                          <li class="active"><a href="createproject.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Create Project</span> </a> 
                          </li>
                          <li><a href="assign_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Assign Project</span> </a> 
                          </li>
                          <li><a href="view_project.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">View Group</span> </a> 
                          </li>
                          <li><a href="reference.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Reference</span> </a> 
                          </li>
                          </ul> 


                            <div class="line dk hidden-nav-xs"></div>  </nav> <!-- / nav --> <!-- / nav --> </div> </section> 
                            <footer class="footer hidden-xs no-padder text-center-nav-xs"> 
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
                             </section> </aside> <!-- /.aside --> 
                             <section id="content"> 
                             <section class="hbox stretch"> <section> <section class="vbox"> <section class="scrollable padder"><section class="row m-b-md"> <div class="col-sm-6"> <h3 class="m-b-xs text-white">Project Reference</h3> <small>Welcome Reference User</small> 
                             </div>
                             </section>
                             <section class="row m-b-md">
                             <div class="row">
                              <div class="col-md-5 col-md-offset-4">
                               <div class="form-group">
                               <label for="one">2013-14</label>
                               <input type="radio" id="one" name="project">
                               <label for="two">2014-15</label>
                                <input type="radio" id="two" name="project">
                               <label for="three">2015-16</label>
                               <input type="radio" id="three" name="project">
                               </div>
                             </div>
                             </div>
                             <div class="row" id="r2013">
                               <div class="col-sm-6 col-sm-offset-3"> 
                                <section class="panel panel-default"> 
                                  <header class="panel-heading font-bold">Reference Project 2013-14</header> 
                                <div class="panel-body"> 
                                 <table class="table table-striped b-t b-light">                 
                                  <tr>
                                  <th>Sr No</th>
                                  <th>Project Files</th>
                                  </tr>

                                  <?php
                                  for ($i=2; $i < $numoffiles1; $i++) { 
                                  ?>
                                  <tr>
                                  <td><?php echo $i-1; ?></td>
                                  <td><a target="_blank" href="<?php echo $pathname.'/'.$filename[$i];?>"><?php echo $filename[$i];?> </a>
                                  </td>
                                  </tr>
                                  <?php
                                  }
?>
                                 </table>
                                 </div> </section>
                                </div>
                             </div>

                              <div class="row" id="r2014">
                               <div class="col-sm-6 col-sm-offset-3"> 
                                <section class="panel panel-default"> 
                                  <header class="panel-heading font-bold">Reference Project 2014-15</header> 
                                <div class="panel-body"> 
                                 <table class="table table-striped b-t b-light">                 
                                  <tr>
                                  <th>Sr No</th>
                                  <th>Project Files</th>
                                  </tr>

                                  <?php
                                  for ($i=2; $i < $numoffiles2; $i++) { 
                                  ?>
                                  <tr>
                                  <td><?php echo $i-1; ?></td>
                                  <td><a target="_blank" href="<?php echo $pathname.'/'.$filename2[$i];?>"><?php echo $filename2[$i];?> </a>
                                  </td>
                                  </tr>
                                  <?php
                                  }
?>
                                 </table>
                                 </div> </section>
                                </div>
                             </div>

                             <div class="row" id="r2015">
                               <div class="col-sm-6 col-sm-offset-3"> 
                                <section class="panel panel-default"> 
                                  <header class="panel-heading font-bold">Reference Project 2015-16</header> 
                                <div class="panel-body"> 
                                 <table class="table table-striped b-t b-light">                 
                                  <tr>
                                  <th>Sr No</th>
                                  <th>Project Files</th>
                                  </tr>

                                  <?php
                                  for ($i=2; $i < $numoffiles3; $i++) { 
                                  ?>
                                  <tr>
                                  <td><?php echo $i-1; ?></td>
                                  <td><a target="_blank" href="<?php echo $pathname.'/'.$filename3[$i];?>"><?php echo $filename3[$i];?> </a>
                                  </td>
                                  </tr>
                                  <?php
                                  }
?>
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
                            

                               <!-- Bootstrap --> <!-- App --> <script src="js/app.v1.js"></script> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js"></script> <script src="js/charts/flot/jquery.flot.min.js"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script> <script src="js/charts/flot/jquery.flot.spline.js"></script> <script src="js/charts/flot/jquery.flot.pie.min.js"></script> <script src="js/charts/flot/jquery.flot.resize.js"></script> <script src="js/charts/flot/jquery.flot.grow.js"></script> <script src="js/charts/flot/demo.js"></script> <script src="js/calendar/bootstrap_calendar.js"></script> <script src="js/calendar/demo.js"></script> <script src="js/sortable/jquery.sortable.js"></script> <script src="js/app.plugin.js"></script>
<script>
$(document).ready(function(){
  $('#r2014').hide();
  $('#r2015').hide();
});

  $('#one').click(function(){
     $('#r2013').show();
    $('#r2014').hide();
  $('#r2015').hide();
  });
  $('#two').click(function(){
     $('#r2013').hide();
    $('#r2014').show();
  $('#r2015').hide();
  });
  $('#three').click(function(){
     $('#r2013').hide();
    $('#r2014').hide();
  $('#r2015').show();
  });

</script>

                               </body>
<!-- Mirrored from flatfull.com/themes/scale/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2015 04:12:49 GMT -->
</html>





