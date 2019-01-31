<?php
// include dbconnection
include('../log/dbconnect.php');

//isset variable
if (isset($_POST['check'])) {
    $date = $_POST['msg_input'];
    $mobile = $_POST['mobile'];

    $check = "SELECT *FROM cards WHERE mobile = $mobile";
    $execute = mysqli_query($conn, $check);
    if (mysqli_num_rows($execute) != 0) {
        
      // check condition
        $isdateavail = "SELECT *FROM calendar WHERE date_cal = '$date'";
        $check = mysqli_query($conn, $isdateavail);

        if ($row = mysqli_fetch_assoc($check)) {

            $perday = $row['per_day'];
            $perset = $row['per_set'];
            $set1 = $row['set_1'];
            $set2 = $row['set_2'];
            $set3 = $row['set_3'];

            if ($row['bool_hol'] == 0) {

                if ($row['day'] == $perday) {
                    echo ($date . " is already filled please select some other days..<br>");

                } else {

                    if ($set1 < $perset) {
                        $appointdate =date('Y-m-').$date;
                        $set1 = $set1 + 1;
                        
                        $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '1' WHERE mobile = '$mobile'";
                        mysqli_query($conn, $fix);
                        
                        $update = "UPDATE calendar SET set_1 = '$set1' WHERE date_cal = '$date'";
                        mysqli_query($conn, $update);

                        echo ("Reserved on the date of " . $date . " and SET is 1. <br> VISIT the shop at 9 AM.");

                    } else if ($set2 < $perset) {
                        $appointdate =date('Y-m-').$date;
                        $set2 = $set2 + 1;

                        $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '2' WHERE mobile = '$mobile'";
                        mysqli_query($conn, $fix);
                        
                        $update = "UPDATE calendar SET set_2 = '$set2' WHERE date_cal = '$date'";
                        mysqli_query($conn, $update);

                        echo ("Reserved on the date of " . $date . " and SET is 2. <br> VISIT the shop at 11 AM.");

                    } else if ($set3 < $perset) {
                        $appointdate =date('Y-m-').$date;
                        $set3 = $set3 + 1;

                        $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '3' WHERE mobile = '$mobile'";
                        mysqli_query($conn, $fix);
                        
                        $update = "UPDATE calendar SET set_3 = '$set3' WHERE date_cal = '$date'";
                        mysqli_query($conn, $update);

                        echo ("Reserved on the date of " . $date . " and SET is 3. <br> VISIT the shop at 2 PM.");

                    } else {
                        $update = "UPDATE calendar SET day = '$perday' WHERE date_cal = '$date'";
                        mysqli_query($conn, $update);
                        echo ($date . " is already filled please select some other days..<br>");

                    }
                }
            } else {
                echo ($date . " is a holiday please select some other days..<br>");
            }
        }
    } else {
        echo ("Card number dosen't exist..!");
    }


}
?>