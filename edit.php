<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

$ress = mysql_query("SELECT * FROM payslip");
if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $res= mysql_query("SELECT * FROM payslip WHERE ID='$id'");
   $row= mysql_fetch_array($res);
}
    
 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  $title = $_POST['status'];

  // clean user inputs to prevent sql injections
  $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $bank = trim($_POST['bank']);
  $bank = strip_tags($bank);
  $bank = htmlspecialchars($bank);

  $accno = trim($_POST['accno']);
  $accno = strip_tags($accno);
  $accno = htmlspecialchars($accno);
  
  $gl = trim($_POST['gl']);
  $gl = strip_tags($gl);
  $gl = htmlspecialchars($gl);
  
  $rank = trim($_POST['rank']);
  $rank = strip_tags($rank);
  $rank = htmlspecialchars($rank);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $month = trim($_POST['month']);
  $month = strip_tags($month);
  $month = htmlspecialchars($month);

  // ALL FINANCIAL DATA ENTRIES
  $bs = trim($_POST['bs']);
  $bs = strip_tags($bs);
  $bs = htmlspecialchars($bs);
  
  $ra = trim($_POST['ra']);
  $ra = strip_tags($ra);
  $ra = htmlspecialchars($ra);

  $ta = trim($_POST['ta']);
  $ta = strip_tags($ta);
  $ta = htmlspecialchars($ta);

  $nca = trim($_POST['nca']);
  $nca = strip_tags($nca);
  $nca = htmlspecialchars($nca);

  $ca = trim($_POST['ca']);
  $ca = strip_tags($ca);
  $ca = htmlspecialchars($ca);

  $ha = trim($_POST['ha']);
  $ha = strip_tags($ha);
  $ha = htmlspecialchars($ha);

  $sa = trim($_POST['sa']);
  $sa = strip_tags($sa);
  $sa = htmlspecialchars($sa);

  $na = trim($_POST['na']);
  $na = strip_tags($na);
  $na = htmlspecialchars($na);

  $spa = trim($_POST['spa']);
  $spa = strip_tags($spa);
  $spa = htmlspecialchars($spa);

  $uta = trim($_POST['uta']);
  $uta = strip_tags($uta);
  $uta = htmlspecialchars($uta);

  $cda = trim($_POST['cda']);
  $cda = strip_tags($cda);
  $cda = htmlspecialchars($cda);

  $gcp = trim($_POST['gcp']);
  $gcp = strip_tags($gcp);
  $gcp = htmlspecialchars($gcp);

  $ot = trim($_POST['ot']);
  $ot = strip_tags($ot);
  $ot = htmlspecialchars($ot);

  $arr = trim($_POST['arr']);
  $arr = strip_tags($arr);
  $arr = htmlspecialchars($arr);

  $gp = $bs+$ra+$ta+$nca+$ca+$ha+$sa+$na+$spa+$uta+$cda+$gcp+$ot+$arr;

