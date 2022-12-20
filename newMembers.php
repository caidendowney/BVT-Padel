<!-- This page contains the form for users to sign up as new members -->
<?php
	$page_title='BVT Padel';
	include('header.php');
?>
			<h2> Become A Member! </h2> 
			<br>
			<form method="post" action="welcomeNewMembers.php">
				<label for="username"> Username: </label>
				<input type="text" id="username" name="username">
				<label for="password"> Password: </label>
				<input type="password" id="password" name="password">
				<input type="submit" name="submit" value="Join">
			</form>
			<br>
			<br>
			<br>
			<br>
<?php 
	include('footer.php');
?>