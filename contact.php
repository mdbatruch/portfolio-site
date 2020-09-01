<?php 
    
    // include('includes/config.php');

        
    include('includes/header.php');

    $page_title = 'Contact';

    $page_title_lowercase = strtolower($page_title);

    $page_name = find_page_by_name($page_title_lowercase);

    // echo '<pre>';
    // print_r($page_name);
?>
         <main>
            <div id="content-heading">
                <h2><?php echo $page_title; ?></h2>    
            </div> 
            <div id="project-list" >
                <div id="contact-wrapper">
                 <div id="contact-text">
                    <h1 id="call-to-action">
                        <?php echo $page_name['title']; ?>
                    </h1>
                     <div id="contact-desc">
                         <h2><?php echo $page_name['subtitle']; ?></h2>
                         <div id="main-contact-bio">
                             <?php echo nl2br($page_name['description']); ?>
                         </div>
                     </div>
                 </div>
                <div id="contact-main">
                       <form id="contact-form" method="post">
                        <fieldset>
                            <ol>
                                <li>
                                    <label>First Name</label>
                                    <input type="text" id="firstname"
                                           name="firstname"
                                           placeholder="Please enter your first name" />
                                </li>
                                <div id="firstname-warning"></div>
                                <li>
                                    <label>Last Name</label>
                                    <input type="text" id="lastname"
                                           name="lastname"
                                           placeholder="Please enter your last name" />
                                </li>
                                <div id="lastname-warning"></div>
                                <li>
                                    <label class="full">Email (required)</label>
                                    <input type="text" id="email"
                                           name="email"
                                           placeholder="Please enter your email"/>
                                </li>
                                <div id="email-warning"></div>
                            </ol>
                        </fieldset>
                        <fieldset>
                            <ol>
                                <li>    
                                    <label>Message</label>
                                    <textarea
                                    id="message"
                                    placeholder="Please enter your message" 
                                    name="message"
                                    rows="8"
                                    cols="30"
                                    ></textarea>
                                </li>
                                <div id="message-warning"></div>
                            </ol>
                        </fieldset>
                    <fieldset>
                       <ol>
                            <li>
                                <!-- <input type="submit" value="Submit"/> -->
                                <button type="submit" id="submit" name="submit" class="btn btn-success g-recaptcha" data-callback="submitForm" data-sitekey="PUBLIC_KEY" data-size="invisible"><i class="fa fa-check"></i>Send Message</button>
                                <div id="captcha-warning"></div>
                            </li>
                       </ol>
                    </fieldset>
                    <div id="form-message"></div>
                    </form>
                </div>
            </div>
            </div>
            <div class="clearfix"></div>
        </main>  
        
<?php include('includes/footer.php'); ?>