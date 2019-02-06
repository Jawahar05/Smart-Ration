<?php
// session start
session_start();

// conncetion to database
include('../log/dbconnect.php');

// isset for bill submit
if (isset($_POST['apply'])) {
    $cardnumber = $_POST['cardnumber'];
    $cardtype = $_POST['cardtype'];

    $update = "UPDATE cards SET status = '1', reservation_date = 'null', reservation_status = '0', reservation_set = '0', rice = '1', wheat = '1', dhall = '1', sugar = '1' WHERE card_number = '$cardnumber' ";

    mysqli_query($conn, $update);

    // Store data fetch
    $store = "SELECT *FROM store_data WHERE store_name = 'Coimbatore (Central)'";

    $exe = mysqli_query($conn, $store);
    if ($row = mysqli_fetch_assoc($exe)) {
        // If commodity card
        if ($cardtype == "Commodity") {

            $rice = $row['available_rice'] - 20;
            $sugar = $row['available_sugar'] - 2;
            $wheat = $row['available_wheat'] - 2;
            $dhall = $row['available_dhall'] - 1;

            $updatestore = "UPDATE store_data SET available_rice = '$rice', available_sugar = '$sugar', available_wheat = '$wheat', available_dhall = '$dhall' WHERE store_name = 'Coimbatore (Central)'";
            mysqli_query($conn, $updatestore);
        } else if ($cardtype == "Sugar") {
            $rice = $row['available_rice'] - 0;
            $sugar = $row['available_sugar'] - 5;
            $wheat = $row['available_wheat'] - 2;
            $dhall = $row['available_dhall'] - 1;

            $updatestore = "UPDATE store_data SET available_rice = '$rice', available_sugar = '$sugar', available_wheat = '$wheat', available_dhall = '$dhall' WHERE store_name = 'Coimbatore (Central)'";
            mysqli_query($conn, $updatestore);
        }
    }

    $updatestore = "UPDATE store_data SET status = '1', reservation_date = 'null', reservation_status = '0', reservation_set = '0', rice = '1', wheat = '1', dhall = '1', sugar = '1' WHERE card_number = '$cardnumber' ";

    header("Location: ../supplier/home.php");
    exit();

}
?>