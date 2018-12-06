<?php

include("account.php");
$GLOBALS['ai'] = array('hostname'=>$hostname,'username'=>$username,'mysqlpw'=>$mysqlpw,'project'=>$project);

function runMysqlQuery($s){
  $ai = $GLOBALS['ai'];
  $db = mysqli_connect($ai['hostname'], $ai['username'], $ai['mysqlpw'], $ai['project']) or die("Unable to connect to DB");
  mysqli_select_db($db, "sfg4"); 
  $t = mysqli_query($db, $s) or die("Bad Query");
  
  return $t;
}

?>