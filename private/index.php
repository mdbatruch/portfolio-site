<?php

    require('../initialize.php');

    require_login();

    check_session();
    
    $page_title = 'Admin Dashboard';

    include('header.php');

    $pages = find_all_pages();

    // echo '<pre>';
    // print_r($pages);

    $day = date('d M Y', $_SESSION['last_login']);
    $time = date('g:i A', $_SESSION['last_login']);
?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="container dashboard">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <?php include('modules/nav.php'); ?>
                    </div>
                    <div class="col-12 col-md-8 dashboard-main">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="dashboard-main-header">
                                    <h2>Dashboard</h2>
                                    <span class="last-login"> Last login: <?php echo $day . ' at ' . $time; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid dashboard-main-inner">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 p-0 mb-4 unit-1">
                                    <a href="<?php echo 'projects/new.php'; ?>">
                                        <div class="dashboard-link">
                                        <img 
                                            src="<?php echo root_url('images/create.svg'); ?>" 
                                            height="87"
                                            width="100" />
                                            Create new project
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 p-0 mb-4 unit-2">
                                    <a href="<?php echo 'projects.php'; ?>">
                                        <div class="dashboard-link">
                                        <img 
                                            src="<?php echo root_url('images/rocket-green.svg'); ?>" 
                                            height="87"
                                            width="100" />
                                            View Projects
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 p-0 mb-4 unit-3">
                                    <a href="<?php echo root_url('index'); ?>" target="_blank">
                                        <div class="dashboard-link">
                                        <img 
                                            src="<?php echo root_url('images/preview.svg'); ?>" 
                                            height="87"
                                            width="100" />
                                            View Live Site
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include('footer.php');
?>