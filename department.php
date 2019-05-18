<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: Login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM payslip WHERE ID=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
  <script src="jquery.js"></script>
  <script src="jquery-ui.js"></script>
    <link href="register.css" rel="stylesheet">
  </head>


  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 0.5rem;">

   <img class="logo-img" src="eksuthlogo.png"><div class="navbar-brand" href="#">EKSUTH ADMIN</div>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-lebel="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<li class="nav-item active"><a class="nav-link" href="department.php">Department<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
<li class="nav-item"><a class="nav-link" href="payslip.php">Go to Pay list</a></li>
<li class="nav-item"><a class="nav-link" href="logoutadmin.php?logout">&nbsp;Log out</a></li>

     </ul>

    </div>
    </nav>

<div class="container" >
<div class="bio">
  

  <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt="" width="72" height="72"></div>
  <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br></span></div>
</div>
<hr>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-9">
<h2 class="descriptionx">Update |<a href="register.php"> Add</a></h2>
</div>
</div>

<div class="row">
<div class="col-md-3">
  <nav class="" style="background-color: white">
     <ul>
     <li ><a href="home.php"><b>Admin</b></a></li>
     <li class="active1"><a href="Tools.php"><b>Audit</b></a></li>
     <li ><a href="register.php"><b>Works</b></a></li>
     <li class="active"><a href="Login.php"><b>Biomedical</b></a></li>
   </ul></nav>  
</div>
  
  <div class="col-md-9">
     <h2 class="descriptionx">Reminder</h2>
  </div>

</div>

   
    
 


    
<!--CLOSURE DESIGN-->

    
    


</body>
</html>
<?php ob_end_flush();?>
