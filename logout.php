<?php
    require_once('initialize.php');

    // unset($_SESSION['username']);
    // unset($_SESSION['new_message']);


    // or you could use
    // $_SESSION['username'] = NULL;

    $_SESSION['logout_message'] = 'You have successfully logged out.';

    logout_admin();

    redirect_to('login');
?>
