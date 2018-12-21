<?php

class Question{
  private $qid;
  private $email;
  private $name;
  private $body;
  private $skills;
  
  public function __construct($qid,$email,$name,$body,$skills){
    $this->qid =$qid;
    $this->email=$email;
    $this->name=$name;
    $this->body=$body;
    $this->skills=$skills;
  }
  
  public function getQID(){
    return $this->qid;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getName(){
    return $this->name;
  }
  public function getBody(){
    return $this->body;
  }
    public function getSkills(){
    return $this->skills;
  }
}


?>