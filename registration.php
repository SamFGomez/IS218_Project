<?php include('header.php'); ?>

<h1 class="mt-5"><center>Registration</center></h1>
<div class="container">
	<form action='index.php' method='get'>
   <input type="hidden" name="action" value="register">
	  <div class="form-group">
		First Name: <input class="form-control" type='text' id='firstName' name='firstName'><br>
		Last Name:	<input class="form-control" type='text' id='lastName' name='lastName'><br>
		Birthday: 	<input class="form-control" type='text' id='birthday' name='birthday'><br>
		Email: 		<input class="form-control" type='text' id='email' name='email'><br>
		Password:	<input class="form-control" type='text' id='password' name='password'><br>
    <center><input class="btn btn-dark" type='submit'></center>
    </div>
 	</form>
  </div>

<?php include('footer.php'); ?>