<!-- This page updates the participants column for a event when a user signs up -->
<?php
			$name = $_POST['nameText'];
			$title = $_POST['titleText'];
			$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
			if ($mysqli->connect_errno){
   				die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
			}
			$sql = "SELECT `participants` FROM events WHERE `title` = '$title'";
				$result = $mysqli->query($sql);
				if (!$result){
	  					die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
				} 
				while ($row = $result->fetch_row()){
					$pastPart = $row[0];
				}
			if (strlen($pastPart) == 0){
				$partic = $name;
			}
			else {
				$partic = $pastPart . ', ' . $name;
			}
			$sql = "UPDATE `events` SET `participants` = '$partic' WHERE `title` = '$title'";
			$result = $mysqli->query($sql);
			if (!$result){
	  			die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
			} 
?>
