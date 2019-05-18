<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

$ress = mysql_query("SELECT * FROM earnings");
if(isset($_GET['show'])){
   $id = $_GET['show'];
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
    <link rel="stylesheet" href="datacss.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
  </head>


  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 0.5rem;">

   <a class="navbar-brand" href="#">PAYSLIP</a>
<div class="collapse navbar-collapse">
     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<li class="nav-item active"><a class="nav-link" href="payslip.php">Return to Pay list<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="logout.php?logout">&nbsp;<b>Leave form</b></a></li>
     </ul>
    </div>
    </nav>

<div class="container" >

<div class="bio">
  

  <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt="" width="72" height="72"></div>
  <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br></span> ADO-EKITI PAYSLIP FOR THE MONTH OF <?php echo $row[month]?></div>

<div class="container"> 
     <h1 class="h1 mb-3 holder-sm">Biodata</h1>
<div class="table-responsive">
    <table class="table table-striped">
  <tr class="bd-list">
    <td>Name:</td><td><?php echo $row[status].". ".$row[fname]?></td>
  </tr>

   <tr class="bd-list">
    <td>Bank:</td><td><?php echo $row[bank]?></td>
  </tr>

  <tr class="bd-list">
  <td>Account number:</td><td><?php echo $row[accno]?></td>
  </tr>

  <tr class="bd-list">
    <td>GL:</td><td><?php echo $row[gl]?></td>
  </tr>
 
  <tr class="bd-list">
    <td>Rank:</td><td><?php echo $row[rank]?></td>
  </tr>

  <tr class="bd-list">
    <td>Email:</td><td><?php echo $row[email]?></td>
  </tr>
    </table>
 </div>
</div>
</div>

           <h1>Recipients' Balance sheet</h1>
<!-- RECEIPT TABLE FORMAT -->
<div class="row balance-sheet">

<div class="col-md-6" style="background: white;">
  <h1 class="heading"> Earnings</h1>

 <div class="table-responsive">
    <table class="table table-striped">
<tr><th>Income</th><th>Amount<br>(Naira)</th></tr>

<tr><td>BASIC SALARY</td><td><?php echo $row[bs]?></td></tr>

<tr><td>RENT ALLOWANCE</td><td><?php echo $row[ra]?></td></tr>

<tr><td>TEACHING ALLOWANCE</td><td><?php echo $row[ta]?></td></tr>

<tr><td>NON-CLINICAL ALLOWANCE</td><td><?php echo $row[nca]?></td></tr>

<tr><td>CLINICAL ALLOWANCE</td><td><?php echo $row[ca]?></td></tr>

<tr><td>HAZZARD ALLOWANCE</td><td><?php echo $row[ha]?></td></tr>

<tr><td>SHIFT ALLOWANCE</td><td><?php echo $row[sa]?></td></tr>

<tr><td>NEWSPAPER ALLOWANCE</td><td><?php echo $row[na]?></td></tr>

<tr><td>SPECIALIST ALLOWANCE</td><td><?php echo $row[spa]?></td></tr>

<tr><td>UTILITY ALLOWANCE</td><td><?php echo $row[uta]?></td></tr>

<tr><td>CALL DUTY ALLOWANCE</td><td><?php echo $row[cda]?></td></tr>

<tr><td>GOVT. CONT. PENSION</td><td><?php echo $row[gcp]?></td></tr>

<tr><td>OVERTIME</td><td><?php echo $row[ot]?></td></tr>

<tr><td>ARREARS</td><td><?php echo $row[arr]?></td></tr>

<tr><td><br></td></tr>

<tr> <td>GROSS PAY</td> <td><?php echo $row[gp]?></td> </tr>
</table>

</div>
  </div>



<div class="col-md-6" style="background: white;">
  <h1 class="heading">Deductions</h1>
   <div class="table-responsive">
    <table class="table table-striped">
<tr><th>Expenditure</th><th>Amount<br>(Naira)</th></tr>

<tr><td>TAX</td><td><?php echo $row[tax]?></td></tr>

<tr><td>MOTOR VEHICLE LOAN</td><td><?php echo $row[mvl]?></td></tr>

<tr><td>TEACHING ALLOWANCE</td><td><?php echo $row[tal]?></td></tr>

<tr><td>HOUSING LOAN</td><td><?php echo $row[hol]?></td></tr>

<tr><td>WEMA BANK SHARES</td><td><?php echo $row[wbs]?></td></tr>

<tr><td>HOUSE OFFICER'S RENT</td><td><?php echo $row[hor]?></td></tr>

<tr><td>SALARY ADVANCE</td><td><?php echo $row[sad]?></td></tr>

<tr><td>OVERPAYMENT</td><td><?php echo $row[ovp]?></td></tr>

<tr><td>SUB CHARGE</td><td><?php echo $row[sch]?></td></tr>

<tr><td>CONTRIBUTORY P.SCHEME</td><td><?php echo $row[cps]?></td></tr>

<tr><td align="center">CT & CS</td><td><?php echo $row[csone]?></td></tr>

<tr><td align="center">CT & CS</td><td><?php echo $row[cstwo]?></td></tr>

<tr><td align="center">CT & CS</td><td><?php echo $row[csthree]?></td></tr>
<tr><td>UNION DUES</td><td><?php echo $row[uduone]?></td></tr>

<tr><td>UNION DUES</td><td><?php echo $row[udutwo]?></td></tr>

<tr><td>TOTAL DEDUCTION</td><td><?php echo $row[tde]?></td></tr>

<tr><td><br></td><td><br></td></tr>

<tr><td>NET PAY</td><td><?php echo $row[npay]?></td></tr>
</table>
</div>
</div>
 </div>

        <button class="btn btn-lg btn-primary btn-block submit" type="" name="btn-signup"><br></button>
 



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</div>
  </body>
</html>

<?php ob_end_flush();?>

