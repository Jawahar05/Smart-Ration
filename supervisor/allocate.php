<!DOCTYPE html>
<html>

<head>

    <!-- PHP Session -->
    <?php
    session_start();
    ?>

    <!-- Required meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Smart Ration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- refera links -->
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/main.css" />
    <link rel="shortcut icon" type="media/image" media="screen" href="../assets/images/logo.png">
    <!-- Bootstrap css and scripts referals -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
</head>

<body class="body">
    <?php
    if (!$_SESSION['type'] == "Administrator") {
        header("location:../index.php");
        exit();
    }
    ?>
    <!-- Navigation bar -->
    <div>
        <nav class="navbar navbar-expand-sm navbar-light bg-light shadow fixed-top justify-content-between">

            <div>
                <!-- navbar items -->
                <ul class="navbar-nav nav-color">
                    <li>
                        <a class="navbar-brand" href="../supervisor/stocks&stores.php"><i class="fas fa-shopping-cart" style="color:#0097e6;"></i>
                            Allocate</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="padding container">
        <?php
        include('../log/dbconnect.php');
        $store =  preg_replace("/\s+/", "", $_SESSION['storetaluk']);
        $getdata = "SELECT *FROM store_data WHERE store_name = '$store'";
        $execute = mysqli_query($conn, $getdata);
        if (mysqli_num_rows($execute) == 1) {
            while ($row = mysqli_fetch_assoc($execute)) {
                $totalcards = $row['total_cards'];

                //rice
                $req_rice = $row['required_rice'];
                $aval_rice = $row['available_rice'];
                $rem_rice = $row['remaining_rice'];
                $allot_rice = $row['alloted_rice'];

                //sugar
                $req_sugar = $row['required_sugar'];
                $aval_sugar = $row['available_sugar'];
                $rem_sugar = $row['remaining_sugar'];
                $allot_sugar = $row['alloted_sugar'];

                //dhall
                $req_dhall = $row['required_dhall'];
                $aval_dhall = $row['available_dhall'];
                $rem_dhall = $row['remaining_dhall'];
                $allot_dhall = $row['alloted_dhall'];

                //wheat
                $req_wheat = $row['required_wheat'];
                $aval_wheat = $row['available_wheat'];
                $rem_wheat = $row['remaining_wheat'];
                $allot_wheat = $row['alloted_wheat'];

            }
        }
        ?>
        <div class="row text-primary" style="font-weight:bolder;">
            <div class="col-sm">
                <p class="text-right" for="district">Store Name :</p>
            </div>
            <div class="col-sm" name="district">
                <p><?php echo ($store); ?></p>
            </div>
            <div class="col-sm">
                <p class="text-right" for="stores">Total Cards :</p>
            </div>
            <div class="col-sm">
                <p><?php echo ($totalcards); ?></p>
            </div>
        </div>
        <div class="row mt-3 text-center">
            <div class="col-sm text-center"> <label> Items </label> </div>
            <div class="col-sm"> <label> Required </label> </div>
            <div class="col-sm"> <label> Available </label> </div>
            <div class="col-sm"> <label> Remaining </label> </div>
            <div class="col-sm"> <label> Alloted </label> </div>
            <div class="col-sm"> <label> Allocate </label> </div>
        </div>
        <form action="#" method="POST">
            <div class="row mt-5">
                <div class="col-sm text-center"> <label> Rice </label> </div>
                <div class="col-sm"> <input name="ricerq" value="<?php echo($req_rice);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="riceav" value="<?php echo($aval_rice);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="ricerm" value="<?php echo($rem_rice);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="ricerm" value="<?php echo($allot_rice);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="riceal" value="0" class="form-control" onkeyup="calc(rice)" /> </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm text-center"> <label> Sugar </label> </div>
                <div class="col-sm"> <input name="Sugarrq" value="<?php echo($req_sugar);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Sugarav" value="<?php echo($aval_sugar);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Sugarrm" value="<?php echo($rem_sugar);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Sugarrm" value="<?php echo($allot_sugar);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Sugaral" value="0" class="form-control" onkeyup="calc(sugar)"/> </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm text-center"> <label> Dhall </label> </div>
                <div class="col-sm"> <input name="Dhallrq" value="<?php echo($req_dhall);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Dhallav" value="<?php echo($aval_dhall);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Dhallav" value="<?php echo($rem_dhall);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Dhallrm" value="<?php echo($allot_dhall);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Dhallal" value="0" class="form-control" onkeyup="calc(dhall)"/> </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm text-center"> <label> Wheat </label> </div>
                <div class="col-sm"> <input name="Wheatrq" value="<?php echo($req_wheat);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Wheatav" value="<?php echo($aval_wheat);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Wheatrm" value="<?php echo($rem_wheat);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Wheatrm" value="<?php echo($allot_wheat);?>" class="form-control" disabled /> </div>
                <div class="col-sm"> <input name="Wheatal" value="0" class="form-control" onkeyup="calc(wheat)"/> </div>
            </div>
            <div class="row">
                <div class="col-sm text-right mt-4">
                    <button class="btn" name="updatealloc" type="submit">Allocate</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- local script -->
    <script src="../assets/js/main.js"></script>
</body>

</html> 