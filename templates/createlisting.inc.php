<?php  
     $errors = $movie->errors; 
     $verb = ( $movie->id ? "Edit" : "Add");
   ?>

<div class="wrapper">

    <!-- Create Listings Section -->
        <section id="createListing" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" id="createlisting">
             <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li><a href=".\?page=listings">All Listings</a></li>
                  <li class="active">Create A Listing</a></li>
                </ol>

         <form action=".\?page=listing.store" id="createListingForm"  method="POST" class="form-horizontal">
              <h2>Create A Listing</h2>

              
              <div class="form-group <?php if($errors['category']): ?> has-error <?php endif; ?>">
                <label for="category" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category" name="category" placeholder="Health"
                  value="<?php echo $listing->category; ?>">
                  <div class="help-block"><?php echo $errors['category']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['title']): ?> has-error <?php endif; ?>">
                <label for="title" class="col-sm-2 control-label">Listing Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Recipe Blog - Advertising Opportunity"
                  value="<?php echo $listing->title; ?>">
                  <div class="help-block"><?php echo $errors['title']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['buyNowPrice']): ?> has-error <?php endif; ?>">
                <label for="buyNowPrice" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="buyNowPrice" name="buyNowPrice" placeholder="$45.90"
                  value="<?php echo $listing->buyNowPrice; ?>">
                  <div class="help-block"><?php echo $errors['buyNowPrice']; ?></div>
                </div>
              </div>
                <div class="form-group <?php if($errors['location']): ?> has-error <?php endif; ?>">
                <label for="location" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="location" name="location" placeholder="Wellington"
                  value="<?php echo $listing->location; ?>">
                  <div class="help-block"><?php echo $errors['location']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['description']): ?> has-error <?php endif; ?>">
                  <label for="description" class="col-sm-2 control-label">Description </label>
                  <div class="col-sm-10">
                     <textarea class="form-control" id="description" name="description" rows="9" placeholder="A description of the listing"><?php echo $listing->description; ?></textarea>
                    <div class="help-block"><?php echo $errors['description']; ?></div>
                  </div>
                </div>  

              <div class="form-group">
                <div class="socialMediaButtons">
                  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Create Listing</button>
                </div>
              </div>
            </form>
        </section>

</div>