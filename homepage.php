<?php
session_start();
$email = $_SESSION['email'];
$fullName = $_SESSION['fullName'];
$qList = $_SESSION['questions'];
$view = $_SESSION['view'];

include('header.php');
?>

<html>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="logout"/>
    <input class="btn btn-dark" type="submit" value="Log Out" />
</form>
<body class="bg-info">
<div class="container">

<center><h2>Current User: <b><?php echo $fullName; ?></b></h2></center>
</br>
<h4>
<center><b><?php echo $view ?> Question List</b></center>
</h4>
</br>
 <?php 
 
   echo $qList;
 
 ?>
</br></br>


<center>

<form action="index.php" method="get">
    <input type="hidden" name="action" value="toggle_view"/>
    <input class="btn btn-dark" type="submit" value="Toggle View" />
</form>
<br>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="display_new_question"/>
    <input class="btn btn-dark" type="submit" value="Add Question" />
</form>
<br>

</center>
</div>

<?php include('footer.php'); ?>