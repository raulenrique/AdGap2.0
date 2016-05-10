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
              
              <p>
                  <a href=".\?page=listing.create" class="btn btn-default" id="create"><span class="glyphicon glyphicon-plus"></span> Create Listing</a>
              <p>
                
                <?php
			foreach($listings as $listing):?>
				<ul class="listings">
				<h3><?= $listing->category; ?> $<?= $listing->buyNowPrice; ?></h3>
                <li><a href=".\?page=listing&amp;id=<?= $listing->id?>"><?= $listing->title; ?> (<?= $listing->auctionStartDateTime?>)</a></li>
                </ul>

			<?php endforeach; ?>
            
                 <!-- <a href="#technologyInfo" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a> -->
            </div>
        </div>
    </section>


    
    </div>

