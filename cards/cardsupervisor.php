<?php 
//database connection include
include '../log/dbconnect.php';

//session start
session_start();
//on click for new submit
if (isset($_POST['newsubmit'])) {
    $name = $_POST['firstname'] . " " . $_POST['lastname'];
    $number = $_POST['number'];
    $address = $_POST['doorno'] . ", " . $_POST['street'] . ", "  . $_POST['town'];
    $taluk = $_POST['taluk'];
    $members = $_POST['members'];
    $cardtype = $_POST['cardtype'];
    $datejoined = date("Y/m/d");
    $district = $_SESSION['district'];

    echo($district);
    //cardnumber
    $cardnumber = date("dmyhis");
    try {
        //checking whether user alerady exist
        $check = "SELECT *FROM cards WHERE mobile = $number";
        $execute = $conn->query($check);
        if (mysqli_num_rows($execute) != 0) {
            echo ('<script language="javascript">alert("Mobile number alerady exist.!")</script>');
        } else {
            $insert = "INSERT INTO cards (card_number, name, mobile, address, district, store, members, card_type, date_joined)
            VALUES ('$cardnumber', '$name', '$number', '$address', '$district', '$taluk', '$members', '$cardtype', '$datejoined')";

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
?>