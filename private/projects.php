<?php

    require_once('../initialize.php');

    // include(SITE_ROOT_PRIVATE . '/header.php');

    require_login();

    check_session();
    
    $page_title = 'Projects';

    include('header.php');

    $projects = find_all_projects();

    if (isset($_GET['page'])) {
        $page_number = $_GET['page'];
    } else {
        $page_number = 1;
    }

    // set project per page number
    $projects_per_page = 6;

    //offest
    $offset = ($page_number-1) * $projects_per_page;

    //get project count
    $project_count = project_count();

    $total_pages = ceil($project_count / $projects_per_page);
    $sql_projects = count_all_projects($offset, $projects_per_page);

    if (isset($_GET['page']) && $_GET['page'] > $total_pages) {
        redirect_to(root_url_private('index'));
      }

    // for showing * of * text in pagination
    $upper = min( $project_count, $page_number * $projects_per_page);
    $lower = ($page_number - 1) * $projects_per_page + 1;

    $pages = find_all_pages();

    // echo $upper . '<br/>';
    // echo $lower;

    // include('header.php');

    // echo $_SERVER['DOCUMENT_ROOT'] . dirname(dirname($_SERVER['PHP_SELF'])) . '/images/';
?>
        <div id="content" class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <?php include('modules/nav.php'); ?>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="container">
                                <div class="row">
                                    <div class="form-message-container">
                                        <div id="form-message"><?php if (isset($_GET['status']) && $_GET['status'] == 'created' ){ echo '<div class="alert alert-success">You have succesfully created a new project.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';} elseif (isset($_GET['status']) && $_GET['status'] == 'deleted' ){ echo '<div class="alert alert-success">You have succesfully deleted a project.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'; }?></div>
                                    </div>
                                </div>
                                <div id="main-menu">
                                    <h1>Project Lists</h1>
                                    <a class="create-project" href="<?php echo 'projects/new.php' ?>">+ New Project</a>
                                    <div class="status-legend">
                                        <div class="status-1">
                                            <div class="status active"></div>
                                            <span>Active</span>
                                        </div>
                                        <div class="status-2">
                                            <div class="status inactive"></div>
                                            <span>Inactive</span>
                                        </div>
                                    </div>
                                    <div class="toggle">
                                        <i class="fa fa-bars row-select"></i>
                                        <i class="fa fa-th-large grid-select"></i>
                                    </div>
                                    <div id="inner-project-list">
                                        <div class="container">
                                            <div class="row">
                                                <?php while($project_list = mysqli_fetch_assoc($sql_projects)) { ?>
                                                    <div class="project min-12 col-lg-6">
                                                        <?php $gifcheck = substr($project_list['link'], -3); ?>
                                                        <a class="inner-title" href="<?php echo $project_list['link']; ?>" <?php $result = ($gifcheck == 'gif') ? 'data-lightbox="roadtrip"' : 'target="_blank"'; echo $result; ?>>
                                                            <img src="<?php echo root_url($project_list['image_url']); ?>" alt="<?php echo $project_list['alt']; ?>">
                                                        </a>
                                                        <div class="info">
                                                            <div class="main-info">
                                                                <span class="name"><?php echo $project_list['name']; ?></span><span class="status <?php echo ($project_list['active']) ? 'active' : 'inactive'; ?>"></span><br/>
                                                                <span class="description"><?php echo $project_list['description']; ?></span>
                                                            </div>
                                                            <a class="edit" href="<?php echo 'projects/edit.php?project=' . $project_list['id']; ?>"><img src="../images/Edit.svg" /></a>
                                                            <div class="delete-project" data-id="<?php echo $project_list['id']; ?>"><img src="../images/Remove.svg" /></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                </div>
                                <div class="row pagination-container">
                                    <div class="col-12">
                                        <div class="showing-pages">
                                            Showing <span class="number"><?php echo $upper; ?></span> of <span class="number"><?php echo $project_count; ?></span>
                                        </div>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <?php if (!($page_number <= 1)) { ?>
                                                    <a class="page-link" href="<?php if($page_number <= 1){ echo '#'; } else { echo "?page=".($page_number - 1); } ?>">&laquo;</a>
                                                <?php } ?>
                                            </li>
                                                <?php
                                                    for ($i=1; $i <= $total_pages; $i++) {
                                                    echo "<li class=\"page-item\" style=\"list-style:none;\">";
                                                        if (!($page_number < 1)) {
                                                        echo '<a class="page-link" href="'; 
                                                        echo "?page=" . $i . '">';
                                                        echo $i . '</a>';
                                                        }
                                                    echo "</li>";
                                                    }
                                                ?>
                                            <li class="page-item">
                                                <?php if (!($page_number >= $total_pages)) { ?>
                                                    <a class="page-link" href="<?php if($page_number >= $total_pages){ echo '#'; } else { echo "?page=".($page_number + 1); } ?>">&raquo;</a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="">
                <div class="container">
                <h3>Delete Project</h3>
                <p>Are you sure you want to delete this project?</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="button" class="confirm-delete-project" data-id="">Delete</button>
                </div>
                </div>
            </form>
        </div>
<?php
    include('footer.php');
?>