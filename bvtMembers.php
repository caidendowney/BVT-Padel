<!-- BVT member site which includes upcoming events, sign up options, a comment board, and a survey. -->
<?php session_start(); ?> 
<script>
	function getUser(){ // Returns users username
		 document.getElementById("user").value = username;
	}
	function showComment(){ // Post all comments in database to the message board
		let comments = document.getElementById("comments");
		let comment = document.createElement("div");
		let  user  = document.createElement("div");
		let block = document.createElement("div");
		block.className = "block";
		comment.className = "comment";
		let node = document.createTextNode(commentText);
		comment.appendChild(node);
		user.className = "user";
		node = document.createTextNode(userID);
		user.appendChild(node);
		block.appendChild(user);
		block.appendChild(comment);
		comments.appendChild(block);
		comments.appendChild(document.createElement("br"));
	}
</script>
<!-- Checks for valid login entry -->
<?php 
	$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
	if ($mysqli->connect_errno){
   		die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
	}
	if (isset($_SESSION['username'])){
		echo 'Welcome '.$_SESSION['username'];
		echo '<script> var username = "'.$_SESSION['username'].'"; </script>';
	} 
	else {
    $user = $_POST["username"];
	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $mysqli->query($sql);
	if (!$result){
	  		die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
	} 
	while ($row = $result->fetch_row()){
					$user = $row[1];
					$pw = $row[2];
				}
	$answer = password_hash($pw, PASSWORD_BCRYPT);
	if(password_verify($_POST["password"], $answer)) {
		$_SESSION["username"] = $user;
		$_SESSION["password"] = $pw;
		echo 'Welcome '.$_SESSION['username'];
		echo '<script> var username = "'.$_SESSION['username'].'"; </script>';
	}
	else {
		echo 'Invalid username or password!';
		header('Location: http://localhost/Final/bvtLogin.php');
	}
 }
	?>
<?php
	$page_title='BVT Padel Members Page';
	include('header.php');
