<?php
require_once('database.php');

function splitSkillList($list){
  $skillList=split(',',$list);
  return $skillList;
}
function displayQuestions($email){
  $s = "SELECT * FROM Questions where email='$email'";
  $t = runMysqlQuery($s);
  $qTable = "<center><table class='table' style=\"table-layout: fixed; width: 70%;word-wrap: break-word\">";
  $qTable.="<tr><th>Name</th><th>Body</th><th>Skills</th><th>Options</th></tr>";
  foreach($t as $q){
    $qTable.="<tr><td>".$q['name']."</td>";
    $qTable.="<td>".$q['body']."</td>";
    $skillList = splitSkillList($q['skills']);
    $qTable.='<td>';
    foreach($skillList as $skill){
      $qTable.=$skill.'</br>';
    }
    $qTable.='</td>';
    $qTable.='<center><td>
      <form action="index.php" method="get">
        <input type="hidden" name=action value="display_edit_question"/>
        <input type="hidden" name=qid value='.$q['QID'].' />
        <input class="btn btn-dark btn-sm" type="submit" value="Edit" /></br>
      </form>
      <form action="index.php" method="get">
        <input type="hidden" name=action value="delete_question"/>
        <input type="hidden" name=qid value='.$q['QID'].' />
        <input class="btn btn-dark btn-sm" type="submit" value="Delete" /></td>
      </form>
      </center>';
  }
  $qTable.="</table></center>";  
  return $qTable;
}

function getQuestion($qid){
  $s = "SELECT * FROM Questions where QID='$qid'";
  $t = runMysqlQuery($s);
  foreach($t as $question){
    $qid = $question['QID'];
    $name = $question['name'];
    $body = $question['body'];
    $skills = $question['skills'];
  }
  return array('qid'=>$qid, 'name'=>$name, 'body'=>$body, 'skills'=>$skills);
}

function createQuestion($email,$questionName,$questionBody,$questionSkills){
  $s = "INSERT INTO Questions(email,name,body,skills) values('$email','$questionName', '$questionBody', '$questionSkills')";
  runMysqlQuery($s);
}
function editQuestion($qid, $name, $skills, $body){
  $question = getQuestion($qid);
  $s = "UPDATE Questions SET name='$name', body='$body',skills='$skills' WHERE QID=$qid";
  $t = runMysqlQuery($s);
}
function delQuestion($qid){
  $s = "DELETE FROM Questions WHERE QID='$qid'";
  runMysqlQuery($s);
}


?>