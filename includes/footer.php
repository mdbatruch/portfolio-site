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

//         $('#contact-form').on("submit", function(e){

// e.preventDefault();

// console.log('contact has been attempted');

// var firstname = $('#firstname').val();
// var lastname = $('#lastname').val();
// var email = $('#email').val();
// var message = $('#message').val();

// $.ajax({
//     type: "POST",
//     url: "process.php",
//     dataType: "json",
//     data: {firstname: firstname, lastname: lastname, email:email, message:message}
// }).done(function(data) {

//     if(!data.success) {
//         if(data.errors.firstname) {
//             $('#firstname-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.firstname + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 } else {
//                     $('#firstname-warning').html('');
//                 }
//         if(data.errors.lastname) {
//             $('#lastname-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.lastname + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 } else {
//                     $('#lastname-warning').html('');
//                 }

//         if(data.errors.email) {
//             $('#email-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.email + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 } else {
//                     $('#email-warning').html('');
//                 }

//         if(data.errors.message) {
//             $('#message-warning').html('<div class="alert alert-danger mt-3 input-alert-error">' + data.errors.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 } else {
//                     $('#message-warning').html('');
//                 }

//         if (data.errors.grecaptcha) {
//             $('#captcha-warning').html('<div class="help-block input-alert-error">' + data.errors.grecaptcha + '</div>');
//             } else {
//                 $('#captcha-warning').html('');
//             }

//         } else {

//             $('#firstname-warning').html('');
//             $('#lastname-warning').html('');
//             $('#email-warning').html('');
//             $('#message-warning').html('');

//             $('#form-message').html('<div class="alert alert-success">' + data.message + '</div>');
//         }
// });
// });


    // });

   </script>
    </body>
</html>