<!-- Adding new workers to the database -->
<?php 

//start session
session_start();
    // include database connection file
include('../log/dbconnect.php');
    
    //on add new submit
if (isset($_POST['newsubmit'])) {
    $workername = $_POST['firstname'] . " " . $_POST['lastname'];
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
        $district = $_POST['district'];
    } else if ($position == "supplier") {
        $district = $_POST['district'];
        $taluk = $_POST['store'];
        $store = $_POST['store'];
    }

    $datejoined = date("Y/m/d");
    //execution fof database
    try {
        //checking existence of user
        $check = "SELECT *FROM worker_login WHERE mobile=$mobile";
        $execute = $conn->query($check);

        if (mysqli_num_rows($execute) != 0) {
            echo ('<script language="javascript">alert("Worker alerady exist.")</script>');
        } else {
             //query
            $addvalue = "INSERT INTO worker_login (worker_name, password, position, mobile, mail, store_name, taluk, district, date_joined) 
        VALUES ('$workername', '$password', '$position', '$mobile', '$email', '$store', '$taluk', '$district', '$datejoined')";

            if ($conn->query($addvalue) === true) {
                echo ('<script language="javascript"> alert("Worker added successfully") </script>');
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
    echo ("Modify submit");
}

    //remove submit
else if (isset($_POST['removeSubmit'])) {
    echo ("Remove submit");
}
?>