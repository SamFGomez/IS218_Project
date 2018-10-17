<?php
	$questionName=$_GET['qName'];
	$questionBody=$_GET['qBody'];
	$questionSkills=$_GET['qSkills'];

	$skillList=split(',',$questionSkills);
  
  $questionValid=true;
  
	if(empty($questionName)){
  		echo "Error: Empty Question Name.";
     $questionValid=false;
	}
	if(strlen($questionName)<3){
  		echo "Error: Question Name less than 3 characters.";
     $questionValid=false;
	}
	if(empty($questionBody)){
  		echo "Error: Empty Question Body.";
     $questionValid=false;
	}
	if(strlen($questionBody)>500){
  		echo "Error: Question Body exceeds 500 characters.";
     $questionValid=false;
	}
 
  if($questionValid){
    echo "Question Name: $questionName</br>";
    echo "Question Body: $questionBody</br>";
    echo "Skill List: </br>";
    foreach($skillList as $skill){
      echo "skill: $skill</br>";
    }
  } 

?>