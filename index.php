<!DOCTYPE html>
<html>

<head>
    <!-- Required meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Ration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- refera links -->
    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/main.css" />
    <link rel="shortcut icon" type="media/image" media="screen" class="shadow-lg" href="./assets/images/logo.png">
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

<!-- PHP Session -->
<?php
session_start();
?>

<body class="body">
    <div class="container-fluid">
        <div class="row">

            <!-- Heading column-->
            <div class="col-sm">
                <div class="text-center heading">
                    <img class="img-fluid" src="./assets/images/logo.png" style="width: 100px;">
                    <p>Reservation Based <br>Smart Ration System</p>
                </div>
            </div>

            <!-- login column -->
            <div class="col-sm">
                <div class="mt-5">

                    <!-- Login form -->
                    <form class="border shadow-lg" action="./log/login.php" method="POST">
                        <h3 class="text-center"><i class="fas fa-sign-in-alt"></i><strong> Login</strong></h3>
                        <div class="text-danger pt-3">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </div>
                        <div class="form-group py-4">
                            <label for="user_id"><i class="fas fa-id-badge fa-lg"></i> Worker ID</label>
                            <input name="username" type="text" class="form-control" id="user_id" placeholder="Enter Worker ID"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-unlock-alt fa-lg"></i> Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password"
                                required>
                        </div>
                        <button name="submit" type="submit" class="btn">Login</button>
                        <p class="text-center"><a href="./development.php">Forget Password.?</a></p>
                        <a href="../smartration/dummyinterface/interface.php">Interface</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center">Browser compatible: <img src="./assets/images/chrome.png"> Google Chrome</p>
</body>

</html>