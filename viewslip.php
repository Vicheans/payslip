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


<!--UPDATE COMMAND-->
<?php
$ress = mysql_query("SELECT * FROM payslip");
if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $res= mysql_query("SELECT * FROM payslip WHERE ID='$id'");
   $row= mysql_fetch_array($res);
    
}
    
if (isset($_POST['newfname'])){
  $newname= $_POST['newfname'];
  $id = $_POST['ID'];
  // first name validation

if (empty($newfname)) {
   $error = true;
   $firstnameError = "Enter First name";
  } else if (strlen($newfname) < 3) {
   $error = true;
   $firstnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$newfname)) {
   $error = true;
   $firstnameError = "Name must contain alphabets and space.";
  }
  else{
  $sql = "UPDATE payslip SET fname='$newfname' WHERE ID='$id'";
  $res = mysql_query($sql)or die ("Unable to update".mysql_error()); }
}

if (isset($_POST['bank'])){
  $bank= $_POST['bank'];
  $id = $_POST['ID'];

  if (empty($bank)){
      $error = true;
   $allError = "Field cannot be empty.";
  }
   else if (empty($bank)) {
   $error = true;
   $firstnameError = "Enter First name";
  } else if (strlen($bank) < 3) {
   $error = true;
   $firstnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$secname)) {
   $error = true;
   $firstnameError = "Name must contain alphabets and space.";
  }
  else{
  $sql = "UPDATE payslip SET bank='$bank' WHERE ID='$id'";
  $res = mysql_query($sql)or die ("Unable to update".mysql_error());}
}

  
 

 
 if (isset($_POST['email'])){
  $email= $_POST['email'];
  $id = $_POST['ID'];
   
 //basic email validation
  if (empty($email)) {
   $error = true;
   $emailError = "Email entry cannot be empty.";
  }
  
  else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } 
   else{
   // check email exist or not
   $query = "SELECT email FROM payslip WHERE email='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count>1){
    $error = true;
    $emailError = "....Provided Email is already in use...";
    
   }
   else if (!$error){
     $sql = "UPDATE payslip SET email='$email' WHERE ID='$id'";
   $res = mysql_query($sql)or die ("Unable to update".mysql_error());
   $resa = mysql_query($query);     
 }
  }
 }
 
if($resa){
  $errTyp = "success";
    $errMSG = "Profile Details Successfully Updated";
   echo "AWAKE";
    if ($errTyp){     
      echo "AWAKE";
    //AUTO REFRESH COMMAND
echo "<meta http-equiv='refresh' content='0;url='callSystem.php' "; 
  }
  else if ($errTyp){
    $error = true;
    $errTyp = "danger";
    $errMSG = "Profile Details Successfully Updated!"; 
   }
}
else {
     $errTyp = "danger";
    $errMSG = ""; 
}
 
   
    
 
?>


<!DOCTYPE html>
<html>
<head>
<title>D.C.System</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="icon" href="forg.png"/>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="tools.css" type="text/css" />
</head>
<body style="background: grey">
    
<div class="container" >

<div class="jumbotron ">

    <h1 class="holder">EKITI STATE UNIVERSITY TEACHING HOSPITAL, ADO-EKITI PAYSLIP FOR THE MONTH OF <?php   ?></h1>

<div class="container">
    <img class="mb-4" src="images/favicon.ico" alt="" width="72" height="72"> 
     <h1 class="h1 mb-3 holder-sm">Enter recipient details</h1>
<table class="biodata container" frame="above">
  <tr class="bd-list">
    <td>Name:</td><td><?php echo $row[fname]?></td>
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
    </table>
</div>
</div>


<div class="btn-leave" style="width: 100%"><a href="logout.php?logout">&nbsp;<b>Leave form</b></a></div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
    
    <span><?php echo $row[fname]?></span>
    </form>
</body>
</html>
<?php ob_end_flush();?>
