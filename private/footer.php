 <footer id="private-footer">
    <div id="footer-wrapper">           
        <h4> &copy; <?php echo date('Y'); ?> Michael Batruch</h4>
            <p>
                mdbatruch [@] gmail [dot] com
            </p>
    </div>        
</footer>   
    <a href="#top">
        <img id="goUp" src="<?php echo root_url('images/up-grey.png'); ?>" alt="back-to-top">
    </a>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
   <script src="<?php echo root_url('js/bootstrap.js'); ?>"></script>

   <!--	JQUERY EASING	-->
   <script src="<?php echo root_url('js/jquery.easing.1.3.js'); ?>"></script>
       
    <script src="<?php echo root_url('js/custom-script.js'); ?>"></script>

<script type="text/javascript">

    $(document).ready(function(){
    $('#close-button').click(function(){
        $("#success, #success-overlay").fadeOut(600); 
    });
    });
   
</script>

<script type="text/javascript">

$(function () {
    $('[data-toggle="offcanvas"]').on('click', function () {
        // alert('you clicked');
        $('.offcanvas-collapse').toggleClass('open');
        $('body').toggleClass('noscroll');
    });

    $("#new-project .slider.round").click(function() {
        var checkBoxes = $("input[name=visible");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('nav ul .dropdown-title').click(function(e) {
        e.preventDefault();
        // e.stopPropagation();
        $(this).parent('.dropdown').children('.sub-menu').toggleClass('show');
        // $(this).parent('.dropdown').children('.sub-menu').toggle().css('height', '50px');
    });

    // edit form checkbox

     $(".edit-project form .switch").on("click", function () { 
       var $checkbox = $(this).find('input');
       $checkbox.prop('checked', !$checkbox[0].checked);
       console.log($checkbox);
    });

    $("form .custom-file").on("click", function (e) {
        // e.preventDefault();

        console.log('custom file has been chosen');
        if ( $(this).hasClass('remove')) {
            $(this).removeClass('remove');
            var label = $("form .custom-file-label.remove");
            $(label).removeClass('remove');
            $(label).empty();
            e.preventDefault();
        }
    });

    $(".custom-file-input").on('change', function() {
        $("form .custom-file-label").addClass('remove');
        $(".custom-file").addClass('remove');
    });

    // $(".project").map(function() {
    //     all += $(this).html();
    //     console.log(all);
    // });

    $('.toggle .row-select').click(function(e) {
        console.log('row selected');

        $(".project").map(function() {

            $(this).css('opacity', '0');

            $(this).addClass('row-view');
            
            if ($(this).hasClass('column-view')) {
                $(this).removeClass('column-view');
            }

            if ($(this).hasClass('col-lg-6')) {
                $(this).removeClass('col-lg-6');
            }

            $(this).animate({ "opacity": 1 },3000);

        });

    });

    $('.toggle .grid-select').click(function(e) {
        console.log('grid selected');
        $(".project").map(function() {

            $(this).css('opacity', '0');

            $(this).addClass('column-view');
            $(this).addClass('col-lg-6');

            if ($(this).hasClass('row-view')) {
                $(this).removeClass('row-view');
            }

            $(this).animate({ "opacity": 1 },3000);
        });
    });

});

</script>

<script type="text/javascript">

$(".page").on("submit", function(e){
        e.preventDefault();

        console.log('a page edit has been attempted');

            var name = $('form').attr('id');                    
            var page_title = $("#page_title").val();
            var page_subtitle = $("#page_subtitle").val();
            var page_description = $("#page_description").val();

            console.log(name, page_title, page_subtitle, page_description);

            $.ajax({
                type: "POST",
                url: "../process.php",
                dataType: "json",
                data: {id: name, title: page_title, subtitle: page_subtitle, description: page_description},
            }).done(function(data){

                if (!data.success) {
                    
                        $('#form-message').html('<div class="alert alert-danger">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    
                        console.log('Project did not submit!');

                    } else {
                        
                        console.log('Page edited successfully!');

                        $('#form-message').html('<div class="alert alert-success">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    }
                
            });

        });

    $("#edit-project").on("submit", function(e){
        e.preventDefault();

        console.log('a project edit has been attempted');

            var formId = $('form').attr('id');                    
            var project_name = $("#project_name").val();
            var project_description = $("#project_description").val();
            var project_link = $("#project_link").val();
            var project_image = $("#project_image").val();
            var project_path = $(".custom-file-label").html().replace(/\s+/, "");
            var image_alt = $("#image_alt").val();
            var projectId = $("#value").val();

            if ( $('#project_active').is(':checked') ) {

                $('#project_active').val(1);
                } else {

                $('#project_active').val(0);
                }
            var project_active = $("#project_active").val();

            var file_data = $('#project_image').prop('files')[0];

            console.log(file_data + ' test');

            var form_data = new FormData();

            form_data.append('id', formId);
            form_data.append('project_id', projectId);
            form_data.append('project_name', project_name);
            form_data.append('project_description', project_description);
            form_data.append('project_link', project_link);
            form_data.append('project_image', project_image);
            form_data.append('image_alt', image_alt);
            form_data.append('project_active', project_active);
            form_data.append('file', file_data);


            console.log(formId, project_name, project_description, project_link, project_image, projectId, project_active, image_alt, project_path);

            $.ajax({
                type: "POST",
                url: "../process.php",
                dataType: "json",
                contentType: false,
                processData: false,
                // data: {project_name: project_name, project_description: project_description, project_link: project_link, project_image: project_image, id: formId, project_id: projectId, project_active:project_active, image_alt:image_alt},
                data: form_data,
            }).done(function(data){

                if (!data.success) {

                        if (data.errors.project_name) {

                            $('#name-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.project_name + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        } else {
                            $('#name-warning').html('');
                        }
                    
                        $('#form-message').html('<div class="alert alert-danger">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    
                        console.log('Project did not submit!');

                    } else {


                        // $(location).attr('href', data.redirect);
                        
                        console.log('Project edited successfully!');

                        $('#form-message').html('<div class="alert alert-success">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    }
                
            });

        });

    $("#new-project").on("submit", function(e){
        e.preventDefault();

        console.log('a project submission has been tried');
            
            var formId = $('form').attr('id');
            var project_name = $("#project_name").val();
            var project_id = $("#project_id").val();
            var project_description = $("#project_description").val();
            var project_link = $("#project_link").val();
            var project_image = $("#project_image").val();
            var image_alt = $("#image_alt").val();

            if ( $('#project_active').is(':checked') ) {

                $('#project_active').val(1);
                } else {

                $('#project_active').val(0);
                }
            var project_active = $("#project_active").val();

            var file_data = $('#project_image').prop('files')[0];

            var form_data = new FormData();

            form_data.append('id', formId);
            form_data.append('project_name', project_name);
            form_data.append('project_description', project_description);
            form_data.append('project_link', project_link);
            form_data.append('project_image', project_image);
            form_data.append('image_alt', image_alt);
            form_data.append('project_active', project_active);
            form_data.append('file', file_data);

            console.log(project_image);

            $.ajax({
                type: "POST",
                url: "../process.php",
                dataType: "json",
                contentType: false,
                processData: false,
                data: form_data,
                // data: {project_name:project_name, project_id:project_id, project_active:project_active, project_link:project_link, project_description:project_description, project_id:project_id, id:formId, project_image:project_image, image_alt:image_alt},
            }).done(function(data){

            if (!data.success) {

                    if (data.errors.project_name) {

                        $('#name-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.project_name + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#name-warning').html('');
                    }
                
                    $('#form-message').html('<div class="alert alert-danger">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                
                    console.log('Project did not submit!');

                } else {

                    $(location).attr('href', data.redirect);
                    
                    console.log('Project created!');

                    $('#form-message').html('<div class="alert alert-success">' + data.message + '</div>');
                }
            
        });

    });

    $(".delete-project").on("click", function(e){
        let modal = $('#id01');
        let modal_delete = $('.confirm-delete-project');

        let button_id = $(this).attr('data-id');
        let modal_delete_id = $(modal_delete).attr('data-id');

        $(modal_delete).attr('data-id', button_id);


        $(modal).css('display', 'block');
    });

    $(".confirm-delete-project").on("click", function(e){
        e.preventDefault();

        console.log('a project deletion has been tried');
            
            var formId = $(this).attr('class');
            var project_id = $(this).attr('data-id');

        console.log(formId, project_id);

    
            $.ajax({
                type: "POST",
                url: "process.php",
                dataType: "json",
                data: {project_id:project_id, id:formId},
            }).done(function(data){

            if (!data.success) {

                    if (data.errors.project_name) {

                        $('#name-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.project_name + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $('#name-warning').html('');
                    }
                
                    $('#form-message').html('<div class="alert alert-danger">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                
                    console.log('Project did not delete!');

                } else {
                    
                    console.log('Project deleted!');

                    let modal = $('#id01');

                    $(modal).css('display', 'none');
                    
                    $('.delete-project[data-id="' + data.id + '"]').closest('.project').remove();

                    $('#form-message').html('<div class="alert alert-success">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>');
                }
            
        });

    });

    </script>
    <?php if ($devmode) : ?>    
        <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:8890/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
    //]]></script>
    <?php endif; ?>
    </body>
</html>