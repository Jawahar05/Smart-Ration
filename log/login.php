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
                //authorizing
                if ($_SESSION['type'] == "Administrator") {
                    header("location:../admin/admin.php");
                    exit();
                } else if ($_SESSION['type'] == "Supplier") {
                    header("Location:../supplier/supplier.php");
                    exit();
                } else if ($_SESSION['type'] == "Supervisor") {
                    header("Location:../supervisor/supervisor.php");
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