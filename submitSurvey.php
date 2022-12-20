 <!-- This page takes the survey entries and writes them to a file "entries.txt" -->
 <?php session_start(); 
  $q1 = $_SESSION["Q1"];
  $q2 = $_SESSION["Q2"];
  $q3 = $_SESSION["Q3"];
  $q4 = $_SESSION["Q4"];
  $q5 = $_SESSION["Q5"];
  $q6 = $_SESSION["Q6"];

   
  $filename="entries.txt";
  $fp=fopen($filename, "a");
  $fw=fwrite($fp, "$q1\n");
  $fw=fwrite($fp, "$q2\n");
  $fw=fwrite($fp, "$q3\n");
  $fw=fwrite($fp, "$q4\n");
  $fw=fwrite($fp, "$q5\n");
  $fw=fwrite($fp, "$q6\n");
  fclose($fp); 
  ?>
<?php
    $page_title='BVT Padel Homepage';
    include('header.php');
?>
             <h2> Survey submitted, thank you for your response. </h2>
             <br>
             <a href="bvtMembers.php">
                <input type="submit" id="back" name="back" value="Back to homepage"/> 
            </a>
            <br>
            <br>
<?php 
    include('footer.php');
?>