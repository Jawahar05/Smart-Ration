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
    <script src="../assets/js/main.js"></script>
</head>

<body class="body" onload="filterSelection('stocks')">
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
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/cards.php">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supervisor/calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="../supervisor/stocks&stores.php">Stores & Stocks</a>
                    </li>
                </ul>


            </div>
            <div>
                <form class="form-group form-inline" action="../log/logout.php" method="POST">
                    <!-- <a class="mr-3"><i class="fas fa-bell" style="size:20px;"></i></a> -->
                    <button name="submit" type="submit" class="btn"><i class="fas fa-sign-out-alt" style="color:black;"></i>
                        Logout</button>
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
                    <p class="text-center mt-2">Stock details to be updated..!</p>
                </div>


                <!-- **************************************************** -->
                <!-- **************** Stores *********************-->
                <!-- **************************************************** -->

                <div id="modifycards" class="filterDiv stores">
                <p class="text-center mt-2">Store details to be updated..!</p>
                </div>

                <!-- **************************************************** -->
                <!-- **************** Allocate products *********************-->
                <!-- **************************************************** -->

                <div id="removeworker" class="filterDiv allocate">
                    <form id="allocate" name="allocate" class="mt-3" action="#">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Store</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="district" class="form-control" name="postion" placeholder="Position"
                                    required>
                                    <option disabled selected>Select Store</option>
                                    <option>Madurai</option>
                                    <option>Erode</option>
                                    <option>Coimbatore</option>
                                </select>
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