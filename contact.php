<?php 
    
    // include('includes/config.php');
        
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