<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
$ress = mysql_query("SELECT * FROM earnings");
if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $res= mysql_query("SELECT * FROM earnings WHERE ID='$id'");
   $row= mysql_fetch_array($res);
    
} 
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
    <link href="payslips.css" rel="stylesheet">
  </head>


  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 0.5rem;">

   <img class="logo-img" src="eksuthlogo.png"><div class="navbar-brand" href="#">EKSUTH ADMIN</div>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-lebel="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<li class="nav-item"><a class="nav-link" href="department.php">department<span class="sr-only"></span></a></li>
<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
<li class="nav-item active"><a class="nav-link" href="payslips.php">Full-Reg<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="payslip.php">Go to Pay list</a></li>
<li class="nav-item"><a class="nav-link" href="logoutadmin.php?logout">&nbsp;Log out</a></li>

     </ul>

    </div>
    </nav>
<div class="container bg-dark" >
<div class="bio">
  

  <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt=""></div>
  <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br>
  </span>full data entry section<br>(proceed to Pay list after to view entry)</div>
</div>
<hr>
</div>
    
<div class="container" >

   </div>
 <div class="container">
<p class="tab-list"><br></p>   
<?php
echo "<TABLE class='table-responsive table table-striped' style='font-weight: bold'>";
echo "<TR>"."<th><B>Status</B>"
. "<th><B>Name</B>"
."<th><B>Bank</B>"
."<th><B>GL</B>"
."<th><B>Rank</B>"
. "<th><B>Month</B>"
        . "<th><B>Options</TR>";
while ($row = mysql_fetch_array($ress)){
echo "<TR><TD>".$row["status"];
echo "<TD>".$row["fname"];
echo "<TD>".$row["bank"];
echo "<TD>".$row["gl"];
echo "<TD>".$row["rank"];
echo "<TD>".$row["month"];
echo "<TD><a href=\"data.php?show=$row[ID]\" style='color:' href='#'>View Payslip</a> ";
}
echo "</TABLE>";
?>

<button class="btn btn-lg btn-primary btn-block submit" type="" name="btn-signup"><br></button>

 </div><br>
<!--CLOSURE DESIGN-->

<footer class="footer">
      <div class="footed">
        <span class="text-muted">EKSUTH DATABASE @2019</span>
        <span class="text-muted">@OLATEJU, Victor Daniel</span>
      </div>
    </footer>

</body>
</html>
<?php ob_end_flush(); ?>