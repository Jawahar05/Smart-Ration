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

<body class="body">
    <?php
    if (!$_SESSION['type'] == "Supervisor") {
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
                            Edit Cards</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>


    <div class="padding ml-5">
        <form id="updateworker" name="newform" class="mt-3" action="../cards/updatecards.php" method="POST" onsubmit="return validateForm()">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="cardnumber">Card Number</label>
                </div>
                <div class="col-sm-3">
                    <input id="cardnumber" type="text" name="cardnumber" class="form-control" placeholder="Name" value="<?php echo($_SESSION['ECNo']) ?>"
                        disabled required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="name">Name</label>
                </div>
                <div class="col-sm-3">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="<?php echo($_SESSION['ECName']) ?>"
                        required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="mobilenumber">Mobile Number</label>
                </div>
                <div class="col-sm-3">
                    <input id="mobilenumber" type="text" name="mobilenumber" class="form-control" placeholder="Mobile Number"
                        value="<?php
                            echo($_SESSION['ECmobile']);
                            ?>"
                        required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="address">Address</label>
                </div>
                <div class="col-sm-3">
                    <input id="address" type="text" name="address" class="form-control" placeholder="Address" value="<?php echo($_SESSION['ECaddress']); ?>"
                        required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="cardtype">Card Type</label>
                </div>
                <div class="col-sm-3">
                    <input id="cardtype" type="email" name="cardtype" class="form-control" placeholder="Card Type" value="<?php echo($_SESSION['ECtype']); ?>"
                        disabled required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" name="updatecard" value="update" class="btn">update</button>
                </div>
                <div class="col-sm-3">
                    <a class="btn" href="../supervisor/cards.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>