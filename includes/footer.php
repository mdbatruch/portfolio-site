 <footer>
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
  
   <!--         LIGHTBOX JS          -->
   <script src="js/lightbox-plus-jquery.min.js"></script>

   <script src="<?php echo root_url('js/bootstrap.js'); ?>"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

   <!--	JQUERY EASING	-->
   <script src="<?php echo root_url('js/jquery.easing.1.3.js'); ?>"></script>
       
    <script src="<?php echo root_url('js/custom-script.js'); ?>"></script>

    <!-- <script src="<php echo root_url('js/lightbox.js'); ?>"></script> -->

<script type="text/javascript">

    $(document).ready(function(){
    $('#close-button').click(function(){
        $("#success, #success-overlay").fadeOut(600); 
    });
    });
   
    // $(document).ready(function(){

        $(document).ready(function() {
            $('#contact-form').submit(function(e){
                e.preventDefault(); 
            });
        });

        function submitForm(token) {

            console.log('contact has been attempted');

            grecaptcha.execute();

            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var message = $('#message').val();
            var recaptcha = token;

            $.ajax({
                type: "POST",
                url: "process.php",
                dataType: "json",
                data: {firstname: firstname, lastname: lastname, email:email, message:message, grecaptcha:recaptcha}
            }).done(function(data) {

                if(!data.success) {
                    if(data.errors.firstname) {
                        $('#firstname-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.firstname + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#firstname-warning').html('');
                            }
                    if(data.errors.lastname) {
                        $('#lastname-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.lastname + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#lastname-warning').html('');
                            }

                    if(data.errors.email) {
                        $('#email-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.email + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#email-warning').html('');
                            }

                    if(data.errors.message) {
                        $('#message-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#message-warning').html('');
                            }

                    if (data.errors.grecaptcha) {
                        $('#captcha-warning').html('<div class="help-block input-alert-error">' + data.errors.grecaptcha + '</div>');
                        } else {
                            $('#captcha-warning').html('');
                        }

                    } else {

                        $('#firstname-warning').html('');
                        $('#lastname-warning').html('');
                        $('#email-warning').html('');
                        $('#message-warning').html('');

                        $('#form-message').html('<div class="alert alert-success">' + data.message + '</div>');

                        $('#contact-form').trigger("reset");
                    }

                    grecaptcha.reset();
            });
        }
</script>

<script type="text/javascript">
        
        $("#login").on("submit", function(e){
            e.preventDefault();
    
            console.log('a login has been attempted');
    
            // function loginForm() {
    
                var formData = {
                    'username'         : $('input[name=username]').val(),
                    'password'         : $('input[name=password]').val(),
                    'id'               : $('form').attr('id')
                };
                // var username = $("#username").val();
                // var password = $("#password").val();

                console.log(formData);
    
                $.ajax({
                    type: "POST",
                    url: "private/process.php",
                    dataType: "json",
                    data: formData,
                }).done(function(data){
    
                    if (!data.success) {
    
                            if (data.errors.username) {
                                $('#username-error').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.username + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#username-error').html('');
                            }
    
                            if (data.errors.password) {
                                $('#password-error').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.password + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#password-error').html('');
                            }
                        
                            $('#form-message').html('<div class="alert alert-danger">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        
                            console.log('Login Not Successful!');
    
                        } else {
    
                            // $('.alert-danger').remove();
    
                            $(location).attr('href', data.redirect);
    
                            // window.location.replace(data.redirecturl);
    
                            // header('Location:' + data.redirecturl);
                            
                            console.log('Login Successful!');
                            // alert('Just got in!');
    
                            $('#form-message').html('<div class="alert alert-success">' + data.message + '</div>');
    
                            // $('#login-form').trigger("reset");
                        }
                    
                });
    
            // }
            });

</script>
    <?php if ($devmode) : ?>    
        <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:8890/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
        //]]></script>
    <?php endif; ?>
    </body>
</html>