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

<body class="body" onload="filterSelection('stocks')">
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
                        <a class="navbar-brand" href="../index.php"><i class="fas fa-shopping-cart" style="color:#0097e6;"></i>
                            Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/home.php">Home<span class="sr-only" (current)></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/workers.php">Workers</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../admin/cards.php">Cards</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item active">
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
                            
</form>
                        </div>
                    </div>
            </div>
        </nav>
    </div>
    <div id="cards" class="padding">
        <div class="row">

            <!-- **************************************************** -->
            <!-- **************** left Panel *********************-->
            <!-- **************************************************** -->

            <div id="myBtnContainer" class="col-sm-2 panel">
                <button class="btn-panel" onclick="filterSelection('stocks')"><i class="ml-2 fas fa-chart-bar panel-fa mr-3"></i>
                    Stocks</button>
                <button class="btn-panel" onclick="filterSelection('stores')"><i class="ml-2 fas fa-landmark panel-fa mr-3"></i>Stores</button>
                <button class="btn-panel" onclick="filterSelection('allocate')"><i class="ml-2 fas fa-balance-scale panel-fa mr-3"></i>Allocate</button>
            </div>

            <!-- **************************************************** -->
            <!-- **************** stocks *********************-->
            <!-- **************************************************** -->
            <div id="addnewcards" class="col-sm-9">
                <div class="filterDiv stocks">
                    <?php 
                            //include database
                    include "../log/dbconnect.php";
                            //query
                    $statement = "SELECT *FROM district_data WHERE district_code > 0";
                            //table creation header
                    echo "<table border='3' class='text-center'>
                                <tr>
                                <th rowspan='2'>District Code</th>
                                <th rowspan='2'>District Name</th>
                                <th colspan='4'>Rice (Kg)</th>
                                <th colspan='4'>Sugar (Kg)</th>
                                <th colspan='4'>Dhall (Kg)</th>
                                <th colspan='4'>Wheat (Kg)</th>
                                </tr>
                                
                                
                                <tr>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                </tr>
                                ";
                            //execute
                    $result = $conn->query($statement);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // echo "<br>" . $row["district_code"] . "   " . $row["district_name"] . "<br>";
                            echo "<tr>";

                            echo "<td>" . $row['district_code'] . "</td>";
                            echo "<td>" . $row['district_name'] . "</td>";

                            echo "<td>" . $row['required_rice'] . "</td>";
                            echo "<td>" . $row['available_rice'] . "</td>";
                            echo "<td>" . $row['alloted_rice'] . "</td>";
                            echo "<td>" . $row['remaining_rice'] . "</td>";

                            echo "<td>" . $row['required_sugar'] . "</td>";
                            echo "<td>" . $row['available_sugar'] . "</td>";
                            echo "<td>" . $row['alloted_sugar'] . "</td>";
                            echo "<td>" . $row['remaining_sugar'] . "</td>";


                            echo "<td>" . $row['required_dhall'] . "</td>";
                            echo "<td>" . $row['available_dhall'] . "</td>";
                            echo "<td>" . $row['alloted_dhall'] . "</td>";
                            echo "<td>" . $row['remaining_dhall'] . "</td>";

                            echo "<td>" . $row['required_wheat'] . "</td>";
                            echo "<td>" . $row['available_wheat'] . "</td>";
                            echo "<td>" . $row['alloted_wheat'] . "</td>";
                            echo "<td>" . $row['remaining_wheat'] . "</td>";


                            echo "</tr>";
                        }
                    } else {
                        echo("<tr>");
                        echo "<td colspan='18' class='text-warning'>" . "Data not Found" . "</td>";
                        echo("</tr>");
                    }
                    echo "</table>";
                    ?>
                    <h6 style="font-weight: bold;"><br>Description :</h6>
                    <p class="pl-5">
                        Req     -   Required per month<br>
                        Aval    -   Available in the store<br>
                        Alot    -   Alotted for this month<br>
                        Rem     -   Remaining to be alloted
                    </p>
                </div>


                <!-- **************************************************** -->
                <!-- **************** Stores *********************-->
                <!-- **************************************************** -->

                <div id="modifycards" class="filterDiv stores">
                    <!-- <div class="row">
                        <div>
                            <a href="#" class="btn-menu" style="text-decoration: none;">New Store</a>
                            <a href="#" class="btn-menu ml-2">Modify Store</a>
                        </div>
                    </div> -->
                    <?php 
                            //include database
                    include "../log/dbconnect.php";
                            //query
                    $statement = "SELECT *FROM store_data WHERE store_id > 0";
                            //table creation header
                    echo "<table border='3' class='text-center mt-3'>
                                <tr>
                                <th rowspan='2'>Store Code</th>
                                <th rowspan='2'>Store Name</th>
                                <th rowspan='2'>District</th>
                                <th colspan='4'>Rice (Kg)</th>
                                <th colspan='4'>Sugar (Kg)</th>
                                <th colspan='4'>Dhall (Kg)</th>
                                <th colspan='4'>Wheat (Kg)</th>
                                </tr>
                                
                                
                                <tr>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                <th>Req</th>
                                <th>Aval</th>
                                <th>Alot</th>
                                <th>Rem</th>
                                </tr>
                                ";
                            //execute
                    $result = $conn->query($statement);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // echo "<br>" . $row["district_code"] . "   " . $row["district_name"] . "<br>";
                            echo "<tr>";
                            echo "<td>" . $row['store_id'] . "</td>";
                            echo "<td>" . $row['store_name'] . "</td>";
                            echo "<td>" . $row['district'] . "</td>";

                            echo "<td>" . $row['required_rice'] . "</td>";
                            echo "<td>" . $row['available_rice'] . "</td>";
                            echo "<td>" . $row['alloted_rice'] . "</td>";
                            echo "<td>" . $row['remaining_rice'] . "</td>";

                            echo "<td>" . $row['required_sugar'] . "</td>";
                            echo "<td>" . $row['available_sugar'] . "</td>";
                            echo "<td>" . $row['alloted_sugar'] . "</td>";
                            echo "<td>" . $row['remaining_sugar'] . "</td>";


                            echo "<td>" . $row['required_dhall'] . "</td>";
                            echo "<td>" . $row['available_dhall'] . "</td>";
                            echo "<td>" . $row['alloted_dhall'] . "</td>";
                            echo "<td>" . $row['remaining_dhall'] . "</td>";

                            echo "<td>" . $row['required_wheat'] . "</td>";
                            echo "<td>" . $row['available_wheat'] . "</td>";
                            echo "<td>" . $row['alloted_wheat'] . "</td>";
                            echo "<td>" . $row['remaining_wheat'] . "</td>";


                            echo "</tr>";
                        }
                    }else {
                        echo("<tr>");
                        echo "<td colspan='18' class='text-warning'>" . "Data not Found" . "</td>";
                        echo("</tr>");
                    }
                    echo "</table>";
                    ?>
                    <h6 style="font-weight: bold;"><br>Description :</h6>
                    <p class="pl-5">
                        Req     -   Required per month<br>
                        Aval    -   Available in the store<br>
                        Alot    -   Alotted for this month<br>
                        Rem     -   Remaining to be alloted
                    </p>
                </div>

                <!-- **************************************************** -->
                <!-- **************** Allocate products *********************-->
                <!-- **************************************************** -->

                <div id="removeworker" class="filterDiv allocate">
                    <form id="allocate" name="allocate" class="mt-3" action="#">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>District</label>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                include("../log/dbconnect.php");

                                $result = $conn->query("SELECT district_name From district_data WHERE district_code > 0");
                                echo ("<select id='taluk' class='form-control' name='taluk'>");
                                echo ('<option disabled selected>Select District</option>');
                                while ($row = $result->fetch_assoc()) {
                                    unset($district_name);
                                    $district_name = $row['district_name'];
                                    echo ('<option value=" ' . $district_name . '"  >' . $district_name . '</option>');
                                }
                                echo "</select>";
                                ?>
                                <span id="districtmsg"></span>
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="submit" name="submit" value="submit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>