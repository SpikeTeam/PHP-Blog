<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Post</title>

    <!-- Bootstrap Core CSS -->
    <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Login Form CSS/Update -->
    <link href="frontend/css/login.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="frontend/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="frontend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php">Spike team</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="register.php">Sign up</a>
                </li>
                <li>
                    <a href="index.php">Sign in</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<header class="intro-header" style="background-image: url('frontend/img/home-bg2.jpg')">
    <div class="container">

        <div class="container">

            <div class="row" id="pwd-container">
                <div class="col-md-4"></div>

                <div class="col-md-4">
                    <section class="login-form">
                        <?php if(isset($_SESSION['errorMsg'])): ?>
                            <p class="error-msg"><?= $_SESSION['errorMsg']; unset($_SESSION['errorMsg']); ?></p>
                        <?php endif; ?>
                        <form method="post">
                            <div class = " text-center" style="color:white">
                                <h3>Create Post</h3>
                            </div>
                            <div>
                                <input type="text" name="title" id="title" placeholder="Title" required
                                       class="form-control input-lg"/>
                            </div>
                            <div>
                                <input type="text" name="about" class="form-control input-lg" id="about"
                                       placeholder="Intro"  required />
                            </div>
                            <div>
                                <textarea name="content" id="content" cols="20" rows="10"
                                          class="form-control input-lg" placeholder="Content"></textarea>
                            </div>
                            <button type="submit" name="createPost" class="btn btn-md btn-primary btn-block">Add</button>
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
</body>
</html>