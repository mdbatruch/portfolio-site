<?php

    require_once('../../initialize.php');

    require_login();

    check_session();

    $page_title = 'Edit your Project';
    
    include('../header.php');

    $id = $_GET['project'];

    $project_id = find_project_by_id($id);

    $pages = find_all_pages();

    // echo '<pre>';
    // print_r($project_id);

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
                        <div class="edit-project">
                        <form id="edit-project" method="post" enctype="multipart/form-data">
                            <h2 class="edit-title">Edit <?php echo $project_id['name']; ?> <span class="icon"></span></h2>
                            <dl>
                                <label>Project Title</label>
                                <dd>
                                    <input type="text" id="project_name" name="project_name" value="<?php echo $project_id['name']; ?>" />
                                    <div id="name-warning"></div>
                                </dd>
                            </dl>
                            <dl>
                                <label>Project Link</label>
                                <dd>
                                    <input type="text" id="project_link" name="project_link" value="<?php echo $project_id['link']; ?>" />
                                    <div id="link-warning"></div>
                                </dd>
                            </dl>
                            <dl>
                                <label>Project Description</label>
                                <dd>
                                    <textarea id="project_description" name="project_description" cols="30" rows="10"><?php echo $project_id['description']; ?></textarea>
                                    <!-- <input type="text" id="project_description" name="project_description" value="<php echo $project_id['description']; ?>" /> -->
                                    <div id="description-warning"></div>
                                </dd>
                            </dl>
                            <dl>
                                <label>Image Upload</label>
                                <dd class="custom-file  <?php if ($project_id['image_url']) {echo 'remove'; } ?>">
                                    <input type="file" name="file" id="project_image" class="custom-file-input" />
                                        <?php if ($project_id['image_url']) : ?>
                                            <label class="custom-file-label remove" for="customFile">
                                        <?php else : ?>
                                            <label class="custom-file-label" for="customFile">
                                        <?php endif; ?>

                                        <?php echo $project_id['image_url']; ?>
                                    </label>
                                </dd>
                            </dl>
                            <dl>
                                <label>Alt Image</label>
                                <dd>
                                    <input type="text" id="image_alt" name="image_alt" value="<?php echo $project_id['alt']; ?>" />
                                </dd>
                            </dl>
                            <div id="operations">
                                <dl>
                                    <dd class="switch">
                                        <input type="checkbox" name="visible" id="project_active" <?php if ($project_id['active']) echo 'checked'; ?>/>
                                        <span class="slider round"></span>
                                    </dd>
                                    <label>Active</label>
                                </dl>
                                <input type="hidden" id="value" value="<?php echo $project_id['id']; ?>" name="value_id">
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