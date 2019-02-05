<?php
// session start
session_start();

// conncetion to database
include('../log/dbconnect.php');

// isset for bill submit
if(isset($_POST['apply'])) {
    echo("Apply clicked");
}
?>