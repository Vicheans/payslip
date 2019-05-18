<?php
$host="localhost";
$username="root";
$password="";
 
 
 $db = mysql_connect($host,$username,$password) or 
         die ("Could not connect to database");
// select the appropriate database
$mysql = mysql_select_db("admin",$db);
if(!$mysql)
{
echo 'Cannot select database.';
exit;
}
else{
    echo "";
}
?>