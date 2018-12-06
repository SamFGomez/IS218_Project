<?php include('header.php'); ?>
<body class="bg-info">

<h1 class="mt-5"><center>Edit Question</center></h1>
</br>
</br>
</br>

<div class="container">
	<form  action='index.php' method="get">
		<div class="form-group">
    <input type="hidden" name="action" value="edit_question"/>
    <input type="hidden" name='qid' value='<?php echo $_GET['qid']?>' />
    Question Name: <input class="form-control" type='text' id='qName' name='qName' value='<?php echo $_GET['name']?>' /><br><br>
		Question Body: <input class="form-control" type='text' id='qBody' name='qBody' value='<?php echo $_GET['body']?>' /><br><br>
		Question Skills(Comma Separated):<br>
		<input class="form-control" type='text' id='qSkills' name='qSkills'value='<?php echo $_GET['skills']?>' /><br><br>
		<center><input class="btn btn-dark" type='submit'/></center>
   </div>
	</form>
 </div>
 
<?php include('footer.php'); ?>