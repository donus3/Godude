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
        box-shadow: 2px 2px 10px #000000;
    }

    .bg {
        background-color: whitesmoke;
        -webkit-border-radius: 25px;
        z-index: 2;
        min-height: 100%;
        margin-top: 100px;
        background-size: cover;
        box-shadow: 2px 2px 10px #000000;
        margin-bottom: 50px;
    }

    /*.col-md-10 {*/
    /*-webkit-border-radius: 25px;*/
    /*margin-top: 0px;*/
    /*z-index: 2;*/
    /*}*/

    img.weather {
        margin-left: auto;
        margin-right: auto;
    }


</style>

<body class="no-trans">
<!-- scrollToTop -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
<!-- header start -->
<header class="header fixed clearfix navbar navbar-fixed-top" style="background-color:black;">
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
<div class="container-fluid bg-image-1 "> <!--main bg-->
    <div class="bg col-md-10 col-lg-offset-1 " style="background-color:#FFFFFF;"> <!-- bg's topic-->
        <div class="col-md-6 col-md-offset-3" style="padding-top: 10%;padding-bottom: 3%; align-content: center;"> <!--topic again-->
            <!-------------- Show Topic -------------->
            <?php
            echo "<h1 class='text-center'>" . $review['topic'] . "</h1>";
            ?>
            <!-------------- Show Image -------------->
            <div>
                <img src="<?php echo $review['image']; ?>" class="img-thumbnail">
            </div>
            <!---------------- Content ------------------>
            <div style="padding-top: 5%">
                <?php
                echo $review['detail'] . "<br>";
                ?>
            </div>
        </div>
        <!--------------- Show Weather -------------->
        <div class="col-md-8 col-md-offset-2">
            <?php
            $allWeather = $controller->getWeather($review['la'], $review['long'], $review['tag']);
            $weather = json_decode($allWeather);
            $arrWeather = array();
            $descriptionD = "";
            $descriptionN = "";
            $maxD = 0;
            $maxN = 0;
            if (is_array($weather) || is_object($weather)) {
                foreach ($weather as $allContent) {
                    $content = json_decode($allContent, true);
                    if((int)$content['percent'] > $max && $content['period'] == 'day'){
                    	$maxD = (int)$content['percent'];
                    	$descriptionD = $content['description'];
                    }
                    elseif((int)$content['percent'] > $max && $content['period'] == 'night'){
                    	$maxN = (int)$content['percent'];
                    	$descriptionN = $content['description'];
                    }
                    array_push($arrWeather, $content);
                }
            }
            ?>
            
            <div class="container" style="padding-bottom: 10%">
                <h3> Trip Suggestions Average within 10 Days</h3>

                <h4> @Day </h4>
                <p> <?php echo $descriptionD; ?></p>
                <h4> @Night </h4>
                <p> <?php echo $descriptionN; ?> </p>
            </div>

            <h3> Weather Average within 10 Days </h3>
            <div class="container">
                <h4> Day Weather </h4>
                <?php
                foreach ($arrWeather as $content) {
                    if ($content['period'] == 'day') {
                        ?>
                        <div class="col-md-2 text-center">
                            <?php
                            if ($content['temp'] == 'sun') {
                                ?>
                                <img class="weather" src="images/day.png" width="60" height="60">
                                <h5>SUNNY</h5>
                                <?php echo $content['percent'] ?><br>
                                <?php
                            } elseif ($content['temp'] == 'clear') {
                                ?>
                                <img class="weather" src="images/dayclear.png" width="60" height="60">
                                <h5>CLEAR</h5>
                                <?php echo $content['percent'] ?><br>
                                <?php
                            } else {
                                ?>
                                <img class="weather" src="images/dayrain.png" width="60" height="60">
                                <h5>RAINY</h5>
                                <?php echo $content['percent'] ?><br>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                            data-toggle="dropdown">
                                        Rainy Day<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $i = 0;
                                        $j = 0;
                                        $arr = array();
                                        for ($i = 0; $i < strlen($content['date']); $i += 25) {
                                            $time = substr($content['date'], $i + 1, 24);
                                            $unixTime = date("U", strtotime($time));
                                            $date = gmdate("d/m/y", $unixTime);
                                            ?>
                                            <li><a href="#"><?php echo $date ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <?php
                    }
                } ?>
            </div>
            <div class="container" style="padding-bottom: 10%">
                <?php
                echo '<h4>Night Weather</h4>';
                foreach ($arrWeather as $content) {
                    if ($content['period'] == 'night') {
                        ?>
                        <div class="col-md-2 text-center">
                            <?php
                            if ($content['temp'] == 'clear') {
                                ?>
                                <img class="weather" src="images/nightclear.png" width="60" height="60">
                                <h5>CLEAR NIGHT</h5>
                                <?php echo $content['percent'] ?><br>
                                <?php
                            } else {
                                ?>
                                <img class="weather" src="images/nightrain.png" width="60" height="60">
                                <h5>RAINY</h5>
                                <?php echo $content['percent'] ?><br>
                                <div class="dropup">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" >
                                        Rainy Day
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $i = 0;
                                        $j = 0;
                                        $arr = array();
                                        for ($i = 0; $i < strlen($content['date']); $i += 25) {
                                            $time = substr($content['date'], $i + 1, 24);
                                            $unixTime = date("U", strtotime($time));
                                            $date = gmdate("d/m/y", $unixTime);
                                            ?>
                                            <li><a href="#"><?php echo $date ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            } ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
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
<script type="text/javascript" src="js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
