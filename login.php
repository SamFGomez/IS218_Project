<?php

$email = $_GET['email'];
$password = $_GET['password'];

$loginValid = true;

if(empty($email)){
  echo "Please enter an email.<br/>";
  $loginValid = false;
}
if(strpos($email,'@')== false){
  echo "ERROR: Invalid Email<br/>";
  $loginValid = false;
}
if(empty($password)){
  echo "Please enter an password.<br/>";
  $loginValid = false;
}
if(strlen($password)<8){
  echo "ERROR: Password is too short.<br/>";
  $loginValid = false;
}

if($loginValid){
  echo "Email: $email<br/>";
  echo "Password: $password<br/>";
}

?>