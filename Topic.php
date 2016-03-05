<!DOCTYPE html>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<?php include 'Controller.php'; ?>
    <meta charset="utf-8">
    <title>GoDude</title>

    <meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="htmlcoder.me">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Web Fonts -->
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="css/animations.css" rel="stylesheet">

    <!-- Worthy core CSS file -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="css/custom.css" rel="stylesheet">
    <script>
        $(document).ready(function () {
            $('#add').click(function () {
                $("#add").click(function () {
                    $(this).hide();
                });
            });
    </script>

</head>

<body class="no-trans">

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- header start -->
<!-- ================ -->
<header class="header fixed clearfix navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <!-- header-left start -->
                <!-- ================ -->
                <div class="header-left clearfix">

                    <!-- logo -->
                    <div class="logo smooth-scroll">
                        <a href="#banner"><img id="logo" src="images/favicon.ico" alt="Worthy"></a>
                    </div>

                    <!-- name-and-slogan -->
                    <div class="site-name-and-slogan smooth-scroll">
                        <div class="site-name"><a href="index.html">GoDude</a></div>
                        <!--<div class="site-slogan">Free Bootstrap Theme by <a target="_blank" href="http://htmlcoder.me">HtmlCoder</a></div>-->
                    </div>

                </div>
                <!-- header-left end -->

            </div>
            <div class="col-md-8">

                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">

                    <!-- main-navigation start -->
                    <!-- ================ -->
                    <div class="main-navigation animated">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">

                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target="#navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.html">Home</a></li>
                                        <li class="active"><a href="Topic.php">Review</a></li>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                        <!-- navbar end -->

                    </div>
                    <!-- main-navigation end -->

                </div>
                <!-- header-right end -->

            </div>
        </div>
    </div>
</header>
<!-- header end -->


<!-- section start -->
<!-- ================ -->
<div class="section translucent-bg bg-image-2 pb-clear">
    <!--<div class="section">-->
    <div class="container">
        <br><br>
        <h1 class="text-center title" id="review">Review</h1>
        <br>
        <div class="separator"></div>
        <div class="row object-non-visible" data-animation-effect="fadeIn">
            <div class="col-md-12">

                <!-- portfolio items start -->
                <div class="isotope-container row grid-space-20"> <!-- For 1 container size 20 -->
                          <br><br><br><br><br>
                    <?php
                    $count = 0;
                    $controller = new Controller;
                    $weather = $controller->getWeater();
                    $allTopic = $controller->getTopic();
                    $arr = json_decode($allTopic);
                    if (is_array($arr) || is_object($arr))
                    {
                        foreach ($arr as $eachTopic) {
                          $topic = json_decode($eachTopic,true);
                          ?>
                            <div class="col-sm-6 col-md-3 isotope-item app-development">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img name="<?php echo $count ?>" href="getTopic.php" src="<?php echo $topic['images'] ?>"
                                             alt=""> <!-- Image here -->
                                        <a href="getTopic.php?id=<?php echo $count; ?>" class="overlay"
                                           data-target="#project-5">
                                            <!-- onclick image will show overlay on image -->
                                            <i class="fa fa-search-plus fa-4x"></i>
                                            <span><?php echo $topic['timestamp'] ?></span> <!-- message in span! -->
                                        </a>
                                    </div>
                                    <!-- call something from ... -->
                                    <a href="getReview.php?id=<?php echo $count; ?>" class="btn btn-default btn-block"
                                       data-target="getReview.php">
                                        <?php echo $topic['topic'] ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $count = $count + 1;
                        }
                    }
                ?>

                    <div class="col-sm-6 col-md-3 isotope-item app-development">

                        <i id="add" class="fa fa-plus-circle fa-5x"></i>


                    </div>
                </div>


                <!-- portfolio items end -->
            </div>
        </div>
    </div>
</div>
<!-- section end -->


<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->

<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="plugins/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="plugins/modernizr.js"></script>

<!-- Isotope javascript -->
<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>

<!-- Backstretch javascript -->
<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="plugins/jquery.appear.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
