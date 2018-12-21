<?php

class Account{
  private $firstName;
  private $lastName;
  private $email;
  private $birthday;
  
  public function __construct($firstName,$lastName,$email,$birthday){
    $this->firstName =$firstName;
    $this->lastName=$lastName;
    $this->email=$email;
    $this->birthday=$birthday;
  }
  
  public function getFName(){
    return $this->firstName;
  }
  public function getLName(){
    return $this->firstName;
  }
  public function getFullName(){
    $firstName = $this->firstName;
    $lastName = $this->lastName;
    return $firstName." ".$lastName;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getBirthday(){
    return $this->birthday;
  }
}


?>