//expenditure 

  $tax = trim($_POST['tax']);
  $tax = strip_tags($tax);
  $tax = htmlspecialchars($tax);

  $mvl = trim($_POST['mvl']);
  $mvl = strip_tags($mvl);
  $mvl = htmlspecialchars($mvl);

  $tal = trim($_POST['tal']);
  $tal = strip_tags($tal);
  $tal = htmlspecialchars($tal);

  $hol = trim($_POST['hol']);
  $hol = strip_tags($hol);
  $hol = htmlspecialchars($hol);

  $wbs = trim($_POST['wbs']);
  $wbs = strip_tags($wbs);
  $wbs = htmlspecialchars($wbs);

  $hor = trim($_POST['hor']);
  $hor = strip_tags($hor);
  $hor = htmlspecialchars($hor);

  $sad = trim($_POST['sad']);
  $sad = strip_tags($sad);
  $sad = htmlspecialchars($sad);

  $ovp = trim($_POST['ovp']);
  $ovp = strip_tags($ovp);
  $ovp = htmlspecialchars($ovp);

  $sch = trim($_POST['sch']);
  $sch = strip_tags($sch);
  $sch = htmlspecialchars($sch);

  $cps = trim($_POST['cps']);
  $cps = strip_tags($cps);
  $cps = htmlspecialchars($cps);

  $csone = trim($_POST['csone']);
  $csone = strip_tags($csone);
  $csone = htmlspecialchars($csone);

  $cstwo = trim($_POST['cstwo']);
  $cstwo = strip_tags($cstwo);
  $cstwo = htmlspecialchars($cstwo);

  $csthree = trim($_POST['csthree']);
  $csthree = strip_tags($csthree);
  $csthree = htmlspecialchars($csthree);

  $uduone = trim($_POST['uduone']);
  $uduone = strip_tags($uduone);
  $uduone = htmlspecialchars($uduone);

  $udutwo = trim($_POST['udutwo']);
  $udutwo = strip_tags($udutwo);
  $udutwo = htmlspecialchars($udutwo);

  $tde = $tax + $mvl + $tal + $hol + $wbs + $hor + $sad + $ovp + $sch + $cps + $csone + $cstwo + $csthree + $uduone + $udutwo;

  $npay = $gp - $tde;
 echo $npay;





 // all entry validation
  if (empty($email)&&empty($bs)
          &&empty($ra)&&empty($ta)
          &&empty($nca)&&empty($ca)&&($tax)){
      $error = true;
   $allError = "Fields with * are important.";
  }

   
  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO earnings (status,fname,bank,accno,gl,rank,gender,email,month,bs,ra,ta,nca,ca,ha,sa,na,spa,uta,cda,gcp,ot,arr,gp, tax,mvl,tal,hol,wbs,hor,sad,ovp,sch,cps,csone,cstwo,csthree,uduone,udutwo,tde,npay)"
           . " VALUES('$title','$fname','$bank','$accno','$gl','$rank','$gender','$email','$month','$bs','$ra','$ta','$nca','$ca','$ha','$sa','$na','$spa','$uta','$cda','$gcp','$ot','$arr','$gp',  '$tax','$mvl','$tal','$hol','$wbs','$hor','$sad','$ovp','$sch','$cps','$csone','$cstwo','$csthree','$uduone','$udutwo','$tde','$npay')";
   $res = mysql_query($query);
    
   if ($res) {
    // $_SESSION['user'] = $row['ID'];
    // header("Location: payslip.php");
    $errTyp = "success";
    $errMSG = "Account created successfully";
    
    unset($fname);
    unset($bank);
    unset($accno);
    unset($gl);
    unset($rank);
    unset($gender);
    unset($email);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }  
  } 
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
<li class="nav-item active"><a class="nav-link" href="payslips.php">Full-Reg Data<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="payslip.php">Go to Pay list</a></li>
<li class="nav-item"><a class="nav-link" href="logoutadmin.php?logout">&nbsp;Log out</a></li>

     </ul>

    </div>
    </nav>

    
<div class="container" >

<div class="jumbotron ">
     <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt="" width="72" height="72"></div>
    <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br></span> ADO-EKITI PAYSLIP FOR THE MONTH OF <?php echo $row[month]?></div>

<div class="container">
    <img class="mb-4" src="images/favicon.ico" alt="" width="72" height="72"> 
     <h1 class="h1 mb-3 holder-sm">Enter recipient details</h1>
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
    </table></div>
 </div>
</div>
<div class="row">
<div class="col-md-6">
<button onclick="myFunction()" class="btn btn-lg btn-primary btn-block submit" type="submit">Calc. Income</button>
</div>
<div class="col-md-3">
<button onclick="myFunctions()" class="btn btn-lg btn-primary btn-block submit" type="submit">Calc. Expenditure</button>
</div>
<div class="col-md-3">
<button onclick="myFunctio()" class="btn btn-lg btn-primary btn-block submit" type="submit">Calc. Expenditure</button>
</div>
</div>
<form class=""  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<!-- FOLLOW-UP ON BIODATA -->
<input type="text" name="status" style="visibility: hidden;" maxlength="40" value="<?php echo $row[status].$status; ?>">

<input type="text" name="fname" style="visibility: hidden;" maxlength="40" value="<?php echo $row[fname].$fname; ?>">

<input type="text" name="bank" style="visibility: hidden;" maxlength="40" value="<?php echo $row[bank].$bank; ?>">

<input type="text" name="accno" style="visibility: hidden;" maxlength="40" value="<?php echo $row[accno].$accno; ?>">

<input type="text" name="gl" style="visibility: hidden;" maxlength="40" value="<?php echo $row[gl].$gl; ?>">

<input type="text" name="rank" style="visibility: hidden;" maxlength="40" value="<?php echo $row[rank].$rank; ?>">

<input type="text" name="gender" style="visibility: hidden;" maxlength="40" value="<?php echo $row[gender].$gender; ?>">

<input type="email" name="email" style="visibility: hidden;" maxlength="40" value="<?php echo $row[email].$email; ?>">
<!-- FOLLOW-UP ON BIODATA CLOSES -->



<input type="text" name="month" class="form-control" placeholder="month" maxlength="40" required autofocus>
           <h1>Recipients' Balance sheet</h1>
