<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

// if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: entry.php");
  exit;
 }

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
 $title = $_POST['title'];

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

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

  // all entry validation
  if (empty($fname)&&empty($bank)
          &&empty($accno)&&empty($gl)
          &&empty($rank)&&empty($email)){
      $error = true;
   $allError = "Fields with * are important.";
  }
  
   else if (empty($fname)) {
   $error = true;
   $fnameError = "Enter respondents full name";
  } else if (strlen($fname) < 3) {
   $error = true;
   $fnameError = "Name must be atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $fnameError = "Only alphabets allowed";
  }

  //last name validation
  else if (empty($bank)) {
   $error = true;
   $bankError = "Please enter your full name.";
  } else if (strlen($bank) < 3) {
   $error = true;
   $bankError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$bank)) {
   $error = true;
   $bankError = "Name must contain alphabets and space.";
  }
  
 //account validation
  else if (empty($accno)) {
   $error = true;
   $accnoError = "enter account number";
  } else if (strlen($accno) < 3) {
   $error = true;
   $accnoError = "Sorry, must be atleast 3 characters.";
  }

  //GL validation
  else if (empty($gl)) {
   $error = true;
   $glError = "enter gl";
  } else if (strlen($gl) < 3) {
   $error = true;
   $glError = "Sorry, must be atleast 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$gl)) {
   $error = true;
   $glError = "gl character invalid";
  }


   //rank validation
  else if (empty($rank)) {
   $error = true;
   $rankError = "enter rank";
  } else if (strlen($rank) < 3) {
   $error = true;
   $rankError = "Sorry, must be atleast 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$rank)) {
   $error = true;
   $rankError = "rank character invalid";
  }
   
  //Gender validation
  else if (empty($gender)) {
   $error = true;
   $genderError = "Please select gender.";
  }

  //basic email validation
  else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT email FROM payslip WHERE Email='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "....Provided Email is already in use...";
   }
  }
  
  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO payslip (status,fname,bank,accno,gl,rank,gender,email)"
           . " VALUES('$title','$fname','$bank','$accno','$gl','$rank','$gender','$email')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Entry successfully added, select entry from Full-Reg to fill in payslip details";
    
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
    <link href="regcss.css" rel="stylesheet">
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
<li class="nav-item active"><a class="nav-link" href="register.php">Register<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="payslips.php">Full-Reg</a></li>
<li class="nav-item"><a class="nav-link" href="payslip.php">Go to Pay list</a></li>
<li class="nav-item"><a class="nav-link" href="logoutadmin.php?logout">&nbsp;Log out</a></li>

     </ul>

    </div>
    </nav>


<div class="container" >
<div class="bio">
  

  <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt=""></div>
  <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br></span></div>
</div>
<hr>
</div>

<div class="container" >
 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="description">Add new record</h2>
            </div>
                 
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group" style="text-align: center; font-size: 2rem; margin-top: auto;">
             <div class="empty<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">

  <div class="empty">
        <span class="glyphicon glyphicon-info-sign"></span>
              
                </div>



                </div>
             </div>
                <?php
   }
   ?>
         <div class="alert">
         <div class="alert-success">
         <span class="text-danger"><?php echo $allError; ?></span>
          <span class="text-danger"><?php echo $fnameError; ?></span>
          <span class="text-danger"><?php echo $bankError; ?></span>
          <span class="text-danger"><?php echo $accnoError; ?></span>
          <span class="text-danger"><?php echo $glError; ?></span>
          <span class="text-danger"><?php echo $rankError; ?></span>
          <span class="text-danger"><?php echo $emailError; ?></span>
          <span class="text-danger"><?php echo $genderError; ?></span>
          <span class="text-success"> <?php echo $errMSG; ?></span>
         </div></div>
        <hr>
         
         <div class="fields">
             <!--title syntax-->  
            <div class="form-group title"> 
            <select name="title" class="form-control">
              <option value="Prof">Prof</option>
              <option value="Dr">Dr</option>
              <option value="Engr">Engr</option>
              <option value="Mr">Mr</option>
              <option value="Mrs">Mrs</option>
             </select></div>
             
            <!--first name syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
          <input type="text" name="fname" class="form-control" placeholder="full name" maxlength="50" value="<?php echo $fname ?>" />
                </div>
                
            </div>
            
            <!--last name syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="bank" class="form-control" placeholder="Bank name" maxlength="50" value="<?php echo $bank ?>" />
                </div>
               
            </div>
            
            <!--city and state name syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="accno" class="form-control" placeholder="Account number" maxlength="50" value="<?php echo $accno ?>" />
                </div>
                
            </div>
            
            <!--Country name syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="gl" class="form-control" placeholder="GL" maxlength="50" value="<?php echo $gl ?>" />
                </div>
                
            </div>
            
            <!--mobile syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type='text' name="rank" class="form-control" placeholder="rank" maxlength="50" value="<?php echo $rank ?>" />
                </div>
                
            </div>
            
            <!--gender syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <table>
              <tr>
              <td class="form-control"><input type='radio' name="gender" value="male"/></td><td>  Male</td>
              <td class="form-control"><input type='radio' name="gender"  value="female"/></td><td>Female</td>
              </tr>
              </table>
                </div>
            </div>
         
             <!--email syntax-->
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                
            </div>
           
            
            </div>
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-lg btn-primary btn-block submit" name="btn-signup" >Add</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="payslips.php" class="referal">View existing records...</a>
            </div>
         
        </div>
   
    </form>
 </div>
  
<!--Changing script-->
<script>

    var currentDiv = document.getElementById("div1");
    function show(divID) {

        var div = document.getElementById(divID);

        currentDiv.style.display = "none";
        div.style.display = "block";

        currentDiv = div;
    }

</script>
</div>
    </div>

 <footer class="footer">
      <div class="footed">
        <span class="text-muted">EKSUTH DATABASE @2019</span>
        <span class="text-muted">@OLATEJU, Victor Daniel</span>
      </div>
    </footer>

</body>
</html>
<?php ob_end_flush(); ?>