?>
			<div class="events"> 
				<?php 
					include('event.php');
				?>
			</div>
			<?php 
				include('slideshow.php');
			?>
  			<br>
  			<!-- Comments -->
  			<h2> Comments </h2>
  			<div id="comments"> </div>
  				<form action="post_comment.php" method="post" id="commentForm">
    				<label for="comment">  </label>
					<textarea name="comment" id="comment" rows="8" cols="30"placeholder="Leave a comment!"></textarea>
					<input type="hidden" name="user" id="user"> 
					<br>
					<br>
					<input id="commentSubmit" type="submit" name="submit" value="Submit" onclick="getUser()">
				</form>
  			<br>
  			<!-- Survey -->
  			<h2> Take Our Survey! </h2>
  			<form id ="survey" action="handleSurvey.php" method="post">
				<fieldset>
				<legend> BVT Survey </legend>
				<!-- Q1 -->
				<p><label for="Q1">Who are you? </label>
					<input type="text" name="Q1" id = "Q1" value="<?php if (isset($_SESSION['Q1'])) echo $_SESSION['Q1']; ?>"/>
				</p>
				<!-- Q2 -->
				<p><label for="Q2">How long have you been a member at BVT Padel? </label>
				<?php if (isset($_SESSION['Q2'])) { ?>
					<?php if ($_SESSION['Q2'] == "Less than a year") { ?>
						<div> <input type="radio" name="Q2" id="A" value="Less than a year" checked/>
						<?php } else{ ?>
							<div> <input type="radio" id="q1a1" name="Q1" value="Less than a year">
					<?php } ?>
						<label for="A"> Less than a year </label> </div>
					<?php if ($_SESSION['Q2'] == "1-3 Years") { ?>
						<div> <input type="radio" name="Q2" id="B" value="1-3 Years" checked/>
					<?php } else{ ?>
							<div> <input type="radio" id="A" name="Q2" value="1-3 Years">
					<?php } ?>
						<label for="B"> 1-3 Years </label> </div>
					<?php if ($_SESSION['Q2'] == "5-10 Years") { ?>
						<div> <input type="radio" name="Q2" id="C" value="5-10 Years" checked/>
					<?php } else{ ?>
							<div> <input type="radio" id="C" name="Q2" value="5-10 Years"> 
					<?php } ?>
						<label for="C"> 5-10 Years </label> </div>
					<?php if ($_SESSION['Q2'] == "Over 10 years") { ?>
						<div> <input type="radio" name="Q2" id="D" value="Over 10 years" checked/>
					<?php } else{ ?>
							<div> <input type="radio" id="D" name="Q2" value="Over 10 years">
					<?php } ?>
						<label for="D"> Over 10 years </label> </div>
				<?php } else{ ?>
					<div> <input type="radio" name="Q2" id="A" value="Less than a year"/>
					<label for="A"> Less than a year </label> </div>
					<div> <input type="radio" name="Q2" id="B" value="1-3 Years"/>
					<label for="B"> 1-3 Years </label> </div>
					<div> <input type="radio" name="Q2" id="C" value="5-10 Years"/>
					<label for="C"> 5-10 Years </label> </div>
					<div> <input type="radio" name="Q2" id="D" value="Over 10 years"/>
					<label for="D"> Over 10 years </label> </div>
				<?php } ?>	
				</p>
				<!-- Q3 -->
				<p> Do you think adding another court would be beneficial?  
					<?php if (isset($_SESSION['Q3'])) { ?>
						<?php if ($_SESSION['Q3'] == "Yes") { ?>
							<input type="radio" name="Q3" id="yes" value="Yes" checked />
						<?php } else{ ?>
							<input type="radio" name="Q3" id="yes" value="Yes"/>
						<?php } ?>
						<label for="yes"> Yes </label>
						<?php if ($_SESSION['Q3'] == "No") { ?>
							<input type="radio" name="Q3" id="no" value="No" checked />
						<?php } else{ ?>
							<input type="radio" name="Q3" id="no" value="No"/>
						<?php } ?>
						<label for="no"> No </label>
					<?php } else{ ?>
						 <input type="radio" name="Q3" id="yes" value="Yes"/>
						 <label for="yes"> Yes </label>
						 <input type="radio" name="Q3" id="no" value="No"/>
						 <label for="no"> No </label>
					<?php } ?>
				</p>
				<!-- Q4 -->
				<p><label for="Q4"> Which of the following would you be interested in playing at BVT Padel? </label>
				<?php if (isset($_SESSION['Q4'])) { ?>
					<?php if ($_SESSION['Q4'] == "Tennis") { ?>
						<div> <input type="radio" name="Q4" value="Tennis" id="tennis" checked/>
					<?php } else{ ?>
						<div> <input type="radio" name="Q4" value="Tennis" id="tennis"/>
					<?php } ?>
     			 	<label for="tennis">Tennis</label>
     			 	<?php if ($_SESSION['Q4'] == "Pickleball") { ?>
    					<div> <input type="radio" name="Q4" value="Pickleball" id="pickle" checked/>
    				<?php } else{ ?>
    					<div> <input type="radio" name="Q4" value="Pickleball" id="pickle"/>
    				<?php } ?>
     				 <label for="pickle">Pickleball</label> </div>
     				 <?php if ($_SESSION['Q4'] == "Racquetball") { ?>
    					<div> <input type="radio" name="Q4" value="Racquetball" id="racquet" checked/>
    				<?php } else{ ?>
						<div> <input type="radio" name="Q4" value="Racquetball" id="racquet"/>
    				<?php } ?>
      				<label for="racquet">Racquetball</label> </div>
      			<?php } else{ ?>
      				<div> <input type="radio" name="Q4" value="Tennis" id="tennis"/>
      				<label for="tennis">Tennis</label> </div>
      				<div> <input type="radio" name="Q4" value="Pickleball" id="pickle"/>
      				<label for="pickle">Pickleball</label></div>
      				<div> <input type="radio" name="Q4" value="Racquetball" id="racquet"/>
      				<label for="racquet">Racquetball</label> </div>
      			<?php } ?>	
				<!-- </select></p> -->
			<!-- Q5 -->
			<p><label for="Q5">What kinds of food would you want at BVT Padel? </label>
			<input type="text" name="Q5" id="Q5" rows="1" cols="50" value="<?php if (isset($_SESSION['Q5'])) echo $_SESSION['Q5']; ?>"/> </p>
			<!-- Q6 -->
			<p><label for="Q6"> How do you think the current management is performing? </label>
				<select name="Q6" id="Q6">
				<?php if (isset($_SESSION['Q6'])){ ?>	 
					<option value="Great">Great</option>
					<option <?php if($_SESSION['Q6']=="Good") echo 'selected="selected"'; ?> value="Good">Good</option>
					<option <?php if($_SESSION['Q6']=="Ok") echo 'selected="selected"'; ?> value="Ok">Ok</option>
					<option <?php if($_SESSION['Q6']=="Poor") echo 'selected="selected"'; ?> value="Poor">Poor</option>
					<option <?php if($_SESSION['Q6']=="Terrible") echo 'selected="selected"'; ?> value="Terrible">Terrible</option>
				<?php } else{ ?>
					<option value="Great">Great</option>
					<option value="Good">Good</option>
					<option value="Ok">Ok</option>
					<option value="Poor">Poor</option>
					<option value="Terrible">Terrible</option>
				<?php } ?>
				</select></p>
		    </fieldset>
		    <p><input type="submit" name="submit" id="submit" value="Submit"></p> 
		</form>
		<br>
<?php 
	include('footer.php');
?>
<!-- GET COMMENTS -->
<?php
$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
if ($mysqli->connect_errno){
   die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
}
				$sql = "SELECT * FROM comments WHERE 1";
				$result = $mysqli->query($sql);
				if (!$result){
	  					die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
				} 
				while ($row = $result->fetch_row()){ ?>
					<script>
    						var userID = '<?php echo $row[0]; ?>';
    						var commentText = '<?php echo $row[1]; ?>';
					</script>
					<?php 
					echo "<script> showComment(); </script>";
				} 
?>
