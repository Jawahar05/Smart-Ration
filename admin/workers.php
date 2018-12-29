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

<body class="body" onload="filterSelection('new'), hideid()">
    <?php
if(!$_SESSION['type'] == "Administrator") {
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
                        <a class="navbar-brand" href="../index.php"><i class="fas fa-shopping-cart" style="color:#0097e6;"></i>
                            Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/home.php">Home<span class="sr-only" (current)></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../admin/workers.php">Workers</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../admin/cards.php">Cards</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/stocks&stores.php">Stores & Stocks</a>
                    </li>
                </ul>

            </div>
            <div>
                <form class="form-group form-inline" action="../log/logout.php" method="POST">
                <div class="dropdown show mr-5">
                        <a href="#" role="button" id="dropdownprofile" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="color:black;">
                            <i class="fas fa-user" style="font-size: 25px;"></i>
                            <?php
                                    echo(ucwords($_SESSION['user']));
                                    ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                        <a class="dropdown-item" href="../Profile/profile.php">
                            <i class="fas fa-user mr-2" style="font-size: 15px;"></i>
                            Profile</a>
                            <button type="submit" name="submit" class="dropdown-item" href="#">
                            <i class="fas fa-sign-out-alt mr-2" style="font-size: 15px;"></i>
                            Logout</button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <!-- **************************************************** -->
    <!-- ****************Nav item Workers *********************-->
    <!-- **************************************************** -->
    <div id="workers" class="padding">
        <div class="row">

            <!-- **************************************************** -->
            <!-- **************** left Panel *********************-->
            <!-- **************************************************** -->

            <div id="myBtnContainer" class="col-sm-2 panel">
                <button class="btn-panel" onclick="filterSelection('new')"><i class="ml-2 fas fa-user-alt panel-fa mr-3"></i>Add
                    New</button>
                <button class="btn-panel" onclick="filterSelection('modify')"><i class="ml-2 fas fa-sync-alt panel-fa mr-3"></i>Modify</button>
                <button class="btn-panel" onclick="filterSelection('remove')"><i class="ml-2 fas fa-user-slash panel-fa mr-3"></i>Remove</button>
            </div>

            <!-- **************************************************** -->
            <!-- **************** Add workers *********************-->
            <!-- **************************************************** -->

            <div id="addnewworker" class="col-sm-9">
                <div class="filterDiv new">
                    <form id="newworker" name="newform" class="mt-3" action="../workers/workeradmin.php" method="POST" onsubmit="return validateForm()">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="firstname">Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="First Name" required>
                                <span id="firstnamemsg"></span>
                            </div>
                            <div class="col-sm-3">
                                <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Last Name">
                                <span id="lastnamemsg"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="password">Password</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                                <span id="passwordmsg"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="mobilenumber">Mobile Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="mobilenumber" type="text" name="mobilenumber" class="form-control" placeholder="Mobile Number" required>
                                <span id="mobilenumbermsg"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email Id" required>
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
                                    echo ('<option value="'.$district_name.'"  >' .$district_name. '</option>');
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
                                    echo ('<option value=" '.$store_name.'"  >' . $store_name . '</option>');
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


                <!-- **************************************************** -->
                <!-- **************** Modify workers *********************-->
                <!-- **************************************************** -->

                <div id="modifyworker" class="filterDiv modify">
                    <form class="mt-3" name="modifyform" action="../workers/workeradmin.php" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="modify-empid">Employee ID</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="modify-empid" type="text" name="nameid" class="form-control" placeholder="Employee Id to modify" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="submit" name="modifysubmit" value="modifysubmit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- **************************************************** -->
                <!-- **************** Remove workers *********************-->
                <!-- **************************************************** -->

                <div id="removeworker" class="filterDiv remove">
                    <form class="mt-3" name="removeform" action="../workers/workeradmin.php" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="remove-empid">Employee ID</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="remove-empid" type="text" name="nameid" class="form-control" placeholder="Employee Id to remove">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="submit" name="removeSubmit" value="removesubmit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>