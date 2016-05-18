

<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">The Ad_Gap</h1>
                        <h5 class="intro-text">The portal for advertisers and publishers.<br>Get rewarded for your content as a publisher.<br> maximise advertising expenditure as an advertiser.</h5>
                        <a class=" btn-info btn-lg btn-block page-scroll" href="#about">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About</h2>
                <p>The AdGap is a marketplace for advertisers and publishers. </p> 
                <p>It is based off a social auction model where advertisers can purchase advertising space and publishers can offer their advertising space.
                It delivers performance traffic to data savvy marketers and their agencies or those who need it.</p>
                 <a href="#statistics" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
        <section id="statistics" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Statistics</h2>
                <div class="row statistics"><p>If you aren't listing with us, you're missing out</p></div>
                   <div class="row">
                    <div class="col-md-4"><div class="stats">Widget 1</div></div>
                    <div class="col-md-4"><div class="stats">Widget 1</div></div>
                    <div class="col-md-4"><div class="stats">Widget 1</div></div>
                  </div>
                    <div><a href="#users" class="btn btn-circle page-scroll">
                      <i class="fa fa-angle-double-down animated"></i>
                    </a></div>
            </div>
        </div>
    </section>

     <!-- Users Section -->
        <section id="users" class="container content-section text-center">
        <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
        <h2>Users</h2>
           <div class="row statistics"><p>No matter the industry or type of creation<br> we have ad spaces to fit all needs and the opportunities are endless</p></div>
                   <div class="row">
                    <div class="col-md-4"><div class="users">Widget 1</div></div>
                    <div class="col-md-4"><div class="users">Widget 1</div></div>
                    <div class="col-md-4"><div class="users">Widget 1</div></div>
                  </div>
                    <div><a href="#press" class="btn btn-circle page-scroll">
                      <i class="fa fa-angle-double-down animated"></i>
                    </a></div>
            </div>
            </div>
    </section>

     <!-- Press Section -->
        <section id="press" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Press</h2>
                <div class="row">
                    <div class="col-xs-6 col-md-3 press">Widget 1</div>
                    <div class="col-xs-6 col-md-3 press">Widget 1</div>
                    <div class="col-xs-6 col-md-3 press">Widget 1</div>
                     <div class="col-xs-6 col-md-3 press">Widget 1</div>
                  </div>
                 <a href="#technology" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>

     <!-- Technology Section -->
        <section id="technology" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Technology</h2>
                <p></p>
                <p></p>
                <p></p>
                 <a href="#contact" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Us</h2>
                <p></p>
                <p><a href="mailto:feedback@theadgap.com">feedback@theadgap.com</a>
                </p>
            </div>
            <!-- Map Section -->
            <div class="col-lg-offset-2 col-sm-8 col-md-offset-2 col-sm-offset-2"><div id="map" style="background-color:#424242;"></div></div>
            </div>
            

    
     <form action=".\?page=contactForm" id="contactForm" method="POST" class="form-horizontal">

  <div class="form-group <?php if($errors['contactName']): ?> has-error <?php endif; ?>">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="contactName" placeholder="First & Last Name"
      value="<?php echo $contactName; ?>">
      <div class="help-block"><?php echo $errors['contactName']; ?></div>
    </div>
  </div>
    <div class="form-group <?php if($errors['contactEmail']): ?> has-error <?php endif; ?>">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="contactEmail" placeholder="Email Address"
      value="<?php echo $contactEmail; ?>">
      <div class="help-block"><?php echo $errors['contactEmail']; ?></div>
    </div>
  </div>
    <div class="form-group <?php if($errors['contactSubject']): ?> has-error <?php endif; ?>">
    <label for="subject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="subject" name="contactSubject" placeholder="Message Subject"
      value="<?php echo $contactSubject; ?>">
      <div class="help-block"><?php echo $errors['contactSubject']; ?></div>
    </div>
  </div>
    <div class="form-group <?php if($errors['contactMessage']): ?> has-error <?php endif; ?>">
    <label for="message" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-8">
     <textarea class="form-control" id="message" name="contactMessage" placeholder="Please type your message here..." rows="9"
     value="<?php echo $contactMessage; ?>"></textarea>
     <div class="help-block"><?php echo $errors['contactMessage']; ?></div>
    </div>
  </div>
  <div class="form-group">
    <div class="socialMediaButtons">
      <button type="submit" class="btn btn-default submit">Send Message</button>
    </div>
  </div>
</form>
               <div class="socialMediaButtons">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/raulenrique/AdGap2.0" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">LinkedIn</span></a>
                    </li>
                </ul>
                </div>
        </div>
    </section>
