<?php
$firstName=$_GET['firstName'];
$lastName=$_GET['lastName'];
$birthday=$_GET['birthday'];
$email=$_GET['email'];
$password=$_GET['password'];

$validRegistration=true;

if(empty($firstName)){
  echo "Please enter a first name.<br/>";
  $validRegistration=false;
}
if(empty($lastName)){
  echo "Please enter a last name.<br/>";
  $validRegistration=false;  
}
if(empty($birthday)){
  echo "Please enter a birthday.<br/>";
  $validRegistration=false;
}
if(empty($email)){
  echo "Please enter a email.<br/>";
  $validRegistration=false;
}
if(strpos($email,'@')== false){
  echo "ERROR: Invalid Email<br/>";
  $validRegistration=false;
}
if(empty($password)){
  echo "Please enter a password.<br/>";
  $validRegistration=false;
}
if(strlen($password)<8){
  echo "ERROR: Password is too short.<br/>";
  $validRegistration=false;
}

if($validRegistration){
  echo "First name: $firstName<br/>";
  echo "Last name : $lastName<br/>";
  echo "Birthday  : $birthday<br/>";
  echo "Email     : $email<br/>";
  echo "Password  : $password<br/>";
} 


?>