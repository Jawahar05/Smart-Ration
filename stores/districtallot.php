<?php
//db connection
include('../log/dbconnect.php');
//session start
session_start();

//on click of Check
if(isset($_POST['check'])) {
    $_SESSION['storedist'] = $_POST['district'];

    header("Location:../admin/allocate.php");
    exit();
}
?>