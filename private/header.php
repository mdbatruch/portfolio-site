<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title><?php echo $page_title; ?></title>
        
        <!--        LIGHTBOX CSS         -->
        <link href="<?php echo root_url('css/lightbox.css'); ?>" rel="stylesheet">
        
        <!-- main stylesheet link -->
        <link rel="stylesheet" href="<?php echo root_url('css/style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo root_url('css/bootstrap.css'); ?>" />
        <link rel="stylesheet" href="<?php echo root_url('css/font-awesome.min.css'); ?>">
        
        <!--        FAVICON             -->
        <link rel="icon" href="http://mike-batruch.ca/favicon/favicon-32x32.png">

        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        
        <!--    JQUERY LIBRARY    -->
       <!-- <script src="<php echo root_url('js/jquery-1.11.1.min.js'); ?>"></script> -->
       
       	<!-- JQUERY EASING	
       <script src="<php echo root_url('js/jquery.easing.1.3.js'); ?>"></script>
       
       <script src="<php echo root_url('js/custom-script.js'); ?>"></script> -->

       <script src='https://www.google.com/recaptcha/api.js'></script>
       
       <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-63890747-5', 'auto');
          ga('send', 'pageview');

       </script>
        
        <!-- HTML5Shiv: adds HTML5 tag support for older IE browsers -->
        <!--[if lt IE 9]>
	    <script src="js/html5shiv.min.js"></script>
        <![endif]-->

        <?php $script = basename($_SERVER['PHP_SELF']); ?>
    </head>
<body class="admin <?php echo substr(basename($_SERVER['SCRIPT_FILENAME']), 0, -4); ?>">
   <div id="top"></div>
        <header id="private-header" class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                    <div class="col-12 col-sm-6 welcome">
                    <div class="icon">
                        <img src="<?php echo root_url('images/icon.svg');?>" alt="">
                    </div>
                    <div class="welcome-text">
                        <span class="welcome">Welcome back, </span><br/>
                        <span class="username"><?php echo $_SESSION['username'] ?? ''; ?></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 logout-container">
                     <a class="logout" href="<?php echo root_url('logout'); ?>">Logout</a>
                </div>
                    </div>
                </div>
                </div>
            </div>
        </header>