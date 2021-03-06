<?php

//include database
include('../log/dbconnect.php');

//session start
session_start();

//onclick of check
if (isset($_POST['checkcard'])) {
    
    // To check wether stock is available or not
    $store = "SELECT *FROM store_data WHERE store_name = 'Coimbatore (Central)'";

    $exe = mysqli_query($conn, $store);
    if ($row = mysqli_fetch_assoc($exe)) {
        if($row['available_rice'] == 0 || $row['available_sugar'] == 0 || $row['available_wheat'] == 0 || $row['available_dhall'] == 0) {
            $_SESSION['warning'] = "Insufficient amount of item in stores..";
            header("Location:../supplier/home.php");
            exit();
        }
    }
    $cardnumber = $_POST['cardnumber'];
    try {
        $check = "SELECT *FROM cards WHERE card_number = $cardnumber";
        $execute = mysqli_query($conn, $check);

        if ($row = mysqli_num_rows($execute) == 0) {
            $_SESSION['warning'] = " Card number dosen't exist.";
            header("Location:../supplier/home.php");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($execute)) {
                date_default_timezone_set("Asia/Kolkata");
                $store = $_SESSION['store_name'];
                $currentdate = date('Y-m-d');
                $currenttime = date('h:i a');
                if ($currenttime >= "09:00 am" && $currenttime <= "10:59 am") {
                    $set = '1';
                } else if ($currenttime >= "11:00 am" && $currenttime <= "12:59 pm") {
                    $set = '2';
                } else if ($currenttime >= "02:00 pm" && $currenttime <= "03:59 pm") {
                    $set = '3';
                } else if ($currenttime >= "04:00 pm" && $currenttime <= "05:00 pm") {
                    $set = '4';
                } else {
                    $set = 'null';
                }
                $statement = "SELECT * FROM cards WHERE card_number = '$cardnumber' AND reservation_date = '$currentdate' AND reservation_set = '$set' AND store = '$store' AND status = '0'";

                $exe = mysqli_query($conn, $statement);

                if ($rowstatement = mysqli_num_rows($exe) != 0) {
                    $_SESSION['supplycdno'] = $cardnumber;
                    header("Location:../supplier/supply.php");
                    exit();
                } else {
                    $_SESSION['info'] = " No schedule available today";
                    header("Location:../supplier/home.php");
                    exit();
                }
            }
        }
    } catch (Exception $ex) {
        $_SESSION['error'] = $e;
        header("Location:../error/error.php");
        exit();
    }
}

?>