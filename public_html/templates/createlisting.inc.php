<?php  
     $errors = $listing->errors; 
     
     $verb = ( $listing->id ? "Edit" : "Create");
     if($listing->id){
      $submitAction = ".\?page=listing.update";
     } else {
      $submitAction = ".\?page=listing.store";
     }
   ?>

<div class="createListingsPage">

    <!-- Create Listings Section -->
        <section id="createListing" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" id="createlisting">
             <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li><a href=".\?page=listings">All Listings</a></li>
                  <li class="active">Create A Listing</a></li>
                </ol>

        <form id="createListingForm" action="<?= $submitAction; ?>" method="POST" class="form-horizontal">
              <?php if($listing->id): ?>
                 <input type="hidden" name='id' value="<?= $listing->id?>">
              <?php endif; ?>

              <h2><?= $verb; ?> Listing</h2>

              <input type="hidden" name='user_id' value="<?= $user->id?>">

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

              <div class="form-group <?php if($errors['url']): ?> has-error <?php endif; ?>">
                <label for="url" class="col-sm-2 control-label">Your URL</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="url" name="url" placeholder="https://google.co.nz"
                  value="<?php echo $listing->url; ?>">
                  <div class="help-block"><?php echo $errors['url']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['buyNowPrice']): ?> has-error <?php endif; ?>">
                <label for="buyNowPrice" class="col-sm-2 control-label">Desired Price ($)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="buyNowPrice" name="buyNowPrice" placeholder="45.90"
                  value="<?php echo $listing->buyNowPrice; ?>">
                  <div class="help-block"><?php echo $errors['buyNowPrice']; ?></div>
                </div>
              </div>
                <div class="form-group <?php if($errors['location']): ?> has-error <?php endif; ?>">
                <label for="location" class="col-sm-2 control-label">Location</label>
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

              <div class="form-group <?php if($errors['tags']): ?> has-error <?php endif; ?>">
                 <label for="tags" class="col-sm-2 control-label">Tags </label>
                 <div class="col-sm-10">
                 <div id="tags" class="form-control">
                  <script type="text/javascript">
                   var inputTags = "<?= $listing->tags; ?>";
                   </script>
                   </div>
                 <div class="help-block"><?php echo $errors['tags']; ?></div>
                 </div>
              </div>  

              <div class="form-group">
                <div class="createListinga">
                  <button type="submit" class="btn btn-listing"><span class="glyphicon glyphicon-plus"></span> <?= $verb; ?> Listing</button>
                </div>
              </div>
            </form>
              <?php if($listing->id): ?>
                <form action=".\?page=listing.destroy" method="POST" class="form-horizontal">
                  <div class="form-group">
                    <div class="createListingb">
                      <input type="hidden" name='id' value="<?= $listing->id?>">
                      <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete Listing</button>
                    </div>
                  </div>
                </form> 
              <?php endif; ?>

        </section>

</div>