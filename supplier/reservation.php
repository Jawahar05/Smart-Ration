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
    <title>Supplier - Smart Ration</title>
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

<body class="body" onload="filterSelection('condition')">
    <!-- php check -->
    <?php
if (!$_SESSION['type'] == "supplier") {
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
                            Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/home.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/stocks.php">Stocks</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="../supplier/reservation.php">Reservation</a>
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
        <?php
        if(isset($_SESSION['newmonth'])) {
            echo ("<div class='alert alert-success alert-dismissible fade show container' role='alert'>");
                    echo($_SESSION['newmonth']);
                    unset($_SESSION['newmonth']);
                    echo ("<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>");
        }
        ?>
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
        <div class="row">

            <!-- **************************************************** -->
            <!-- **************** left Panel *********************-->
            <!-- **************************************************** -->

            <div id="myBtnContainer" class="col-sm-3 panel">
                <button class="btn-panel" onclick="filterSelection('condition')"><i class="ml-2 fas fa-toolbox panel-fa mr-3"></i>Pre
                    Condition</button>
                <button class="btn-panel" onclick="filterSelection('message')"><i class="ml-2 fas fa-comment panel-fa mr-3"></i>Message</button>
                <button class="btn-panel" onclick="filterSelection('setting')"><i class="ml-2 fas fa-cog panel-fa mr-3"></i>Settings</button>
            </div>

            <!-- **************************************************** -->
            <!-- **************** Condition *********************-->
            <!-- **************************************************** -->

            <div id="addnewcards" class="col-sm-9">
                <div class="filterDiv condition">
                    <form action="../reservation/precondition.php" method="POST">
                        <div class="row form-group">
                            <div class="col-3 text-right">
                                <label for="cards">Total Cards :</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" name="cards" placeholder="Total no of Cards" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-3 text-right">
                                <label for="totaldays">Total Working Days :</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" name="totaldays" placeholder="Total working days" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-7 text-center">
                                <button class="btn" name="apply">Okay</button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- **************************************************** -->
                <!-- **************** Message *********************-->
                <!-- **************************************************** -->

                <div class="filterDiv message">
                    <form action="../reservation/send.php" method="POST">
                        <div class="container-liquid">
                            <textarea class="home-textarea" placeholder="Enter the message to send." required></textarea>
                        </div>
                        <div>
                            <button class="btn mt-3" name="send" type="submit">Send</button>
                        </div>
                    </form>
                </div>

                <!-- **************************************************** -->
                <!-- **************** Settings *********************-->
                <!-- **************************************************** -->

                <div class="filterDiv setting container-liquid">

                    <div class="row">
                        <div class="col-3">
                            <form action="../reservation/reset.php" method="POST">
                                <div class="container">
                                    <button class="btn" name="resetdata" data-toggle="tooltip" title="Reset calendar data changes">Data
                                        reset</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                View Calendar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="text-center mb-3">Calendar for the Month of <strong>
                                                    <?php echo(date('F')); ?></strong></h5>

                                        </div>
                                        <div class="modal-body">
                                            <?php
                             include("../log/dbconnect.php");
    
                             $statement = "SELECT *FROM calendar WHERE id > 0";
                             //table creation header
                             echo "<table border='3' class='text-center'>
                                 <tr>
                                 <th>Date</th>
                                 <th>Details</th>
                                 </tr>
                                 ";
                             //execute
                             $result = $conn->query($statement);
                     
                             if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                             // echo "<br>" . $row["district_code"] . "   " . $row["district_name"] . "<br>";
                                     echo "<tr>";
                     
                                     echo "<td>" . $row['date_cal'] . "</td>";
                                     echo "<td>" . $row['day_cal'] . "</td>";
                     
                                     echo "</tr>";
                                 }
                             } else {
                                 echo ("<tr>");
                                 echo "<td colspan='18' class='text-warning'>" . "Data not Found" . "</td>";
                                 echo ("</tr>");
                             }
                             echo "</table>";
    
                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <form action="../reservation/reset.php" method="POST">
                                <div class="container">
                                    <button class="btn" name="calendarreset" data-toggle="tooltip">Calendar
                                        reset</button><br>
                                </div>
                            </form>
                        </div>
                        <div class="col-3">
                            <form action="../reservation/reset.php" method="POST">
                                <div class="container">
                                    <button class="btn" name="rearange" data-toggle="tooltip">Rearrange schedule</button><br>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>