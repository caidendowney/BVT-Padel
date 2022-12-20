<!-- This page reviews the users input and gives them the option to go back and change their answers or submit there answers -->
<?php session_start(); ?>
<?php
  $page_title='BVT Padel Homepage';
  include('header.php');
?>
<h2> Review Your Responses </h2>
<?php
  $q1=$_POST["Q1"];
  $q2=$_POST["Q2"];
  $q3=$_POST["Q3"];
  $q4=$_POST["Q4"];
  $q5=$_POST["Q5"];
  $q6=$_POST["Q6"];

  $_SESSION["Q1"] = $q1;
  $_SESSION["Q2"] = $q2;
  $_SESSION["Q3"] = $q3;
  $_SESSION["Q4"] = $q4;
  $_SESSION["Q5"] = $q5;
  $_SESSION["Q6"] = $q6;
 


  if (strlen($_POST["Q1"]) > 0){
    echo "Answered Q1 <br>";
    echo $_POST["Q1"]."<br>";
  }
  else {
    echo "Please answer Q1 <br>";
  }
  if (strlen($_POST["Q2"]) > 0){
    echo "Answered Q2 <br>";
    echo $_POST["Q2"]."<br>";
  }
  else {
    echo "Please answer Q2 <br>";
  }
  if (strlen($_POST["Q3"]) > 0){
    echo "Answered Q3 <br>";
    echo $_POST["Q3"]."<br>";
  }
  else {
    echo "Please answer Q3 <br>";
  }
  if (strlen($_POST["Q4"]) > 0){
    echo "Answered Q4 <br>";
    echo $_POST["Q4"]."<br>";
  }
  else {
    echo "Please answer Q4 <br>";
  }
  if (strlen($_POST["Q5"]) > 0){
    echo "Answered Q5 <br>";
    echo $_POST["Q5"]."<br>";
  }
  else {
    echo "Please answer Q5 <br>";
  }
  if (strlen($_POST["Q6"]) > 0){
    echo "Answered Q6 <br>";
    echo $_POST["Q6"]."<br>";
  }
  else {
    echo "Please answer Q6 <br>";
  }
  ?>
  <br>
  <a href="bvtMembers.php">
        <input type="submit" id="back" name="back" value="Back"/> 
  </a>
  <a href="submitSurvey.php">
        <input type="submit" id="submit" name="submit" value="Submit"/> 
  </a>
  <br>
  <br>
<?php 
  include('footer.php');
?>