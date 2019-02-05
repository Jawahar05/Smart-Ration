<?php
// session start
session_start();

// conncetion to database
include('../log/dbconnect.php');

// isset cof data reset
if(isset($_POST['resetdata'])){
    // calendar reset values
    $resetcal = "UPDATE calendar SET day = '0', set_1 = '0', set_2 = '0', set_3 = '0', set_4 = '0', per_set = '0', per_day = '0' WHERE id > '0'";
    mysqli_query($conn, $resetcal);

    // cards data reset values
    $resetcard = "UPDATE cards SET reservation_date = 'null', reservation_status = '0', reservation_set = '0', status = '0', rice = '0',
    sugar = '0', wheat = '0', dhall = '0' WHERE id > '0' ";
    mysqli_query($conn, $resetcard);

    $_SESSION['success'] = "Data reset successfull.";
    header("Location:../supplier/reservation.php");
    exit();
}


// isset of new month reset
// if(isset($_POST['resetmnth'])) {
//     // truncate calendar
//     $truncal = "TRUNCATE TABLE calendar";

//     // cards data reset values
//     $resetcard = "UPDATE cards SET reservation_date = 'null', reservation_status = '0', reservation_set = '0', status = '0', rice = '0',
//     sugar = '0', wheat = '0', dhall = '0' WHERE id > '0' ";
//     mysqli_query($conn, $resetcard);

//     $_SESSION['newmonth'] = "new month set downed.";
//     header("Location:../supplier/reservation.php");
//     exit();
// }
?>