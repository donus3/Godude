<!DOCTYPE html>
<?php
    include 'Controller.php';
    $controller = new Controller;
    $id = $_GET['id'];
    $review = $controller->getReview($id);
?>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php echo $review['topic']; ?></title>

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
</head>

<style>
    .col-md-offset-3 {
        margin-top: 20px;
        z-index: 3;
    }

    .bg-image-1 {
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        min-height: 100%;
    }

    .col-md-10 {
        -webkit-border-radius: 25px;
        margin-top: -90px;
        z-index: 2;
    }

    .row > .col-md-3 > .whether {
        margin-top: 100px;
        margin-left: 25px;
    }

    .row > .col-md-3 > h2 {

        margin-left: 65px;
    }
</style>

<body class="no-trans">
<!-- scrollToTop -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
<!-- header start -->
<header class="header fixed clearfix navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- header-left start -->
                <div class="header-left clearfix">
                    <!-- logo -->
                    <div class="logo smooth-scroll">
                        <a href="index.html"><img id="logo" src="images/favicon.ico" alt="Worthy"></a>
                    </div>

                    <div class="site-name-and-slogan smooth-scroll">
                        <div class="site-name"><a href="index.html">GoDude</a></div>
<!--                        &lt;!&ndash;<div class="site-slogan">Free Bootstrap Theme by <a target="_blank" href="http://htmlcoder.me">HtmlCoder</a></div>&ndash;&gt;-->
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
                                        <li><a href="Topic.php">Review</a></li>
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
<div class="container-fluid bg-image-1 ">
    <!-------------- Show Image -------------->
    <div class="row">
        <div id="" class="col-md-6 col-md-offset-3">
            <?php
            for($x=0;$x<6;$x++)
                echo '<br>';
            ?>
            <img id="" src="<?php echo '/images/'.$review['image'] ?>" class="img-thumbnail" width="600" height="800">
        </div>
        <!--------------- Show Weather -------------->
        <div class="row">
        
        <!--------------- Show Weather -------------->
        <?php
            $allWeather = $controller->getWeather($review['la'], $review['long'], $review['tag']);
            $weather = json_decode($allWeather);
            if (is_array($weather) || is_object($weather))
            {
                foreach ($weather as $allContent) {
                $content = json_decode($allContent, true);
        ?>
                    <div class="container col-md-offset-1">
                        <div class="col-md-4">
                            <img id="" src="<?php echo '/images/'."day.png" ?>" class="icon" width="60"
                                 height="60">
                            <h5>Sunny</h5>
                            <?php echo "Precipitation : " . $content['percent'] . "%" ?><br>
                            <?php echo "Description : " . $content['description'] ?>
                        </div>
                        <div class="col-md-4">
                            <?php if ($content['period']=="day" && $content['temp'] == "dayclear") { ?>
                                <img id="" src="<?php echo '/images/'."dayclear.png" ?>" class="icon" width="60"
                                     height="60">
                            <?php } else {
                                ?>
                                <img id="" src="<?php echo '/images/'."nightclear.png" ?>" class="icon" width="60"
                                     height="60">
                            <?php } ?>
                            <h5>Clear</h5>
                            <?php echo "Precipitation : " . $content['percent'] . "%" ?><br>
                            <?php echo "Description : " . $content['description'] ?>

                        </div>

                        <div class="col-md-4">
                            <?php if ($content['period']== "day" && $content['temp'] == "rain") { ?>
                                <img id="" src="<?php echo '/images/'."dayrain.png" ?>" class="icon" width="60"
                                     height="60">
                            <?php } else {
                                ?>
                                <img id="" src="<?php echo '/images/'."nightrain.png" ?>" class="icon" width="60"
                                     height="60">
                            <?php } ?>
                            <h5>Rainy</h5>
                            <?php echo "Precipitation : " . $content['percent'] . "%" ?><br>
                            <?php echo "Date : " . $content['date'] ?><br>
                            <?php echo "Description : " . $content['description'] ?><br><br><br>
                        </div>
                    </div>
        <?php
            }
        }
        ?>
    </div>
    </div>
    <!---------------- Content ------------------>
    <div class="row">
        <div class="col-md-10 col-lg-offset-1 " style="background-color:#777;">
            <?php
            for($x=0;$x<4;$x++)
                echo '<br>';
            echo "<h1 class='text-center'>".$review['topic']."</h1>";
            echo $review['detail']."<br>";
            ?><br>

        </div>
    </div>
    <br><br>
</div>
<!-- JavaScript files placed at the end of the document so the pages load faster
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
<!--<script type="text/javascript" src="js/template.js"></script>-->

<!-- Custom Scripts -->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
