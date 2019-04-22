<?php 

    // require('initialize.php');
    require('includes/config.php');
    require('functions.php');
    require('site-db/connect.php');
    require('site-db/query_functions.php');

    $db = db_connect();
    $errors = [];

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title><?php echo SITE_TITLE; ?></title>
        
        <!--        LIGHTBOX CSS         -->
        <link href="<?php echo root_url('css/lightbox.css'); ?>" rel="stylesheet">
        
        <!-- main stylesheet link -->
        <link rel="stylesheet" href="<?php echo root_url('css/style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo root_url('css/bootstrap.css'); ?>" />
        
        <!--        FAVICON             -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/manifest.json">
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
    </head>
<body>
<?php $projects = find_all_projects(); ?>
   <div id="top"></div>
        <header id="site-header">
            <h1 id="site-title">
               <a href="https://ca.linkedin.com/in/michaelbatruch" target="_blank">
                   <img src="<?php echo root_url('images/linkedin.png'); ?>" alt="linked-in" id="linked-logo">
               </a>
               <a href="https://github.com/mdbatruch" target="_blank">
                   <img src="<?php echo root_url('images/github.png'); ?>" alt="github" id="github-logo">
               </a>
            </h1>
                <nav id="site-nav">
                   <a id="show-menu" href="#site-nav"><span>Show Menu</span></a>
                    <a id="hide-menu" href="#"><span>Hide Menu</span></a>
                    <ul id="menu">
                        <li>
                            <a href="<?php echo root_url('index.php'); ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo root_url('contact.php'); ?>">Contact</a>
                            <!-- <a href="<php root_url('con.php'); ?>">Contact</a> -->
                        </li>
                    </ul>
               </nav>
        </header>