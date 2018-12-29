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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <!-- local script -->
    <script src="../assets/js/main.js"></script>
</head>

<body class="body" onload="filterSelection('new')">
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
                        <a class="navbar-brand"><i class="fas fa-user-edit" style="color:#0097e6;"></i>
                            Edit Workers</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <div class="padding ml-5">
        <div class="col-sm-9">
            <div class="filterDiv new">
                <form id="newworker" name="newform" class="mt-3" action="#" method="POST"
                    onsubmit="return validateForm()">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="firstname">Name</label>
                        </div>
                        <div class="col-sm-3">
                            <input id="firstname" type="text" name="firstname" class="form-control" placeholder="First Name"
                                required>
                            <span id="firstnamemsg"></span>
                        </div>
                        <div class="col-sm-3">
                            <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Last Name">
                            <span id="lastnamemsg"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="mobilenumber">Mobile Number</label>
                        </div>
                        <div class="col-sm-3">
                            <input id="mobilenumber" type="text" name="mobilenumber" class="form-control" placeholder="Mobile Number" value="<?php
                            $_SESSION['EWmobile'];
                            ?>"
                                required>
                            <span id="mobilenumbermsg"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-sm-3">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email Id"
                                required>
                            <span id="emailmsg"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="position">Position</label>
                        </div>
                        <div class="col-sm-3">
                            <select id="position" class="form-control" name="postion" onchange="getposition(this.value)">
                                <option disabled selected>Select Position</option>
                                <option value="administrator">Administrator</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="supplier">Supplier</option>
                            </select>
                            <span id="positionmsg"></span>
                        </div>
                    </div>
                    <div id="disid" class="row form-group">
                        <div class="col-sm-2">
                            <label for="district">District</label>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            include("../log/dbconnect.php");

                            $result = $conn->query("SELECT district_name From district_data WHERE district_code > 0");
                            echo ("<select id='district' class='form-control' name='district' onchange='getvalue(this.value)'>");
                            echo ('<option disabled selected>Select District</option>');
                            while ($row = $result->fetch_assoc()) {
                                unset($district_name);
                                $district_name = $row['district_name'];
                                echo ('<option value="' . $district_name . '"  >' . $district_name . '</option>');
                            }
                            echo "</select>";
                            ?>
                            <span id="districtmsg"></span>
                        </div>
                    </div>
                    <div class="row form-group" id="storeid">
                        <div class="col-sm-2">
                            <label for="store">Store Name</label>
                        </div>
                        <div class="col-sm-3">
                            <?php
                                include("../log/dbconnect.php");

                                $result = $conn->query("SELECT store_name From store_data WHERE district = 'erode'");
                                echo ("<select id='store' class='form-control' name='store'>");
                                echo ('<option disabled selected>Select Store</option>');
                                while ($row = $result->fetch_assoc()) {
                                    unset($store_name);
                                    $store_name = $row['store_name'];
                                    echo ('<option value=" ' . $store_name . '"  >' . $store_name . '</option>');
                                }
                                echo "</select>";
                                ?>
                            <span id="storenamemsg"></span>
                        </div>
                    </div>
                    <div class="col-sm text-center">
                        <button type="submit" name="newsubmit" value="newsubmit" class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>