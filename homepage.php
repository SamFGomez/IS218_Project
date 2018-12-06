<?php

$email = $_SESSION['email'];
$fullName = $_SESSION['fullName'];
$qList = $_SESSION['userQuestions'];

include('header.php');
?>

<html>
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>

</head>
<body class="bg-info">
<div class="container">


<center><h2>Current User: <b><?php echo $fullName; ?></b></h2></center>
</br>
<h4>
<center><b>Question List</b></center>
</h4>
</br>
 <?php 
 
   echo $qList;
 
 ?>
</br></br>


<center>

<form action="index.php" method="get">
    <input type="hidden" name="action" value="display_new_question"/>
    <input class="btn btn-dark" type="submit" value="Add Question" />
</form>

</center>
</div>

<?php include('footer.php'); ?>