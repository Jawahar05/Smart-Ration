<!-- Adding new workers to the database -->
<?php 

//start session
session_start();
    // include database connection file
include('../log/dbconnect.php');
    
    //on add new submit
if (isset($_POST['newsubmit'])) {
    if ($_POST['lastname'] == "") {
        $workername = $_POST['firstname'];
    } else {
        $workername = $_POST['firstname'] . " " . $_POST['lastname'];
    }
    $password = $_POST['password'];
    $mobile = $_POST['mobilenumber'];
    $email = $_POST['email'];
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

    $datejoined = date("Y/m/d");
    //execution fof database
    try {
        //checking existence of user
        $check = "SELECT *FROM worker_login WHERE mobile=$mobile";
        $execute = $conn->query($check);

        if (mysqli_num_rows($execute) != 0) {
            $_SESSION['warning'] = "Worker alerady exist.!";
            header("Location:../admin/workers.php");
            exit();
        } else {
             //query
            $addvalue = "INSERT INTO worker_login 
            (worker_name, password, position, mobile, mail, store_name, taluk, district, date_joined) VALUES 
            ('$workername', '$password', '$position', '$mobile', '$email', '$store', '$taluk', '$district', '$datejoined')";

            if ($conn->query($addvalue) === true) {
                $_SESSION['success'] = "Worker added Successfully";
                header("Location:../admin/workers.php");
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











    //Modify submit
else if (isset($_POST['modifysubmit'])) {
    $Id = $_POST['nameid'];
    try {
        $check = "SELECT *FROM worker_login WHERE id  = $Id";
        $execute = $conn->query($check);

        if (mysqli_num_rows($execute) == 0) {
            $_SESSION['warning'] = " No Worker Id exist to modify.";
            header("Location:../admin/workers.php");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($execute)) {
                $_SESSION['EWId'] = $row['id'];
                $_SESSION['EWuser'] = $row['worker_name'];
                $_SESSION['EWmobile'] = $row['mobile'];
                $_SESSION['EWmail'] = $row['mail'];
                $_SESSION['EWtype'] = $row['position'];
                $_SESSION['EWdistrict'] = $row['district'];
                $_SESSION['EWstore_name'] = $row['store_name'];

                echo ($_SESSION['EWId'] . $_SESSION['EWuser'] . $_SESSION['EWmobile'] . $_SESSION['EWtype'] . $_SESSION['EWdistrict'] . $_SESSION['EWstore_name']);

                header("Location:../admin/editworkers.php");
                exit();
            }
        }
    } catch (Exception $ex) {
        $_SESSION['error'] = $e;
        header("Location:../error/error.php");
        exit();
    }
}
















    //remove submit
else if (isset($_POST['removeSubmit'])) {
    $RemoveId = $_POST['nameid'];


    try {
        $check = "SELECT *FROM worker_login WHERE id  = $RemoveId";
        $execute = $conn->query($check);

        if (mysqli_num_rows($execute) == 0) {
            $_SESSION['warning'] = "No Worker exist to remove!";
            header("Location:../admin/workers.php");
            exit();
        } else {
            $delete = "DELETE FROM worker_login WHERE id = '$RemoveId'";
            if ($conn->query($delete)) {
                $_SESSION['success'] ="Id " . $RemoveId . " has been removed successfully";
                header("Location:../admin/workers.php");
            } else {
                echo ($RemoveId . "Id hasn't removed");
            }
        }
    } catch (Exception $ex) {
        $_SESSION['error'] = $ex;
        header("Location:../error/error.php");
        exit();
    }
}
?>