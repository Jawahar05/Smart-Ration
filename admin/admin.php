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
    <link rel="shortcut icon" type="media/image" media="screen" href="../assets/images/tray.png">
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
                        <a class="navbar-brand" href="#"><i class="fas fa-shopping-cart" style="color:#0097e6;"></i>
                            Admin</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only" (current)></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Workers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stores & Stocks</a>
                    </li>
                    </ui>

            </div>
            <div>
                <form class="form-group form-inline" action="../log/logout.php" method="POST">
                    <a class="mr-3"><i class="fas fa-bell" style="size:20px;"></i></a>
                    <button name="submit" type="submit" class="btn"><i class="fas fa-sign-out-alt" style="color:black;"></i>
                        Logout</button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Home -->

    <!-- Workers -->
    <div id="workers" class="padding">
        <div class="row">
            <!-- Panel -->
            <div id="worker_panel" class="col-sm-2 panel">
                <form>
                    <button name="new_worker" class="btn-panel"><i class="ml-2 fas fa-user-alt panel-fa mr-3"></i>Add
                        New</button>
                    <button name="modify_worker" class="btn-panel"><i class="ml-2 fas fa-sync-alt panel-fa mr-3"></i>Modify</button>
                    <button name="remove_worker" class="btn-panel"><i class="ml-2 fas fa-user-slash panel-fa mr-3"></i>Remove</button>
                </form>
            </div>

            <!-- add new workers -->
            <div id="new_worker" class="col-sm-9">
                <div>
                    <form class="mt-3">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="firstname" class="form-control" placeholder="First Name"
                                    required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name"
                                    required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Password</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" placeholder="Auto generatable"
                                    required disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Mobile Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="number" class="form-control" placeholder="Mobile Number"
                                    required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="email" name="email" class="form-control" placeholder="Email Id" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Position</label>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" name="postion" placeholder="Position" required>
                                    <option disabled selected>Select Position</option>
                                    <option>Supervisor</option>
                                    <option>Supplier</option>
                                    <option>Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>District</label>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" name="postion" placeholder="Position" required>
                                    <option disabled selected>Select District</option>
                                    <option>Madurai</option>
                                    <option>Erode</option>
                                    <option>Coimbatore</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Store Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="storeno" class="form-control" placeholder="Store Name"
                                    required>
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="submit" name="Submit" class="btn">Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>