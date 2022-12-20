<!-- This is the admins page which allows admins to create new events to put onto the members page. -->
<?php session_start(); ?> 
<?php 
	$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
	if ($mysqli->connect_errno){
   		die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
	}
	if (isset($_SESSION['admin'])){
		echo 'Welcome '.$_SESSION['admin'];
	}
	else {
    $user = $_POST["admin"];
	$sql = "SELECT * FROM admins WHERE Username = '$user'";
	$result = $mysqli->query($sql);
	if (!$result){
	  		die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
	} 
	while ($row = $result->fetch_row()){
					$pw = $row[2];
				}
	$answer = password_hash($pw, PASSWORD_BCRYPT);
	if(password_verify($_POST["password"], $answer)) {
		$_SESSION["admin"] = $user;
		$_SESSION["password"] = $pw;
		echo 'Welcome '.$_SESSION['admin'];
	}
	else {
		echo 'Invalid username or password!';
		header('Location: http://localhost/Final/bvtLogin.php');
	}
 }
	?>
<?php
	$page_title='BVT Padel Admins Page';
	include('header.php');
?>
<br>
<form method="post" action="eventHandler.php">
	<label for="title"> Event title: </label>
	<input type="text" id="title" name="title" value="<?php if (isset($_SESSION['title'])) echo $_SESSION['title']; ?>">
	<br>
	<br>
	<label for="date"> Date of event: </label>
	<input type="date" id="date" name="date" value="<?php if (isset($_SESSION['date'])) echo $_SESSION['date']; ?>">
	<br>
	<br>
	<label for="time"> Time of event: </label>
	<input type="time" id="time" name="time" value="<?php if (isset($_SESSION['time'])) echo $_SESSION['time']; ?>">
	<br>
	<br>
	<label for="desc"> Event description: </label>
	<input type="text" id="desc" name="desc" value="<?php if (isset($_SESSION['desc'])) echo $_SESSION['desc']; ?>">
	<br>
	<br>
	<label for="image"> Event cover image (url): </label>
	<input type="url" id="image" name="image" value="<?php if (isset($_SESSION['image'])) echo $_SESSION['image']; ?>">
	<br>
	<br>
	<input type="submit" name="add" id="add" value="Add event">
</form>
<br>
<?php 
	include('footer.php');
?>