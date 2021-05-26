<?php
require_once 'connection.php';
session_start();
?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <title>GreenstarCarWash | Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {
                background-image: url("./img");
            }
        </style>
    </head>

    <body>

        <nav class="navbar  navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php"><img class="logo" src="images/logo.png"></img></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?= $active == 'home' ? 'active1' : '' ?>"><a style="<?= $active == 'home' ? 'color: black;' : '' ?>" href="home.php">Home</a></li>
                        <li class="<?= $active == 'wash_services' ? 'active1' : '' ?>"><a style="<?= $active == 'wash_services' ? 'color: black;' : '' ?>" href="wash_services.php">Wash Services</a></li>
                        <li class="<?= $active == 'car_detailing' ? 'active1' : '' ?>"><a style="<?= $active == 'car_detailing' ? 'color: black;' : '' ?>" href="car_detailing.php">Car Detailing</a></li>
                        <li class="<?= $active == 'protection_services' ? 'active1' : '' ?>"><a style="<?= $active == 'protection_services' ? 'color: black;' : '' ?>" href="protection_services.php">Protection Services</a></li>
                        <?php if (isset($_SESSION['logged_in'])) : ?>
                            <?php if ($_SESSION['user']->user_type === 'admin') : ?>
                                <li class="<?= $active == 'customers' ? 'active1' : '' ?>"><a style="<?= $active == 'customers' ? 'color: black;' : '' ?>" href="customers.php">Customers</a></li>
                            <?php else : ?>
                                <li class="<?= $active == 'profile' ? 'active1' : '' ?>"><a style="<?= $active == 'profile' ? 'color: black;' : '' ?>" href="profile.php">Profile</a></li>
                            <?php endif; ?>
                            <li><a href="logout.php">Logout</a></li>
                        <?php else : ?>
                            <li class="<?= $active == 'sign_in' ? 'active1' : '' ?>"><a style="<?= $active == 'sign_in' ? 'color: black;' : '' ?>" href="sign_in.php">Sign in</a></li>
                            <li class="<?= $active == 'sign_up' ? 'active1' : '' ?>"><a style="<?= $active == 'sign_up' ? 'color: black;' : '' ?>" href="sign_up.php">Sign up</a></li>
                        <?php endif; ?>
                        <li class="<?= $active == 'contact' ? 'active1' : '' ?>"><a style="<?= $active == 'contact' ? 'color: black;' : '' ?>" href="contact.php">Contact</a></li>
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>