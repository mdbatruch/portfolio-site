<?php

    require_once('../../initialize.php');

    require_login();

    check_session();

    $page_title = 'Create New Project';

    include('../header.php');

    $project_set = project_count();
    $project_count = $project_set + 1;

    $pages = find_all_pages();

    // echo SITE_ROOT_PRIVATE . '/header.php';


?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                <div class="col-12 col-md-4">
                    <?php include('../modules/nav.php'); ?>
                </div>
            <div class="col-12 col-md-8">
            <div id="main-menu">
                <div class="return">
                    <a href="<?php echo root_url_private('projects.php'); ?>"><i class="fa fa-chevron-left"></i> Return to Project List</a>
                </div>
                <div class="new-project">
                <form id="new-project" method="post" enctype="multipart/form-data">
                    <h2>Create a New Project</h2>
                    <dl>
                        <label>Project Title</label>
                        <dd>
                            <input type="text" id="project_name" name="project_name" value="" />
                            <div id="name-warning"></div>
                        </dd>
                    </dl>
                    <dl>
                        <label>Project Link</label>
                        <dd>
                            <input type="text" id="project_link" name="project_link" />
                            <div id="link-warning"></div>
                        </dd>
                    </dl>
                    <dl>
                        <label>Project Description</label>
                        <dd>
                            <textarea id="project_description" name="project_description" cols="30" rows="10"></textarea>
                            <div id="description-warning"></div>
                        </dd>
                    </dl>
                    <dl>
                    <label>Image Upload</label>
                        <dd class="custom-file">
                            <input type="file" name="file" id="project_image" class="custom-file-input"/>
                            <label class="custom-file-label" for="customFile"></label>
                        </dd>
                    </dl>
                    <dl>
                        <label>Alt Image</label>
                        <dd>
                            <input type="text" id="image_alt" name="image_alt" />
                            <div id="alt-warning"></div>
                        </dd>
                    </dl>
                    <div id="operations">
                    <dl>
                        <dd class="switch">
                            <input type="checkbox" name="visible" id="project_active"/>
                            <span class="slider round"></span>
                        </dd>
                        <label>Active</label>
                    </dl>
                    <input type="hidden" id="project_id" value="<?php echo $project_count; ?>" name="id">
                        <input type="submit" value="Save Project">
                    </div>
                    <div id="form-message"></div>
                </form>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
</div>

<?php include('../footer.php'); ?>