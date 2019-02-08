<?php
// session start
session_start();

// conncetion to database
include('../log/dbconnect.php');

// isset cof data reset
if(isset($_POST['resetdata'])){
   

    // cards data reset values
    $resetcard = "UPDATE cards SET reservation_date = 'null', reservation_status = '0', reservation_set = '0', status = '0', rice = '0',
    sugar = '0', wheat = '0', dhall = '0' WHERE id > '0' ";
    mysqli_query($conn, $resetcard);

    $_SESSION['success'] = "Data reset successfull.";
    header("Location:../supplier/reservation.php");
    exit();
}


// isset of new month reset
if(isset($_POST['calendarreset'])) {
    // calendar reset values
    $resetcal = "UPDATE calendar SET day = '0', set_1 = '0', set_2 = '0', set_3 = '0', set_4 = '0', per_set = '0', per_day = '0' WHERE id > '0'";
    mysqli_query($conn, $resetcal);

    $_SESSION['newmonth'] = "Calendar data reset success...";
    header("Location:../supplier/reservation.php");
    exit();
}

// isset of schedule reset
if(isset($_POST['rearange'])) {
    // update calendar for schedules passed
    //current date
    $datetime = new DateTime('tomorrow');
    $currentdate = $datetime->format('Y-m-d');;
    echo($currentdate);
    $predate = date('Y-m-d');
    $updateschdl = "UPDATE cards SET reservation_set = '4', reservation_date = '$currentdate' WHERE reservation_status = '1' AND reservation_date <= '$predate' ";
    mysqli_query($conn, $updateschdl);

    $_SESSION['newmonth'] = "Rearrange of schedule success.";
    header("Location:../supplier/reservation.php");
    exit();

}
?>