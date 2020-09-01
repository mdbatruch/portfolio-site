<?php 

    require('initialize.php');

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
        <link rel="icon" href="http://mike-batruch.ca/favicon/favicon-32x32.png">

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
<body class="<?php echo substr(basename($_SERVER['SCRIPT_FILENAME']), 0, -4); ?>">
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
                        </li>
                    </ul>
               </nav>
        </header>