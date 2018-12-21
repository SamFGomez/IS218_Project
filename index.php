<?php
session_start();
require('accounts_db.php');
require('questions_db.php');
require('answers_db.php');

$action = $_GET['action'];
switch($action){
  case "display_login":
    include('login.php');
    break;
    
  case "login":
    $email = $_GET['email'];
    $password = $_GET['password'];
    $confirmation = loginUser($email,$password);
    if($confirmation==1){
      $_SESSION['fullName'] = getFullName($email);
      $_SESSION['email'] = $email;
      $_SESSION['view'] = 'user';
      header("Location: .?action=display_questions");
    } else {
      header("Location: login.php");
    }
    break;
    
  case "logout":
    session_destroy();
    header("Location: .?action=display_login");
    break;
    
  case "display_registration":
    include('registration.php');
    break;
    
  case "register":
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $birthday = $_GET['birthday'];
    $password = $_GET['password'];
    $_SESSION['email']=$email;
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
      registerUser($firstName,$lastName,$email,$birthday,$password);
      header("Location: .?action=login&email=$email&password=$password");
    }
    else{
      header("Location: registration.php");
    }
    break;
    
  case "display_questions":
    $_SESSION['view'] = 'User';
    $_SESSION['questions'] = displayQuestions($_SESSION['email']);
    include('homepage.php');
    break; 
  
  case "display_all_questions":
    $_SESSION['view'] = 'All';
    $_SESSION['questions'] = displayAllQuestions();
    include('homepage.php');
    break;  
  
  case "display_new_question":
    include('qform.php');
    break;
  
  case "create_new_question":
    $email = $_SESSION['email'];
    $questionName = $_GET['qName'];
    $questionBody = $_GET['qBody'];
    $questionSkills = $_GET['qSkills'];
    createQuestion($email,$questionName,$questionBody,$questionSkills);
    header("Location: .?action=display_questions");
    break;
  
  case "display_edit_question":
    $qid = $_GET['qid'];
    $qInfo = getQuestion($qid);
    $qName = $qInfo['name'];
    $qBody = $qInfo['body'];
    $qSkills= $qInfo['skills'];
    header("Location: eQuestionForm.php?qid=$qid&name=$qName&body=$qBody&skills=$qSkills");
    break;
    
  case "edit_question":
    $qid = $_GET['qid'];
    $questionName = $_GET['qName'];
    $questionSkills = $_GET['qSkills'];
    $questionBody = $_GET['qBody'];
    editQuestion($qid, $questionName, $questionSkills, $questionBody);
    header("Location: .?action=display_questions");
    break;
    
  case "delete_question":
    $qid = $_GET['qid'];
    delQuestion($qid);
    $view = $_SESSION['view'];
    switch ($view){
      case "User":
        header("Location: .?action=display_questions");
      break;
      case "All":
        header("Location: .?action=display_all_questions");
      break;
    }
    break;
    
  case "toggle_view":
    $view = $_SESSION['view'];
    switch ($view){
      case "All":
        header("Location: .?action=display_questions");
      break;
      case "User":
        header("Location: .?action=display_all_questions");
      break;
    }
  break;
  
  case "display_view_question":
    $qid = $_GET['qid'];
    $qEmail = $_GET['email'];
    $userQ = 'false';
    if($qEmail == $_SESSION['email']){
      $userQ = 'true';
    }
    $_SESSION['questions'] = displayQuestionInfo($qid);
    $_SESSION['answers'] = displayAnswers($qid);
    echo $_SESSION['questions'];
    header("Location: QuestionView.php?qid=$qid&userQ=$userQ");
  break;
  
  case "submit_answer":
    $qid = $_GET['qid'];
    $answer = $_GET['answer'];
    $email = $_SESSION['email'];
    addAnswer($qid,$answer,$email);
    header("Location: .?action=display_view_question");
    break;
  
  case "change_vote":
    $aid = $_GET['aid'];
    $qid = $_GET['qid'];
    $vote = $_GET['vote'];
    changeVote($aid,$vote);
    header("Location: .?action=display_view_question");
  break;
  
  
  
  
}
  
?>