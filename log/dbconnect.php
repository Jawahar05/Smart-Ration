<?php

//Database Credentials
$Host_Name = "localhost";
$Host_User = "root";
$Host_Passowrd = "";
$Database_Name = "smartration";

//make connection
$conn = mysqli_connect($Host_Name, $Host_User, $Host_Passowrd, $Database_Name);

//check conntection
if(!$conn) {
    echo "Database Connection error..!";
}
?>