<?php
//session start
session_start();

//db connection
include('../log/dbconnect.php');

//on click update
if(isset($_POST['update'])){
    $id = $_SESSION['EWId'];
    $name = $_SESSION['EWuser'];
    $mobile = $_SESSION['EWmobile'];
    $email = $_SESSION['EWmail'];
    $position = $_POST['postion'];

    if ($position == "administrator") {
        $district = null;
        $taluk = null;
        $store = null;
    } else if ($position == "supervisor") {
        $store = null;
        $taluk = null;
        $district = preg_replace("/\s+/", "", $_POST['district']);

    } else if ($position == "supplier") {
        $taluk = preg_replace("/\s+/", "", $_POST['store']);
        $store = preg_replace("/\s+/", "", $_POST['store']);
        $district = preg_replace("/\s+/", "", $_POST['district']);

    }
  
    $updatevalue = "UPDATE worker_login 
            SET position = '$position',
             store_name = '$store',
              taluk = '$taluk',
               district = '$district'
             WHERE id = $id";
             echo("code inserted");
            if (mysqli_query($conn, $updatevalue)) {
                $_SESSION['success'] = "Worker with Id no " . $id . " updated Successfully";
                header("Location:../admin/workers.php");
                exit();
            } else {
                // $_SESSION['error'] = ("Error: " . "<br>" . $conn->error);
                // header("Location:../error/error.php");
                // exit();
            }

    echo("Id : ". $id . "<br>Name : " . $name . "<br>Mobile : " .$mobile . "<br>Email : " .$email . "<br>Positon : " .$position
. "<br>District : " . $district . "<br>Taluk : " .$taluk );
}
?>