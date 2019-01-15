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
    <title>Supervisor - Smart Ration</title>
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
    if (!$_SESSION['type'] == "supervisor") {
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
                            Supervisor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/home.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/reservation.php">Reservation</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../supervisor/cards.php">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/stocks&stores.php">Stores & Stocks</a>
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


    <!-- Body content -->

    <div id="cards" class="padding">
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
            <!-- **************** Add cards *********************-->
            <!-- **************************************************** -->

            <div id="addnewcards" class="col-sm-9">
            <?php
            if (isset($_SESSION['success'])) {
                echo ("<div class='alert alert-success alert-dismissible fade show container' role='alert'>");
                echo ($_SESSION['success']);
                unset($_SESSION['success']);
                echo ("<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>");
            }
            ?>

            <?php
            if (isset($_SESSION['warning'])) {
                echo ("<div class='alert alert-warning alert-dismissible fade show container' role='alert'>");
                echo ($_SESSION['warning']);
                unset($_SESSION['warning']);
                echo ("<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>");
            }
            ?>
                <div class="filterDiv new">
                    <form name="newcard" class="mt-3" action="../cards/cardsupervisor.php" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="firstname, lastname">Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-sm-3">
                                <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="number">Mobile Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="number" type="text" name="number" class="form-control" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="doorno, street, town">Address</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="doorno" type="text" name="doorno" class="form-control" placeholder="Door number">
                            </div>
                            <div class="col-sm-3">
                                <input id="street" type="text" name="street" class="form-control" placeholder="Street name">
                            </div>
                            <div class="col-sm-3">
                                <input id="town" type="text" name="town" class="form-control" placeholder="Town name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="taluk">Store</label>
                            </div>
                            <div class="col-sm-3">
                            <?php
                                include("../log/dbconnect.php");

                                $result = $conn->query("SELECT store_name From store_data WHERE district = '".$_SESSION['district']."'");
                                echo ("<select id='taluk' class='form-control' name='taluk'>");
                                echo ('<option disabled selected>Select Store</option>');
                                while ($row = $result->fetch_assoc()) {
                                    unset($store_name);
                                    $store_name = $row['store_name'];
                                    echo ('<option value=" ' . $store_name . '"  >' . $store_name . '</option>');
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="membercount">Members Count</label>
                            </div>
                            <div class="col-sm-3">
                                <input id="membercount" type="text" name="members" class="form-control">
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="commodity, sugar">Card type</label>
                            </div>
                            <div class="col-sm-3 form-check pl-5">
                                <input class="form-check-input" type="radio" name="cardtype" id="commodity" value="commodity"
                                    checked>
                                <label class="form-check-label" for="commodity" style="font-weight:normal;">
                                    Commodity Card
                                </label>
                            </div>
                            <div class="col-sm-3 form-check pl-5">
                                <input class="form-check-input" type="radio" name="cardtype" id="sugar" value="sugar">
                                <label class="form-check-label" for="sugar" style="font-weight:normal;">
                                    Sugar Card
                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3 text-center">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button id="newsubmit" type="newsubmit" name="newsubmit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- **************************************************** -->
                <!-- **************** Modify cards *********************-->
                <!-- **************************************************** -->

                <div id="modifycards" class="filterDiv modify">
                    <form class="mt-3" action="../cards/cardsupervisor.php" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Card Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="cardnumber" class="form-control" placeholder="Card number to modify"
                                    required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button id="modifysubmit" type="submit" name="modifySubmit" class="btn">Modify</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- **************************************************** -->
                <!-- **************** Remove cards *********************-->
                <!-- **************************************************** -->

                <div id="removeworker" class="filterDiv remove">
                    <form class="mt-3" action="../cards/cardsupervisor.php" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Card Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="nameid" class="form-control" placeholder="Card Number to remove"
                                    required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="submit" name="remove" class="btn">Remove</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>