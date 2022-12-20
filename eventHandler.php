<!-- This page allows the admin to review their responses and submit the event via addEvent.php -->
<?php
	session_start(); 
	$page_title='BVT Padel Event Handler';
	include('header.php');
	$title=$_POST["title"];
  	$date=$_POST["date"];
  	$time=$_POST["time"];
  	$desc=$_POST["desc"];
  	$image=$_POST["image"];

  	$_SESSION["title"] = $title;
  	$_SESSION["date"] = $date;
  	$_SESSION["time"] = $time;
  	$_SESSION["desc"] = $desc;
  	$_SESSION["image"] = $image;
 


  if (strlen($_POST["title"]) > 0){
    echo "Provided title <br>";
    echo $_POST["title"]."<br>";
  }
  else {
    echo "Please provide a title <br>";
  }
  if (strlen($_POST["date"]) > 0){
    echo "Entered date <br>";
    echo $_POST["date"]."<br>";
  }
  else {
    echo "Please enter a date <br>";
  }
  if (strlen($_POST["time"]) > 0){
    echo "Provided a time <br>";
    echo $_POST["time"]."<br>";
  }
  else {
    echo "Please provide a time <br>";
  }
  if (strlen($_POST["desc"]) > 0){
    echo "Entered description <br>";
    echo $_POST["desc"]."<br>";
  }
  else {
    echo "Please enter a description <br>";
  }
  if (strlen($_POST["image"]) > 0){
    echo "Provided an image url <br>";
    echo $_POST["image"]."<br>";
  }
  else {
    echo "Please provide an image url <br>";
  }	
?>
<br>
<br>
  <a href="bvtAdmins.php">
        <input type="submit" id="back" name="back" value="Back"/> 
  </a>
  <a href="addEvent.php">
        <input type="submit" id="submit" name="submit" value="Submit"/> 
  </a>
  <br>
  <br>
<?php 
	include('footer.php');
?>