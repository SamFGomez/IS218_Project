<?php include('header.php'); ?>

<h1 class="mt-5"><center>LogIn</center></h1>

<div class="container">
<form action="index.php" method="get">
  <input type="hidden" name="action" value="login">
  <div class="form-group">
	Email: <input class="form-control" type="text" name="email" id="email">
	<br>
	Password: <input class="form-control" type="text" name="password" id="password">
	<br>
	 <center><input class="btn btn-dark" type='submit'></center>
 </div>

</form>
</div>
<br>
<center><a class="text-dark" href="index.php?action=display_registration"> Create Account </a></center>

<?php include('footer.php'); ?>