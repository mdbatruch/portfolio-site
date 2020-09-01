<?php 
    
    //output buffering is turned on
    ob_start();

    //turn on sessions
    session_start();

    require_once('includes/config.php');
    require_once('db/connect.php');
    require_once('private/auth_functions.php');
    require_once('db/query_functions.php');
    require_once('functions.php');

    $db = db_connect();

?>