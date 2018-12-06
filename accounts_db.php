<?php
session_start();
require_once('database.php');

function loginUser($email,$password){
  $s = "SELECT * FROM Users WHERE email='$email' AND password='$password'";  
  $t = runMysqlQuery($s);
  $confirmation = mysqli_num_rows($t);
  return $confirmation;
}

function getUserInfo($email){
  $s = "SELECT * FROM Users Where email='$email'";
  $t = runMysqlQuery($s);
  foreach($user as $t){
    $email = $user['$email'];
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $birthday = $user['birthday'];
  }
  return array('firstName'=>$firstName, 'lastName'=>$lastName, 'birthday'=>$birthday);
}

function getFullName($email){
  $s = "SELECT * FROM Users Where email='$email'";
  $t = runMysqlQuery($s);
  foreach($t as $user){
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
  }
  return $firstName." ".$lastName;
}

function registerUser($firstName,$lastName,$email,$birthday,$password){
  $s = "INSERT INTO Users values('$firstName', '$lastName', '$email', '$birthday', '$password')";  
  $t = runMysqlQuery($s);
}
  

?>