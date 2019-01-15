<?php
//include database connection
include '../log/dbconnect.php';

//session start
session_start();
//onclick update
if (isset($_POST['updatecard'])) {
    $cardnumber = $_SESSION['ECNo'];
    $name = $_POST['name'];
    $mobile = $_POST['mobilenumber'];
    $address = $_POST['address'];

    echo ($cardnumber . "<br>" . $name . "<br>" . $mobile . "<br>" . $address . "<br>");

    $check = "SELECT *FROM cards WHERE card_number = $cardnumber";
    $execute = mysqli_query($conn, $check);
    if (mysqli_num_rows($execute) != 0) {

        $update = "UPDATE cards 
        SET name = '$name',
        mobile = '$mobile',
        address = '$address'
        WHERE card_number = '$cardnumber'";

        if (mysqli_query($conn, $update)) {
            $_SESSION['success'] = "Worker with card number " . $cardnumber . " updated Successfully";
            header("Location:../supervisor/cards.php");
            exit();
        } else {
            $_SESSION['error'] = ("Error: " . "<br>" . $conn->error);
            header("Location:../error/error.php");
            exit();
        }

    } else {
        $_SESSION['warning'] = "Card number dosen't exist..!";
        header("Location:../supervisor/cards.php");
        exit();
    }
}
?>