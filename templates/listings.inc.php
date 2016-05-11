<div class="wrapper">
   <!-- Banner Section -->
    <section id="listingsHeader" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <h2>SAVE BIG TODAY ON ONE OF THESE AWESOME AD SPACES</h2>  
                </a>
            </div>
        </div>
    </section>

    <!-- Display All Listings Section -->
        <section id="allListings" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
             <ol class="breadcrumb">
                  <li><a href=".\">Home</a></li>
                  <li class="active">All Listings</a></li>
                </ol>
              <h2>Current Listings</h2>

          <?php if(count($listings) > 0): ?>
          <ul>
                
                <?php
          			foreach($listings as $listing):?>
          				<ul class="listings">
            				<h3><?= $listing->category; ?> $<?= $listing->buyNowPrice; ?></h3>
                    <li><h3><a href=".\?page=listing&amp;id=<?= $listing->id?>"><?= $listing->title; ?></a></h3></li>
                  </ul>
			           <?php endforeach; ?>

          </ul>
          <?php else: ?>
          <p>There are currently no listings to show you probably cause they've all been sold ;). Check back soon!!! </p>
          <?php endif; ?>
          <div class="form-group">
                <div class="createListinga">
                  <a href=".\?page=listing.create" class="btn btn-listing"><span class="glyphicon glyphicon-plus"></span> Create Listing</a>
                </div>
          </div>

            </div>
        </div>
    </section>
</div>

