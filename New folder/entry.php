<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
echo "WHAT IS GOING ON!!!!";
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
    $errMSG = "Account created successfully";

    unset($fname);
    unset($bank);
    unset($accno);
    unset($gl);
    unset($rank);
    unset($gender);
    unset($email);
    header("Location: data.php");
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }  
  } 
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>TOOLs.com</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="icon" href="forg.png"/>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="register.css" type="text/css" />
</head>
<body>
    
    <div class="toolsbk"><image src="toolsbk.jpg"></div>
    <div class="background"></div>
    <!-- PAGE TITLE-->
    <div class="body">
<ul>
<li style='float:right;list-style:none;color:white;'><a href="logout.php?logout">&nbsp;</a></li></ul>
 <h1 align="center" class="head_1">   
<b class="title">     
    <img  src="logo1.png"  style="width:900px;height:300px;position:absolute;left:0px;top:-20px;z-index:-1;margin-left:-20px;">
<img class="bkg" src="water.png" >

  </b></h1>
    <!--NAVIGATION BAR-->   
<header class="mainheader">
    
    <nav>
     <ul>
     <li ><a href="home.php"><b>Home</b></a></li>
     <li class="active1"><a href="Tools.php"><b>Tools</b></a></li>
     <li class="active"><a href="register.php"><b>Register</b></a></li>
     <li><a href="Login.php"><b>Login</b></a></li>
   </ul></nav>  
    </header>
<hr>
<div class="home"><a href="register.php" onclick="show('div1')" style="color: cyan">REGISTER </a>|<a href="Login.php" onclick="show('div2')"> LOGIN</a></div>
 

   <div class="logolabel"><img class="logosch" src="logo088.png"/>
    <label class="logolabel2">  <b >University of ilorin</b><br>
        Biomedical Engineering Department</label>
         </div>


<div class="container" >
 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="description">Sign Ups</h2>
            </div>
                 
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group" style="text-align: center; font-size: 2rem; margin-top: auto;">
             <div class="empty<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span > <?php echo $errMSG; ?></span>
                </div>
             </div>
                <?php
   }
   ?>
         <div class="empty"><span class="text-danger"><?php echo $allError; ?></span>
                  <span class="text-danger"><?php echo $fnameError; ?></span>
                <span class="text-danger"><?php echo $bankError; ?></span>
              <span class="text-danger"><?php echo $accnoError; ?></span>
                  <span class="text-danger"><?php echo $glError; ?></span>
                <span class="text-danger"><?php echo $rankError; ?></span>
              <span class="text-danger"><?php echo $emailError; ?></span>
         </div>
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
             
                <input type='radio' name="gender"  value="male"/>Male
                <input type='radio' name="gender"  value="female"/>Female
                <span class="text-danger"><?php echo $genderError; ?></span>
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
             <button type="submit" class="submitReg" name="btn-signup" >Sign Up</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="data.php" class="referal">Sign in Here...</a>
            </div>
         
        </div>
   
    </form>
 </div>
    <div id="div1" style="display: none;">SAM</div>
    <div id="div2" style="display:none">OLUWA NI</div>
  
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



   <footer class="mainFooter">
      
   <div class="subfoot">
       <span class="line">   -</span> Need Help? <span class="line">-</span>
         <div class="update">Subscribe to get our Newsletter as soon as it is available</div> 
       <div class="sign"><button class="signbox" onclick="kill()">Subscribe</button>
       <script>
         function kill(){
             alert ("You must be logged in first");
         }
       </script>
       </div>
       <div id="subscribe" class="hide" style="display:none;">
           <input class='field' type='email' placeholder="Enter email"/><br>
           <button class="sub" type="submit">Submit</button>
       </div>
       <div class="update">Or <a href="register.php" class="sig">sign up</a> and join TOOls community for free </div>
   </div>
   
    <div class="foots">
        <span class="footimg">
        <img  src="footimg.png"  style="position:relative;height:200px;width:200px;">
        </span> 
        <span class="footword">
Biomedical Engineering project. All rights reserved. 2017/2018 Digital Hospital Request Monitoring System.
Privacy Policy   |   Legal   |   TOOLs Subscriber Agreement   <br>| &copysr;  <a href="#" title="myWeb">BME Project 2018</a> 
</span>
    </div>
  
</footer> 
    </div>
</body>
</html>
<?php ob_end_flush(); ?>