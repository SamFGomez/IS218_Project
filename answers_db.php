<?php
require_once('database.php');

function displayAnswers($qid){
  $s = "SELECT * FROM Answers where QID='$qid'";
  print_r($s);
  $t = runMysqlQuery($s);
  
  $aTable = "<center><table class='table' style=\"table-layout: fixed; width: 70%;word-wrap: break-word\">";
  $aTable.="<tr><th>Email</th><th>Answer</th><th>Upvotes</th><th>DownVotes</th><th>Options</th></tr>";
  foreach($t as $q){
    $aTable.="<tr>";
    $aTable.="<td>".$q['email']."</td>";
    $aTable.="<td>".$q['answer']."</td>";
    $aTable.="<td>".$q['upvote']."</td>";
    $aTable.="<td>".$q['downvote']."</td>";
    $aTable.='<center><td>
      <form action="index.php" method="get">
        <input type="hidden" name=action value="change_vote"/>
        <input type="hidden" name=aid value='.$q['AID'].' />
        <input type="hidden" name=qid value='.$q['QID'].' />
        <input type="hidden" name=vote value="up" />
        <input class="btn btn-dark btn-sm" type="submit" value="Upvote" /></br>
      </form>
      <form action="index.php" method="get">
        <input type="hidden" name=action value="change_vote"/>
        <input type="hidden" name=aid value='.$q['AID'].' />
        <input type="hidden" name=qid value='.$q['QID'].' />
        <input type="hidden" name=vote value="down" />
        <input class="btn btn-dark btn-sm" type="submit" value="Downvote" /></td>
      </form>
      </center></tr>';
  }
  $aTable.="</table></center>";  
  return $aTable;
}

function addAnswer($qid,$answer,$email){
  $s = "INSERT INTO Answers(QID,answer,email,upvote,downvote) values('$qid','$answer', '$email', '0','0')";
  runMysqlQuery($s);
}

function changeVote($aid,$vote){
  if($vote == "up"){
  
  $s = "UPDATE Answers SET upvote=upvote+1 Where AID='$aid'"; 
  } else {
  $s = "UPDATE Answers SET downvote=downvote+1 Where AID='$aid'"; 
  }
  echo $s;
  runMysqlQuery($s);
}


?>