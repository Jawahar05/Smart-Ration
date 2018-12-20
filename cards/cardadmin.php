<?php 

//session start
session_start();

//import db
include("../log/dbconnect.php");

//on new card submit
if (isset($_POST['newSubmit'])) {
    $name = $_POST['firstname'] . " " . $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['doorno'] . ", " . $_POST['street'] . ", " . $_POST['town'];
    $district = $_POST['district'];
    $store = $_POST['store'];
    $members = $_POST['members'];
    $cardtype = $_POST['cardtype'];
    $datejoined = date("Y/m/d");
    //cardnumber
    $cardnumber = date("dmyhis");
    try {
        //checking whether user alerady exist
        $check = "SELECT *FROM cards WHERE mobile = $mobile";
        $execute = $conn->query($check);
        if (mysqli_num_rows($execute) != 0) {
            echo ('<script language="javascript">alert("Mobile number alerady exist.!")</script>');
        } else {
            $insert = "INSERT INTO cards (card_number, name, mobile, address, district, store, members, card_type, date_joined)
            VALUES ('$cardnumber', '$name', '$mobile', '$address', '$district', '$store', '$members', '$cardtype', '$datejoined')";

            if ($conn->query($insert)) {
                echo ('<script language="javascript">alert("Card added successfully.!")</script>');
            } else {
                $_SESSION['error'] = ("Error: " . "<br>" . $conn->error);
                header("Location:../error/error.php");
                exit();
            }
        }
    } catch (Exception $e) {
        $_SESSION['error'] = $e;
        header("Location:../error/error.php");
        exit();
    }

}

//on modify card submit
if (isset($_POST['modifySubmit'])) {
    echo ("modify submit");
}

//on remove card submit
if (isset($_POST['removesubmit'])) {
    echo ("remove submit");
}
?>