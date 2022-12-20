<!-- Allows either a member or admin to login -->
<?php
	$page_title='BVT Padel Login';
	include('header.php');
	session_start();
?>
<h2> Enter Your Username and Password </h2>
<form method="post" action="bvtMembers.php">
	<label for="username"> Username: </label>
	<input type="text" id="username" name="username">
	<br>
	<br>
	<label for="password"> Password: </label>
	<input type="password" id="password" name="password">
	<br>
	<br>
	<input type="submit" name="submit" value="Login">
</form>
<br>
<h2> For Admins: </h2>
<form method="post" action="bvtAdmins.php">
	<label for="admin"> Username: </label>
	<input type="text" id="admin" name="admin">
	<br>
	<br>
	<label for="password"> Password: </label>
	<input type="password" id="password" name="password">
	<br>
	<br>
	<input type="submit" name="submit" value="Login">
</form>
<br>
<?php 
	include('footer.php');
?>