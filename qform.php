<?php include('header.php'); ?>

<h1 class="mt-5"><center>Add Question Form</center></h1>
</br>
</br>
</br>

<div class="container">
	<form  action='index.php' method="get">
		<div class="form-group">
    <input type="hidden" name="action" value="create_new_question"/>
    Question Name: <input class="form-control" type='text' id='qName' name='qName'/><br><br>
		Question Body: <input class="form-control" type='text' id='qBody' name='qBody'/><br><br>
		Question Skills(Comma Separated):<br>
		<input class="form-control" type='text' id='qSkills' name='qSkills'/><br><br>
		<center><input class="btn btn-dark" type='submit'/></center>
   </div>
	</form>
 </div>

<?php include('footer.php'); ?>