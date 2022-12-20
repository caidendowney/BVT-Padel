<!-- This page contains all the events in the database -->
<link rel="stylesheet" href="paddleStyle.css" />
<div id="events"> 
	<h2> Events </h2>
	<div class="event" id="event">
	</div> 
</div>
<div id="signUp">
		<input type="submit" name="signup" id="signup" value="Sign up for an event!" onclick="signUp()">
		<br>
		<div id="signUpForm"> </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script>
	var eventList = new Array();
	var index = -1;
	function showEvent(){ // Posts events from database to members site
		let events = document.getElementById("events");
		events.appendChild(document.createElement("br"));
		let event = document.createElement("event");
		//Title
		let  title  = document.createElement("div");
		title.className = "title";
		let node = document.createTextNode(titleText);
		title.appendChild(node);
		eventList.push(titleText);
		events.appendChild(title);
		// Image
		let img = document.createElement("img");
		img.src = imageURL;
		img.className = "image";
		events.appendChild(img);
		//Date
		let  date  = document.createElement("div");
		date.className = "date";
		node = document.createTextNode(dateText);
		date.appendChild(node);
		node = document.createTextNode("  " + timeText);
		date.appendChild(node);
		events.appendChild(date);
		//Description
		let  desc  = document.createElement("div");
		desc.className = "desc";
		node = document.createTextNode(descText);
		desc.appendChild(node);
		events.appendChild(desc);
		// Participants
		let  part  = document.createElement("div");
		part.className = "part";
		node = document.createTextNode("Participants: " + participants);
		part.appendChild(node);
		events.appendChild(part);
		events.appendChild(document.createElement("br"));
		index++;
}
function signUp(){ // Signs user up for event
	var string = "event";
	var text;
	for (i = 0; i <= index; i++){
		string += i;
		if(document.getElementById(string).checked) {
			text = eventList[i];
			break;
		}
		string = "event";
	}
	var title = text;
	var input = 1;
	while(input == 1){
		var name = prompt("Please enter your name", "");
		if (name!= "") {
    		alert("Thanks, " + name + " you are signed up.");
    		input = 0;
    	}
    }
   // Sends the name and the event title to signUp.php which enters that into the database
   $.ajax({
            url: "signUp.php",
            type: 'POST',
            data: {nameText: name, titleText: title},
            success: function(data) {
                console.log("success");
            }
        });

}
function placeRadio(){ // Places signup radio button for each event
     const radio = document.getElementById("signUpForm");
    for (i = 0; i < eventList.length; i++) {
    	let label = document.createElement("label2");
    	label.innerText = eventList[i];
    	 let input = document.createElement("input");
    	input.type = "radio";
    	input.name = "events";
    	input.id = "event" + i;
    	label.appendChild(input);
    	radio.appendChild(label);
	}
	
}

</script>
<?php
$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
if ($mysqli->connect_errno){
   die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
}
				$sql = "SELECT * FROM events WHERE 1";
				$result = $mysqli->query($sql);
				if (!$result){
	  					die("Query Error: ($mysqli->errno) $myspli->error<br>SQL = $sql");
				} 
				while ($row = $result->fetch_row()){ ?>
					<script>
    						var titleText = '<?php echo $row[0]; ?>';
    						var dateText = '<?php echo $row[1]; ?>';
    						var timeText = '<?php echo $row[2]; ?>';
    						var descText = '<?php echo $row[3]; ?>';
    						var participants = '<?php echo $row[4]; ?>';
    						var imageURL = '<?php echo $row[5]; ?>';
					</script>
					<?php 
					echo "<script> showEvent(); </script>"; // Places event
				} 
				echo "<script> placeRadio(); </script>"; // Places button
?>

