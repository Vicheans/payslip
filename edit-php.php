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


<?php
if ( isset($_POST['btn-signup']) ) {
 
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

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

  
  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO payslip (status,fname,bank,accno,gl,rank,gender,email)"
           . " VALUES('$title','$fname','$bank','$accno','$gl','$rank','$gender','$email')";
   $res = mysql_query($query);
    
   if ($res) {
    $_SESSION['user'] = $row['ID'];
    header("Location: payslip.php");
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
