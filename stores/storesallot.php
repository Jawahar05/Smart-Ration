<?php
//include dbconnect
include('../log/dbconnect.php');

//start session
session_start();

//on check
if(isset($_POST['check'])) {
    $_SESSION['storetaluk'] = $_POST['taluk'];

    header("Location:../supervisor/allocate.php");
    exit();
}


?>