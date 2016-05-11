 <?php  
     $errors = $user->errors; 
 ?>

<div class="wrapper">

    <!-- Create Listings Section -->
        <section id="registrationIndividual" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
          

        <form id="registerNewUser" action=".\page=auth.store" method="POST" class="form-horizontal">
             
              <h2>Log In</h2>

                <div class="form-group <?php if($errors['email']): ?> has-error <?php endif; ?>">
                    <label for="email" class="col-sm-4 col-md-2 control-label">Email Address</label>
                    <div class="col-sm-8 col-md-10">
                      <input class="form-control" id="email" name="email" placeholder="user@mail.com"
                      value="<?php echo $user->email; ?>">
                      <div class="help-block"><?php echo $errors['email']; ?></div>
                    </div>
                </div>

                <div class="form-group <?php if($errors['password']): ?> has-error <?php endif; ?>">
                  <label for="password" class="col-sm-4 col-md-2 control-label"> Password </label>
                  <div class="col-sm-8 col-md-10">
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="help-block"><?php echo $errors['password']; ?></div>
                  </div>
                </div>

                <div class="form-group">
                <div class="createListinga">
                  <button type="submit" class="btn btn-listing"></span> Log In </button>
                </div>
              </div>
           

        </form> 
        </div>     
     </section>
</div>