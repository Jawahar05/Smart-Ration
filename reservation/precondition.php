<?php
// Dbconnect
include('../log/dbconnect.php');

//check control
if(isset($_POST['apply'])) {
   $workdays = $_POST['totaldays'];
   $cards = $_POST['cards'];

   $daylimit = ceil($cards/$workdays);
   
   echo("Days limit " . $daylimit);

   $setlimit = ceil($daylimit/3);

   echo("<br>Set limit " . $setlimit);
   
   $query = "UPDATE calendar SET per_set = '$setlimit', per_day = '$daylimit' WHERE id>0";

   mysqli_query($conn, $query);
} 
?>