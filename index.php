<?php session_start(); ?>  
<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>ITEK14A - Test!!</title>
		<meta name="kennj.com" content="ITEK14A" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        <div class="navbar-header">
          
          <a href="#" class="navbar-brand">ITEK14A - Test</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          <i class="glyphicon glyphicon-search"></i>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
        </div>	
     </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
                        <?php
            if (!$_SESSION['test']) { 
               echo "<li><a href='#loginModal' role='button' data-toggle='modal'>Start Test</a></li>";
            } else { echo "<li><a href='logout.php'>Quit</a></li>"; }
            ?>
           </ul>
        </div>	
     </div>	
</div>
<div class="container" id="main">
  	<div class="row">
             <hr>
            <?php
            if (!$_SESSION['test']) {
                echo "
                <div class='col-md-11 col-md-offset-1'>
                <div class='alert alert-info alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Heads up!</strong> You need to Start the test click Start Test in the top right corner!.
                </div>
                </div>";
            }
            if ($_SESSION['test'] == "done") {
              getTop($dbh,$_SESSION['username']);
          }
            ?> 
     <div class="col-md-9 col-sm-9 col-sm-offset-2">
         <?php 
          if ($_SESSION['test'] == "on") {
              echo "<form method='Post' action='answers.php'>";
              getQuestions($dbh); 
              echo" <button class='btn btn-info' type='submit'>Submit Answers</button>
         </form>";
          }
          if ($_SESSION['test'] == "done") {
              getResults($dbh,$_SESSION['username']);
          }
         ?>
     </div>
    <div class="clearfix"></div>
      
    <hr>
    <div class="col-md-12 text-center"><p><br><a href="#">ITEK14A - Test - Because why not?</a></p></div>
    <hr>
    
  </div>
</div>
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span></span><br>Start Test</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="starttest.php">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Start Test</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