<!-- RECEIPT TABLE FORMAT -->
<div class="row balance-sheet" style="">

  <div class="col-md-6" style="background: white;">
  <h1 class="heading">Earnings</h1>
<div class="table-responsive">
    <table class="table table-striped">
<tr><th>Income</th><th>Amount</th></tr>
<tr><td></td><td>Naira</td></tr>

<tr><td>BASIC SALARY</td>
<td><input id="bs" type="text" name="bs" class="form-control" placeholder="Amount" required autofocus></td>
</tr>

<tr><td>RENT ALLOWANCE</td>
<td><input id="ra" type="text" name="ra" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>TEACHING ALLOWANCE</td>
<td><input id="ta" type="text" name="ta" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>NON-CLINICAL ALLOWANCE</td>
<td><input id="nca" type="text" name="nca" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>CLINICAL ALLOWANCE</td>
<td><input id="ca" type="text" name="ca" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>HAZZARD ALLOWANCE</td>
<td><input id="ha" type="text" name="ha" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>SHIFT ALLOWANCE</td>
<td><input id="sa" type="text" name="sa" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>NEWSPAPER ALLOWANCE</td>
<td><input id="na" type="text" name="na" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>SPECIALIST ALLOWANCE</td>
<td><input id="spa" type="text" name="spa" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>UTILITY ALLOWANCE</td>
<td><input id="uta" type="text" name="uta" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>CALL DUTY ALLOWANCE</td>
<td><input id="cda" type="text" name="cda" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>GOVT. CONT. PENSION</td>
<td><input id="gcp" type="text" name="gcp" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>OVERTIME</td>
<td><input id="ot" type="text" name="ot" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>ARREARS</td>
<td><input id="arr" type="text" name="arr" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td><br></td><br></tr>

<tr><td>GROSS PAY</td>
<td><div id="result" name="result" class="form-control" ></div>
</td>
</tr>


</table>
</div>
  </div>



  <div class="col-md-6" style="background: white;">
  <h1 class="heading">Deductions</h1>
<div class="table-responsive">
    <table class="table table-striped">
<tr><th>Expenditure</th><th>Amount</th></tr>
<tr><td></td><td>Naira</td></tr>

<tr><td>TAX</td>
<td><input id="tax" type="text" name="tax" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>MOTOR VEHICLE LOAN</td>
<td><input id="mvl" type="text" name="mvl" class="form-control" placeholder="Amount"></td></tr>

<tr><td>TEACHING ALLOWANCE</td>
<td><input id="tal" type="text" name="tal" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>HOUSING LOAN</td>
<td><input id="hol" type="text" name="hol" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>WEMA BANK SHARES</td>
<td><input id="wbs" type="text" name="wbs" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>HOUSE OFFICER'S RENT</td>
<td><input id="hor" type="text" name="hor" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>SALARY ADVANCE</td>
<td><input id="sad" type="text" name="sad" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>OVERPAYMENT</td>
<td><input id="ovp" type="text" name="ovp" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>SUB CHARGE</td>
<td><input id="sch" type="text" name="sch" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>CONTRIBUTORY P.SCHEME</td>
<td><input id="cps" type="text" name="cps" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td align="center">CT & CS</td>
<td><input id="csone" type="text" name="csone" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td align="center">CT & CS</td>
<td><input id="cstwo" type="text" name="cstwo" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td align="center">CT & CS</td>
<td><input id="csthree" type="text" name="csthree" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>UNION DUES</td>
<td><input id="uduone" type="text" name="uduone" class="form-control" placeholder="Amount"></td>
</tr>

<tr><td>UNION DUES</td>
<td><input id="udutwo" type="text" name="udutwo" class="form-control" placeholder="Amount"></td>
</tr>


<tr><td>TOTAL DEDUCTION</td>
<td><div id="resultex" name="resultex" class="form-control" ></div></td>
</tr>

<tr><td><br></td><br></tr>

<tr><td>NET PAY</td>
<td><div id="final" name="final" class="form-control" ></div></td>
</tr>

</table>
</div>    </div> 
  </div>
<br>
        <button class="btn btn-lg btn-primary btn-block submit" type="submit" name="btn-signup">Submit entry</button>
      </form>
    </div>
 

