<?php 
    
    include('includes/config.php');
        
        $errors = array();
        
        
    //ERROR IF STATEMENTS FOR ALL INPUTS
        
    if ( isset ( $_POST[ 'firstname' ] ) ){
     
        //check that firstname has at least one letter
        if ( strlen ($_POST[ 'firstname' ]) < 2 ){
            $errors[ 'firstname' ] = '<p class="errors">Please enter your full first name.</p>';
            
        }
        
        //check that lastnme has at least one letter
        if ( strlen ($_POST[ 'lastname' ]) < 1 ){
            $errors[ 'lastname' ] = '<p class="errors">Please enter your last name.</p>';
            
        }
        
        //valdiate the email entered meets required specs such as '@' & .com. verified with FILTER_VALIDATE_EMAIL
        if ( !filter_var( $_POST[ 'email' ], FILTER_VALIDATE_EMAIL ) ){
            
            //run error code if specs not met
            $errors[ 'email' ] = '<p class="errors">Please enter a valid email address.</p>';
        }
        //check that the email has at least 2 letters
         if ( strlen ($_POST[ 'message' ]) < 3 ){
             
            //run error code if specs not met
            $errors[ 'message' ] = '<p class="errors">There was a problem sending your email. Please enter a message.</p>';
            
        }
        
        
        
        //set email you want message to go to
        $to = 'mdbatruch@gmail.com';
        
        //declare who is messaging you from firstname and lastname variables
        $subject = 'Contact Form Email from ' . $_POST[ 'firstname' ] . ' ' . $_POST[ 'lastname' ];
        
        //include email and message
        $message = "Name:   {$_POST['firstname']} {$_POST['lastname']}\r\n
                    Email:  {$_POST['email']}\r\n
                            {$_POST[ 'message' ]}";
        
        //include email again
        $headers = "From: {$_POST['email']}\r\n";
        
        //if there are no errors
        if ( count ( $errors ) == 0 ) {
            
        //send over the variables posted above from contact form
        if ( mail( $to, $subject, $message, $headers ) ) {
            
        //email was sent successfully
            header( 'Location: ' . $_SERVER[ 'PHP_SELF' ] . '?it-has-been-sent' );
            
        //if there are errors, send this instead
        } else {
            
            //email was not sent successfully
            $errors[ 'server' ] = '<p>There was a problem sending your email, please try again.</p>';
               }
            }   
                                        
    }
        
    include('includes/header.php'); 

        ?>
         <main>
                <div id="content-heading">
                    <h2>Contact</h2>    
                </div> 
            <div id="project-list" >
                <div id="contact-wrapper">
                 
                 <div id="contact-text">
                    <h1 id="call-to-action">
                        Hey, I'm Mike!
                    </h1>
                     <div id="contact-desc">
                         <p id="main-contact-bio">I'm a Web Designer and Developer from Toronto with a background in the Music Industry.</p>
                         <p class="contact-bio">I've always helped out people with their websites and through this I've noticed that it's vital these days for any business or organization to have a website.</p>
                         <p class="contact-bio">From communicating and engaging with your clients or fans, selling products     online or to just simply inform visitors, you want to step forward with your     best footprint in the digital world.</p>
                         <p class="contact-bio">That’s where I can help.</p>
                         <p class="contact-bio">Experienced with the best tools and practices in Web Design and Development I can make your dream    website a reality at a reasonable and affordable cost.</p>
                         <p class="contact-bio">Want to find out how?</p>
                         <p class="contact-bio">Just let me know!</p>
                     </div>
                 </div>
                   <div id="contact-main">
                       <form action="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>" method="post">
               <?php if( isset( $_GET[ 'it-has-been-sent' ] ) ): ?>
                  <div id="success-overlay">
                       <div id="success"> 
                           <h2>Success!</h2>
                           <img src="images/close.png" id="close-button" alt="close-button" />
                           <p>Your message has been sent.
                           <br>I've recieved your email and will be in touch shortly.</p>
                       </div>
                  </div>   
                    <?php endif; ?>

                    <?php echo $errors[ 'server' ]; ?>
                       
                        <fieldset>
                            <ol>
                                <li>
                                    <label>First Name</label>
                                    <input type="text" 
                                           name="firstname"
                                           placeholder="Please enter your first name"
                                           value="<?php echo $_POST[ 'firstname' ]; ?>" />
                                    <?php echo $errors[ 'firstname' ]; ?>
                                </li>
                                <li>
                                    <label>Last Name</label>
                                    <input type="text" 
                                           name="lastname"
                                           placeholder="Please enter your last name"
                                           value="<?php echo $_POST[ 'lastname' ]; ?>" />
                                    <?php echo $errors[ 'lastname' ]; ?>
                                </li>
                                <li>
                                    
                                    <label class="full">Email (required)</label>
                                    <input type="text" 
                                           name="email"
                                           placeholder="Please enter your email"
                                           value="<?php echo $_POST[ 'email' ]; ?>"/>
                                    <?php echo $errors[ 'email' ]; ?>
                                </li>
                            </ol>
                        </fieldset>
                        <fieldset>
                            <ol>
                                <li>    
                                        <label>Message</label>
                                        <textarea
                                        placeholder="Please enter your message" 
                                        name="message"
                                        rows="8"
                                        cols="30"
                                        value="<?php echo $_POST[ 'message' ]; ?>"
                                        ></textarea>
                                        <?php echo $errors[ 'message' ]; ?>
                                </li>
                            </ol>
                        </fieldset>
                    <fieldset>
                       <ol>
                                <li>
                        <input type="submit" value="Submit"/>
                                </li>
                       </ol>
                    </fieldset>
                    </form>

                </div>        
            </div>
            </div>
            <div class="clearfix"></div>
        </main>  
        
<?php include('includes/footer.php'); ?>