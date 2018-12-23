<?php
//starting session
session_start();
//include dbconnection
include 'dbconnect.php';
//on login submit
if (isset($_POST['submit'])) {
    //initializing variables
    $user = $_POST['username'];
    $pass = $_POST['password'];
    //query
    $sql = "SELECT *FROM worker_login WHERE worker_name = '$user'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
        $_SESSION['error'] = "Invalid User name.!";
        header("Location:../index.php");
        exit();
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            //authenticating
            if ($pass == $row['password']) {
                $_SESSION['user'] = $row['worker_name'];
                $_SESSION['type'] = $row['position'];
                $_SESSION['status'] = "active";
                $_SESSION['district'] = $row['district'];
                //authorizing
                if ($_SESSION['type'] == "administrator") {
                    header("location:../admin/home.php");
                    exit();
                } else if ($_SESSION['type'] == "supplier") {
                    header("Location:../supplier/home.php");
                    exit();
                } else if ($_SESSION['type'] == "supervisor") {
                    header("Location:../supervisor/home.php");
                    exit();
                }

            } else {
                $_SESSION['error'] = "Invalid Password.!";
                header("Location:../index.php");
                exit();
            }
        }
    }
}