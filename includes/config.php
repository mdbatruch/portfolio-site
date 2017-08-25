<?php

    //set the timezome to EST
    date_default_timezone_set('America/Toronto');
    
    //set the level of errors you want to see
    error_reporting(E_ALL&~E_NOTICE);        

    //site title for whole site
    define( 'SITE_TITLE', 'The Online Portfolio of Mike Batruch');