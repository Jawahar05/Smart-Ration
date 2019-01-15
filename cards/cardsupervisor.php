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
            $_SESSION['warning'] = "Mobile number alerady registered..!";
            header("Location:../supervisor/cards.php");
            exit();
        } else {
            $insert = "INSERT INTO cards (card_number, name, mobile, address, district, store, members, card_type, date_joined)
            VALUES ('$cardnumber', '$name', '$number', '$address', '$district', '$taluk', '$members', '$cardtype', '$datejoined')";

            if ($conn->query($insert)) {
                $_SESSION['success'] = "New card added successfully..!<br> Card number is '$cardnumber'";
                header("Location:../supervisor/cards.php");
                exit();
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









//on click of Modify
if(isset($_POST['modifySubmit'])) {
    $cardnumber= $_POST['cardnumber'];
    try {
        $check = "SELECT *FROM cards WHERE card_number = $cardnumber";
        $execute = mysqli_query($conn, $check);

        if($row = mysqli_num_rows($execute) == 0) {
            $_SESSION['warning'] = " Card number dosen't exist.";
            header("Location:../supervisor/cards.php");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($execute)) {
                $_SESSION['ECNo'] = $row['card_number'];
                $_SESSION['ECName'] = $row['name'];
                $_SESSION['ECmobile'] = $row['mobile'];
                $_SESSION['ECaddress'] = $row['address'];
                $_SESSION['ECtype'] = $row['card_type'];

                echo ($_SESSION['ECNo'] . "<br>" . $_SESSION['ECName']. "<br>"  . $_SESSION['ECmobile']. "<br>"  . $_SESSION['ECaddress']. "<br>"  . $_SESSION['ECtype']);

                header("Location:../supervisor/editcards.php");
                exit();
            }
        }
    }
    catch(Exception $ex){
        $_SESSION['error'] = $e;
        header("Location:../error/error.php");
        exit();
    }
}











//on click of remove
if(isset($_POST['remove'])) {
    $cardnumberremove = $_POST['nameid'];
    try {
        $checkremove = "SELECT *FROM cards WHERE card_number = $cardnumberremove";
        $executerem = mysqli_query($conn, $checkremove);

        if(mysqli_num_rows($executerem) == 0) {
            $_SESSION['warning'] = " Card number dosen't exist.";
            header("Location:../supervisor/cards.php");
            exit();
        } else {
            $remove = "DELETE FROM cards WHERE card_number = $cardnumberremove";
            if(mysqli_query($conn, $remove)){
                $_SESSION['success'] = "Card number '$cardnumberremove' is removed successfully.!";
                header("Location:../supervisor/cards.php");
            } else {
                echo ($RemoveId . "Id hasn't removed");
            }
        }
    } catch(Exception $ex){
        $_SESSION['error'] = $ex;
        header("Location:../error/error.php");
        exit();
    }
}



?>