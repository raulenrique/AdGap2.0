 <?php  
     $errors = $user->errors; 
 ?>

<div class="wrapper">

    <!-- Create Listings Section -->
        <section id="registrationIndividual" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            

        <form id="registerNewUser" action=".\?page=auth.store" method="POST" class="form-horizontal">
             
              <h2>Register New User</h2>
                
              <div class="form-group <?php if($errors['username']): ?> has-error <?php endif; ?>">
                    <label for="username" class="col-sm-4 col-md-2 control-label">Username</label>
                    <div class="col-sm-8 col-md-10">
                      <input class="form-control" id="username" name="username" placeholder="Toyota NZ"
                      value="<?php echo $user->username; ?>">
                      <div class="help-block"><?php echo $errors['username']; ?></div>
                    </div>
                </div>

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
                    <input type="password" class="form-control" id="password" name="password" >
                    <div class="help-block"><?php echo $errors['password']; ?></div>
                  </div>
                </div>
                
                <div class="form-group <?php if($errors['password2']): ?> has-error <?php endif; ?>">
                  <label for="password2" class="col-sm-4 col-md-2 control-label"> Confirm Password </label>
                  <div class="col-sm-8 col-md-10">
                    <input type="password" class="form-control" id="password2" name="password2">
                    <div class="help-block"><?php echo $errors['password2']; ?></div>
                  </div>
                </div>   

                <div class="form-group">
                <div class="createListinga">
                  <button type="submit" class="btn btn-listing"></span> Register</button>
                </div>
              </div>
           

        </form> 
        </div>     
     </section>
</div>