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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index_frontend.php">Spike team</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="./login.php">Home</a>
                </li>
                <li>
                    <a href="./register.php">Sign up</a>
                </li>
                <li>
                    <a href="./login.php">Sign in</a>
                </li>
                <li>
                    <a href="./about.php">About</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('frontend/img/home-bg2.jpg')">
    <div class="container">

        <div class="container">

            <div class="row" id="pwd-container">
                <div class="col-md-4"></div>

                <div class="col-md-4">
                    <section class="login-form">

                        <form method="post" action="#" role="login">
                            <img src="frontend/img/icon-login.png" class="img-responsive" alt=""/>
                            <input type="text" name="username" placeholder="Username" required
                                   class="form-control input-lg"/>
                            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password"
                                   required=""/>
                            <?php if(isset($_SESSION['error'])): ?>
                                <p class="error-msg"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
                            <?php endif; ?>
                            <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            <div>
                                <a href="./register.php">Create account</a>
                                </br>
                                <a href="#">Reset password</a>
                            </div>
                        </form>

                    </section>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1></h1>
                    <hr class="small">
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-preview">
                <a href="post_frontend.php">
                    <h2 class="post-title">
                        Heading 1
                    </h2>
                    <h3 class="post-subtitle">
                        Subtitel/Content
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post_frontend.php">
                    <h2 class="post-title">
                        Heading 2
                    </h2>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post_frontend.php">
                    <h2 class="post-title">
                        Heading 3
                    </h2>
                    <h3 class="post-subtitle">
                        Content
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post_frontend.php">
                    <h2 class="post-title">
                        Heading 4
                    </h2>
                    <h3 class="post-subtitle">
                        Content
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
            </div>
            <hr>
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="https://www.facebook.com/groups/1322270057830424/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/SpikeTeam/PHP-Blog">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Team Spike 2017</p>
            </div>
        </div>
    </div>
</footer>

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
