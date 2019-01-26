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
                    <li class="nav-item active">
                        <a class="nav-link" href="../supplier/home.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
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
    <div class="padding">
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

        <?php
if (isset($_SESSION['info'])) {
    echo ("<div class='alert alert-info alert-dismissible fade show container' role='alert'>");
    echo ($_SESSION['info']);
    unset($_SESSION['info']);
    echo ("<button type='button' class='close text-success' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>");
}
?>
        <form class="mt-3 text-center" action="../supply/supplycheck.php" method="POST">
            <div class="row form-group">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                    <label>Card Number</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="cardnumber" class="form-control" placeholder="Enter Card Number" required>
                </div>
                <div class="col-sm-1 text-center">
                    <button type="submit" name="checkcard" class="btn">Check</button>
                </div>
            </div>
            <div class="row form-group">
            </div>
        </form>
    </div>
</body>

</html>