<?php include('header.php'); 
session_start();
$qid = $_GET['qid'];
$question = $_SESSION['questions'];
$answers = $_SESSION['answers'];
$answerForm ="";

if($_GET['userQ'] == "false"){
  $answerForm = '<form action="index.php" method="get">
    <input type="hidden" name="qid" value="'.$qid.'">
    <input type="hidden" name="action" value="submit_answer">
    <div class="form-group">
	  Submit Answer: <input class="form-control" type="text" name="answer" id="answer">
    <br>
    <center><input class="btn btn-dark" type="submit" value="Answer"></center>
    </div>
    </form>';
}

?>

<h1 class="mt-5"><center>View Question</center></h1>

<div class="container">
<br><br>
<?php echo $question; ?>
<br>
<h4 class="mt-5"><center>Answers</center></h4>
<br>
<?php echo $answers; ?>
<br><br>
<?php echo $answerForm; ?>
<br><br>
<center>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="display_questions"/>
    <input class="btn btn-dark" type="submit" value="Return Home" />
</form>
</center>
</div>


<br>



<?php include('footer.php'); ?>