<?php var_dump($title) ?>

<div class="wrapper">

    <!-- Create Listings Section -->
        <section id="createListing" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li><a href=".\?page=listings">All Listings</a></li>
                  <li class="active">Create A Listing</a></li>
                </ol>
                

              <form id="createListingForm" action=".\?page=listing.store" method="POST" class="form-horizontal">
              <h2>Create A Listing</h2>

              
              <div class="form-group <?php if($errors['category']): ?> has-error <?php endif; ?>">
                <label for="category" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category" name="category" placeholder="Health"
                  value="<?php echo $category; ?>">
                  <div class="help-block"><?php echo $errors['category']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['title']): ?> has-error <?php endif; ?>">
                <label for="title" class="col-sm-2 control-label">Listing Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" placeholder="eg: Blog one off advertising opportunity 50 x 50 max size>"
                  value="<?php echo $title; ?>">
                  <div class="help-block"><?php echo $errors['title']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['currentPrice']): ?> has-error <?php endif; ?>">
                <label for="currentPrice" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="currentPrice" name="currentPrice" placeholder="eg: $45.90"
                  value="<?php echo $currentPrice; ?>">
                  <div class="help-block"><?php echo $errors['currentPrice']; ?></div>
                </div>
              </div>
                <div class="form-group <?php if($errors['location']): ?> has-error <?php endif; ?>">
                <label for="location" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="location" name="location" placeholder="eg: Wellington"
                  value="<?php echo $location; ?>">
                  <div class="help-block"><?php echo $errors['location']; ?></div>
                </div>
              </div>

              <div class="form-group <?php if($errors['description']): ?> has-error <?php endif; ?>">
                  <label for="description" class="col-sm-2 control-label">Description </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="9" placeholder="Description of listing" value="<?php echo $description; ?>"></textarea>
                    <div class="help-block"><?php echo $errors['description']; ?></div>
                  </div>
                </div>  

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Create Listing</button>
                </div>
              </div>
            </form>
        </section>

</div>