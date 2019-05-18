<?php
  ob_start();
  session_start();
  require_once 'admindbconnect.php';
  
  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: department.php");
    exit;
  }
  
  $error = false;
  
  if( isset($_POST['btn-login']) ) {  
    
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs
    if(empty($email)&& empty($pass)){
                    $error=true;
                    $empty = "You need to Login to continue";
                }
    else if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    
    else if(empty($pass)){
      $error = true;
      $passError = "Password is required";
    }
                
    
// if there's no error, continue to login
    if (!$error) {
      
                    // password encrypt using SHA256();
                     $password = hash('sha256', $pass);
          
      $res=mysql_query("SELECT ID, name, surname, password FROM admins WHERE email='$email'");
      $row= mysql_fetch_array($res);
      $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      if( $count == 1 && $row['name']==$pass) {
        $_SESSION['user'] = $row['ID'];
                           header("Location: department.php");
      } 
                        else if( $count == 1 && $row['name']!=$pass) {
                                 $error = true;
               $errMSG = "Incorrect Password";  
      } 
                        else {
        $errMSG = "You're not authorized to access this page.";
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
<link rel="stylesheet" href="entcss.css" type="text/css" />
</head>
<body>
    
  
    
   <div class="container" >
<div class="bio">
  

  <div class="eklogo"><img class="mb-4" src="eksuthlogo.png" alt="" width="72" height="72"></div>
  <div class="h1 head">
    <span class="header">EKITI STATE UNIVERSITY TEACHING HOSPITAL<br></span></div>
</div>
<hr>
</div>


<!--************THE SIDE BAR ACTIONS SYNTAX-->    
<div class="container" >
 <div id="login-form">
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <div>

          <div class="form-group">
              
            </div>
        <!--Logo and project description start-->
            <div class="mainconten">
    
    <div class="conten">
     <article class="topconten">
         <header>
             <h2 class="head">WELCOME ADMIN. (enter login credentials to continue)</h2>   
         </header>
         
     </article><br>
    </div>
       <!--Logo and project description start ends-->
</div>
            
            <?php
      if ( isset($errMSG) ) {
        
        ?>
        <div class="form-group">
              <div class="alert alert-danger">
        <span class="glyphicon glyphicon-info-sign"></span>
             <div class="empty"><b><span><b><?php echo $emailError; ?>
                 <?php echo $passError; ?>
            <?php echo $empty; ?>
                 <?php echo $errMSG; ?></b></span></b>
             </div>  
                </div>
              </div>
                <?php
      }
      ?>
        
             <hr>
     <div class="fields">       
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" autocomplete/>
                </div>
               
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control" placeholder="Your Password" value="<?php echo $pass; ?>" maxlength="15" />
                </div>
                </div>
     </div>
                <hr>
               <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block submit" type="submit" name="btn-login">Continue</button>
            </div>
            
            </div>
            
            <div class="form-group">
              <hr />
            </div>
            <div class="forgot"> Forgot<a  href="#"> password</a>? </div>
    </form>
    </div>  
    


</div>
  <footer class="footer">
      <div class="footed">
    <span class="text-muted"><br>
Biomedical Engineering project. All rights reserved. 2017/2018 Digital Hospital Request Monitoring System.
Privacy Policy   |   Legal   |   TOOLs Subscriber Agreement   <br>| &copysr;  <a href="#" title="myWeb">EKSUTH DATABASE @2019</a> 
</span>
    </footer>
</body>
</html>
<?php ob_end_flush(); ?>
