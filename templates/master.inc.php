<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Ad Gap<?php if ($page_title) { echo "-" . $page_title ;} ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-comments"></i>  The Ad_Gap
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                   <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                   <li<?php if ($page === "index"): ?> class="active" <?php endif ;?>><a href=".\">Home</a></li>
                  <!-- <li<?php if ($page === "buyAdSpace"): ?> class="active" <?php endif ;?>><a href=".\?page=buyAdSpace">Buy AdSpace</a></li>
                   <li<?php if ($page === "sellAdSpace"): ?> class="active" <?php endif ;?>><a href=".\?page=sellAdSpace">Sell Ad Space</a></li> -->
                   <li<?php if ($page === "listings"): ?> class="active" <?php endif ;?>><a href=".\?page=listings">Listings</a></li>
                    <li<?php if ($page === "info"): ?> class="active" <?php endif ;?>><a href=".\?page=info">Info</a></li>
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                    <?php if(! static::$auth->check()): ?>
                          <li<?php if ($page === "auth.register"): ?> class="active" <?php endif ;?>><a href=".\?page=register">Register</a></li>
                          <li<?php if ($page === "auth.login"): ?> class="active" <?php endif ;?>><a href=".\?page=login">Login</a></li>
                    <?php else: ?>
                          <li><a href="#"><?= static::$auth->user()->email; ?></a></li> 
                          <li><a href=".\?page=logout">Logout</a></li>
                    <?php endif; ?>
            </ul>
               </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<!-- CONTENT  -->
<?php $this->content(); ?>


    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; Copyright R.Reyes Malqui (Kultura)<?php echo date("Y");?></p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- Taggle JavaScript -->
    <script src="js/taggle.min.js"></script>

    <!-- Project JavaScript -->
    <script src="js/main.js"></script>

</body>

</html>
