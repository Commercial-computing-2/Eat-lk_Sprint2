<?php
session_start();
include("db.php");

if (isset($_SESSION["sess_id"])) {
    $usr_id = $_SESSION["sess_id"];
    if ($_SESSION["sess_status"] == "admin") {
        header('location: admin/pnl_user');
    }
    if ($_SESSION["sess_status"] == "shop") {
        header('location: shop/pnl_order');
    }
} else {
    header('location: index');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <title>Food Ordering Management System</title>
    <link rel="stylesheet" href="bootstrap/css/all.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        .content {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://source.unsplash.com/fdlZBWIP0aM/1920x1080');
            height: 100%;
            background-position: center;
            background-repeat: repeat;
        }
    </style>
</head>

<body class="content">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Eat.lk</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="browse">Browse </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout">Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order">Status</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['sess_id'])) {
                    ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="profile">Profile</a>
                                <a class="dropdown-item" href="action?act=lgout">Logout</a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>
                        <a href="index?act=login" class="btn btn-outline-success my-2 my-sm-0">Login</a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">

        <!-- Alert -->
        <div id="alert" style="position:absolute;z-index:1;">
        </div>

        <h2 class="display-4 text-white">Profile</h2>

        <div class="row bg-light rounded p-5">

            <div class="col-4 " id="profile_display">
                <h4 class="pb-3 text-capitalize">Hi, <?php echo $_SESSION["sess_username"]; ?>.</h4>
                <div class="form-group ">
                    <div class="mb-1 "><i class="fas fa-user"></i> Full Name</div>
                    <div class="text-muted  text-capitalize"> <?php echo $_SESSION["sess_fullname"]; ?></div>
                </div>
                <div class="form-group ">
                    <div class="mb-1 "><i class="fas fa-map-marked-alt"></i> Address</div>
                    <div class="text-muted  text-capitalize"> <?php echo $_SESSION["sess_address"]; ?></div>
                </div>
            </div>

         
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var url_string = window.location.href;
            var url = new URL(url_string);
            var action = url.searchParams.get("act");

            if (action === 'update') {
                $("#update_display").show();
                $("#profile_display").hide();

            }

        });
    </script>

    <script src="bootstrap/js/app.js"></script>

</body>

</html>