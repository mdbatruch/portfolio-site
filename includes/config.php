<?php

    //set the timezome to EST
    date_default_timezone_set('America/Toronto');
    
    //set the level of errors you want to see
    // error_reporting(E_ALL&~E_NOTICE);        

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //site title for whole site
    define( 'SITE_TITLE', 'The Online Portfolio of Mike Batruch');
    define("SITE_ROOT", $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));