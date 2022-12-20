<!-- This page welcomes new members and puts their information into the database. -->
<?php session_start(); ?> 
<?php
$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
if ($mysqli->connect_errno){
   die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
}
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO `users`( `Username`, `Password`) VALUES ('$username','$password')";
if (!$mysqli->query($sql)){
   die("Error ($mysqli->errno) $mysqli->error<br>SQL = $sql\n");
   }
?>
<?php
	$page_title='Welcome to BVT Padel';
	include('header.php');
?>
			<h2> Welcome to BVT Padel, thank you for becoming a member! </h2>
			<h2> Please head back to the homepage and sign-in. </h2>
			<br>
			<br>
			<a href="homepage.php">
        		<input type="submit" id="back" name="back" value="Home"/> 
  			</a>
  			<br>
<?php 
	include('footer.php');
?>