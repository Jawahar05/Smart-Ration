<?php
// include dbconnection
include('../log/dbconnect.php');
include('../reservation/send.php');

//isset variable
if (isset($_POST['check'])) {
    $day = $_REQUEST["content"];
    $mobile = $_REQUEST["sender"];

    $date = substr($day, -2);

    $insert = "INSERT INTO message_data (number, content) VALUES ('$mobile','$date')";

    mysqli_query($conn, $insert);


    if ($date <= date('d')) {
        echo ("Date must not be of past date");
    } else {
        $check = "SELECT *FROM cards WHERE mobile = $mobile";
        $execute = mysqli_query($conn, $check);
        // Mobile number verification 
        if (mysqli_num_rows($execute) != 0) {

            $rows = mysqli_fetch_assoc($execute);

            // To check wether they alerady bought the products or not
            if ($rows['status'] == "1") {
                $reply = ("You had bought for this month. <br> Please visit on next month.");
                sendmsg($mobile, $reply);
                exit();
            }

            // is alerady reserved condition check
            if ($rows['reservation_status'] == 1) {
                $reply =  ("You have alerady reserved on '$rows[reservation_date]' SET '$rows[reservation_set]");
                sendmsg($mobile, $reply);
                exit();
            }
            // alerady reserved else condition
            else {
                $isdateavail = "SELECT *FROM calendar WHERE date_cal = '$date'";
                $check = mysqli_query($conn, $isdateavail);
    
                // fetching data available in selected date
                if ($row = mysqli_fetch_assoc($check)) {

                    $perday = $row['per_day'];
                    $perset = $row['per_set'];
                    $set1 = $row['set_1'];
                    $set2 = $row['set_2'];
                    $set3 = $row['set_3'];
    
                    // Checking for holidays
                    if ($row['bool_hol'] == 0) {
    
                        // Checking wether the day is filled or not
                        if ($row['day'] == $perday) {
                            $reply = ($date . " is already filled please select some other days..<br>");
                            sendmsg($mobile, $reply);
                            exit();

                        } 
                        
                        // if not checking with available sets
                        else {
    
                            // Checking for set 1
                            if ($set1 < $perset) {
                                $set1 = $set1 + 1;
                                $appointdate = date('Y-m-') . $date;

                                $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '1' WHERE mobile = '$mobile'";
                                mysqli_query($conn, $fix);

                                $update = "UPDATE calendar SET set_1 = '$set1' WHERE date_cal = '$date'";
                                mysqli_query($conn, $update);

                                $reply =  ("Reserved on the date of " . $appointdate . " and SET is 1. <br> VISIT the shop at 9 AM.");
                                sendmsg($mobile, $reply);
                                exit();
    
                                // Checking for set 2
                            } else if ($set2 < $perset) {
                                $appointdate = date('Y-m-') . $date;
                                $set2 = $set2 + 1;

                                $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '2' WHERE mobile = '$mobile'";
                                mysqli_query($conn, $fix);

                                $update = "UPDATE calendar SET set_2 = '$set2' WHERE date_cal = '$date'";
                                mysqli_query($conn, $update);

                                $reply = ("Reserved on the date of " . $appointdate . " and SET is 2. <br> VISIT the shop at 11 AM.");
                                sendmsg($mobile, $reply);
                                exit();
    
                                // Checking for set 3
                            } else if ($set3 < $perset) {
                                $appointdate = date('Y-m-') . $date;
                                $set3 = $set3 + 1;

                                $fix = "UPDATE cards SET reservation_date = '$appointdate', reservation_status = '1', reservation_set = '3' WHERE mobile = '$mobile'";
                                mysqli_query($conn, $fix);

                                $update = "UPDATE calendar SET set_3 = '$set3' WHERE date_cal = '$date'";
                                mysqli_query($conn, $update);

                                $reply = ("Reserved on the date of " . $appointdate . " and SET is 3. <br> VISIT the shop at 2 PM.");
                                sendmsg($mobile, $reply);
                                exit();
    
                                // executes if all sets are filled
                            } else {
                                $update = "UPDATE calendar SET day = '$perday' WHERE date_cal = '$date'";
                                mysqli_query($conn, $update);
                                $reply = ($date . " is already filled please select some other days..<br>");
                                sendmsg($mobile, $reply);
                                exit();
                            }
                        }
                    } 
                    
                    // failure condition in case of holiday calendar
                    else {
                        $reply = ($date . " is a holiday please select some other days..<br>");
                        sendmsg($mobile, $reply);
                        exit();
                    }
                }
            }
    
            //mobile number verification failure condition
        } else {
            $reply = ("Mobile number dosen't exist..!<br>Please make sure that you had send the message from registered mobile number");
            sendmsg($mobile, $reply);
            exit();
        }


    }
}
?>