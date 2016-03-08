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

    <!-- Font Awesome CSS -->
    <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="css/animations.css" rel="stylesheet">

    <!-- Worthy core CSS file -->
    <link href="css/style.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    <script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    theme: 'modern',
    width: 1150,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
  });
  </script>
</head>

<body class="no-trans">

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- header start -->
<!-- ================ -->
<div class="header fixed clearfix navbar navbar-fixed-top" style="background-color:black;">
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
                                        <li ><a href="Topic.php">Review</a></li>
                                        <li class="active"><a href="PostReview.php">Add Review</a></li>
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
</div>
<!-- header end -->

<!-- section start -->
<!-- ================ -->
<div class="section translucent-bg bg-image-2 pb-clear">
    <!--<div class="section">-->
    <div class="container" style="padding-top: 5%;padding-bottom: 10%">
        <h1 class="text-center title" id="review">Write Your Story</h1>
        <br>
        <div class="separator"></div>
        <div class="row object-non-visible" data-animation-effect="fadeIn">
            <div class="col-md-12">
                <!-- portfolio items start -->
                <script>
                  function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && charCode != 46 &&(charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>  
                <form action="Controller.php" method="post" id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputImage" style="font-size: 22px"> Image :<FONT COLOR="#F00">*</FONT></label>
                        <input type="file" name="image" id="fileToUpload" required="true">
                    </div>
                    <div class="form-group">
                        <label for="inputTopic" style="font-size: 22px"> Topic :<FONT COLOR="#F00">*</FONT></label>
                        <input type="text" name="topic" size="51" required="true" style="color:black;" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" style="font-size: 22px"> Story : <FONT COLOR="#F00">*</FONT></label>
                        <textarea id="myTextarea" name="detail"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputLocation" style="font-size: 22px"> Location : <FONT COLOR="#F00">*</FONT></label>
                        <input type="text" name="location" size="51" required="true" style="color:black;" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-size: 22px">Tag : <FONT COLOR="#F00">*</FONT></label>
                        <select name="tag" required="true" onchange="this.form.submit()" style="color:black">
                            <option value="town" style="color:black;" selected="selected">Town</option>
                            <option value="forest" style="color:black;">Forest</option>
                            <option value="mountian" style="color:black;">Mountian</option>
                            <option value="sea" style="color:black;">Sea</option>                        
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                </form>
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
