<?php /** @var $data \Models\User */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Login Form CSS/Update -->
    <link href="frontend/css/login.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="frontend/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="frontend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="frontend/css/profile.css" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="./index.php">Home</a>
            </li>
            <li>
                <a href="./register.php">View All Posts</a>
            </li>
            <li>
                <a href="./login.php">Create post</a>
            </li>
            <li>
                <a href="./logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?= $_SESSION['profileUrl'] ?? "Blog/../pictures/base_avatar.png"?>"
                         class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?= $_SESSION['username'] ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?= $_SESSION['fullName'] ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a href="./logout.php"><input type="button" class="btn btn-success btn-sm" value="Logout" /></a>
                    <a href="./createPost.php"><input type="button" class="btn btn-danger btn-sm" value="Create post"/></a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <?= $_SESSION['email'] ?> </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-file">Count Posts: </i>
                                <?= $_SESSION['countPosts']['countPosts'] ?> </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-paste">Count comments: </i>
                                <?= $_SESSION['countComments']['countComments'] ?></a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <?= $_SESSION['personalInfo'] ?>
            </div>
        </div>
    </div>
</div>
<center>
    <strong>Powered by <a href="https://github.com/SpikeTeam/PHP-Blog" target="_blank">Spike Team</a></strong>
</center>
<br>
<br>

<!-- jQuery -->
<script src="frontend/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="frontend/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="frontend/js/jqBootstrapValidation.js"></script>
<script src="frontend/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="frontend/js/clean-blog.min.js"></script>
<!-- <script src="js/login.js"></script> -->
</body>
</html>