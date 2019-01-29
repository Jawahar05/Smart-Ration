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
    <!-- referal links -->
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
                        <a class="navbar-brand"><i class="fas fa-shopping-cart" style="color:#0097e6;"></i>
                            Supply</a>
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
    <?php
    include('../log/dbconnect.php');
    $cdno = $_SESSION['supplycdno'];
    $command = "SELECT *FROM cards WHERE card_number = '$cdno'";
    $exe = mysqli_query($conn, $command);
    if ($row = mysqli_fetch_assoc($exe)) {
        $name = $row['name'];
        $type = $row['card_type'];
    }
    ?>
    <div class="padding container-liquid">
        <form>
            <div class="row">
                <div class="col-2 text-center">
                    <label for="cardnumber">Card Number</label>
                </div>
                <div class="col-2">
                    <input class="form-control" name="cardnumber" value="<?php echo($cdno); ?>" disabled>
                </div>
                <div class="col-3">
                </div>
                <div class="col-2 text-center">
                    <label for="cardtype">Card Type</label>
                </div>
                <div class="col-2">
                    <input class="form-control" name="cardtype" value="<?php echo(ucwords($type)); ?>" disabled>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-2 text-center">
                    <label for="name"> Holder Name</label>
                </div>
                <div class="col-2">
                    <input class="form-control" name="holder" value="<?php echo($name); ?>" disabled>
                </div>
            </div>
    </div>

    <!-- Table content -->
    <div class="container-liquid mx-5 pt-4">
        <h2 class="text-center"><strong>Bill Details</strong></h2>
        <table border="3" class="text-center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Rate (&#8377;)</th>
                <th>Total (&#8377;)</th>
            </tr>
               <?php
                if ($type == "commodity") {
                    $executecmd = "SELECT *FROM rice_card WHERE no >= '0'";
                    $execute = mysqli_query($conn, $executecmd);
                    while ($row = mysqli_fetch_assoc($execute)) {
                        echo "<tr>";
                        echo "<td>" . $row['no'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td contenteditable='true'>" . $row['qty'] . "</td>";
                        echo "<td>" . $row['rate'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo ("</tr>");
                    }
                    echo ("<tr>
                    <th colspan='4'>Grand Total (&#8377;)</th>
                    <td>73.00</td>
                </tr>");
                } else if ($type == "sugar") {
                    $executecmd = "SELECT *FROM sugar_card WHERE no >= '0'";
                    $execute = mysqli_query($conn, $executecmd);
                    while ($row = mysqli_fetch_assoc($execute)) {
                        echo "<tr>";
                        echo "<td>" . $row['no'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td contenteditable='true'>" . $row['qty'] . "</td>";
                        echo "<td>" . $row['rate'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo ("</tr>");
                    }
                    echo ("<tr>
                    <th colspan='4'>Grand Total (&#8377;)</th>
                    <td>113.50</td>
                </tr>");

                }
                ?>
            
        </table>
    </div>
    <div class="row container-liquid text-center mt-2">
        <div class="col-6">
            <button class="btn" name = "apply" type="submit">Ok</button>
        </div>
        <div class="col-6">
            <a class="btn" href="../supplier/home.php">Cancel</a>
        </div>
    </div>
</form>
</body>

</html>