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
  </span>full data entry section<br>(select entry you want to work on)</div>
</div>
<hr>
</div>

    
<div class="container" >

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="descriptionx">Update |<a href="register.php"> Add</a></h2>
            </div>
                 
         <div>   <?php
   if ( isset($errMSG) ) { ?>
    <div class="form-group">
             <div class="empty<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
     </div>
             </div>
                <?php
   }
   ?> </div>
         <div class="empty"><span class="text-danger"><?php echo $allError; ?></span>
                            <span class="text-danger"><?php echo $firstnameError; ?></span>
                            <span class="text-danger"><?php echo $lastnameError; ?></span>
                            <span class="text-danger"><?php echo $emailError; ?></span>
                            <span class="text-danger" style="color: white;"> <?php echo $errMSG; ?></span>
         </div>
        
         
         <div class="fields">
            <!--status syntax-->
            <div class="form-group">
             <div class="input-group">
             <input type="text" name="status" class="form-control" placeholder="Status" maxlength="50" value="<?php echo $row[status].$status; ?>">
                </div>

            <!--full name syntax-->
            
             <div class="input-group">
             <input type="text" name="newfname" class="form-control" placeholder="full name" maxlength="50" value="<?php echo $row[fname].$nefname; ?>">
                </div>

            <!--bank syntax-->
             <div class="input-group">
             <input type="text" name="bank" class="form-control" placeholder="Bank name" maxlength="50" value="<?php echo $row[bank].$bank; ?>">
                </div>

            <!--gl syntax-->
            
             <div class="input-group">
             <input type="text" name="gl" class="form-control" placeholder="GL" maxlength="50" value="<?php echo $row[gl].$gl; ?>">
               </div>
           
             <!--rank syntax-->
         
             <div class="input-group">
             <input type="text" name="rank" class="form-control" placeholder="Rank" maxlength="50" value="<?php echo $row[rank].$rank; ?>">
                </div>

             <!--email syntax-->
           
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $row[email].$email; ?>">
                </div> 
            

                 <input type="hidden" name="ID" value="<?php echo $row[ID]; ?>">

            </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block submit" name="btn-signup" >Update</button>
             
                                    </div>
            
            <div class="form-group">
             <hr />
            </div>
        </div>
      </div>
    </form>
</div>

<div class="container">
<p class="tab-list"><br></p>
<?php
echo "<TABLE class='table-responsive table table-striped' style='text-align: center;"
. "font-weight: bold' >";
echo "<TR>"."<th><B>Status</B>"
. "<th><B>Name</B>"
."<th><B>Bank</B>"
."<th><B>GL</B>"
."<th><B>Rank</B>"
. "<th><B>Email</B>"
        . "<th><B>Options</B></TR>";
while ($row = mysql_fetch_array($ress)){
echo "<TR><TD>".$row["status"];
echo "<TD>".$row["fname"];
echo "<TD>".$row["bank"];
echo "<TD>".$row["gl"];
echo "<TD>".$row["rank"];
echo "<TD>".$row["email"];
echo "<TD><a href=\"payslips.php?edit=$row[ID]\" style='color:grey' href='#'>Edit</a> ";
echo "<a href=\"edit.php?edit=$row[ID]\" style='color:green' href='#'>Select</a> ";
}
echo "</TABLE>";
while ( $row = mysql_fetch_array($ress)){
echo "$row[ID]. $row[fname], $row[bank] <a href='payslips.php?edit=$row[ID]'>edit</a>  <br>";
}?>
<button class="btn btn-lg btn-primary btn-block submit" type="" name="btn-signup"><br></button>
 </div>
    
<!--CLOSURE DESIGN-->

    <br>
    
 <footer class="footer">
      <div class="footed">
        <span class="text-muted">EKSUTH DATABASE @2019</span>
        <span class="text-muted">@OLATEJU, Victor Daniel</span>
      </div>
    </footer>

</body>
</html>
<?php ob_end_flush(); ?>