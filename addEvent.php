<!-- This page inserts the event into the bvtpadel database -->
<?php 
include('header.php');
session_start(); 
$mysqli = new mysqli("localhost", "root", "", "bvtpadel");
if ($mysqli->connect_errno){
   die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error"); 
}
   $title = $_SESSION["title"];
   $date = $_SESSION["date"];
   $time = $_SESSION["time"];
   $desc = $_SESSION["desc"];
   $image = $_SESSION["image"];
   $participants="";


$sql = "INSERT INTO events VALUES ('$title', '$date', '$time', '$desc', '$participants', '$image')";
if (!$mysqli->query($sql)){
   die("Error ($mysqli->errno) $mysqli->error<br>SQL = $sql\n");
   }
else {
   ?> <script> alert("Event added to database"); </script>
   <?php
}
?>
<a href="bvtAdmins.php">
      <input type="submit" id="back" name="back" value="Back to admin page"/> 
</a>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
   include('footer.php');
?>