<!--Collecting input from -->
<script>
function myFunction() {
    var bs = document.getElementById("bs").value;
    var ra = document.getElementById("ra").value;
    var ta = document.getElementById("ta").value;
    var nca = document.getElementById("nca").value;
    var ca = document.getElementById("ca").value;
    var ha = document.getElementById("ha").value;
    var sa = document.getElementById("sa").value;
    var na = document.getElementById("na").value;
    var spa = document.getElementById("spa").value;
    var uta = document.getElementById("uta").value;
    var cda = document.getElementById("cda").value;
    var gcp = document.getElementById("gcp").value;
    var ot = document.getElementById("ot").value;
    var arr = document.getElementById("arr").value;

    if (bs == ""){
        alert("Basic salary is required");
        return false;
    }
    if (ra == "") {
        alert("Rent allowance is required");
        return false;
    }
    else{
    var c = "# ";
    var s = c.fontcolor("navy");
    var b = s.bold();
    var concate = Number(bs) + Number(ra)+ Number(ta)+ Number(nca) + Number(ca) + Number(ha) + Number(sa) + Number(na) + Number(spa) + Number(uta) + Number(cda) + Number(gcp) + Number(ot) + Number(arr);
    document.getElementById("result").innerHTML = (b.concat(concate));
  }
}
</script>

<script>
function myFunctions() {
  var tax = document.getElementById("tax").value;
  var mvl = document.getElementById("mvl").value;
  var tal = document.getElementById("tal").value;
  var hol = document.getElementById("hol").value;
  var wbs = document.getElementById("wbs").value;
  var hor = document.getElementById("hor").value;
  var sad = document.getElementById("sad").value;
  var ovp = document.getElementById("ovp").value;
  var sch = document.getElementById("sch").value;
  var cps = document.getElementById("cps").value;
  var csone = document.getElementById("csone").value;
  var cstwo = document.getElementById("cstwo").value;
  var csthree = document.getElementById("csthree").value;
  var uduone = document.getElementById("uduone").value;
  var udutwo = document.getElementById("udutwo").value;
  
  
  var all = Number(tax) + Number(mvl) + Number(tal) + Number(hol) + Number(wbs) + Number(hor) + Number(sad) + Number(ovp) + Number(sch) + Number(cps) + Number(csone) + Number(cstwo) + Number(csthree) + Number(uduone) + Number(udutwo);

   document.getElementById("resultex").innerHTML = "# " + all;
   }
</script>


<script>
function myFunctio() {

   var bs = document.getElementById("bs").value;
    var ra = document.getElementById("ra").value;
    var ta = document.getElementById("ta").value;
    var nca = document.getElementById("nca").value;
    var ca = document.getElementById("ca").value;
    var ha = document.getElementById("ha").value;
    var sa = document.getElementById("sa").value;
    var na = document.getElementById("na").value;
    var spa = document.getElementById("spa").value;
    var uta = document.getElementById("uta").value;
    var cda = document.getElementById("cda").value;
    var gcp = document.getElementById("gcp").value;
    var ot = document.getElementById("ot").value;
    var arr = document.getElementById("arr").value;

    var tax = document.getElementById("tax").value;
  var mvl = document.getElementById("mvl").value;
  var tal = document.getElementById("tal").value;
  var hol = document.getElementById("hol").value;
  var wbs = document.getElementById("wbs").value;
  var hor = document.getElementById("hor").value;
  var sad = document.getElementById("sad").value;
  var ovp = document.getElementById("ovp").value;
  var sch = document.getElementById("sch").value;
  var cps = document.getElementById("cps").value;
  var csone = document.getElementById("csone").value;
  var cstwo = document.getElementById("cstwo").value;
  var csthree = document.getElementById("csthree").value;
  var uduone = document.getElementById("uduone").value;
  var udutwo = document.getElementById("udutwo").value;

  var concate = Number(bs) + Number(ra)+ Number(ta)+ Number(nca) + Number(ca) + Number(ha) + Number(sa) + Number(na) + Number(spa) + Number(uta) + Number(cda) + Number(gcp) + Number(ot) + Number(arr);

  var all = Number(tax) + Number(mvl) + Number(tal) + Number(hol) + Number(wbs) + Number(hor) + Number(sad) + Number(ovp) + Number(sch) + Number(cps) + Number(csone) + Number(cstwo) + Number(csthree) + Number(uduone) + Number(udutwo);

var final = concate - all;
 document.getElementById("final").innerHTML = "# " + final;
 alert("running" + final);
}
</script>

    </div>
 <!--Option 1 ends-->
<?php
 
 $a=  "123456";
 $b= "0123";

 echo ($a + $b);



?>


<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="sound.js"></script>
</div>
  </body>
</html>

<?php ob_end_flush();?>

<!-- //$cellphone = filter_var( $_GET["cellphone"], FILTER_VALIDATE_INT); -->