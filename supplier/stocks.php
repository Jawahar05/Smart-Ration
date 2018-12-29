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
</head>

<body class="body">
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
                    <li class="nav-item  active">
                        <a class="nav-link" href="../supplier/stocks.php">Stocks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/notification.php">Notification</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../supplier/stocks&stores.php">Stores & Stocks</a>
                    </li> -->
                </ul>


            </div>
            <div>
                <form class="form-group form-inline" action="../log/logout.php" method="POST">
                    <div class="dropdown show mr-5">
                        <a href="#" role="button" id="dropdownprofile" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="color:black;">
                            <i class="fas fa-user" style="font-size: 25px;"></i>
                            <?php
                            echo (ucwords($_SESSION['user']));
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

    <div class="container-liquid padding">
        <?php 
//include database
    include "../log/dbconnect.php";

    // $user = $_SESSION['user'];
    // $state = "SELECT store_name FROM worker_login WHERE worker_name = '$user'";
    // $exe = $conn->query($state);
    // $fetch = mysqli_fetch_assoc($exe);
    $store = $_SESSION['store_name'];
                            //query
    $statement = "SELECT store_id, store_name, required_rice, available_rice, alloted_rice, remaining_rice,
                     required_sugar, available_sugar, alloted_sugar, remaining_sugar,
                      required_wheat, available_wheat, alloted_wheat, remaining_wheat,
                      required_dhall, available_dhall, alloted_dhall, remaining_dhall FROM store_data WHERE store_name = '$store'";
                            //table creation header
    echo "<table border='3' class='text-center'>
                                <tr>
                                <th rowspan='2'>Store Code</th>
                                <th rowspan='2'>Store Name</th>
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
    }
    echo "</table>";
    ?>
    </div>
</body>

</html>