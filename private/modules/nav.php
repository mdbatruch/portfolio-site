<div id="main-menu" class="ml-auto">
    <nav class="navbar navbar-expand-md">
        <button type="button" class="nav-open navbar-toggler navbar-dark navbar-toggler-right ml-auto" data-target="#admin-nav" data-toggle="offcanvas" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse" id="admin-nav">
        <h2>Main Menu</h2>
        <ul class="close">
            <li>
                <button class="close-btn navbar-toggler text-white btn-block text-center ml-auto my-1" type="button" data-toggle="offcanvas" data-target="#admin-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </li>
        </ul>
            <ul class="nav-fill ml-auto">
                <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; } ?>"> <a href="<?php echo root_url_private('index'); ?>">Home/Dashboard</a></li>
                <li class="menu-item <?php if ($script =='projects.php' || substr(dirname($_SERVER['PHP_SELF']), -8) == 'projects') { echo 'active'; } ?>"><a href="<?php echo root_url_private('projects.php'); ?>">Projects</a></li>
                <li class="menu-item dropdown <?php if (substr(dirname($_SERVER['PHP_SELF']), -5) == 'pages') { echo 'active'; } ?>"><a class="dropdown-title" href="javascript:void(0);">Pages <i class="fa fa-chevron-down"></i></a>
                    <ul class="sub-menu">
                        <?php foreach($pages as $page) : ?>
                            <li><a href="<?php echo root_url_private('/pages/' . $page["page"] . '-page'); ?>"><?php echo $page['page']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu-item"> <a href="<?php echo root_url('index'); ?>" target="_blank">View Live Page</a></li>
            </ul>
        </div>
    </nav>
</div>