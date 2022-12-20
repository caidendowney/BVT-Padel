<!-- This page takes the username and comment and places it into the comments table in the database -->
<?php
$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
			if ($mysqli->connect_errno){
   				die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
			}
			$username = $_POST["user"];
			$comment = $_POST["comment"];
			$sql = "INSERT INTO `comments`(`userID`, `comment`) VALUES ('$username','$comment')";
				$result = $mysqli->query($sql);
				if (!$result){
	  					die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
				} 
			header("Location: bvtMembers.php");
			exit();
?>