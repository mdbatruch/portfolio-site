<?php

    require_once('../../initialize.php');

    require_login();

    check_session();
    
    $page_title = 'Contact';

    $page_title_lowercase = strtolower($page_title);

    $page_name = find_page_by_name($page_title_lowercase);

    $pages = find_all_pages();

    // echo '<pre>';
    // print_r($page_name);

    include('../header.php');

?>
        <div id="content" class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <?php include('../modules/nav.php'); ?>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="container">
                                <div id="main-menu" class="contact">
                                    <div class="return">
                                        <a href="<?php echo root_url_private('index.php'); ?>"><i class="fa fa-chevron-left"></i> Return to Dashboard</a>
                                    </div>
                                    <h1>Edit Contact Page</h1>
                                        <div class="contact-page-container">
                                            <form id="contact" class="page" data-page-id="<?php echo $page_name['id']; ?>" method="post">
                                                <dl>
                                                    <label>Title</label>
                                                    <dd>
                                                        <input type="text" id="page_title" name="page_title" value="<?php echo $page_name['title']; ?>" />
                                                    </dd>
                                                </dl>
                                                <dl>
                                                    <label>Sub Title</label>
                                                    <dd>
                                                        <input type="text" id="page_subtitle" name="page_subtitle" value="<?php echo $page_name['subtitle']; ?>" />
                                                    </dd>
                                                </dl>
                                                <dl>
                                                    <label>Description</label>
                                                    <dd>
                                                        <textarea id="page_description" name="page_description" placeholder="Enter Content"><?php echo $page_name['description']; ?></textarea>
                                                    </dd>
                                                </dl>
                                                <div class="form-message-container">
                                                    <div id="form-message"></div>
                                                </div>
                                                <div id="operations">
                                                <!-- <input type="hidden" id="project_id" value="<php echo $project_count; ?>" name="id"> -->
                                                    <input type="submit" value="Save Changes">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    include('../footer.php');
?>